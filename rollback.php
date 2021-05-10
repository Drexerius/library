<?php
require 'Modules/db_connect.php';

$migrations = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Migrations"));
$migration = end($migrations);

require_once ('Migrations/' . $migration);

$queries_down = ('down' . getTime($migration))();
foreach ($queries_down as $query) {
    mysqli_query($db, $query);
}
mysqli_query($db,"DELETE FROM Migrations WHERE name = '$migration'");

function getTime(string $filename) : string
{
    $core = '#\d+#';
    preg_match($core, $filename, $name);
    return $name[0];
}