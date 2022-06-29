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
    $res = DataBase::select_fields(Model::MODEL_CLASS, array(ModelClass::TIME, ModelClass::CURSUS), array(DataBase::LIKE, DataBase::EQ), array("2022-06-10", 3000), array(ModelClass::TIME, IDataBase::ORDER_BY_ASC));

    Display::print($res);
}
