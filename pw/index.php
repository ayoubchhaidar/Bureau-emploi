<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = ""; // add your database password here
$dbname = "pw";

// Create a PDO object
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
try{
if (isset($_POST['envoyer'])){

    $pseudo=$_POST['username'];
    $password=$_POST['password'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$Email=$_POST['email'];
	$cin=$_POST['cin'];
	$stmt = $conn->prepare("INSERT INTO cv(nom,prenom,CIN,email,pseudo,mdp) VALUES (:nom,:prenom,:cin,:Email,:pseudo,:mdp)");
    $params = array(":nom" => $nom, ":prenom" => $prenom , ":cin" => $cin ,":Email" => $Email ,":pseudo" => $pseudo, ":mdp" => $password);
    $stmt->execute($params);

     echo "Data inserted successfully";header('location:cirruclum vitae.php');exit();

    
}} catch(PDOException $e) {
	echo "email ou pseudo existant:" . $e->getMessage();
    
}
try {
    if (isset($_POST['employeur'])) {

        $pseudo = $_POST['username'];
        $password = $_POST['password'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $Email = $_POST['email'];
        $RC = $_POST['rgc'];
        $entreprise = $_POST['entreprise'];
        $stmt = $conn->prepare("INSERT INTO employeur(entreprise,nom,prenom,coderegistre,email,pseudo,mdp) VALUES (:entreprise,:nom,:prenom,:RC,:Email,:pseudo,:mdp)");
        $params = array(":entreprise" => $entreprise, ":nom" => $nom, ":prenom" => $prenom, ":RC" => $RC, ":Email" => $Email, ":pseudo" => $pseudo, ":mdp" => $password);
        $stmt->execute($params);

        echo "Data inserted successfully";
    }
} catch(PDOException $e) {
    echo "email ou pseudo existant:" . $e->getMessage();
}



if (isset($_POST['log'])) {
	$pseudo = $_POST['username'];
	$password = $_POST['password'];
	
	$stmt = $conn->prepare("SELECT pseudo, mdp FROM cv WHERE pseudo=:pseudo");
	$stmt->execute(array(':pseudo' => $pseudo));
	
	$resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	if (isset($resultat[0]) && $resultat[0]['pseudo'] == $pseudo && $resultat[0]['mdp'] == $password) {
	 
		session_start();
		$_SESSION['usernamecv'] = $pseudo;
		echo "Login successful!"; 
		header('location:cv.php');
		
	
	} else
	 {
	
	  echo "Invalid username or password.";
	}
  }

else if (isset($_POST['log2'])) {
	$pseudo = $_POST['username'];
	$password = $_POST['password'];

$stmt = $conn->prepare("SELECT pseudo,mdp FROM employeur WHERE pseudo=:pseudo");
 $stmt->execute(array(':pseudo' => $pseudo));

 $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
 if (isset($resultat[0]) && $resultat[0]['pseudo'] == $pseudo && $resultat[0]['mdp'] == $password){
	session_start();
	$_SESSION['usernameoffre'] = $pseudo;
	echo "Login successful!"; 
	header('location:mainoffre.php');


}
else {
	echo "Invalid username or password.";}

}






?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<title></title>
</head>
<body>
	<header>
		
			
		<div class="menu">
			<div class="logo"></div>
			<nav>
				<ul>
					<li><a href="cirruclum vitae.php" class="active">Accueil</a></li>
					<li><a href="mesoffres.php">Services</a></li>
					<li><a href="cv.php">A propos</a></li>
					<li><a href="offre.php">Contact </a></li>
				</ul>
			</nav>
		</div>

	</header>
<div class="cont0">
<div class="cont2">
	<div id="c1" class="card card1">
		<button  class="B" id="b2" type="button" onclick="na('c2','b2','c1')"><span></span>Employer</button>
		
	</div>
	<div id="c2" class="card card2">
		<button class="B" id="b1" type="button" onclick="na('c1','b1','c2')"><span></span>Employee</button>
	    <div id="hwa">
         </div>
	</div>

	
	
</div>
</div>

<script src="js.js"></script>
</body>
	<footer>

    <div class="footer">
        <div class="social">


         <a href="https://www.facebook.com/fifaworldcup/"><i class="fab fa-facebook-f"></i></a>
         <a href="https://www.instagram.com/worldcup.2022.qatar/"><i class="fab fa-instagram"></i></a>
         <a href="https://twitter.com/FIFAWorldCup/"><i class="fab fa-twitter"></i></a>
         <a href="https://https://www.linkedin.com/company/fifa-world-cup-qatar-2022/"><i class="fab fa-linkedin"></i></a>
        </div>

    </div>
</footer>

</html>