<?php

$uri = "postgres://avnadmin:*******************@pg-2d2b1fcd-agrocognito.j.aivencloud.com:28003/defaultdb?sslmode=require";

$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "pgsql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=defaultdb";
//$conn .= ";sslmode=verify-ca;sslrootcert=ca.pem";

$db = new PDO($conn, $fields["user"], $fields["pass"]);

foreach ($db->query("SELECT VERSION()") as $row) {
	print($row[0]);
}

/*'pgsql' => [
    'driver' => 'pgsql',
    'host' => env('DB_HOST'),
    'port' => env('DB_PORT'),
    'database' => env('DB_DATABASE'),
    'username' => env('DB_USERNAME'),
    'password' => env('DB_PASSWORD'),
    'charset' => 'utf8',
    'prefix' => '',
    'schema' => 'public',
    'sslmode' => 'verify-ca',
    'sslrootcert' => 'path/to/ca.pem', // Update this path to your ca.pem file
],*/

?>