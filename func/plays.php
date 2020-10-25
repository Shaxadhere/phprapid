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
 * adds header with dynamic title/
 *
 * @param String   $pageName  expects page name
 * @param String   $headerPath  header.php path
 * 
 */ 
function getHeader(string $pageName, string $headerPath)
{
    ob_start(); 
    include($headerPath);
    //include("header.php");
    $buffer=ob_get_contents();
    ob_end_clean();
    $title = $pageName;
    $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . ' - JamesThrew$3', $buffer);

    echo $buffer;
}

/**
 * adds footer/
 *
 * @param String   $footerPath  expects footer.php path
 * 
 */ 
function getFooter(string $footerPath){
    include($footerPath);
}

/**
 * redirects page with javascript
 *
 * @param String   $url  expects url
 * 
 */ 
function redirectWindow(string $url)
{
    echo "<script>window.location.href='$url';</script>";
}

/**
 * shows alert with javascript
 *
 * @param String   $msg  expects message
 * 
 */ 
function showAlert(string $msg)
{
    echo "<script>alert('$msg');</script>";
}

?>