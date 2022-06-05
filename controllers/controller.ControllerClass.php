<?php

require_once __DIR__ . '/../models/interface/model.Interface.Model.php';
require_once __DIR__ . '/../models/class/model.class.modelClassDataBase.php';
require_once __DIR__ . '/../lib/debug/lib.debug.Display.php';

class ControllerModel
{
    private $model = Model::MODEL_CLASS;
    private $method = false;
    private $field = false;
    private $value = false;

    public function Response($data)
    {
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
        //need all field for insert
        if(sizeof(ModelClass::CLASS_ARRAY) == sizeof($_POST))
        {
            $bool = true;
            $post = $_POST;
            $columns = array();
            $fields = array();

            //return array(ModelClass::CLASS_ARRAY, array_keys( $post ));

            foreach($post as $key => $value)
            {
                //Display::print($value);
                //return array($key, $value);
                if(!in_array($key, ModelClass::CLASS_ARRAY))
                {
                    $bool = false;
                }

                $columns[] = $key;
                $fields[] = $value;
            }
             // TO DO CHECK THE POST VALUE TO CONTINUTE
            if($bool)
            {

                //return array($columns, $fields);
                $res = DataBase::insert_fields($this->model, $columns, $fields);

                if($res != false)
                {
                    return $res;
                }
                //return $post;
                //return $this->successResponse("all field is good");
            }
        }

        //return array(sizeof(ModelClass::CLASS_ARRAY), sizeof($_POST));
        //return array( $_GET, $_POST);
        
        //$post = $_POST;

        //return $post['NAME'];
        return $this->errorResponse("all error");
    }

    public function getResponse()
    {
        // require model(entity)YES, fields(entity fields), values(entity value), method(eq, gt, lt)

        // subject, hour
        if(isset($_GET['field']) && isset($_GET['value']))
        {
            //Display::print("test");

            if(in_array($_GET['field'], $this->getClass()))
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
                    //return $this->successResponse("model destroy");
                    unset($get['ID']);
                    if(!isset($get['ID']))
                    {
                        //return array('all is destroy', $get);
                        $bool = true;
                        $columns = array();
                        $fields = array();

                        foreach($get as $key => $value)
                        {
                            //Display::print($value);
                            //return array($key, $value);
                            if(!in_array($key, $this->getClass()))
                            {
                                $bool = false;
                            }
            
                            $columns[] = $key;
                            $fields[] = $value;
                        }
                        
                        if($bool)
                        {
                            $res = DataBase::edit_fields($this->model, $columns, $fields, $id);

                            if($res)
                            {
                                return $res;
                            }
                        }
                    }
                }
            }
        }
 

        return $this->errorResponse("all error");
    }

    public function deleteResponse()
    {
        $get = $_GET;

        if(isset($get['ID']))
        {
            $id = $get['ID'];
            if(is_int($id) || $id != 0)
            {
                $res = DataBase::delete_field($this->model, $id);

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

    public static function getClass()
    {
        $array = ModelClass::CLASS_ARRAY;
        array_unshift($array, Model::NAME_ID);

        return $array;
    }

    public static function getPost($data)
    {
        return gettype($data);
    }

}
