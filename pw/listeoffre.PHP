<div class="bg">
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap"
      rel="stylesheet"
    />	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="offrecss.css" />
  </head>



  <div class="Tango">
	<header>
		<div id="main">
			<div class="logo2"></div>
	  <div class="nav">
			<nav>
				<ul>
        <li><a href="mainoffre.php" style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style=" font-size: 35px!important; ">arrow_back</i>  Main Page </a></li>
        <li><a href="index.php" style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style=" font-size: 35px!important; ">lock</i> Disconnect </a></li>
        
				</ul>
			</nav></div>
		</div>
		
 	</header>
</div>






























  <body>
    <div class="jobs-list-container">
      <h2>My Offres:</h2>


      <input class="job-search" type="text" placeholder="Search here..." />

      <div class="jobs"> 



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

session_start();
$logbaba=$_SESSION['usernameoffre'] ;
$stmcin = $conn->prepare("SELECT coderegistre FROM employeur where pseudo=:job_degree");
$stmcin->bindParam(':job_degree',$logbaba);
$stmcin->execute();
$codereg = $stmcin->fetchColumn();

$sth = $conn->prepare("SELECT  code_offre,titre, descr,diplome,nb_exp,sal,dins FROM offre where    code_offre in(select code_offre_emp from employeut_offre where  code_reg_comm=:cr)");

 $sth->bindParam(':cr',$codereg); $sth->execute();
 $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
 $str="" ;
 for($i=0;$i<count($resultat);$i++){
  $stm = $conn->prepare("SELECT diplome FROM diplome where id=:job_degree");
  $stm->bindParam(':job_degree',$resultat[$i]["diplome"]);
  $stm->execute();
  $dip = $stm->fetchColumn();
  
  
 $str = $str . '<a href="candidatures.php?variable_name='. $resultat[$i]["code_offre"].'"><div class="saka"><div class="job"> <h3 class="job-title">Code offre:'. $resultat[$i]["code_offre"].'</h3><h3 class="job-title">Titre:'. $resultat[$i]["titre"].'</h3><div class="details">Description:'.$resultat[$i]["descr"].'</div><div class="job1"> <h3 class="job-title">Diplome:'. $dip.'</h3><h3 class="job-title">Experiece:'. $resultat[$i]["nb_exp"].'ans</h3><h3 class="job-title">Salaire:'. $resultat[$i]["sal"].'$</h3></div><button class="details-btn">Supprimeer Offre</button><span class="open-positions">Publiee le: '.$resultat[$i]["dins"].' . </span></div></a>';

 }
 
 echo $str;



?>

</div>
</div>

</div></div></div></div>













     



    <script src="offrejs.js"></script>
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