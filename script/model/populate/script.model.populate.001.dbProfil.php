<?php

require_once __DIR__ . '/../../../models/class/model.class.modelClassDataBase.php';
require_once __DIR__ . '/../../../models/class/model.class.modelClassDataBase.php';

$table = "profil";
$file = "profil_populate";

DataBase::insertSQL($table, $file);
