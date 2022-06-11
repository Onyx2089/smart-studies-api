<?php

require_once __DIR__ . '/../models/interface/model.Interface.Model.php';
require_once __DIR__ . '/../models/class/model.class.modelClassDataBase.php';
require_once __DIR__ . '/../lib/debug/lib.debug.Display.php';

class ControllerModel
{
    private $model = false;//Model::MODEL_CLASS;
    private $method = false;
    //private $field = false;
    //private $value = false;

    public function setModel()
    {
        $this->model = Model::MODEL_ARRAY[$_GET['model']];
        return $this;
    }

    public function Response()
    {
        $this->setModel();

        $this->method = $_SERVER['REQUEST_METHOD'];

        if( $this->method == 'POST')
        {
            return $this->postResponse();
        }
        else if( $this->method == 'GET')
        {
            return $this->getResponse();
        }
        else if( $this->method == 'PUT')
        {
            return $this->putResponse();
        }
        else if( $this->method == 'DELETE')
        {
            return $this->deleteResponse();
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
        if(sizeof($this->model/*ModelClass::CLASS_ARRAY*/) == sizeof($_POST))
        {
            $bool = true;
            $post = $_POST;
            $columns = array();
            $fields = array();

            foreach($post as $key => $value)
            {            
                if(!in_array($key, $this->model/*ModelClass::CLASS_ARRAY*/))
                {
                    $bool = false;
                }
                $columns[] = $key;
                $fields[] = $value;
            }
          
            if($bool)
            {
                $res = DataBase::insert_fields($_GET['model'], $columns, $fields);

                if($res != false)
                {
                    return $res;
                }
            }
        }

        return array("nothing");
    }

    public function getResponse()
    {
        if(isset($_GET['field']) && isset($_GET['op']) && isset($_GET['value']))
        {

            $fields = json_decode($_GET['field']);
            $ops = json_decode($_GET['op']);
            $values = json_decode($_GET['value']);
            $sort = false;

            //return $fields;

            if(isset($_GET['sort']))
            {
                $sort = json_decode($_GET['sort']);
                if(!is_array($sort))
                {
                    $sort = false;
                }
            }

            
            if(is_array($fields) || is_array($ops) || is_array($values))
            {
                $res = DataBase::select_fields($_GET['model'], $fields, $ops, $values, $sort);
                //return array($fields, $ops, $values);
                if($res != false)
                {
                    return $res;
                }
            }

            /*      
            if(in_array($_GET['field'], $this->getArray()))
            {
                $res = DataBase::select_fields($_GET['model'], $_GET['field'], $_GET['value']);   
                if($res != false)
                {
                    return $res;
                }
            }
            */
        }

        return array("nothing herer");
    }

    public function putResponse()
    {
        $get = $_GET;

        
        if(isset($get['ID']))
        {
            //$id = intval( $get['ID'] );
            $id = $_GET['ID'];
            
            
            if(is_int($id) || $id != 0)
            {
                //return array('ID found', $get);
                
                unset($get['model']);
                if(!isset($get['model']))
                {
                    //return $get;
                    //return $this->successResponse("model destroy");
                    unset($get['ID']);
                    if(!isset($get['ID']))
                    {
                        //return "hey";
                        //return array('all is destroy', $get);
                        $bool = true;
                        $columns = array();
                        $fields = array();

                        foreach($get as $key => $value)
                        {
                            //Display::print($value);
                            //return array($key, $value);
                            if(!in_array($key, $this->getArray()))
                            {
                                $bool = false;
                            }
            
                            $columns[] = $key;
                            $fields[] = $value;
                        }
                        
                        if($bool)
                        {
                            $res = DataBase::edit_fields($_GET['model'], $columns, $fields, $id);

                            if($res)
                            {
                                return $res;
                            }
                        }
                    }
                }
            }
        }
 

        return array("nothing");
    }

    public function deleteResponse()
    {
        $get = $_GET;

        if(isset($get['ID']))
        {
            $id = $get['ID'];
            if(is_int($id) || $id != 0)
            {
                $res = DataBase::delete_field($_GET['model'], $id);

                if($res != false)
                {
                    return $res;
                }
                return $res;
                //return $this->successResponse("id found & compatible");
            }
        }
        return $this->errorResponse("all error");
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

    /**
     * 
     */

    public function getArray()
    {
        $array = $this->model;
        array_unshift($array, Model::NAME_ID);

        return $array;
    }

    public static function getPost($data)
    {
        return gettype($data);
    }

}
