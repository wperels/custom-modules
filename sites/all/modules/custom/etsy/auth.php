<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

$request_token_url = 'http://sandbox.test:8080/drupal/drupal-7.x-dev/oauth/request_token';
$access_token_url = 'http://sandbox.test:8080/drupal/drupal-7.x-dev/oauth/access_token';
$authorize_url = 'http://sandbox.test:8080/drupal/drupal-7.x-dev/oauth/authorize';
$resource_url = 'http://sandbox.test:8080/drupal/drupal-7.x-dev/bieber/fever';
//Callback url: http://oauth/authorized/alittlepotfromCO

$consumer_key = 'CTznqvAkFqC4Tu2EXGvuN7iT2JsCfta6';
$comsumer_secret = 'rK7a8rqf8GZvwAgwYXHPkNmAhwzwehfW';

$oauth = new OAuth($consumer_key, $consumer_secret, OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_URI);
$oauth->enableDebug(); // let you know when and why some request fails

if (empty($_SESSION['request_token_secret'])) {
        $request_token_array = $oauth->getRequestToken($request_token_url);

        $_SESSION['request_token'] = $request_token_array['oauth_token'];
        $_SESSION['request_token_secret'] = $request_token_array['oauth_token_secret'];

        header("Location: {$authorize_url}?oauth_token=" . $_SESSION['request_token']); // takes you to Drupal authorize page
} else if (empty($_SESSION['access_token'])) {
        $request_token_secret = $_SESSION['request_token_secret']; // PHP still needs the request token/secret to get the access token and secret
        $oauth->setToken($_REQUEST['oauth_token'],$request_token_secret);

        $access_token_info = $oauth->getAccessToken($access_token_url);
        $_SESSION['access_token']= $access_token_info['oauth_token'];
        $_SESSION['access_token_secret']= $access_token_info['oauth_token_secret'];
}

if (isset ($_SESSION['access_token']))
{

        $access_token = $_SESSION['access_token'];
        $access_token_secret =$_SESSION['access_token_secret'];
        $oauth->setToken($access_token,$access_token_secret);

        $data = $oauth->fetch($resource_url); // all that hard work just to get this line working
        
        $response_info = $oauth->getLastResponse();
        echo "<pre>";
        print_r(json_decode($response_info));
        echo "</pre>";
}

$array = json_decode($response_info);
if ($array) {		
  $object = $array[0]; // The array could contain multiple instances of your content type
  $title = $object->title; // title is a field of your content type
}