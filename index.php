<?php

require_once __DIR__ . '/model/interface/model.Interface.Model.php';
require_once __DIR__ . '/controller/controller.Controller.php';


//print_r($_SERVER['REQUEST_METHOD']);

if(isset($_GET['model']))
{
    if(in_array($_GET['model'], array_keys(Model::MODEL_ARRAY)))
    {
        //echo 'here';

        $res = new Controller;
        $res = $res->Response($_GET['model']);


        //print_r($res);

        if($res != false)
        {
            $res = json_encode($res, true);
            if($res != false);
            {
                echo $res;
            }
        }
    }
    else
    {
        echo json_encode("bad model");
    }
}
