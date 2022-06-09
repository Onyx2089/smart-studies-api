<?php

require_once __DIR__ . '/../../models/interface/model.Interface.Model.php';
require_once __DIR__ . '/../interface/lib.interface.IGeneratorRand.php';
require_once __DIR__ . '/../../models/class/model.class.modelClassDataBase.php';

class GeneratorRAnd implements IGeneratorRand
{
    public static function randomClass()
    {
        $nbrInsert = 0;
        $date = self::listDate();    
        $time = self::listTime();
        $duration = self::listDuring();
        
        $columns = ModelClass::CLASS_ARRAY;
        

        foreach($date as $today)
        {
            foreach(Model::ARRAY_CURSUS as $cursus)
            {
                $classCount = 0;
                while($classCount != self::CLASS_BY_DAY_BY_CURSUS)
                {
                    $fields = array();
                    if($cursus == Model::CURSUS_PRG)
                    {
                        $fields[] = self::randArray(self::ARRAY_COUR_PROG);
                    }
                    elseif($cursus == Model::CURSUS_MKT)
                    {
                        $fields[] = self::randArray(self::ARRAY_COUR_MKT);
                    }

                    /**
                     * 
                     */

                    $fields[] = $today . ' ' . self::randArray($time);
                    $fields[] = self::randArray($duration);
                    $fields[] = $cursus;

                    print_r($fields);

                    $classCount++;
                    
                    $res = DataBase::insert_fields(Model::MODEL_CLASS, $columns, $fields);
                    //die();
                    if($res != false)
                    {
                        $nbrInsert++;
                    }
                }
            }
        }

        echo $nbrInsert . ' as been insert';
    }

    public static function listDate()
    {
        $date = new DateTime();
        $dayNbr = self::DAY_NBR;
        $dayCount = 0;

        $date->modify('-' . $dayNbr .' day');

        $res = array();

        while($dayCount != $dayNbr * 2)
        {
            $date->modify('+1 day');
            $res[] = $date->format('Y-m-d') . PHP_EOL;
            
            $dayCount++;
        }

        return $res;
    }

    public static function listTime()
    {
        $time = new DateTime();
        $timeCount = 0;

        $res = array();

        while($timeCount != self::TIME_NBR)
        {
            $time->setTime(rand(self::TIME_MIN_HOUR, self::TIME_MAX_HOUR),
                            rand(self::TIME_MIN_MINUTE, self::TIME_MAX_MINUTE));
            $res[] = $time->format('H:i:s');
        
            $timeCount++;
        }
        
        return $res;
    }
    public static function listDuring()
    {
        $res = array();
        $durationCount = 0;

        while($durationCount != self::DURATION_NBR)
        {
            $res[] = rand(self::TIME_MIN_MINUTE, self::TIME_MAX_MINUTE);
            $durationCount++;
        }

        return $res;
    }

    public static function randArray($array)
    {
        if(is_array($array))
        {
            return $array[array_rand($array)];
        }
    }
}