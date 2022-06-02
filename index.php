<?php

require_once 'models/modelInterface.php';

$res = Model::MODEL_ARRAY;

print_r($_SERVER['REQUEST_METHOD']);

if(isset($_GET['model']))
{
    if(in_array($_GET['model'], Model::MODEL_ARRAY))
    {
        echo "go to " . $_GET['model'] . " entity";
    }
    else
    {
        echo "don't find";
    }
}
