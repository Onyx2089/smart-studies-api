<?php

interface IGeneratorRAnd
{
    // CLASS
    //const TABLE_CLASS = "class";
    const CLASS_BY_DAY_BY_CURSUS = 10;  

    const DAY_NBR = 14;
    
    const TIME_NBR = 20;
    const TIME_MIN_HOUR = 8;
    const TIME_MAX_HOUR = 18;
    const TIME_MIN_MINUTE = 10;
    const TIME_MAX_MINUTE = 59;

    const DURATION_NBR = 30;

    /**
     * 
     */

    const ANDROID = "android";
    const IOS = "ios";
    const KOTLIN = "kotlin";
    const PHP = "php";
    const CSS = "css";
    const HTML = "html";
    const JS = "js";
    const JQUERY = "jquery";

    const ARRAY_COUR_PROG = 
    [
        self::ANDROID,
        self::IOS,
        self::KOTLIN,
        self::PHP,
        self::CSS,
        self::HTML,
        self::JS,
        self::JQUERY
    ];

    /**
     * 
     */

    const E_COMMERCE = "E-Commerce";
    const E_RESEAUX = "Réseaux/Médias sociaux";
    const GRAPH_CREATE = "Création graphique";
    const EPT = "Entrepreniat";
    const BNS = "Business Plan";
    const UX_UI = "UX/UI design";
    const MGT = "Management";
    const GDP = "Gestion de projet";

    const ARRAY_COUR_MKT = 
    [
        self::E_RESEAUX,
        self::E_COMMERCE,
        self::GRAPH_CREATE,
        self::EPT,
        self::BNS,
        self::UX_UI,
        self::MGT,
        self::GDP
    ];

    // PROJECT

    const WEB_WAR = "web war";
    // adventure neurone rtv game_of_life puissance_4 scandir icone_of_sims 
    // redtracker red_steel assembleur 
}