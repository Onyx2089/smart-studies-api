<?php

require_once __DIR__ . '/../../../model/class/model.class.DataBase.php'; 

$table = "profil";

DataBase::deleteTable($table);

DataBase::createTable($table);
