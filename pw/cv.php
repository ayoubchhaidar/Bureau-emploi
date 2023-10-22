
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
   
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
 try{
    if (isset($_POST['submit'])){      
      
		$listCompetences = "";
		$Competences = $_POST['competences'];
		if(!empty($Competences)) 
		 {
		
		 for($i=0; $i <count($Competences) ; $i++)
		$listCompetences .= ($Competences[$i] . ",");
		 }
  

 $nom=$_POST['nom'];   $status=$_POST['etat_civil'];$adress=$_POST['adresse'];$phone=$_POST['tel'];$email=$_POST['email'];$diplomas=$_POST['diplomes'];
 $prename=$_POST['prenom']; $uni=$_POST['universite'];
 $picture=$_POST['photo'];
 //$skill=$_POST['skills']; 
 $experience=$_POST['annees_experience'];
 $dob = date('Y-m-d', strtotime($_POST['date_naissance']));
 //$sth appartient à la classe PDOStatement
 $sth = $conn->prepare("INSERT INTO cv(nom ,prenom ,photo ,  datenaissance  ,etatcivil ,adresse ,num ,email ,diplome ,competence , universite ,experience) VALUES (:nom, :prenom, :num, :email, :cin, :sui, :numm, :emaill, :d, :a, :b, :c) ");
 //on remplace les valeurs dans notre requête SQL par nos marqueurs nommés
 $sth->execute(array(
 ':nom' => $nom,
 ':prenom' => $prename,':num' => $picture,':email' => $dob,':cin' => $status,':sui' => $adress,
 ':numm' => $phone,
 ':emaill' => $email,':d' => $diplomas,':a' => $listCompetences,':b' => $uni,':c' => $experience,

));
 echo "Entrée ajoutée dans la table";
 }
}
 catch(PDOException $e){
 echo "Erreur : " . $e->getMessage();
 }













 ?> 







<!DOCTYPE html>
<html>
<head>
	<link rel="Shortcut icon" type="image" href="logo.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="equipe.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title></title>
</head>
<body>
	<script src="for1.js"></script>

<div class="Tango">
	<header>
		<div id="main">
			<div class="logo2"><h1 style="display: inline-flex; align-items: center;">
Hello <?php $nom='';session_start();
      $staaa= $conn->prepare("SELECT nom FROM cv where pseudo=:job_degree");
      $staaa->bindParam(':job_degree', $_SESSION['usernamecv']);
      $staaa->execute();
      $nom  .= $staaa->fetchColumn(); echo  $nom; ?> <i class="material-icons icons3" style="font-size: 28px!important; ">sentiment_very_satisfied</i></h1 ></div>
	  <div class="nav">
			<nav>
				<ul>
        <li><a href="" style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style=" font-size: 35px!important; ">account_box</i>  My cv </a></li>
        <li><a href="index.php" style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style=" font-size: 35px!important; ">lock</i> Disconnect </a></li>
        <li><a href="#opinion" style="display: inline-flex; align-items: center; "> <i class="material-icons icons3" style=" font-size: 35px!important; ">feedback</i> 
opinion</a></li>
				</ul>
			</nav></div>
		</div>
		
 	</header>
</div>

<div class="logcont">
<a href="mesoffres.php">
	<div class="card card1">
		<h4 style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style="font-size: 28px!important; ">email</i>My applies </h4>
	</div></a>

	<a href="demandeur1.php">
	<div class="card card2">
		  <h4 style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style="font-size: 28px!important; ">fiber_new
</i>Offers!</h4>
	</div></a>
	  

	<a href="cirruclum vitae.php">
	<div class="card card3">
		<h4 style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style="font-size: 28px!important; ">create</i>Update CV</h4>
	</div></a>
	</div>

	





<div id="all" class="all">



<?php
$cin='';
 try{
	
	
	$staaa= $conn->prepare("SELECT cin FROM cv where pseudo=:job_degree");
	$staaa->bindParam(':job_degree', $_SESSION['usernamecv']);
	$staaa->execute();
	$cin  .= $staaa->fetchColumn();
	
	
	$dip_dem='';
	$stmdip = $conn->prepare("SELECT diplome FROM diplome WHERE id IN (SELECT code_dip	 FROM diplome_dem WHERE cin=:offer_id)");
	$stmdip->bindParam(':offer_id',$cin );
	$stmdip->execute();
	$resultatdip = $stmdip->fetchAll(PDO::FETCH_ASSOC);
	if (!empty($resultatdip)) {
	   $resultat1_str = json_encode($resultatdip);
	   $skillsArr = json_decode($resultat1_str, true);
	   
	 
	   foreach ($skillsArr as $skillObj) {
		 $dip_dem .= $skillObj['diplome']."</br>";
	   }
	   
	   // do something with $laststr
	 }
	 $comp_dem = "";
	 $stmcomp = $conn->prepare("SELECT skill FROM skills WHERE id IN (SELECT code_comp	 FROM comp_dem WHERE cin=:offer_id)");
	 $stmcomp->bindParam(':offer_id',$cin  );
	 $stmcomp->execute();
	 $resultatcomp = $stmcomp->fetchAll(PDO::FETCH_ASSOC);
	 if (!empty($resultatcomp)) {
		$resultat2_str = json_encode($resultatcomp);
		$skillsArr = json_decode($resultat2_str, true);
		
	  
		foreach ($skillsArr as $skillObj) {
		  $comp_dem .=$skillObj['skill']."</br>";
		}
		
	  }
	

 $sth = $conn->prepare("SELECT nom, prenom, photo, datenaissance, etatcivil, adresse, num, email, universite, experience FROM cv where pseudo=:touhemia ;");
 $sth->bindParam(':touhemia', $_SESSION['usernamecv'] );
 $sth->execute();

 $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

$str = '';
$i=0; $dip='';
    $st= $conn->prepare("SELECT university FROM university where id=:job_degree");
	$st->bindParam(':job_degree',$resultat[$i]["universite"] );
	$st->execute();
	$dip  .= $st->fetchColumn();




	$stmt = $conn->prepare("SELECT image_data, image_type FROM images WHERE cin=?");
	$stmt->bindParam(1, $cin);
	$stmt->execute();
	$resultimg = $stmt->fetch(PDO::FETCH_ASSOC);
	
	// Output the image in your HTML









 $str = $str . ' <div id="maincv" ><div class="left">
 <br>
 <img src="data:' . $resultimg["image_type"] . ';base64,' . base64_encode($resultimg["image_data"]) . '" alt="My Image" class="profile-img" >
 <div class="box-1">
	 <div class="heading">
		 <p>CONTACT</p>
	 </div>
	 <p class="p1"><i class="material-icons icons1">call</i>' . $resultat[$i]["num"] . '</p>
	 <p class="p1"><i class="material-icons icons1">email</i>' . $resultat[$i]["email"] . '</p>
	 <p class="p1"><i class="material-icons icons1"></i>adresse ' . $resultat[$i]["adresse"] . '</p>
 </div>
 <div class="box-1">
	 <div class="heading">
		 <p>diplomes</p>
	 </div>
	 <p class="p1">' .  $dip_dem . '
		 <div class="skill-container">
			 <div class="skill html"></div>
		 </div>
	 </p>
 </div>
 <br>
 <div class="box-1">
	 <div class="heading">
		 <p>COMPETENCES</p>
	 </div>
	 <p class="p1">' . $comp_dem . '
		 <div class="skill-container">
			 <div class="skill web"></div>
		 </div>
	 </p>
 </div>
 <br>
</div>
<div class="right">
 <div class="name-div">
	 <h1>' . $resultat[$i]["nom"] .' '. $resultat[$i]["prenom"] . '</h1>
	 <p></p>
 </div>
 <div class="box-2">
	 <h2>Etat cicvil :' . $resultat[$i]["etatcivil"] . ' <i class="material-icons icons3" style="font-size: 28px!important; ">perm_identity</i></h2>
	 <p class="p2"></p>
 </div>
 <div class="box-2">
	 <h2>EDUCATION :' . $dip . '<i class="material-icons icons3" >border_color</i></h2>

	 <p class="p2"></p>
 </div>
 <div class="box-2">
	 <h2>WORK EXPERIENCE :' . $resultat[$i]["experience"] . ' YEARS. <i class="material-icons icons3" >folder</i></h2>
	 
 </div>
</div></div>';


echo $str;


}
catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}



?> 





















	<div id="pra3" class="cvcontainer">
		
		
	</div>

	</div>

</body>


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