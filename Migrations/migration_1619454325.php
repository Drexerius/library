<?php

function up1619454325() {
    return [
        "CREATE TABLE test_table (
            id int AUTO_INCREMENT PRIMARY KEY,
            name varchar(50),
            description text,
            birth date
        )",
        "ALTER TABLE test_table ADD COLUMN test VARCHAR(24) NULL AFTER name",
        "INSERT INTO genres (`name`) VALUES ('name')"
    ];
}

function down1619454325() {
    return [
        "DROP TABLE test_table",
        "ALTER TABLE test_table DROP COLUMN test",
        "DELETE FROM genres WHERE name = 'name'"
    ];
}