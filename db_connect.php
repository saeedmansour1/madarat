<?php
// بيانات الاتصال
$host = 'localhost';
$dbname = 'alsafwa';
$user = 'alsafwa';
$pass = 'Saed2320';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}
