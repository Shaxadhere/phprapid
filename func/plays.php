<!-- 
 * PHP Rapid
 * https://github.com/Shaxadhere/phprapid
 *
 * Tested on PHP 7.4
 *
 * Copyright Shehzad Ahmed 
 * https://shaxad.com
 * https://github.com/Shaxadhere

 * Released under the MIT license
 * 
 *
 * Date: 2020-08-23
  -->

<?php

//this methods adds header with dynamic title//
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

//this method adds footer//
function getFooter(string $footerPath){
    include($footerPath);
}

//this method redirects page with javascript//
function redirectWindow(string $url)
{
    echo "<script>window.location.href='$url';</script>";
}

//this method shows alert with javascript//
function showAlert(string $msg)
{
    echo "<script>alert('$msg');</script>";
}

?>