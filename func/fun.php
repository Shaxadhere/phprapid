<?php

// * PHP Rapid
// * https://github.com/Shaxadhere/phprapid
// *
// * Tested on PHP 7.4
// *
// * Copyright Shehzad Ahmed 
// * https://shaxad.com
// * https://github.com/Shaxadhere

// * Released under the MIT license
// * 
// *
// * Date: 2020-08-23

/**
 * generates random evil insult in english
 * 
 * @return String insult in string
 */ 
function generateInsult(){

    // Initialize CURL:
    $ch = curl_init('https://evilinsult.com/generate_insult.php?lang=en&type=json');  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
    $res = json_decode($json, true);

    $val =  $res['insult'];

    return $val;
}

/**
 * generates random advice in english
 * 
 * @return String advice in string
 */ 
function generateAdvice(){

    // Initialize CURL:
    $ch = curl_init('https://api.adviceslip.com/advice');  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
    $res = json_decode($json, true);

    $val =  $res['slip']['advice'];

    return $val;
}

/**
 * generates random quote in english
 * 
 * @return Array array(quote, author)
 */ 
function generateQuote(){

    // Initialize CURL:
    $ch = curl_init('https://favqs.com/api/qotd');  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
    $res = json_decode($json, true);

    $val =  array(
        "quote" => $res['quote']['body'],
        "author" => $res['quote']['author']
    );

    return $val;
}


?>
