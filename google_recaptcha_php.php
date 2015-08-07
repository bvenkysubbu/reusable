# google recaptcha implementation using php
<?php
session_start();
$recaptcha_response = $_POST['g-recaptcha-response'];
if(!empty($recaptcha_response)){
$google_url="https://www.google.com/recaptcha/api/siteverify";
$recaptcha_secret='secret';
$remote_ip_address = $_SERVER['REMOTE_ADDR'];
$remote_forwarded_ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
$data = array('secret' => $recaptcha_secret, 'response' => $recaptcha_response, 'remoteip' => $remote_ip_address);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result_json = file_get_contents($google_url, false, $context);
$result_object = json_decode($result_json);

$result = $result_object->{'success'};

if($result == 1){
echo session_id();
echo '{';
echo '"server":"127.0.0.1",';
echo '"user":"ubuntu",';
echo '"password":"ubuntu"';
echo '}';
echo $remote_ip_address;
} else {
echo 'You are not a smart human!';
}
} else {
echo 'You are not a human!';
}
?>
