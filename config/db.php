<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=basket',
    'username' => getenv("MYSQL_DBUSER"),
    'password' => getenv("MYSQL_DBPASS"),
    'charset' => 'utf8',
    
    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
