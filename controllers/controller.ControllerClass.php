<?php

require_once __DIR__ . '/../models/interface/model.Interface.Model.php';
require_once __DIR__ . '/../models/class/model.class.modelClassDataBase.php';
require_once __DIR__ . '/../lib/debug/lib.debug.Display.php';

class ControllerClass
{
    private $model = Model::MODEL_CLASS;
    private $method = false;
    private $field = false;
    private $value = false;
    private $operator = false;

    private $db_request = [];

    public function Response()
    {

        $this->method = $_SERVER['REQUEST_METHOD'];

        if( $this->method == 'POST')
        {
            $this->postResponse();
        }
        else if( $this->method == 'GET')
        {
            //Display::print("get");
            return $this->getResponse();
        }
        else if( $this->method == 'PUT')
        {
            $this->putResponse();
        }
        else if( $this->method == 'DELETE')
        {
            $this->deleteResponse();
        }
        else
        {
            $this->errorResponse("method not found");
        }
    }

    /**
     * 
     */

    public function postResponse()
    {
        Display::print("post request");
    }

    public function getResponse()
    {
        // require model(entity)YES, fields(entity fields), values(entity value), method(eq, gt, lt)

        // subject, hour
        if(isset($_GET['field']) && isset($_GET['value']))
        {
            //Display::print("test");

            if(in_array($_GET['field'], ModelClass::CLASS_ARRAY))
            {
                $this->field = $_GET['field'];
                //Display::print( $this->successResponse("field found") );
            
                $this->value = $_GET['value'];
               

                $res = DataBase::select_fields($this->model, $this->field, $this->value);
                
                if($res != false)
                {
                    return $res;
                }
             

            }
        }

        

        return $this->errorResponse("all error");
    }

    public function putResponse()
    {
        Display::print("put request");
    }

    public function deleteResponse()
    {
        Display::print("delete request");
    }

    /**
     * 
     */

    public function successResponse($data): string
    {
        return "success with (" . $data . ")";
    }

    public function errorResponse($data): string
    {
        return "error with (" . $data . ")";
    }

}
