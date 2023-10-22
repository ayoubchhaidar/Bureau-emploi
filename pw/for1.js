function addform(b){

  if (b=='b1'){

let ba = document.getElementById('maincv');
if(ba!=null)
 ba.remove();
let ele = document.getElementById('form1');
 if(ele==null){
  let signUpForm = document.createElement("form");
signUpForm.setAttribute("id", "form1");
signUpForm.setAttribute("action","");
signUpForm.setAttribute("method","post");
let divv = document.createElement("div");
divv.setAttribute("class", "formcont");
signUpForm.appendChild(divv);

let title = document.createElement("h1");
title.textContent = "CV:";
divv.appendChild(title);

let nomLabel = document.createElement("label");
nomLabel.setAttribute("for", "nom");
nomLabel.textContent = "Nom :";
divv.appendChild(nomLabel);

let nomInput = document.createElement("input");
nomInput.setAttribute("type", "text");
nomInput.setAttribute("id", "nom");
nomInput.setAttribute("name", "nom");
divv.appendChild(nomInput);

let prenomLabel = document.createElement("label");
prenomLabel.setAttribute("for", "prenom");
prenomLabel.textContent = "Prénom :";
divv.appendChild(prenomLabel);

let prenomInput = document.createElement("input");
prenomInput.setAttribute("type", "text");
prenomInput.setAttribute("id", "prenom");
prenomInput.setAttribute("name", "prenom");
divv.appendChild(prenomInput);

let photoLabel = document.createElement("label");
photoLabel.setAttribute("for", "photo");
photoLabel.textContent = "Photo d'identité :";
divv.appendChild(photoLabel);

let photoInput = document.createElement("input");
photoInput.setAttribute("class", "img");
photoInput.setAttribute("type", "file");
photoInput.setAttribute("id", "photo");
photoInput.setAttribute("name", "photo");
divv.appendChild(photoInput);

let dateNaissanceLabel = document.createElement("label");
dateNaissanceLabel.setAttribute("for", "date_naissance");
dateNaissanceLabel.textContent = "Date de naissance :";
divv.appendChild(dateNaissanceLabel);

let dateNaissanceInput = document.createElement("input");
dateNaissanceInput.setAttribute("type", "date");
dateNaissanceInput.setAttribute("id", "date_naissance");
dateNaissanceInput.setAttribute("name", "date_naissance");
divv.appendChild(dateNaissanceInput);

let etatCivilLabel = document.createElement("label");
etatCivilLabel.setAttribute("for", "etat_civil");
etatCivilLabel.textContent = "Etat civil :";
divv.appendChild(etatCivilLabel);

let etatCivilSelect = document.createElement("select");
etatCivilSelect.setAttribute("id", "etat_civil");
etatCivilSelect.setAttribute("name", "etat_civil");
divv.appendChild(etatCivilSelect);

let celibataireOption = document.createElement("option");
celibataireOption.setAttribute("value", "celibataire");
celibataireOption.textContent = "Célibataire";
etatCivilSelect.appendChild(celibataireOption);

let adresseLabel = document.createElement("label");
adresseLabel.setAttribute("for", "adresse");
adresseLabel.textContent = "Adresse :";
divv.appendChild(adresseLabel);

let adresseTextArea = document.createElement("textarea");
adresseTextArea.setAttribute("id", "adresse");
adresseTextArea.setAttribute("name", "adresse");
divv.appendChild(adresseTextArea);

let telLabel = document.createElement("label");
telLabel.setAttribute("for", "tel");
telLabel.textContent = "Numéro de téléphone :";
divv.appendChild(telLabel);

let telInput = document.createElement("input");
telInput.setAttribute("type", "tel");
telInput.setAttribute("id", "tel");
telInput.setAttribute("name", "tel");
divv.appendChild(telInput);

let labelEmail = document.createElement("label");
labelEmail.setAttribute("for", "email");
labelEmail.textContent = "Email :";
divv.appendChild(labelEmail);

let inputEmail = document.createElement("input");
inputEmail.setAttribute("type", "email");
inputEmail.setAttribute("id", "email");
inputEmail.setAttribute("name", "email");
divv.appendChild(inputEmail);

let labelDiplomes = document.createElement("label");
labelDiplomes.setAttribute("for", "diplomes");
labelDiplomes.textContent = "Liste des diplômes :";
divv.appendChild(labelDiplomes);

let selectDiplomes = document.createElement("select");
selectDiplomes.setAttribute("id", "diplomes");
selectDiplomes.setAttribute("name", "diplomes");

let optionDiplome1 = document.createElement("option");
optionDiplome1.setAttribute("value", "diplome1");
optionDiplome1.textContent = "Diplôme 1";
selectDiplomes.appendChild(optionDiplome1);

let optionDiplome = document.createElement("option");
optionDiplome.setAttribute("value", "Bachelor of Arts (BA)");
optionDiplome.textContent = "Bachelor of Arts (BA)";
selectDiplomes.appendChild(optionDiplome);
divv.appendChild(selectDiplomes);

let selectCompetences = document.createElement("select");
selectCompetences.setAttribute("name", "competences[]");
selectCompetences.setAttribute("id", "competences");
selectCompetences.setAttribute("multiple", "");

let optgroupLangues = document.createElement("optgroup");
optgroupLangues.setAttribute("label", "Langues");

let optionArabe = document.createElement("option");
optionArabe.setAttribute("value", "arabe");
optionArabe.textContent = "arabe ";
optgroupLangues.appendChild(optionArabe);

selectCompetences.appendChild(optgroupLangues);

let optgroupProgWeb = document.createElement("optgroup");
optgroupProgWeb.setAttribute("label", "programmation web");
let optionHTML5 = document.createElement("option");

optionHTML5.setAttribute("value", "HTML5");
optionHTML5.textContent = "HTML5 ";
optgroupProgWeb.appendChild(optionHTML5);

let optionHTML = document.createElement("option");
optionHTML.setAttribute("value", "Communication");
optionHTML.textContent = "Communication";
optgroupProgWeb.appendChild(optionHTML);

selectCompetences.appendChild(optgroupProgWeb);

divv.appendChild(selectCompetences);

let labelUniversite = document.createElement("label");
labelUniversite.setAttribute("for", "universite");
labelUniversite.textContent = "Université :";
divv.appendChild(labelUniversite);

let selectUniversite = document.createElement("select");
selectUniversite.setAttribute("id", "universite");
selectUniversite.setAttribute("name", "universite");

let optionUniversite1 = document.createElement("option");
optionUniversite1.setAttribute("value", "universite1");

optionUniversite1.textContent = "Université 1";
selectUniversite.appendChild(optionUniversite1);

divv.appendChild(selectUniversite);

let labelAnneesExp = document.createElement("label");
labelAnneesExp.setAttribute("for", "annees_experience");
labelAnneesExp.textContent = "Nombre d'années d'expérience :";
divv.appendChild(labelAnneesExp);

let inputAnneesExp = document.createElement("input");
inputAnneesExp.setAttribute("type", "number");
inputAnneesExp.setAttribute("id", "annees_experience");
inputAnneesExp.setAttribute("name", "annees_experience");
inputAnneesExp.setAttribute("min", "0");
inputAnneesExp.setAttribute("max", "40");
divv.appendChild(inputAnneesExp);


let submitButton = document.createElement("button");
  submitButton.setAttribute("type", "submit");
  submitButton.setAttribute("value","submit");
  submitButton.setAttribute("name","submit");
  submitButton.setAttribute("value","log");
  submitButton.setAttribute("onclick","controlesaisie()");
  
  submitButton.setAttribute("id","haha");
  submitButton.setAttribute("class", "button1");
  submitButton.textContent = "Submit";
divv.appendChild(submitButton);
let p = document.createElement("p");
  p.setAttribute("id", "erreur");
  divv.appendChild(p);

let formString = signUpForm.outerHTML;

pra3.insertAdjacentHTML('beforeend',formString);}}
else {
  
  


  let ba = document.getElementById('form1');
  if(ba!=null)
   ba.remove();

   let ele = document.getElementById('maincv');
   if(ele==null){

const container = document.querySelector(".all");

const div = document.createElement("div");
div.classList.add("main");
div.setAttribute("id","maincv");

div.innerHTML = `<div class="left" >
<br>
<div class="profile-img"><img src=""></div>

<div class="box-1">
  <div class="heading">
    <p>CONTACT</p>
  </div>
  <p class="p1"><i class="material-icons icons1">call</i>+123-324-5555</p>
  <p class="p1"><i class="material-icons icons1">email</i>info@demo.com</p>
  <p class="p1"><i class="material-icons icons1"></i>adresse ADDAADDAD</p>
</div>

<div class="box-1">
  <div class="heading">
    <p>diplomes</p>
  </div>

  <p class="p1">HTML
  <div class="skill-container">
    <div class="skill html"></div>
  </div>
  </p>

  



</div>
<br>

<div class="box-1">
  <div class="heading">
    <p>cOMPETENCES</p>
  </div>

  <p class="p1">WEBSITE DESIGN
  <div class="skill-container">
    <div class="skill web"></div>
  </div>
</p>

  
</div>
<br>


</div>


<div class="right">
<div class="name-div">
  <h1>MANOJ ADHIKARI</h1>
  <p>WEBSITE DESIGNER</p>
</div>

<div class="box-2">
  <h2>Etat cicvil  <i class="material-icons icons3" style="font-size: 28px!important; ">perm_identity</i></h2>
  <p class="p2">
    Lorem Ipsum 
  </p>
</div>



<div class="box-2">
  <h2>EDUCATION <i class="material-icons icons3" >border_color</i></h2>
  <p class="p3">2010-2013 <span>Lorem Ipsum is simply dummy</span></p>
  <p class="p2">
    Lorem Ipsum is simply dummy text of 
  </p>


</div>


<div class="box-2">
  <h2>WORK EXPERIENCE <i class="material-icons icons3" >folder</i></h2>
  <p class="p3">2010-2013 <span>Lorem Ipsum is simply dummy</span></p>
  

  
</div>

</div> `;
container.appendChild(div);

}
}

  
}


function addcv(){


  let b2 = document.getElementById('b2');
  b1.remove();
  let ban = document.getElementById('form1');
  ban.remove();



  const container = document.querySelector(".all");

  const div = document.createElement("div");
  div.classList.add("main");
  div.setAttribute("id","maincv");
  
  div.innerHTML = `
  
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
$sth = $conn->prepare("SELECT nom, prenom, photo, datenaissance, etatcivil, adresse, num, email, diplome, competence, universite, experience FROM cv where nom='rami' ;");
 $sth->execute();

 $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

$str = '';

 for($i=0;$i<count($resultat);$i++){ 
 $str = $str . '
 <div class="left" >
 <br>
 <div class="profile-img"><img src=""></div>

 <div class="box-1">
   <div class="heading">
     <p>CONTACT</p>
   </div>
   <p class="p1"><i class="material-icons icons1">call</i>" . $resultat[$i]["num"] . "</p>
   <p class="p1"><i class="material-icons icons1">email</i>" . $resultat[$i]["email"] . "</p>
   <p class="p1"><i class="material-icons icons1"></i>adresse " . $resultat[$i]["adresse"] . "</p>
 </div>

 <div class="box-1">
   <div class="heading">
     <p>diplomes</p>
   </div>

   <p class="p1">" . $resultat[$i]["diplome"] . "
   <div class="skill-container">
     <div class="skill html"></div>
   </div>
   </p>

   

 

 </div>
 <br>

 <div class="box-1">
   <div class="heading">
     <p>cOMPETENCES</p>
   </div>

   <p class="p1">" . $resultat[$i]["competence"] . "
   <div class="skill-container">
     <div class="skill web"></div>
   </div>
 </p>

   
 </div>
 <br>


</div>


<div class="right">
 <div class="name-div">
   <h1>" . $resultat[$i]["nom"] . "</h1>
   <p>" . $resultat[$i]["prenom"] . "</p>
 </div>

 <div class="box-2">
   <h2>Etat cicvil  <i class="material-icons icons3" style="font-size: 28px!important; ">perm_identity</i></h2>
   <p class="p2">
   " . $resultat[$i]["etatcivil"] . "
   </p>
 </div>



 <div class="box-2">
   <h2>EDUCATION <i class="material-icons icons3" >border_color</i></h2>
   <p class="p3">2010-2013 <span>Lorem Ipsum is simply dummy</span></p>
   <p class="p2">
   " . $resultat[$i]["universite"] . "
   </p>

 
 </div>


 <div class="box-2">
   <h2>WORK EXPERIENCE <i class="material-icons icons3" >folder</i></h2>
   <p class="p3">2010-2013 <span>" . $resultat[$i]["experience"] . "</span></p>
   

   
 </div>

</div>';
 
}

 echo $str;

?>`;
container.appendChild(div);






}

function controlesaisie(){
let formulaire = document.getElementById('form1');
formulaire.addEventListener('submit',function(e){
    let phone = document.getElementById("tel");
    let age = document.getElementById("annees_experience");

   


    let regExNom=/^[a-zA-Z\s]+$/;
    let regExEmail= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ;
    let myError=document.getElementById('erreur');
    myError.style.color='red';
    
 
    const dateInput = document.getElementById('date_naissance');
    if (dateInput.value === '') { 
       myError.innerHTML='Le champ date naissance  est requis';
    myError.style.color='red';
    e.preventDefault();
    }  

    const fileInput = document.getElementById('photo');
    if (fileInput.value === '') {
      myError.innerHTML="L'image est requis";
      myError.style.color='red';
      e.preventDefault();    } 



  if (phone.value.length==0)
  {	
  myError.innerHTML='Le champ phone number est requis';
  myError.style.color='red';
  e.preventDefault();
  }
  else if(phone.value.length!=8){
  
  myError.innerHTML="Le champ phone number doit être composé de 8 chiffres";
  e.preventDefault();
  }

  let select = document.getElementById('diplomes');
    listeComp = "";
    for (let i=0; i<select.length; i++) {
        if (select[i].selected) {
            listeComp += select[i].value + '  ';		
        }
    }

  if (listeComp.trim()=='')
    {	
		myError.innerHTML='Veuillez saisir au moins une compétence';
		e.preventDefault();
    }

    let select2 = document.getElementById('competences');
    listeComp = "";
    for (let i=0; i<select2.length; i++) {
        if (select2[i].selected) {
            listeComp += select2[i].value + '  ';		
        }
    }

  if (listeComp.trim()=='')
    {	
		myError.innerHTML='you must choose at least one skill';
		e.preventDefault();
    }

    if (age.value.trim()=='')
    {	
		myError.innerHTML='experience is  required';
		e.preventDefault();
    }
    else
	    if(Number(age.value)>40   || Number(age.value) < 2 ){
			myError.innerHTML="must be between 2 and 40";
			e.preventDefault();
	    }




});}