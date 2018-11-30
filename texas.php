#!/bin/php
<?php

$session = mysql_xdevapi\getSession("mysqlx://root:hidave@localhost:33060");
if ($session === NULL) {
  die("Connection could not be established");
} 

$schema = $session->getSchema("world");
$table  = $schema->getTable("city");


$row = $table->select('Name','District')
              ->where('District like :district')
              ->bind(['district' => 'Texas'])
              ->execute()->fetchAll();


##$row = $result->fetchAll();
print_r($row);

