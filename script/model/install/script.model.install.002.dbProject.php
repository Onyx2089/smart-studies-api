<?php

require_once __DIR__ . '/../../../models/class/model.class.modelClassDataBase.php';

$table = "project";

DataBase::deleteTable($table);

DataBase::createTable($table);
