<?php
$destination_file = @$argv[1];
if (empty($destination_file))
{
    error_log("Destination OAuth file is required: php auth-setup.php /path/to/my-etsy-oauth-config.php");
    exit(1);
}
$consumer_key = getenv('ETSY_CONSUMER_KEY');
$consumer_secret = getenv('ETSY_CONSUMER_SECRET');
if (empty($consumer_key) || empty($consumer_secret))
{
    error_log("Env vars ETSY_CONSUMER_KEY and ETSY_CONSUMER_SECRET are required\n\nExample:\nexport ETSY_CONSUMER_KEY=qwertyuiop123456dfghj\nexport ETSY_CONSUMER_SECRET=qwertyuiop12");
    exit(1);
}
$isolated_autoload_file = dirname(realpath(__FILE__)) . '/../vendor/autoload.php';
if (file_exists($isolated_autoload_file))
{
    require_once($isolated_autoload_file);
} else {
    $dependency_autoload_file = dirname(realpath(__FILE__)) . '/../../../autoload.php';
    if (file_exists($dependency_autoload_file))
    {
        require_once($dependency_autoload_file);
    } else {
        error_log("Unable to find composer autoload");
        exit(1);
    }
}
use Etsy\EtsyClient;
use Etsy\OAuthHelper;
$client = new EtsyClient($consumer_key, $consumer_secret);
$helper = new OAuthHelper($client);
try {
    // In case you want to setup specific permissions pass a space separated) list of permissions
    // Example: $helper->requestPermissionUrl('email_r profile_w recommend_rw')
    // List of all allowed permissions: https://www.etsy.com/developers/documentation/getting_started/oauth#section_permission_scopes
    $url = $helper->requestPermissionUrl();
    // read user input for verifier
    print "Please sign in to this url and paste the verifier below: $url \n";
    // on Mac OSX
    if (PHP_OS === 'Darwin')
    {
        exec("open '" . $url . "'");
    }
    print '$ ';
    $verifier = trim(fgets(STDIN));
    $helper->getAccessToken($verifier);
    file_put_contents($destination_file, "<?php\n return " . var_export($helper->getAuth(), true) . ";");
    echo "Success! auth file '{$destination_file}' created.\n";
} catch (Exception $e) {
    error_log($e);
}