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
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} 

if (isset($_POST['submit'])) {
try {
 
      $job_title = $_POST['job-title'];
      $job_description = $_POST['job-description'];
      $job_experience = $_POST['job-experience'];
      $job_salary = $_POST['job-salary'];
      $diplomas = $_POST['job-degree'];
      



      session_start();
      $logbaba=$_SESSION['usernameoffre'];


     




      $stmt1 = $conn->prepare("SELECT id FROM diplome where diplome=:job_degree");
      $stmt1->bindParam(':job_degree', $diplomas);
      $stmt1->execute();
      $id = $stmt1->fetchColumn();


      $stmt = $conn->prepare("INSERT INTO offre (titre, descr, diplome, nb_exp, sal) VALUES (:job_title, :job_description, :diplomas, :job_experience, :job_salary)");
      $stmt->bindParam(':job_title', $job_title);
      $stmt->bindParam(':job_description', $job_description);
      $stmt->bindParam(':diplomas', $id);
      $stmt->bindParam(':job_experience', $job_experience);
      $stmt->bindParam(':job_salary', $job_salary);
      $stmt->execute();


      
      $result='';

      $offer_id = $conn->lastInsertId();

      $separator=',';
      $string = $_POST['job-skills'];
      $result = implode($separator, $string);



       $skills = explode(',',$result);
   foreach ($skills as $skill) {
  $skill = trim($skill);
  if (!empty($skill)) {
 
    $stmt11 = $conn->prepare("SELECT id FROM skills where skill=:job_degree");
    $stmt11->bindParam(':job_degree', $skill);
    $stmt11->execute();
    $idd = $stmt11->fetchColumn();



    $stmtt = $conn->prepare("INSERT INTO comp_offre (code_offre_emp	, code_comp	) VALUES (:offer_id, :skill_id)");
    $stmtt->bindParam(':offer_id', $offer_id);
    $stmtt->bindParam(':skill_id', $idd);
    $stmtt->execute();
  

      
     
  }} 
  


  $st= $conn->prepare("SELECT coderegistre FROM employeur where pseudo=:job_degree");
      $st->bindParam(':job_degree', $logbaba);
      $st->execute();
      $code = $st->fetchColumn();
  
  $stm = $conn->prepare("INSERT INTO employeut_offre (code_reg_comm	, code_offre_emp	) VALUES (:offer_id, :skill_id)");
    $stm->bindParam(':offer_id', $code);
    $stm->bindParam(':skill_id', $offer_id);
    $stm->execute();
  
  
  
  
  
  
  echo "Entrée ajoutée dans la table";}


catch(PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}} 



?>
<div class="bg">
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Offre d'emploi </title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="offre.css">
</head>
<body>
	<header>
		<h1>Add offer</h1>
    <div class='hi'>

    <a href="mainoffre.php">
	<div class="card card1">
		<h4 style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style="font-size: 28px!important; ">arrow_back</i>Main Page </h4>
	</div></a></div>
	</header>
	<main>
    
		<form id="job-form" method="post" action="">
			<label for="job-title">Titre de l'offre</label>
      
			<input type="text" id="job-title" name="job-title" required>

			<label for="job-description">Description de l'offre</label>
			<textarea id="job-description" name="job-description" required ></textarea>

			<label for="job-degree">Diplôme demandé</label>
			<select id="job-degree" name="job-degree" required >
			<?php
$servname = "localhost"; $dbname = "pw"; $user = "root"; $pass = "";
try{

  

  $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
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

			<label for="job-skills">Compétences demandées</label>
			<select id="job-skills" name="job-skills[]" multiple required>
			<?php
$servname = "localhost"; $dbname = "pw"; $user = "root"; $pass = "";
try{

  

  $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
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

			<label for="job-experience">Nombre d'années d'expérience</label>
			<input type="number" id="job-experience" name="job-experience" min="0" required>

			<label for="job-salary">Salaire proposé</label>
			<input type="number" id="job-salary" name="job-salary" min="0" required>

			<button type="submit" value="submit" name="submit">Soumettre</button>
		</form>
	</main>
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
</body>
</html>
</div>