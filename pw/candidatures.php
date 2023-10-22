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
    />
    />	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="offrecss1.css" />
  </head>
  <header>
		<div id="main">
			<div class="logo2"></div>
	  <div class="nav">
			<nav>
				<ul>
        <li><a href="listeoffre.php" style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style=" font-size: 35px!important; ">arrow_back</i>  Precedent Page </a></li>
        <li><a href="index.php" style="display: inline-flex; align-items: center; "><i class="material-icons icons3" style=" font-size: 35px!important; ">lock</i> Disconnect </a></li>
        
				</ul>
			</nav></div>
		</div>
		
 	</header>
  <body>
    <div class="jobs-list-container">
      <h2>Applies for this Offer:</h2>
    

       

      <div class="jobs"> </div>


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
$score=0;
$tabscore=array();

$stha = $conn->prepare("SELECT  * FROM offre where code_offre =:cin ");
$stha->bindParam(':cin',$_GET['variable_name']);
$stha->execute();
$offre = $stha->fetchAll(PDO::FETCH_ASSOC);

$stm = $conn->prepare("SELECT diplome FROM diplome where id=:job_degree");
  $stm->bindParam(':job_degree',$offre[0]["diplome"]);
  $stm->execute();
  $dip = $stm->fetchColumn();



  
$str='';




$comp_offre = '';
$stmtt = $conn->prepare("SELECT skill FROM skills WHERE id IN (SELECT code_comp FROM comp_offre WHERE code_offre_emp=:offer_id)");
$stmtt->bindParam(':offer_id', $offre[0]["code_offre"]);
$stmtt->execute();
$resultat1 = $stmtt->fetchAll(PDO::FETCH_ASSOC);

if (!empty( $resultat1)) {
  $resustr = json_encode($resultat1);
  $skillsArr = json_decode($resustr, true);
  

  foreach ($skillsArr as $skillObj) {
    $comp_offre .="-" .$skillObj['skill'];
  }
  
}


$str = $str . '<form  method="post" action=""><div class="saka"><div class="job"> <h3 class="job-title">Code offre:'. $offre[0]["code_offre"].'</h3><h3 class="job-title">Titre:'. $offre[0]["titre"].'</h3><div class="details">Description:'.$offre[0]["descr"].'<br> Skills:'.$comp_offre .'</div><div class="job1"> <h3 class="job-title">Diplome:'. $dip.'</h3><h3 class="job-title">Experiece:'. $offre[0]["nb_exp"].'ans</h3><h3 class="job-title">Salaire:'. $offre[0]["sal"].'$</h3></div><button class="details-btn" type="submit" name="suppoffre"> Supprimeer Offre</button><span class="open-positions">Publiee le: '.$offre[0]["dins"].' . </span></div></form>';
echo $str;

$stmta = $conn->prepare("SELECT nb_exp FROM offre where code_offre=:job_degree");
    $stmta->bindParam(':job_degree',$offre[0]["code_offre"]);
    $stmta->execute();
    $exp_offre = $stmta->fetchColumn();











$sth = $conn->prepare("SELECT  * FROM cv where cin in ( select cin from employee_offre where code_offre=:co ) ");
$sth->bindParam(':co',$_GET['variable_name']);
$sth->execute();
$resultat = $sth->fetchAll(PDO::FETCH_ASSOC);


for($i=0;$i<count($resultat);$i++){ 

    $dip_dem = "";
    $stmdip = $conn->prepare("SELECT diplome FROM diplome WHERE id IN (SELECT code_dip	 FROM diplome_dem WHERE cin=:offer_id)");
    $stmdip->bindParam(':offer_id', $resultat[$i]['cin']);
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
    $stmcomp->bindParam(':offer_id', $resultat[$i]['cin'] );
    $stmcomp->execute();
    $resultatcomp = $stmcomp->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($resultatcomp)) {
       $resultat2_str = json_encode($resultatcomp);
       $skillsArr = json_decode($resultat2_str, true);
       
     
       foreach ($skillsArr as $skillObj) {
         $comp_dem .="," .$skillObj['skill'];
       }
       
     }
     $array1 = explode(",",$comp_dem);

     $stmexp = $conn->prepare("SELECT experience FROM cv where cin=:job_degree");
     $stmexp->bindParam(':job_degree',$resultat[$i]['cin']);
     $stmexp->execute();
     $exp_dem = $stmexp->fetchColumn();

     for($j=1;$j<count($array1);$j++){


		if (strpos($comp_offre,$array1[$j]) !== false) {
			
			$score=$score+5;

		} 
	}
  if( $exp_dem >= $exp_offre){

$diff=$exp_dem-$exp_offre;
       if($diff>0){
        for($k=0;$k<$diff;$k++)   {
        $score=$score+2;}

    }


  }

    if (strpos($dip_dem,$dip) !== false) 
	{}
	 else{
		
		$score=$score*0;

	}


    $tabscore[$i]=$score;


	$score=0;}
print_r($tabscore);





$max=0;
$strcv = "";
$ind=0;
 for($i=0;$i<count($resultat);$i++){  

	for($j=0;$j<count($tabscore);$j++){ 
		if($tabscore[$j]>$max){
	    $max=$tabscore[$j];$ind=$j;}
	
	
	}


  
  $dip_dem = "";
  $stmdip = $conn->prepare("SELECT diplome FROM diplome WHERE id IN (SELECT code_dip	 FROM diplome_dem WHERE cin=:offer_id)");
  $stmdip->bindParam(':offer_id', $resultat[$ind]['cin']);
  $stmdip->execute();
  $resultatdip = $stmdip->fetchAll(PDO::FETCH_ASSOC);
  if (!empty($resultatdip)) {
     $resultat1_str = json_encode($resultatdip);
     $skillsArr = json_decode($resultat1_str, true);
     
   
     foreach ($skillsArr as $skillObj) {
       $dip_dem .= '-'.$skillObj['diplome'];
     }
     
     // do something with $laststr
   }
  
 $comp_dem = "";
  $stmcomp = $conn->prepare("SELECT skill FROM skills WHERE id IN (SELECT code_comp	 FROM comp_dem WHERE cin=:offer_id)");
  $stmcomp->bindParam(':offer_id', $resultat[$ind]['cin'] );
  $stmcomp->execute();
  $resultatcomp = $stmcomp->fetchAll(PDO::FETCH_ASSOC);
  if (!empty($resultatcomp)) {
     $resultat2_str = json_encode($resultatcomp);
     $skillsArr = json_decode($resultat2_str, true);
     
   
     foreach ($skillsArr as $skillObj) {
       $comp_dem .='-'.$skillObj['skill'];
     }
     
   }

 

   $st = $conn->prepare("SELECT date_ins FROM employee_offre where cin=:job_degree and code_offre=:aa" );
   $st->bindParam(':job_degree',$resultat[$ind]["cin"]);
   $st->bindParam(':aa',$offre[0]["code_offre"]);
   $st->execute();
   $date = $st->fetchColumn();



   $stmt = $conn->prepare("SELECT image_data, image_type FROM images WHERE cin=?");
   $stmt->bindParam(1, $resultat[$ind]['cin']);
   $stmt->execute();
   $resultimg = $stmt->fetch(PDO::FETCH_ASSOC);




	$strcv = $strcv . "<form  method='post' action=''><div class='saka'>
  <div class='jobcard'>  <div class='job1'><img src='data:" . $resultimg['image_type'] . ";base64," . base64_encode($resultimg['image_data']) . "' alt='My Image' class='profile-img' ><h4><span>Prenom:</span>" .$resultat[$ind]["prenom"] . "</h4><h4> <span>Nom :</span>".$resultat[$ind]["nom"] ."</h4></div>
 
	<div class='job1'><h4><span>Skills :</span>" .$comp_dem . "</h4><h4><span>Diplome :</span>". $dip_dem ."</h4></div>
	
	<div class='job1'><p>Postuler le ".$date."  </p> <h3>Anne d'experience :".$resultat[$ind]["experience"]."</h3><button type='submit' name='accepter'class='button-33'  value=". $resultat[$ind] ["cin"] .">Accepter</button><button type='submit' class='button-34' name='refuser'  value=". $resultat[$ind] ["cin"] .">Refuser</button></div>
	</div>	</div></form>";




 $tabscore[$ind]=-1;
 $ind=0;
 $max=-1;
}
 echo $strcv;



if(isset($_POST['accepter'])){
  $stmta = $conn->prepare("UPDATE employee_offre SET  statut='Accepter' where code_offre=:job_degree and cin=:cin");
  $stmta->bindParam(':job_degree',$_GET['variable_name']);
  $stmta->bindParam(':cin',$_POST['accepter']);
  $stmta->execute();

}
if(isset($_POST['refuser'])){
  $stmta = $conn->prepare("UPDATE employee_offre SET  statut='Refuser' where code_offre=:job_degree and cin=:cin");
  $stmta->bindParam(':job_degree',$_GET['variable_name']);
  $stmta->bindParam(':cin',$_POST['refuser']);
  $stmta->execute();

}

if(isset($_POST['suppoffre'])){
  $stmta = $conn->prepare("DELETE FROM  employee_offre   where code_offre=:job_degree ");
  $stmta->bindParam(':job_degree',$_GET['variable_name']);
  $stmta->execute();

  $stmt = $conn->prepare("DELETE FROM  employeut_offre   where code_offre_emp=:job_degree ");
  $stmt->bindParam(':job_degree',$_GET['variable_name']);
  $stmt->execute();

  
  $st = $conn->prepare("DELETE FROM  comp_offre   where code_offre_emp=:job_degree ");
  $st->bindParam(':job_degree',$_GET['variable_name']);
  $st->execute();


  $stm = $conn->prepare("DELETE FROM  offre   where code_offre=:job_degree");
  $stm->bindParam(':job_degree',$_GET['variable_name']);
  $stm->execute();
  header('location:listeoffre.php');

}










?>

















</div>
</div>
  
      


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