<?
session_start();
try {
  $pdo = new PDO('mysql:host=localhost; dbname=diplom', 'root', '');
} catch (PDOException $e) {
  echo $e->getMessage();
}
