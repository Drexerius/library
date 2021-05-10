<?php

$unix = time();
$migration_name = 'migration_' . $unix . '.php';

$content = "<?php

function up" . $unix . "() {
    return [

    ];
}

function down" . $unix . "() {
    return [

    ];
}";

file_put_contents('migrations/' . $migration_name, $content);