<?php
require 'Modules/db_connect.php';

$migrations = scandir('Migrations');
unset($migrations[0]);
unset($migrations[1]);

foreach ($migrations as $migration) {
    if (shouldQuery($migration)) {
        require_once ('Migrations/' . $migration);

        $time = getTime($migration);
        $queries_up = ('up' . $time)();
        $queries_down = ('down' . $time)();
        $error_key = null;

        foreach ($queries_up as $key => $query) {
            mysqli_query($db, $query);

            if ($error = mysqli_error($db) !== '') {
                echo 'Error';
                $error_key = $key;
                break;
            }
        }

        if ($error_key !== null) {
            for ($k = 0; $k < $error_key; $k++) {
                mysqli_query($db, $queries_down[$k]);
            }
        } else {
            mysqli_query($db, "INSERT INTO Migrations (`name`) VALUES ('$migration')");
            echo 'Success: ' . $migration . '<br>';
        }
    }
}

function getTime(string $filename) : string
{
    $core = '#\d+#';
    preg_match($core, $filename, $name);
    return $name[0];
}

function  shouldQuery(string $migration) : bool
{
    global $db;
    $result = mysqli_query($db, "SELECT * FROM Migrations WHERE name = '$migration'");
    return mysqli_num_rows($result) === 0 ? true : false;
}