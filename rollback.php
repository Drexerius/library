<?php
require 'modules/db_connect.php';

$migrations = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM migrations"));
$migration = end($migrations);

require_once ('migrations/' . $migration);

$queries_down = ('down' . getTime($migration))();
foreach ($queries_down as $query) {
    mysqli_query($db, $query);
}
mysqli_query($db,"DELETE FROM migrations WHERE name = '$migration'");

function getTime(string $filename) : string
{
    $core = '#\d+#';
    preg_match($core, $filename, $name);
    return $name[0];
}