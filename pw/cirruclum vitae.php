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
      
      session_start();
      $logbaba=$_SESSION['usernamecv'] ;
      $st= $conn->prepare("SELECT cin FROM cv where pseudo=:job_degree");
      $st->bindParam(':job_degree', $logbaba);
      $st->execute();
      $cin  = $st->fetchColumn();

      $st= $conn->prepare("SELECT universite FROM cv where pseudo=:job_degree");
      $st->bindParam(':job_degree', $logbaba);
      $st->execute();
      $univ  = $st->fetchColumn();


if($univ === false){}else  {
      $stmt = $conn->prepare("DELETE  FROM images where  cin=:aaa ");
      $stmt->bindParam(':aaa',$cin);
      $stmt->execute();

      $stmt = $conn->prepare("DELETE  FROM diplome_dem where  cin=:aaa ");
	$stmt->bindParam(':aaa',$cin);
	$stmt->execute();


  $stmt = $conn->prepare("DELETE  FROM comp_dem where  cin=:aaa");
	$stmt->bindParam(':aaa',$cin);
	$stmt->execute();
}





      
		$listCompetences = "";
		$Competences = $_POST['competences'];
		if(!empty($Competences)) 
		 {
		
		 for($i=0; $i <count($Competences) ; $i++)
		$listCompetences .= ($Competences[$i] . ",");
		 }
  

   

   $status=$_POST['etat_civil'];$adress=$_POST['adresse'];$phone=$_POST['tel'];
 $uni=$_POST['universite'];
 //$skill=$_POST['skills']; 


 $stmt11 = $conn->prepare("SELECT id FROM university where university=:job_degree");
 $stmt11->bindParam(':job_degree',$uni );
 $stmt11->execute();
 $idd = $stmt11->fetchColumn();



 $experience=$_POST['annees_experience'];
 $dob = date('Y-m-d', strtotime($_POST['date_naissance']));
 //$sth appartient à la classe PDOStatement
 $sth = $conn->prepare("UPDATE cv SET  photo =:num,  datenaissance=:email  ,etatcivil=:cinN ,adresse=:sui ,num =:numm ,universite=:b ,experience=:c WHERE pseudo=:rami ") ;



 $picture='';
 //on remplace les valeurs dans notre requête SQL par nos marqueurs nommés
 $sth->execute(array(
':num' => $picture,':email' => $dob,':cinN' => $status,':sui' => $adress,
 ':numm' => $phone,':b' =>  $idd,':c' => $experience,':rami' => $logbaba,

));


//competences
$result='';



$separator=',';
$string = $_POST['competences'];
$result = implode($separator, $string);



$skills = explode(',',$result);



foreach ($skills as $skill) {
$skill = trim($skill);
if (!empty($skill)) {

$stmt11 = $conn->prepare("SELECT id FROM skills where skill=:job_degree");
$stmt11->bindParam(':job_degree', $skill);
$stmt11->execute();
$iddd = $stmt11->fetchColumn();



$stmtt = $conn->prepare("INSERT INTO comp_dem (cin	, code_comp	) VALUES (:offer_id, :skill_id)");
$stmtt->bindParam(':offer_id', $cin);
$stmtt->bindParam(':skill_id', $iddd);
$stmtt->execute();}
 }

//diplomes

$result='';



$separator=',';
$string = $_POST['diplomes'];
$result = implode($separator, $string);

$skills = explode(',',$result);
foreach ($skills as $skill) {
$skill = trim($skill);
if (!empty($skill)) {

$stmta = $conn->prepare("SELECT id FROM diplome where diplome=:job_degree");
$stmta->bindParam(':job_degree', $skill);
$stmta->execute();
$idddd = $stmta->fetchColumn();



$stmtt = $conn->prepare("INSERT INTO diplome_dem (cin	, code_dip	) VALUES (:offer_id, :skill_id)");
$stmtt->bindParam(':offer_id', $cin);
$stmtt->bindParam(':skill_id', $idddd);
$stmtt->execute();}
 }

 $imageData = file_get_contents($_FILES["photo"]["tmp_name"]);

 // Insert the image data into the database
 $stmt = $conn->prepare("INSERT INTO images (cin,image_data, image_name, image_size, image_type, created_at) VALUES (? ,?, ?, ?, ?, NOW())");
 $stmt->bindParam(1, $cin);
 $stmt->bindParam(2, $imageData, PDO::PARAM_LOB);
 $stmt->bindParam(3, $_FILES["photo"]["name"]);
 $stmt->bindParam(4, $_FILES["photo"]["size"]);
 $stmt->bindParam(5, $_FILES["photo"]["type"]);
 $stmt->execute();








 echo "Entrée ajoutée dans la table";   } }
 catch(PDOException $e){
 echo "Erreur : " . $e->getMessage();
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
			<div class="logo2"><h1 style="display: inline-flex; align-items: center;">
Hello <?php $nom='';if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
      $staaa= $conn->prepare("SELECT nom FROM cv where pseudo=:job_degree");
      $staaa->bindParam(':job_degree', $_SESSION['usernamecv']);
      $staaa->execute();
      $nom  .= $staaa->fetchColumn(); echo  $nom; ?> <i class="material-icons icons3" style="font-size: 28px!important; ">sentiment_very_satisfied</i></h1 ></div>
			<nav>
				<ul>
        <li><a href="cv.php" style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style=" font-size: 35px!important; ">account_box</i>  My cv </a></li>
        <li><a href="index.php" style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style=" font-size: 35px!important; ">lock</i> Disconnect </a></li>
        <li><a href="#opinion" style="display: inline-flex; align-items: center; "> <i class="material-icons icons3" style=" font-size: 35px!important; ">feedback</i> 
opinion</a></li>
				</ul>
			</nav>
		</div>
		
 	</header>
</div>
<div class="logcont">

	
	
	  


	<div class="card card3">
	<h4 style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style="font-size: 28px!important; ">person_pin</i>Update CV</h4>
	</div>
	</div>

 
 <div class="tbutt">



 </div>





<div id="all" class="all">



<form id="form1" action="" method="post"  enctype="multipart/form-data">
  <div class="formcont">
    <h1>CV:</h1>
   
    <label for="photo">Photo d'identité :</label>
    <input class="img" type="file" id="photo" name="photo">
    <label for="date_naissance">Date de naissance :</label>
    <input type="date" id="date_naissance" name="date_naissance">
    <label for="etat_civil">Etat civil :</label>
    <select id="etat_civil" name="etat_civil">
    <option value="celibataire">Célibataire</option>
      <option value="Divorcé">Divorcé</option>
      <option value="Marié">Marié</option>
    </select>
    <label for="adresse">Adresse :</label>
    <textarea id="adresse" name="adresse"></textarea>
    <label for="tel">Numéro de téléphone :</label>
    <input type="tel" id="tel" name="tel">
   
    <label for="diplomes">Liste des diplômes :</label>
    <select name="diplomes[]" id="diplomes"  multiple>
    <?php

try{

  
  
  $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  /*regrouper nos clients selon leur code Postal et 
  afficher le nombre de fois où un même code Postal a été trouvé */ 
  $sth = $dbco->prepare("
  SELECT * FROM diplome
  
  ");
  $sth->execute(); 
  /*Retourne un tableau associatif pour chaque entrée de notre table
  *avec le nom des colonnes sélectionnées en clefs*/
  $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
  // on affiche pour chaque codePostal le nombre des clients ayant ce code 
  $str = "";
 
  for($i=0;$i<count($resultat);$i++)
 $str = $str . "<option>" . $resultat[$i]["diplome"] . "</option>" ;

  echo $str; 
 // on affiche le résultat sous forme d'array pour comprendre sa structure
  echo '<pre>';
  print_r($resultat);
  echo '</pre>';
}
 
/*On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci*/
catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}



?>
    </select>
    <label for="competences">Liste des competences :</label>
    <select name="competences[]" id="competences" multiple>
    <?php
try{

  

  
  /*regrouper nos clients selon leur code Postal et 
  afficher le nombre de fois où un même code Postal a été trouvé */ 
  $sth = $dbco->prepare("
  SELECT * FROM skills
  
  ");
  $sth->execute(); 
  /*Retourne un tableau associatif pour chaque entrée de notre table
  *avec le nom des colonnes sélectionnées en clefs*/
  $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
  // on affiche pour chaque codePostal le nombre des clients ayant ce code 
  $str = "";
 
  for($i=0;$i<count($resultat);$i++)
 $str = $str . "<option>". $resultat[$i]["skill"] . "</option>" ;

  echo $str; 
 // on affiche le résultat sous forme d'array pour comprendre sa structure
  echo '<pre>';
  print_r($resultat);
  echo '</pre>';
}
 
/*On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci*/
catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}



?>
    </select>
    <label for="universite">Université :</label>
<select id="universite" name="universite">

<?php
try{

  

 
  
  /*regrouper nos clients selon leur code Postal et 
  afficher le nombre de fois où un même code Postal a été trouvé */ 
  $sth = $dbco->prepare("
  SELECT * FROM university
  
  ");
  $sth->execute(); 
  /*Retourne un tableau associatif pour chaque entrée de notre table
  *avec le nom des colonnes sélectionnées en clefs*/
  $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
  // on affiche pour chaque codePostal le nombre des clients ayant ce code 
  $str = "";
 
  for($i=0;$i<count($resultat);$i++)
 $str = $str . "<option>". $resultat[$i]["university"] . "</option>" ;

  echo $str; 
 // on affiche le résultat sous forme d'array pour comprendre sa structure
  echo '<pre>';
  print_r($resultat);
  echo '</pre>';
}
 
/*On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci*/
catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}



?>
</select>
<label for="annees_experience">Nombre d'années d'expérience :</label>
<input type="number" id="annees_experience" name="annees_experience" min="0" max="40">
<button type="submit" id="haha" name="submit" value="log" class="button1" onclick="controlesaisie()">Submit</button>
<p id="erreur"></p>
  </div>
</form>
















	<div id="pra3" class="cvcontainer">
		
		
	</div>

	</div>

</body>
<script src="for1.js"></script>
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