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

//this method inserts values in a table by writing mysql query//
function insertData(string $table,array $fields,array $values,$conn){
    //breaking fields array//
    $quote = '';
    $c = 0;
    foreach ($fields as $item) {
        $quote.="`$item`";
        $c++;
        if($c < count($fields))
        {
            $quote.=',';
        }
    }
    //breaking values array//
    $valQuote = '';
    $valc = 0;
    foreach ($values as $item) {
        $valQuote.="'$item'";
        $valc++;
        if($valc < count($fields))
        {
            $valQuote.=',';
        }
    }
    //bulding query for the fields and values//
    $query = "insert into `$table` (".$quote.") values (".$valQuote.")";
    mysqli_query($conn, $query);
}

//this method fetches values from a table by writing mysql query//
function fetchData(string $table, $conn){
    $query = "select * from `".$table."`";
    return mysqli_query($conn, $query);
}

//this method fetches values from a table with a specific primary key value by writing mysql query//
function fetchDataById(string $table, string $PrimaryKey, $id, $conn){
    $query = "select * from `$table` where $PrimaryKey = $id";
    return mysqli_query($conn, $query);
}

//this method deletes values in a table with a specific primary key value by writing mysql query//
function deleteDataById(string $table, string $PrimaryKey, $id, $conn){
    $query = "DELETE FROM `$table` WHERE $PrimaryKey = $id";
    mysqli_query($conn, $query);
}

//this method edits values in a table with a specific primary key value by writing mysql quer//
function editData(string $table, array $data, string $PrimaryKey, $id, $conn){
    //breaking data array//
    $ini = '';
    $c = 0;
    $mm = count($data);
    foreach($data as $item){
        $c++;
        if($mm % 2 == 0){
            $ini .= "`$item`=";
        }
        if($mm % 2 != 0){
            $ini .= "'$item'";
        }
        if($mm % 2 != 0 && $c < count($data))
        {
            $ini.=',';
        }
        if($c == count($data)){
            $ini .= '';
        }
        $mm--;
    }
    $query = "UPDATE `$table` SET $ini WHERE $PrimaryKey = $id";
    mysqli_query($conn, $query);
}

//Filter User//
function filterUserById($id, $PrimaryKey, $conn){
    $res = mysqli_query($conn, "select * from tbl_user where $PrimaryKey = $id");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return mysqli_fetch_array($res);
}

//Check if same value already exists//
function checkExistance($table, $column_name, $value, $conn){
    $res = mysqli_query($conn, "select count($column_name) from $table where $column_name = $value");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $num = mysqli_fetch_array($res);
    if($num[0] == 0){
        return true;
    }
    else{
        return false;
    }
}

//this method fetches last row of a specific table by writing mysql query//
function getLastRow($table, $PrimaryKey, $conn){
    $res = mysqli_query($conn, "SELECT $PrimaryKey FROM $table ORDER BY $PrimaryKey DESC LIMIT 1");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return $res;
    
}

?>