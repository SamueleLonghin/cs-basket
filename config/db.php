<?php

$port = getenv("MYSQL_DBPORT");
$host = getenv("MYSQL_DBHOST");
$user = getenv("MYSQL_DBUSER");
$password = getenv("MYSQL_DBPASS");

return [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host=$host:$port;dbname=basket",
    'username' => $user,
    'password' => $password,
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
