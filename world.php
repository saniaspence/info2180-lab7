<?php

$country = $_GET['country'];
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';

if (isset($country) || !empty($country)) 
 {
     $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
     $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
     $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
     echo '<ul>';
     foreach ($results as $row) 
     {
         echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
     }
     echo '</ul>';
 }