<?php

require_once __DIR__ . '/../../model/class/model.class.DataBase.php';

class Crypt
{
    function encryptData($data, $method, $id, $table)
    {       
        $salt = self::salt($method, $id, $table);

        $encryption = openssl_encrypt($data, "chacha20", $salt, 0, '1234567891234567');
        
        return $encryption;
    }

    function decryptData($data, $id, $table)
    {
        $salt = self::salt("edit", $id, $table);   

        $decryption = openssl_decrypt($data, "chacha20", $salt, 0, '1234567891234567');

        return stripcslashes($decryption);
    }

    function salt($method, $id, $table)
    {
        if($method == "insert")
        {
            $time = date("s");
        }
        elseif($method == "edit" && $id != NULL)
        {
            $result = DataBase::select_fields($table, array("DATE_TIME"), array("LIKE"), array("30/06/2022"));
            if($result == -1)
                return $result;

            $date = strtotime($result[0]['dateCreation']);

            $time  = date("s", $date);
        }
        else
            return -1;


        for($i = 0; strlen($time) != 1; $i++)
        {
            $time = substr($time, 1);
        }
        settype($time, "int");

        $file = "salt/";

        if($time == 0)
            $file .= "zero";
        elseif($time == 1)
            $file .= "one";
        elseif($time == 2)
            $file .= "two";
        elseif($time == 3)
            $file .= "three";
        elseif($time == 4)
            $file .= "four";
        elseif($time == 5)
            $file .= "five";
        elseif($time == 6)
            $file .= "six";
        elseif($time == 7)
            $file .= "seven";
        elseif($time == 8)
            $file .= "eight";
        elseif($time == 9)
            $file .= "nine";
        else
            return -1;

        return $file;
    }
}