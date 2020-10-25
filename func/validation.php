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
 * 
 * validates date format
 *
 * @param String   $date  expects date as YYY{seperator}MM{Seperator}DD
 * @param String   $seperator  expects date seperator
 * 
 * @return Boolean
 */ 
function validateDate(string $date, string $seperator){
    $test_arr  = explode($seperator, $date);
    $year = $test_arr[0];
    $month = $test_arr[1];
    $day = $test_arr[2];
    if (checkdate($month, $day, $year)) {
       return true;
    }
    return false;
}

/**
 * ensures that we have at least three out of four password criteria met
 * This would far more complicated to achieve using standard regular expressions
 * charecter one is not working
 *
 * @param String   $password  expects password
 * 
 * @return Boolean
 */ 
function validatePassword(string $password) {
    $count = 0;
 
    if( 8 <= strlen($password) && strlen($password) <= 32  )
    {
       if(preg_match("/^.*\\d.*$/", $password))
          $count ++;
       if(preg_match("/^.*[a-z].*$/", $password))
          $count ++;
       if(preg_match("/^.*[*.!@#$%^&(){}[]:;<>,.?~_-=|].*$/", $password))
          $count ++;
       if(preg_match("/^.*[A-Z].*$/", $password))
          $count ++;
    }

    if($count >= 3){
        return true;
    }
    else{
        return false;
    }
}

/**
 * validates a username similar to instagram and twitter
 *
 * @param String   $username  expects username
 * 
 * @return Boolean
 */ 
function validateUsername(string $username){
    if(!empty($username)){
        if(preg_match("/^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/", $username)){
            return true;
        }
    }
    return false;
}

/**
 * validates plain text
 *
 * @param String   $plainText  expects any text
 * 
 * @return Boolean
 */ 
function validatePlainText(string $plainText){
    if(!empty($plainText)){
        if(preg_match("/^[a-zA-Z ]*$/", $plainText)){
            return true;
        }
    }
    return false;
}

/**
 * validates alphanumeric input
 *
 * @param String   $alphanumeric  expects alphanumeric string
 * 
 * @return Boolean
 */ 
function validateAlphanumeric(string $alphanumeric){
    if(!empty($alphanumeric)){
        if(preg_match("/^[A-Za-z0-9]*$/", $alphanumeric)){
            return true;
        }
    }
    return false;
}

/**
 * validates email address with php filter
 *
 * @param String   $email  expects email
 * 
 * @return Boolean
 */ 
function validateEmail(string $email){
    if(!empty($email)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
    }
    return false;
}

?>