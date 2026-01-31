<?php
$rawDsn = getenv("MYSQL_URL"); // en vez de DATABASE_URL

if (!$rawDsn) {
    die("MYSQL_URL no está definida");
}

$parsed = parse_url($rawDsn);
$host = $parsed['host'];
$dbname = ltrim($parsed['path'], '/');
$user = $parsed['user'];
$pass = $parsed['pass'];

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>