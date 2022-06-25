<?php

require_once __DIR__ . '/../../../model/class/model.class.DataBase.php'; 

$table = "profil";
$file = "profil_populate";

DataBase::insertSQL($table, $file);
