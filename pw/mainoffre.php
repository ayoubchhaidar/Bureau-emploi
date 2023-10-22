<div class="bk">
	<?php
	$servername = "localhost";
	$username = "root";
	$password = ""; // add your database password here
	$dbname = "pw";
	//On essaie de se connecter
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// Set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	session_start();


	$stmt = $conn->prepare("SELECT * FROM employeur WHERE pseudo=:pseudo");
	$stmt->execute(array(':pseudo' => $_SESSION['usernameoffre']));

	$resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$ese = $resultat[0]['entreprise'];
	$nom = $resultat[0]['nom'];
	$prenom = $resultat[0]['prenom'];
	$coderegistre = $resultat[0]['coderegistre'];
	$email = $resultat[0]['email'];
	$pseudo = $resultat[0]['pseudo'];




	if (isset($_POST['update'])) {


		$ese = $_POST['entreprise'];
	$nom = $_POST['nom'];
	$prenom =$_POST['prenom'];
	$email = $_POST['email'];

		$sth = $conn->prepare("UPDATE employeur SET  entreprise =:num,  email=:email  ,nom=:cinN ,prenom=:sui  WHERE pseudo=:rami ") ;

		$sth->execute(array(
	   ':num' => $ese,':email' => $email,':cinN' => $nom,':sui' => $prenom,
		':rami' => $_SESSION['usernameoffre'],
	   
	   ));




	}





	?>







	<!DOCTYPE html>
	<html>

	<head>
		<link rel="Shortcut icon" type="image" href="">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="equipe.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title></title>
	</head>

	<body>



		<div class="Tango">
			<header>
				<div id="main">
					<div class="logo2">
						<h1 style="display: inline-flex; align-items: center;">
							<?php $nom = '';
							if (session_status() !== PHP_SESSION_ACTIVE) {
								session_start();
							}
							$staaa = $conn->prepare("SELECT entreprise FROM employeur where pseudo=:job_degree");
							$staaa->bindParam(':job_degree', $_SESSION['usernameoffre']);
							$staaa->execute();
							$nom  .= $staaa->fetchColumn();
							echo  $nom; ?></h1>
					</div>
					<nav>
						<ul>
							<li> <button id="b2" type="button" ><a style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style=" font-size: 35px!important; ">account_box</i> Profile </a></button></li>
							<li><a href="index.php" style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style=" font-size: 35px!important; ">lock</i> Disconnect </a></li>
							<li><a href="#opinion" style="display: inline-flex; align-items: center; "> <i class="material-icons icons3" style=" font-size: 35px!important; ">feedback</i>
									opinion</a></li>
						</ul>
					</nav>
				</div>

			</header>
		</div>
		<div class="logcont">


			<a href="offre.php">
				<div class="card card1">
					<h4 style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style="font-size: 28px!important; ">add_box</i> Add offer</h4>
				</div>
			</a>


			<button id="b2" type="button" >

				<div class="card card3">
					<h4 style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style="font-size: 28px!important; ">person_pin</i>Update CV</h4>
				</div>
			</button>




			<a href="listeoffre.php">
				<div class="card card1">
					<h4 style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style="font-size: 28px!important; ">email</i> Applications </h4>
				</div>
			</a>
		</div>


		<div class="tbutt">



		</div>

		<div id="c1">
			<form id="formsignup" action="" method="post">
				<div class="formcont" id="form1">
					<h1> Update:</h1>
					<label name="nom" class="login">nom:</label>
					<input type="text" name="nom" id="nom" value="<?php echo ' ' . $nom . ' '; ?>">
					<label name="prenom" class="login">prenom:</label>
					<input type="text" name="prenom" id="prenom" value="<?php echo $prenom; ?>">
					 
					<label class="loginp">Entreprise:</label><input type="text" id="entreprise" name="entreprise" value="<?php echo $ese; ?>">
					<label class="loginp">Email:</label>
					<input type="email" id="email" name="email" value="<?php echo $email; ?>">
					<button type="submit" value="update" name="update" class="button1" onclick="css3()">Update</button>
					<p id="erreur"></p>
				</div>
			</form>

		</div>



















		<div id="pra3" class="cvcontainer">


		</div>

</div>

</body>
<script src="js.js"></script>
<footer class="footer-distributed">

<div class="footer-right">

	<a href="#"><i class="fab fa-facebook"></i></a>
	<a href="#"><i class="fab fa-twitter"></i></a>
	<a href="#"><i class="fab fa-linkedin"></i></a>
	<a href="#"><i class="fab fa-github"></i></a>

</div>

<div class="footer-left">

	<p class="footer-links">
		<a class="link-1" href="#">Home</a>

		<a href="#">Blog</a>

		<a href="#">Pricing</a>

		<a href="#">About</a>

		<a href="#">Faq</a>

		<a href="#">Contact</a>
	</p>

	<p>Get you job now &copy; 2023</p>
</div>

</footer>

</html>
</div>