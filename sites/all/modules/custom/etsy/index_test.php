

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// instantiate the OAuth object
// OAUTH_CONSUMER_KEY and OAUTH_CONSUMER_SECRET are constants holding your key and secret
// and are always used when instantiating the OAuth object 
<!--define('OAUTH_CONSUMER_KEY', '3n38k3zmup2ge0epnzwjjymw');
define('OAUTH_CONSUMER_SECRET', 'c510l969h6');
include('/usr/lib/php5/20121212+lfs/oauth.php');
$oauth = new OAuth(OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET);

//make an API request for your temporary credentials
$req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=cart_rw%20listings_r", 'http://sandbox.test:8080/drupal/drupal-7.x-dev/callback.php');

print $req_token['login_url']."\n";
var_dump($req_token);-->

<?php phpinfo() ?>
