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
    const ADVENTURE = "adventure";
    const NEURONE = "neurone";
    const RTV = "rtv";
    const GAME_OF_LIFE = "game of life";
    const REDTRACKER = "redctracker";
    const ICONE_OF_SIMS = "icon of sims";
    const ASSEMBLEUR = "assembleur";

    const ARRAY_PROJECT_PRG = 
    [
        self::WEB_WAR,
        self::ADVENTURE,
        self::NEURONE,
        self::RTV,
        self::GAME_OF_LIFE,
        self::REDTRACKER,
        self::ICONE_OF_SIMS,
        self::ASSEMBLEUR
    ];

    /**
     * 
     */

    const PROJECT_BY_CURSUS = 15;  

    const DAY_POSSIBILITY = 30;

    const APOLLO = "apollo";
    const PHOENIX = "phoenix";
    const INSTANT_GALAXY = "instant Galaxy";
    const NITRO = "nitro";
    const PROJECT_X = "project X";
    const ORION = "orion";
    const QUADRO = "quadro";
    const SPACE_X = "space X";

    const ARRAY_PROJECT_MKT = 
    [
        self::APOLLO,
        self::PHOENIX,
        self::INSTANT_GALAXY,
        self::NITRO,
        self::PROJECT_X,
        self::ORION,
        self::QUADRO,
        self::SPACE_X
    ];
}