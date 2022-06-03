<?php 

interface ModelClass 
{
    const NAME_SUBJECT = "subject";
    const NAME_HOURS = "hour";

    const CLASS_ARRAY = 
    [
        Model::TYPE_STRING => self::NAME_SUBJECT,
        Model::TYPE_INT => self::NAME_HOURS
    ];
}