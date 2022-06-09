<?php

interface IDataBase
{
    const TABLE_CLASS = "class";
    const TABLE_PROFIL = "profil";
    const TABLE_PROJECT = "project";
    
    const ARRAY_TABLE = 
    [
        self::TABLE_CLASS,
        self::TABLE_PROFIL,
        self::TABLE_PROJECT
    ];
    
    const DIR_SQL = __DIR__ . '/../../config/';
    
    const ARRAY_SQL_FILE = 
    [
        self::TABLE_CLASS => self::DIR_SQL . 'class.sql',
        self::TABLE_PROFIL => self::DIR_SQL . 'profil.sql',
        self::TABLE_PROJECT => self::DIR_SQL . 'project.sql'
    ];
}