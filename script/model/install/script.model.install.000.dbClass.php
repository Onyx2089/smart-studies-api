<?php

require_once __DIR__ . '/../../../model/class/model.class.DataBase.php'; 

$table = "class";

DataBase::deleteTable($table);

DataBase::createTable($table);
