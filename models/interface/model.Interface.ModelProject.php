<?php 

interface ModelClass 
{
    const NAME_ID = "ID";
    const NAME_SUBJECT = "NAME";
    const NAME_HOURS = "TIME";

    const CLASS_ARRAY = 
    [
        Model::TYPE_STRING => self::NAME_SUBJECT,
        Model::TYPE_DATE_TIME => self::NAME_HOURS
    ];
}