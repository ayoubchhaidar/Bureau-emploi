<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = ""; // add your database password here
$dbname = "gdof";

// Create a PDO object
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['envoyer'])){
    $pseudo=$_POST['username'];
    $password=$_POST['password'];
    $stmt = $conn->prepare("INSERT INTO employee (pseudo, mdp) VALUES (:pseudo, :mdp)");
$params = array(":pseudo" => $pseudo, ":mdp" => $password);
$stmt->execute($params);



    echo "Data inserted successfully";
}
?>
