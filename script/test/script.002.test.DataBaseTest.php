<?php

require_once __DIR__ . '/../../lib/debug/lib.debug.Display.php';
require_once __DIR__ . '/../../models/interface/model.Interface.Model.php';
require_once __DIR__ . "/../../models/class/model.class.modelClassDataBase.php";


$array = array('json', 'select');

if($argc != 2)
{
    Display::print($array);
}
elseif($argv[1] == $array[0])
{
    Display::print( DataBase::getJsonAdmin() );
}
elseif($argv[1] == $array[1])
{
    //DataBase::join_database();
    $res = DataBase::select_fields(Model::MODEL_CLASS, ModelClass::TIME, "2022-06-26");

    Display::print($res);
}