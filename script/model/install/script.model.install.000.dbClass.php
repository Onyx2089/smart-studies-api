<?php

require_once __DIR__ . '/../../../models/class/model.class.modelClassDataBase.php';

$table = "class";

DataBase::deleteTable($table);

DataBase::createTable($table);
