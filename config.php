<?php 
require __DIR__ ."/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ );
$dotenv->load();


    $host = $_ENV["DB_HOST"];
    $user = $_ENV["DB_USER"];
    $pass = $_ENV["DB_PASS"];
    $name = $_ENV["DB_NAME"];
    $charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$name;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO( $dsn, $user, $pass, $options );
} catch (PDOException $e) {
    die("DB connection failed". $e->getMessage() );
} 

?>