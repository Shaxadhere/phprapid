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
 * generates chart in png or gif file
 * @param Integer  $height  expects chart height
 * @param Integer  $width  expects chart width
 * @param Array   $data  expects chart data in array
 * @param Array   $labels  expects chart labels in array
 * @param Array   $colors  expects chart colors in array
 * @param Bool   $animate  expects chart animation in boolean
 * 
 * @return String chart image url
 */ 
function generateChart($height, $width, array $data, array $labels, array $colors, bool $animate){

    //breaking data array//
    $chartData = "";
    $c = 0;
    foreach ($data as $value) {
        $chartData .= $value;
        $c++;
        if($c < count($data)){
            $chartData .= ",";
        }
    }

    //breaking labels array//
    $chartLabels = "";
    $c1 = 0;
    foreach ($labels as $value1) {
        $chartLabels .= $value1;
        $c1++;
        if($c1 < count($labels)){
            $chartLabels .= "|";
        }
    }
    
    //breaking colors array//
    $chartColors = "";
    $c2 = 0;
    foreach ($colors as $value2) {
        $chartColors .= "ps0-".$c2.",lg,45,$value2,0.2,$value2,1";
        $c2++;
        if($c2 < count($colors)){
            $chartColors .= "|";
        }
    }

    //setting animation//
    $chartAnimation = "";
    if($animate){
        $chartAnimation .= "chan&";
    }
    
    $chartUrl = "https://image-charts.com/chart?chs=".$width."x".$height."&chd=t:".$chartData."&cht=p3&chl=".$chartLabels."&".$chartAnimation."chf=$chartColors";

    return $chartUrl;
}
