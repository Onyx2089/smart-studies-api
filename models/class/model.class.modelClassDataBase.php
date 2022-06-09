<?php

require_once __DIR__ . '/../interface/model.interface.ClassDataBase.php';

class DataBase
{

    public static function getJsonAdmin()
    {
        return json_decode( file_get_contents(__DIR__ . "/../../config/admin.json"), true);
    }

    public static function join_database()
    {
        //$login = file_get_contents(__DIR__ . "/../../");
        //$login = json_decode($login, true);

        $login = self::getJsonAdmin();
    
        #print_r($login);
        //$db = new mysqli();
        
        $db = new mysqli($login['db_url'], $login['db_login'], $login['db_password'], $login['db_name']);
        

        //$db = new mysqli("localhost:3306", "root", "root", "api_final");        

        if($db == false)
        {
            echo "connexion impossible";
            return $db;
        }

    
        #echo "connexion réussie";
        return $db;
    }
    
    public static function select_fields($table, $by, $value)
    {
        $Database = self::join_database();
        if($Database == false)
        {
            return false;
        }
    
        if ($Database->connect_errno) {
            printf("Échec de la connexion : %s\n", $Database->connect_error);
            exit();
        }
        #echo "connected <br>";
        
        /*if($value == -1)
        {
            $sql = "SELECT * FROM $table";
        }
        else
        {*/
        
        $sql = "SELECT * FROM $table WHERE $by =  '$value'";
        
        //}
        #echo $sql . "<br>";
        #$result = $Database->query($sql);
        $result = $Database->query($sql);
    
        if($result == false) 
        {
            return false;
        }
    
        #echo "ready <br>";
        #$data = $result->fetch_all();
        $data =  array();
    
        while ($row = $result->fetch_assoc()) 
        {
            $data[] = $row;
        }
    
        #$arr = array_keys($arr);
        #echo "<pre>";
        #print_r($data);
        #echo "</pre>";
        if(empty($data))
        {
            return array();
        }
    
        return $data;
    }
    
    public static function insert_fields($table, $columns, $fields)
    {
        $Database = self::join_database();
        if($Database == false)
        {
            return false;
        }
        #else 
        if ($Database->connect_errno) {
            printf("Échec de la connexion : %s\n", $Database->connect_error);
            exit();
        }
    
        #$sql = "INSERT INTO $table (message) VALUES (";
        $sql = "INSERT INTO $table (";
    
        foreach($columns as $column)
        {
            $sql .= $column . ', ';
        }
    
    
        $sql[strlen($sql) -2 ] = ')';
        
        $sql .= "VALUES (";
        #$sql[strlen($sql)] = "VALUES";
        foreach($fields as $field)
        {
            $sql .= "'" . $Database->real_escape_string($field) . "', ";
        }
        $sql[strlen($sql) - 2] = ') EOF'; 
    
        #$sql = $Database->real_escape_string($sql);
        
        //WARNING htmlspecialcharsrr()
        //$sql = htmlspecialchars($sql);
        //echo $sql;
        //die();
        #echo $sql .  "<br>";
        $result = $Database->query($sql);
        
        //echo $Database->error; 
    
        if($result == false) 
        {
            return false;
        }
    
        #else
            #echo "insert succes <br>";
        
        return $Database->insert_id;
    }
    
    public static function edit_fields($table, $columns, $fields, $id)
    {
        $Database = self::join_database();
        if($Database == false)
        {
            return false;
        }
        #else 
            #echo "connected <br>"; 
        if ($Database->connect_errno) {
            printf("Échec de la connexion : %s\n", $Database->connect_error);
            exit();
        }
    
        #echo $fields . "<br>";
        //$fields = $Database->real_escape_string($fields);
        //$fields = htmlspecialchars($fields);
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
    
        #$sql = $Database->real_escape_string($sql);
        $sql = htmlspecialchars($sql);    
            
        #echo $sql . "<br>";
        $result = $Database->query($sql);
    
        if($result == false)
        {
            return false;
        }
            //echo $Database->error;
        if($id != -1)
        {
            return $id;
        }
        else
        {

            return 0;
        } 
    
    
        #echo $Database->error;
    }
    
    //TO DO delete_fields() function
    public static function delete_field($table, $id)
    {
        $Database = self::join_database();
        if($Database == false)
        {
            return false;
        }

        if ($Database->connect_errno) {
            printf("Échec de la connexion : %s\n", $Database->connect_error);
            exit();
        }

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

    public static function count_table($table, $column, $id)
    {
        $Database = self::join_database();
        if($Database == false)
        {
            return false;
        }
        #else 
            #echo "connected <br>"; 
        if ($Database->connect_errno) {
            printf("Échec de la connexion : %s\n", $Database->connect_error);
            exit();
        }
    
        //$sql = "SELECT COUNT($column) As 'nbr' FROM $table WHERE $column == $id"; id id-site likes
        $sql = "SELECT COUNT(*) As nbr FROM $table WHERE $column = $id";
    
        $sql = htmlspecialchars($sql);
    
        $result = $Database->query($sql);
    
        //echo gettype($result);
        $data =  array();
        while ($row = $result->fetch_assoc()) 
        {
            $data[] = $row;
        }
    
        if($result == false)
        {
            return $Database->error;
        }
        
        //echo $Database->error;
        if($result != null)
        {
            return $data[0]['nbr'];
        }
        else
        {
            return 0;
        } 
    }
    
    public static function orderBy($table, $column, $value, $method = null)
    {
        $Database = self::join_database();
        if($Database == false)
        {
            return false;
        }
        #else 
            #echo "connected <br>"; 
        if ($Database->connect_errno) {
            printf("Échec de la connexion : %s\n", $Database->connect_error);
            exit();
        }
    
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
        
        //echo $Database->error;
        if($result != null)
        {
            return $data;
        }
        else
        {
            return 0;
        } 
    }

    public static function createTable($table)
    {
        if(!self::existTable($table))
        {
            if(in_array($table, IDataBase::ARRAY_TABLE))
            {
                if(file_exists(IDataBase::ARRAY_SQL_FILE[$table]))
                {
                    //echo 'yes';
                    $Database = self::join_database();
                    if($Database == false)
                    {
                        return false;
                    }
                    #else 
                        #echo "connected <br>"; 
                    if ($Database->connect_errno) {
                        printf("Échec de la connexion : %s\n", $Database->connect_error);
                        exit();
                    }

                    $sql = file_get_contents(IDataBase::ARRAY_SQL_FILE[$table]);

                    if($Database->query($sql) === TRUE)
                    {
                        echo "Table $table created";
                    }
                    else
                    {
                        echo "error creation $table";
                    }

                    //echo $sql;
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

    public static function deleteTable($table)
    {
        if(self::existTable($table))
        {
            if(in_array($table, IDataBase::ARRAY_TABLE))
            {
                $Database = self::join_database();
                if($Database == false)
                {
                    return false;
                }
                #else 
                    #echo "connected <br>"; 
                if ($Database->connect_errno) {
                    printf("Échec de la connexion : %s\n", $Database->connect_error);
                    exit();
                }
                //echo $table . ' exist';
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

    public static function existTable($table)
    {
        if(in_array($table, IDataBase::ARRAY_TABLE))
        {
            $Database = self::join_database();
            if($Database == false)
            {
                return false;
            }
            #else 
                #echo "connected <br>"; 
            if ($Database->connect_errno) {
                printf("Échec de la connexion : %s\n", $Database->connect_error);
                exit();
            }

            $login = self::getJsonAdmin();

            //$sql = "SELECT * FROM $table IF EXISTS";
            $sql = "SHOW TABLES FROM " . $login['db_name'];

            $result = $Database->query($sql);

            $data =  array();
            while ($row = $result->fetch_assoc()) 
            {
                $data[] = $row['Tables_in_api_final'] ;
            }

            //print_r($table);
            
            //print_r($data);

            if(in_array($table, $data))
            {
                //echo 'find';
                return true;
            }
            else
            {
                //echo 'error';
                return false;
            }
            //echo PHP_EOL;
        }
    }
    
}