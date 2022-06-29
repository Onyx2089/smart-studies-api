<?php

require_once __DIR__ . '/model/interface/model.Interface.Model.php';
require_once __DIR__ . '/controller/controller.Controller.php';
require_once __DIR__ . '/config/config.IAdmin.php';

if(isset($_GET['key']))
{
    if($_GET['key'] == IAdmin::API_KEY)
    {
        unset($_GET['key']);
        if(isset($_GET['model']))
        {
            if(in_array($_GET['model'], array_keys(Model::MODEL_ARRAY)))
            {

                $res = new Controller;
                $res = $res->Response($_GET['model']);

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
    }
   
}

