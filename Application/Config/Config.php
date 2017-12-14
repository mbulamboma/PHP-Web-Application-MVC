<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Config;


/**
 * Description of Config
 *
 * @author mbula
 */
final class Config {
    // Database info (if you want to test the script, please edit the below constants with yours)
    const
    DB_HOST = 'localhost',
    DB_NAME = 'thecorner',
    DB_USR = 'root',
    DB_PWD = '',

    // Title of the site
    SITE_NAME = 'Muhamed Ali American Corner English Club',
    //For Members page
    MEMBER_PER_PAGE = 9,
    aMEMBER_SORT_BY= ['registration_date', 'is_online', 'firstname', 'messages_sent', 'lastvisit', 'city'],
    aMessages_SORT_BY= ['date', 'sender_name', 'receiver_name', 'city'],
    aTRI = ['DESC', 'ASC'],
    
    //Brute Force
    Max_login_Attempts = 4,
    Max_login_Time= 180,
            
    //Captcha
    Min_Captcha_Length = 4,
    Max_Captcha_Length = 6,
    Captcha_Vocal = "English",
    Max_Vocal_Mt_Rand = 5,
    Min_Vocla_Mt_Rand = 0,
    Vocal_Length = 1,
            
    Captcha_Words = "abcdefghijklmnopqrstuvwxyz1234567890",
    Max_Words_Mt_Rand = 36,
    Min_Words_Mt_Rand = 0,
    Words_Length = 1;
             
}
