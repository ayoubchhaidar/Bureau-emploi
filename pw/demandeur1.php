

<!DOCTYPE html>
<html>
<div class='bk'>
<head>
	<link rel="Shortcut icon" type="image" href="">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="dem.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
		integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title></title>

	<div id="main">
			<div class="logo"></div>
			<nav>
				<ul>
					<li><a href="cv.php" class="active">HOME</a></li>
					<li><a href="mesoffres.php">MY APPLICATIONS</a></li>
					<li><a href="cirruclum vitae.php">UPDATE</a></li>
				
				</ul>
			</nav>
		</div>

		


		
		
	<div class='rokoba'>
	<div class="plate">

  <p class="shadow text1">Find your </p>
  <p class="shadow text2">BEST JOB </p>
  <p class="shadow text3">easily!</p>
  
     </div> </div>
		
		<div class="flex">
		<div class="search">
			<input type="text" class="sinput" placeholder="job title">
			<button  class="sbutton" >Search</button>
		</div>
		

</head>

<body>


<div class='jobs-container'>


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


$sth = $conn->prepare("SELECT  code_offre,titre, descr, diplome, nb_exp, sal ,CURRENT_DATE-dins FROM offre");
 $sth->execute();

 $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
     session_start();
     $logbaba=$_SESSION['usernamecv'] ;

	 $stmcin = $conn->prepare("SELECT cin FROM cv where pseudo=:job_degree");
	 $stmcin->bindParam(':job_degree',$logbaba);
	 $stmcin->execute();
	 $cin = $stmcin->fetchColumn();
 $score=0;
 $tabscore=array();


 
$dip_dem = "";
 $stmdip = $conn->prepare("SELECT diplome FROM diplome WHERE id IN (SELECT code_dip	 FROM diplome_dem WHERE cin=:offer_id)");
 $stmdip->bindParam(':offer_id', $cin);
 $stmdip->execute();
 $resultatdip = $stmdip->fetchAll(PDO::FETCH_ASSOC);
 if (!empty($resultatdip)) {
	$resultat1_str = json_encode($resultatdip);
	$skillsArr = json_decode($resultat1_str, true);
	
  
	foreach ($skillsArr as $skillObj) {
	  $dip_dem .= $skillObj['diplome'];
	}
	
	// do something with $laststr
  }
 
$comp_dem = "";
 $stmcomp = $conn->prepare("SELECT skill FROM skills WHERE id IN (SELECT code_comp	 FROM comp_dem WHERE cin=:offer_id)");
 $stmcomp->bindParam(':offer_id', $cin );
 $stmcomp->execute();
 $resultatcomp = $stmcomp->fetchAll(PDO::FETCH_ASSOC);
 if (!empty($resultatcomp)) {
	$resultat2_str = json_encode($resultatcomp);
	$skillsArr = json_decode($resultat2_str, true);
	
  
	foreach ($skillsArr as $skillObj) {
	  $comp_dem .=$skillObj['skill'];
	}
	
  }



  
 for($i=0;$i<count($resultat);$i++){ 
$comp_offre="";
	$stmta = $conn->prepare("SELECT diplome FROM diplome where id=:job_degree");
    $stmta->bindParam(':job_degree',$resultat[$i]["diplome"]);
    $stmta->execute();
    $dip_offre = $stmta->fetchColumn();
 


    $stmtt = $conn->prepare("SELECT skill FROM skills WHERE id IN (SELECT code_comp FROM comp_offre WHERE code_offre_emp=:offer_id)");
    $stmtt->bindParam(':offer_id', $resultat[$i]["code_offre"]);
    $stmtt->execute();
    $resultat1 = $stmtt->fetchAll(PDO::FETCH_ASSOC);
	if (!empty($resultat1)) {
		$resultat1_str = json_encode($resultat1);
		$skillsArr = json_decode($resultat1_str, true);
		
	  
		foreach ($skillsArr as $skillObj) {
		  $comp_offre .= "," . $skillObj['skill'];
		}
		
	  }
	  $array1 = explode(",",$comp_offre);
	  for($j=1;$j<count($array1);$j++){


		if (strpos($comp_dem,$array1[$j]) !== false) {
			
			$score=$score+5;

		} else {
			
		}

		
	}
	$sal=$resultat[$i]["sal"]/100;
	$score=$score+$sal;


	if (strpos($dip_dem,$dip_offre) !== false) 
	{}
	 else{
		
		$score=$score*0;

	}
	






	$tabscore[$i]=$score;


	$score=0;


 }

 print_r($tabscore);



$max=0;
$str = "";
$ind=0;
 for($i=0;$i<count($resultat);$i++){  

	for($j=0;$j<count($tabscore);$j++){ 
		if($tabscore[$j]>$max){
	    $max=$tabscore[$j];$ind=$j;}
	
	
	}
$stmta = $conn->prepare("SELECT diplome FROM diplome where id=:job_degree");
$stmta->bindParam(':job_degree',$resultat[$ind]["diplome"]);
$stmta->execute();
$idddd = $stmta->fetchColumn();


$stmtt = $conn->prepare("SELECT skill FROM skills WHERE id IN (SELECT code_comp FROM comp_offre WHERE code_offre_emp=:offer_id)");
$stmtt->bindParam(':offer_id', $resultat[$ind]["code_offre"]);
$stmtt->execute();
$resultat1 = $stmtt->fetchAll(PDO::FETCH_ASSOC);

if (!empty($resultat1)) {
  $resultat1_str = json_encode($resultat1);
  $skillsArr = json_decode($resultat1_str, true);
  $laststr = "";

  foreach ($skillsArr as $skillObj) {
    $laststr .= "-" . $skillObj['skill'];
  }
  
}


	$s = $conn->prepare("SELECT entreprise FROM employeur where coderegistre=(select code_reg_comm from employeut_offre where code_offre_emp=:job_degree)");
	$s->bindParam(':job_degree',$resultat[$ind]["code_offre"]);
	$s->execute();
	$id1 = $s->fetchColumn();



	




	$str = $str . "<form  method='post' action=''><div class='jobcard'>  <div class='job1'><h4>Entreprise:" . $id1 . "</h4><h3> Titre :". $resultat[$ind]["titre"]."</h3><p>Description :".$resultat[$ind]["descr"]."</p></div>
 
	<div class='job1'><h4>Skills :" . $laststr. "</h4><h3>Diplome :". $idddd."</h3><h3>Anne d'experience :". $resultat[$ind]["nb_exp"]."</h3></div>
	
	<div class='job1'><p>Posted ".$resultat[$ind]["CURRENT_DATE-dins"]." days ago</p></div><button type='submit' name='omrayen'class='abutton'  value=". $resultat[$ind] ["code_offre"] . ">Apply</button>
	</div>	</form>";





 $tabscore[$ind]=-1;
 $ind=0;
 $max=-1;
}
 echo $str;


 
 if (isset($_POST['omrayen'])){
	$var= $_POST['omrayen'];

	$stmdip = $conn->prepare("SELECT cin,code_offre FROM employee_offre WHERE cin=:aaa and code_offre=:code_offre;");
	$stmdip->bindParam(':code_offre',$var);
	$stmdip->bindParam(':aaa',$cin);
	$stmdip->execute();
	$resultatdip = $stmdip->fetchAll(PDO::FETCH_ASSOC); 

	if ($stmdip->rowCount() > 0) 
	{echo "offre existant " ;
		
	  } else {
			
	$stmt = $conn->prepare("INSERT INTO employee_offre(CIN,code_offre) VALUES (:aaa,:code_offre)");
	$stmt->bindParam(':code_offre',$var);
	$stmt->bindParam(':aaa',$cin);
	$stmt->execute();
	  }








}





?>

			
			

</div>











	









	</div>






</body>
<script src="aff_dem_off.js"></script>
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
</div>
</html>