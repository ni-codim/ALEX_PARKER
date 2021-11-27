<?php
/*
  ./core/connection.php
  CREATION D'UNE INSTANCE PDO $conn
 */


try {
    $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
