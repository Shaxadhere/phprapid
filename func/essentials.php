<?php
/** 
 * https://github.com/Shaxadhere/phprapid
 *
 * Tested on PHP 7.4
 *
 * Copyright Shehzad Ahmed 
 * https://shaxad.netlify.app
 * https://github.com/Shaxadhere

 * Released under the GNU GENERAL PUBLIC LICENSE
 * 
 *
 * Date: 2020-08-23
 */

$user_agent = $_SERVER['HTTP_USER_AGENT'];

/**
 * cleans input from user as a plain text
 *
 * @param String   $string  expects string
 * 
 * @return String cleaned string
 */ 
function clean_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

/**
 * generates random string of given length
 *
 * @param Integer   $length_of_string  expects length of string in numbers
 * 
 * @return String random string with length of given length
 */ 
function random_strings ($length_of_string) 
{
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
	return substr(str_shuffle($str_result),0, $length_of_string); 
} 

/**
 * provides dates of days after present date
 *
 * @param Integer   $number_of_days  expects number of days
 * 
 * @return Array array of dates of days after present date with the length provided in params
 */ 
function getNextDays($number_of_days){
    $days   = [];
    $period = new DatePeriod(
    new DateTime(), // Start date of the period
    new DateInterval('P1D'), // Define the intervals as Periods of 1 Day
    $number_of_days // Apply the interval 6 times on top of the starting date
    );

    foreach ($period as $day)
    {
        $days[] = $day->format('Y-m-d H:i:s');
    }
    return $days;
}

//this method calculates months between two dates//
/**
 * calculates months between two dates
 *
 * @param Date   $start_date  expects start date
 * @param Date   $end_date  expects end date
 * 
 * @return Integer number of days between dates provided in params
 */ 
function calcMonths($start_date, $end_date){
    $ts1 = strtotime($start_date);
    $ts2 = strtotime($end_date);

    $year1 = date('Y', $ts1);
    $year2 = date('Y', $ts2);

    $month1 = date('m', $ts1);
    $month2 = date('m', $ts2);

    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
    return $diff;
}


/**
 * verifies if email is true and valid without sending a mail,
 * api requests are limited, for personal free api token 
 * sign up at https://mailboxlayer.com/signup?plan=71
 * and modify the method by entering your access_key
 *
 * @param String   $email  expects email in string
 * 
 * @return Array array(valid_format, smtp_check)
 */ 
function verify_email($email){

    // set API Access Key
    $access_key = 'b5cde034b87fed8ef71669277e2dfb5a';

    // Initialize CURL:
    $ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email.'');  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
    $res = json_decode($json, true);

    $val = array(
        "valid_format" => $res['format_valid'],
        "smtp_check" => $res['smtp_check']
    );

    return $val;
}

/**
 * verifies phone number and retreives some information out of it,
 * api requests are limited, for personal free api token 
 * sign up at https://numverify.com/signup?plan=17
 * and modify the method by entering your access_key
 *
 * @param String   $phone  expects phone number in string
 * 
 * @return Array array(valid, country_code, carrier, country_prefix, country_name, line_type)
 */ 
function verify_phone($phone_number){
    // set API Access Key
    $access_key = '5e6b9812bc31e10bfd2e202c8da9b6ef';

    // Initialize CURL:
    $ch = curl_init('http://apilayer.net/api/validate?access_key='.$access_key.'&number='.$phone_number.'');  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
    $res = json_decode($json, true);

    // Access and use your preferred validation result objects
    $res['valid'];
    $res['country_code'];
    $res['carrier'];
    $res['country_prefix'];
    $res['country_name'];
    $res['line_type'];

    $val = array(
        "valid" => $res['valid'],
        "country_code" => $res['country_code'],
        "carrier" => $res['carrier'],
        "country_prefix" => $res['country_prefix'],
        "country_name" => $res['country_name'],
        "line_type" => $res['line_type'],
    );

    return $val;

}

/**
 * tracks user's ip address and retrieves information out of it,
 * api requests are limited, for personal free api token 
 * sign up at https://ipstack.com/signup/free
 * and modify the method by entering your access_key
 *
 * @param String   $ip  expects ip address in string
 * 
 * @return Array array(ip, type, continent_code, continent_name, country_code, country_name, region_code, region_name,
 * city, zip, latitude, longitude, geoname_id, capital, country_flag_svg, country_flag_emoji, calling_code, is_eu)
 */ 
function trackIP($ip){
    $access_key = '068888c196e341bf792338fadb1fb8c9';

    // Initialize CURL:
    $ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
    $res = json_decode($json, true);

    // Output the "capital" object inside "location"
    $val = array(
        "ip" => $res['ip'],
        "type" => $res['type'],
        "continent_code" => $res['continent_code'],
        "continent_name" => $res['continent_name'],
        "country_code" => $res['country_code'],
        "country_name" => $res['country_name'],
        "region_code" => $res['region_code'],
        "region_name" => $res['region_name'],
        "city" => $res['city'],
        "zip" => $res['zip'],
        "latitude" => $res['latitude'],
        "longitude" => $res['longitude'],
        "geoname_id" => $res['location']['geoname_id'],
        "capital" => $res['location']['capital'],
        "country_flag_svg" => $res['location']['country_flag'],
        "country_flag_emoji" => $res['location']['country_flag_emoji'],
        "calling_code" => $res['location']['calling_code'],
        "is_eu" => $res['location']['is_eu'],
    );

    return $val;

}

/**
 * estimates a gender from a first name
 *
 * @param String   $name  expects name in string
 * 
 * @return String gender name (male, female)
 */ 
function estimate_gender($name){

    // Initialize CURL:
    $ch = curl_init('https://api.genderize.io/?name='.$name.'');  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
    $res = json_decode($json, true);

    $val =  $res['gender'];

    return $val;
}

/**
 * gets user's operating system
 * 
 * @return String operating system name
 */ 
function getOS() { 

    global $user_agent;

    $os_platform  = "Unknown OS Platform";

    $os_array     = array(
                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    );

    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $os_platform = $value;

    return $os_platform;
}

/**
 * gets user's browser name
 * 
 * @return String browser name
 */ 
function getBrowser() {

    global $user_agent;

    $browser        = "Unknown Browser";

    $browser_array = array(
                            '/msie/i'      => 'Internet Explorer',
                            '/firefox/i'   => 'Firefox',
                            '/safari/i'    => 'Safari',
                            '/chrome/i'    => 'Chrome',
                            '/edge/i'      => 'Edge',
                            '/opera/i'     => 'Opera',
                            '/netscape/i'  => 'Netscape',
                            '/maxthon/i'   => 'Maxthon',
                            '/konqueror/i' => 'Konqueror',
                            '/mobile/i'    => 'Handheld Browser'
                     );

    foreach ($browser_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $browser = $value;

    return $browser;
}

/**
 * sends email using PHPMailer
 *
 * @param String   $smtpHost  expects smtp Host in string
 * @param String   $smtpPort  expects smtp Port in string
 * @param String   $smtpEmail  expects smtp Email in string
 * @param String   $smtpPassword  expects smtp Password in string
 * @param String   $smtpProtocol  expects smtp Protocol in string
 * @param String   $smtpFrom  expects smtp From Name in string
 * @param String   $recipient  expects smtp Recipent Email in string
 * @param Bool   $isHTML  expects bool for if Message is html
 * @param String   $subject  expects smtp subject in string
 * @param String   $message  expects smtp Message in string
 * 
 * @return Bool true or false
 */ 
function sendMail(string $smtpHost, string $smtpPort, string $smtpEmail, string $smtpPassword, string $smtpProtocol, string $smtpFrom, string $recipient, bool $isHTML, string $subject, string $message){
    require '../assets/class.phpmailer.php';
	$mail = new PHPMailer;
	$mail->IsSMTP();
	$mail->Host = $smtpHost;
	$mail->Port = $smtpPort;
	$mail->SMTPAuth = true;
	$mail->Username = $smtpEmail ;
	$mail->Password = $smtpPassword;
	$mail->SMTPSecure = $smtpProtocol;
	$mail->From = $smtpEmail;
	$mail->FromName = $smtpFrom;
	$mail->AddAddress($recipient);
	$mail->WordWrap = 50;
	$mail->IsHTML($isHTML);
	$mail->Subject = $subject;
	$mail->Body = $message;
	if($mail->Send())
	{
		return true;
    }
    else{
        return false;
    }
}

/**
 * uploads file for now it only support .jpg, .png, .jpeg, .gif files
 *
 * @param FILES   $file  expects $_FILES
 * @param String $saveAs expects file name to be saved as
 * @param String $directory expects directory in string
 * @param Integer $maxSize  expects size in KiloBytes
 * 
 * @return Boolean
 * 
 */ 
function uploadFile($file, string $saveAs, string $directory, int $maxSize){

    $target_file = $directory . basename($file["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $sizeInBytes = $maxSize * 1000;

    $check = getimagesize($file["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    }
    else {
        $uploadOk = 0;
    }

    if ($file["size"] > $sizeInBytes) {
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }

    $temp = explode(".", $file["name"]);
    $newfilename = $saveAs . '.' . end($temp);

    if ($uploadOk == 0) {
        return false;
    }
    else {
        if (move_uploaded_file($file["tmp_name"], $directory . $newfilename)) {
            return true;
        } 
        else {
            return false;
        }
  }

}


?>