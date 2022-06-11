<?php

require_once __DIR__ . '/../../config/config.IAdmin.php';
require_once __DIR__ . '/../interface/model.interface.ClassDataBase.php';

class DataBase implements IAdmin, IDataBase
{

    public static function getJsonAdmin()
    {
        return json_decode( file_get_contents(__DIR__ . "/../../config/admin.json"), true);
    }

    public static function join_database()
    {
        $login = self::getJsonAdmin();

        //$db = new mysqli($login['db_url'], $login['db_login'], $login['db_password'], $login['db_name']);
        $Database = new mysqli(self::URL, self::LOGIN, self::PASSWORD, self::NAME);

        if($Database == false)
        {
            return false;
        }
    
        if ($Database->connect_errno) {
            //printf("Échec de la connexion : %s\n", $Database->connect_error);
            exit();
        }


        return $Database;
    }
    
    public static function select_fields($table, $fields, $op, $values, $sort = false)
    {
        if(($Database = self::join_database()))
        {
            if(is_array($fields) && is_array($op) && is_array($values))
            {
                //echo "in ";
                if(sizeof($fields) == sizeof($op) && sizeof($op) == sizeof($values))
                {   
                    $whereCount = 0;
                    $data = array();
                    
                    while($whereCount != sizeof($fields))
                    {
                        if($op[$whereCount] == self::LIKE)
                        {
                            //echo "like";
                            //die();
                            $data[] = $fields[$whereCount] . ' ' . self::ARRAY_OPERATOR[$op[$whereCount]] . ' \'%' . $values[$whereCount] . '%\'';
                        }
                        else
                        {
                            $data[] = $fields[$whereCount] . ' ' . self::ARRAY_OPERATOR[$op[$whereCount]] . ' \'' . $values[$whereCount] . '\'';
                        }
                        //echo $fields[$whereCount] . ' ' . $op[$whereCount] . ' ' . $values[$whereCount];
                        $whereCount++;
                    }
                    
                    $sql = "SELECT * FROM $table WHERE ";
                    $sql .= implode(" AND ", $data);
                    
                    //return $sort;
                    $sql .= self::orderBySql($sort);
                    
                    //print_r($data);
                    //print_r($fields);
                    
                    //$sql = "here";
                    //return $sql;
                    //return $sql . PHP_EOL;
                    //die();
                    
                    //die();
                    $result = $Database->query($sql);
                
                    if($result == false) 
                    {
                        return false;
                    }
                
                    $data =  array();
                
                    while ($row = $result->fetch_assoc()) 
                    {
                        $data[] = $row;
                    }

                    if(empty($data))
                    {
                        return array();
                    }
                
                    return $data;
                }
                else
                {
                    echo 'nop';
                }
                echo PHP_EOL;
            }
        }
    }

    public static function orderBySql($sort)
    {
        //return gettype($sort);
        //$sort = json_decode($sort);
        if(is_array($sort) && sizeof($sort) == 2)
        {
            if(array_key_exists($sort[1], self::ARRAY_ORDER_BY))
            {              
                //print_r($sort);
                return " ORDER BY " . $sort[0] . ' ' . self::ARRAY_ORDER_BY[$sort[1]];
                //echo $sql . PHP_EOL;
            }
        }
    }
    
    public static function insert_fields($table, $columns, $fields)
    {
        if(($Database = self::join_database()))
        {
            $sql = "INSERT INTO $table (";
        
            foreach($columns as $column)
            {
                $sql .= $column . ', ';
            }
        
            $sql = substr_replace($sql, ") ", strrpos($sql, ","), 1);
            $sql .= "VALUES (";

            foreach($fields as $field)
            {
                $sql .= "'" . $Database->real_escape_string($field) . "', ";
            }

            $sql = substr_replace($sql, ") ", strrpos($sql, ","), 1);
            $result = $Database->query($sql);
        
            if($result == false) 
            {
                return false;
            }
        
            return $Database->insert_id;
        }
    }
    
    public static function edit_fields($table, $columns, $fields, $id)
    {
        if(($Database = self::join_database()))
        {
            $sql = "UPDATE $table SET ";
        
            for($i = 0; $i != sizeof($columns); $i++)
            {
                $sql .= $columns[$i] . "= '" . $Database->real_escape_string($fields[$i]) . "' ,"; 
            }

            $sql[strlen($sql) - 1] = ' ';
        
            if($id != -1)
            {

                $sql .= "WHERE id = $id";
            }
        
            $sql = htmlspecialchars($sql);    
            $result = $Database->query($sql);
        
            if($result == false)
            {
                return false;
            }

            if($id != -1)
            {
                return $id;
            }
            else
            {

                return 0;
            } 
    
        }
    }
    
    public static function delete_field($table, $id)
    {
        if(($Database = self::join_database()))
        {

            $sql = "DELETE FROM $table WHERE ID = $id";
            $result = $Database->query($sql);

            if($result != false)
            {
                return $result;
            }
            else
            {
                return false;
            }
        }
    }

    public static function count_table($table, $column, $id)
    {
        if(($Database = self::join_database()))
        {
            $sql = "SELECT COUNT(*) As nbr FROM $table WHERE $column = $id";
        
            $sql = htmlspecialchars($sql);
            $result = $Database->query($sql);
            $data =  array();

            while ($row = $result->fetch_assoc()) 
            {
                $data[] = $row;
            }
        
            if($result == false)
            {
                return $Database->error;
            }
            
            if($result != null)
            {
                return $data[0]['nbr'];
            }
            else
            {
                return 0;
            } 
        }
    }
    
    public static function orderBy($table, $column, $value, $method = null)
    {
        if(($Database = self::join_database()))
        {
            $sql = "SELECT $column FROM $table ORDER BY $value ";
        
            if($method != null)
            {
                $sql .= $method;
            }
        
            $sql = htmlspecialchars($sql);
            $result = $Database->query($sql);
            $data =  array();

            while ($row = $result->fetch_assoc()) 
            {
                $data[] = $row;
            }
        
            if($result == false)
            {
                return $Database->error;
            }
            
            if($result != null)
            {
                return $data;
            }
            else
            {
                return 0;
            } 
        }
    }

    public static function createTable($table)
    {
        if(($Database = self::join_database()))
        {
            if(!self::existTable($table))
            {
                if(in_array($table, IDataBase::ARRAY_TABLE))
                {
                    if(file_exists(IDataBase::ARRAY_SQL_FILE[$table]))
                    {
                        $sql = file_get_contents(IDataBase::ARRAY_SQL_FILE[$table]);

                        if($Database->query($sql) === TRUE)
                        {
                            echo "Table $table created";
                        }
                        else
                        {
                            echo "error creation $table";
                        }

                    }
                }
                else
                {
                    echo 'nop';
                }

            }
            else
            {
                echo $table . ' already exist';
            }
            
            echo PHP_EOL;
        }
    }

    public static function deleteTable($table)
    {
        if(($Database = self::join_database()))
        {
            if(self::existTable($table))
            {
                if(in_array($table, IDataBase::ARRAY_TABLE))
                {
                    $sql = "DROP TABLE $table";

                    if($Database->query($sql) === TRUE)
                    {
                        echo "Table $table deleted";
                    }
                    else
                    {
                        echo "error delete $table";
                    }
                }
            }
            else
            {
                echo $table . ' does\'t exist';
            }
            echo PHP_EOL;
        }
    }

    public static function existTable($table)
    {
        if(($Database = self::join_database()))
        {
            if(in_array($table, IDataBase::ARRAY_TABLE))
            {
                //$login = self::getJsonAdmin();
                $sql = "SHOW TABLES FROM " . self::NAME;
                $result = $Database->query($sql);
                $data =  array();

                while ($row = $result->fetch_assoc()) 
                {
                    $data[] = $row['Tables_in_api_final'] ;
                }

                if(in_array($table, $data))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
    }
    
}