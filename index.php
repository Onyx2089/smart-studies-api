<?php

require_once __DIR__ .  '/models/interface/model.Interface.Model.php';
require_once __DIR__ . '/controllers/controller.ControllerClass.php';


//print_r($_SERVER['REQUEST_METHOD']);

if(isset($_GET['model']))
{
    if(in_array($_GET['model'], Model::MODEL_ARRAY))
    {
        $res = new ControllerClass;
        Display::print( $res->Response() );
        
        //echo "go to " . $_GET['model'] . " entity";
    }
    else
    {
        echo "don't find";
    }
}
