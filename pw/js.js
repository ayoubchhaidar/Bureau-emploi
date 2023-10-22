
function na(car,but,mcar){
let carte = document.getElementById(car);
let p = document.getElementById(mcar);
let b1 = document.getElementById(but);
carte.remove();
b1.remove();
p.classList.remove("card");p.classList.add("cardc");


let signInForm = document.createElement("form");
signInForm.setAttribute("action","");
signInForm.setAttribute("method","post");
signInForm.setAttribute("id","formsss",);

let divv = document.createElement("div");


divv.setAttribute("class","formcont");
divv.setAttribute("id","form1");
signInForm.appendChild(divv);

let TITLE = document.createElement("h1");
TITLE.textContent = "Log In:";
divv.appendChild(TITLE);

let usernameLabel = document.createElement("label");
usernameLabel.setAttribute("name", "username");
usernameLabel.setAttribute("class", "login");
usernameLabel.textContent = "Username:";
divv.appendChild(usernameLabel);

let usernameInput = document.createElement("input");
usernameInput.setAttribute("type", "text");
usernameInput.setAttribute("name", "username");
usernameInput.setAttribute("id", "username");
divv.appendChild(usernameInput);

let passwordLabel = document.createElement("label");
passwordLabel.setAttribute("for", "password");
passwordLabel.setAttribute("class", "loginp");
passwordLabel.textContent = "Password:";
divv.appendChild(passwordLabel);

let passwordInput = document.createElement("input");
passwordInput.setAttribute("type", "password");
passwordInput.setAttribute("name", "password");
passwordInput.setAttribute("id", "password");
divv.appendChild(passwordInput);
  let submitButton = document.createElement("button");
if(but=="b1"){

  submitButton.setAttribute("type", "submit");
  submitButton.setAttribute("value","log");
  submitButton.setAttribute("name","log");
  submitButton.setAttribute("id","haha");
  submitButton.setAttribute("class", "B");
  submitButton.textContent = "Sign In";
  }
  else {
   
    submitButton.setAttribute("type", "submit");
    submitButton.setAttribute("value","log2");
    submitButton.setAttribute("name","log2");
    submitButton.setAttribute("class", "B");
    submitButton.textContent = "Sign In";
    }
divv.appendChild(submitButton);


let submitButton2 = document.createElement("a");
submitButton2.textContent = "Sign Up";
if(but=="b1")
submitButton2.setAttribute("onclick", "signupEE('b1')");
else
submitButton2.setAttribute("onclick", "signupEE('b2')");
divv.appendChild(submitButton2);

let P = document.createElement("P");
P.setAttribute("id","erreurr");
divv.appendChild(P);


let formString = signInForm.outerHTML;
if(but=="b1")
c2.insertAdjacentHTML('beforeend',formString);
else
c1.insertAdjacentHTML('beforeend',formString);






}


function signupEE(but){


    let signInForm = document.getElementById("form1");
    signInForm.remove();



    let signUpForm = document.createElement("form");
    signUpForm.setAttribute("id","formsignup");

    signUpForm.setAttribute("action","");
    signUpForm.setAttribute("method","post");
    let divv = document.createElement("div");
    divv.setAttribute("class","formcont");
    divv.setAttribute("id","form1");
    signUpForm.appendChild(divv);

    let TITLE = document.createElement("h1");
    TITLE.textContent = "Sign Up:";
    divv.appendChild(TITLE);

if(but=='b1'){
  let nomla = document.createElement("label");
      nomla.setAttribute("name", "nom");
      nomla.setAttribute("class", "login");
      nomla.textContent = "Last name:";
      divv.appendChild(nomla);
  let nomin = document.createElement("input");
     nomin.setAttribute("type", "text");
     nomin.setAttribute("name", "nom");
     nomin.setAttribute("id", "nom");
     divv.appendChild(nomin);
 


   let pnomla = document.createElement("label");
    pnomla.setAttribute("name", "prenom");
    pnomla.setAttribute("class", "login");
    pnomla.textContent = "Name:";
   divv.appendChild(pnomla);
   let pnomin = document.createElement("input");
   pnomin.setAttribute("type", "text");
   pnomin.setAttribute("name", "prenom");
   pnomin.setAttribute("id", "prenom");
   divv.appendChild(pnomin);


    let usernameLabel = document.createElement("label");
    usernameLabel.setAttribute("class", "login");
    usernameLabel.textContent = "Username:";
    divv.appendChild(usernameLabel);
    
    let usernameInput = document.createElement("input");
    usernameInput.setAttribute("type", "text");
    usernameInput.setAttribute("id", "username");
    

    usernameInput.setAttribute("name", "username");
    divv.appendChild(usernameInput);
    
    let emailLabel = document.createElement("label");
    emailLabel.setAttribute("class", "loginp");
    emailLabel.textContent = "Email:";
    divv.appendChild(emailLabel);
    
    let emailInput = document.createElement("input");
    emailInput.setAttribute("type", "email");
    emailInput.setAttribute("id", "email");
    emailInput.setAttribute("name", "email");
    divv.appendChild(emailInput);
    
    let passwordLabel = document.createElement("label");
    passwordLabel.setAttribute("class", "loginp");
    passwordLabel.textContent = "CIN:";
    divv.appendChild(passwordLabel);
    
    let passwordInput = document.createElement("input");
    passwordInput.setAttribute("type", "text");
    passwordInput.setAttribute("id", "cin");
    passwordInput.setAttribute("name", "cin");
    divv.appendChild(passwordInput);
    
    let confirmPasswordLabel = document.createElement("label");
    confirmPasswordLabel.setAttribute("class", "loginp");
    confirmPasswordLabel.textContent = "Password:";
    divv.appendChild(confirmPasswordLabel);
    
    let confirmPasswordInput = document.createElement("input");
    confirmPasswordInput.setAttribute("type", "password");
    confirmPasswordInput.setAttribute("id", "password");
    confirmPasswordInput.setAttribute("name", "password");
    divv.appendChild(confirmPasswordInput);

    let submitButton = document.createElement("button");
    submitButton.setAttribute("type", "submit");
    submitButton.setAttribute("value","envoyer");
    submitButton.setAttribute("name","envoyer");
    submitButton.textContent = "Sign In";
    submitButton.setAttribute("onclick", "css()");

    submitButton.setAttribute("class", "B");
    divv.appendChild(submitButton);

    let P = document.createElement("P");
    P.setAttribute("id","erreur");
    divv.appendChild(P);

    let formString = signUpForm.outerHTML;

    c2.insertAdjacentHTML('afterbegin',formString);}

    else {
      let nomla = document.createElement("label");
      nomla.setAttribute("name", "nom");
      nomla.setAttribute("class", "login");
      nomla.textContent = "Last name:";
divv.appendChild(nomla);
let nomin = document.createElement("input");
nomin.setAttribute("type", "text");
nomin.setAttribute("name", "nom");
nomin.setAttribute("id", "nom");
divv.appendChild(nomin);
 


let pnomla = document.createElement("label");
      pnomla.setAttribute("name", "prenom");
     pnomla.setAttribute("class", "login");
      pnomla.textContent = "Name:";
divv.appendChild(pnomla);
let pnomin = document.createElement("input");
pnomin.setAttribute("type", "text");
pnomin.setAttribute("name", "prenom");
pnomin.setAttribute("id", "prenom");
divv.appendChild(pnomin);


        let usernameLabel = document.createElement("label");
    usernameLabel.setAttribute("class", "login");
    usernameLabel.textContent = "Username:";
    divv.appendChild(usernameLabel);


    let usernameInput = document.createElement("input");
    usernameInput.setAttribute("type", "text");
    usernameInput.setAttribute("id", "username");
    usernameInput.setAttribute("name", "username");
    divv.appendChild(usernameInput);

        let ep = document.createElement("label");
        ep.setAttribute("class", "loginp");
        ep.textContent = "Entreprise:";
        divv.appendChild(ep);

        let EPI = document.createElement("input");
        EPI.setAttribute("type", "text");
        EPI.setAttribute("id", "entreprise");
        EPI.setAttribute("name", "entreprise");
        divv.appendChild(EPI);
let rgc = document.createElement("label");
        rgc.setAttribute("class", "loginp");
        rgc.textContent = "Registry code:";
        divv.appendChild(rgc);

        let rgci = document.createElement("input");
        rgci.setAttribute("type", "text");
        rgci.setAttribute("id", "rgc");
        rgci.setAttribute("name", "rgc");
        divv.appendChild(rgci);



        let emailLabel = document.createElement("label");
        emailLabel.setAttribute("class", "loginp");
        emailLabel.textContent = "Email:";
        divv.appendChild(emailLabel);

        let emailInput = document.createElement("input");
        emailInput.setAttribute("type", "email");
        emailInput.setAttribute("id", "email");
        emailInput.setAttribute("name", "email");
        divv.appendChild(emailInput);

        let confirmPasswordLabel = document.createElement("label");
        confirmPasswordLabel.setAttribute("class", "loginp");
        confirmPasswordLabel.textContent = "Password:";
        divv.appendChild(confirmPasswordLabel);

        let confirmPasswordInput = document.createElement("input");
        confirmPasswordInput.setAttribute("type", "password");
        confirmPasswordInput.setAttribute("id", "password");
        confirmPasswordInput.setAttribute("name", "password");
        divv.appendChild(confirmPasswordInput);

        let submitButton1 = document.createElement("button");
        submitButton1.setAttribute("type", "submit");
        submitButton1.setAttribute("value","employeur");
        submitButton1.setAttribute("name","employeur");
        submitButton1.setAttribute("class", "B");
        submitButton1.setAttribute("onclick", "css2()");

        submitButton1.textContent = "Sign Up";


        divv.appendChild(submitButton1);
        let P = document.createElement("P");
       P.setAttribute("id","erreur");
       divv.appendChild(P);

    let formString = signUpForm.outerHTML;
    c1.insertAdjacentHTML('afterbegin',formString);

    }
}

    















function controles(){
  let formulaire = document.getElementById('formsss');
  formulaire.addEventListener("submit",function(e){
    
      let name=document.getElementById("username");
      let mdp=document.getElementById("password");
      let myError=document.getElementById('erreurr');

      if (name.value.trim()=='')
      {
        myError.innerHTML='Le champ nom est requis';
        myError.style.color='red';	
          e.preventDefault();
  
  
      }
      
    if (mdp.value.trim()=='')
    {
      myError.innerHTML='Le champ mdp est requis';
      myError.style.color='red';	
      	e.preventDefault();


    }



    });}

function css(){
let formulaire = document.getElementById('formsignup');console.log(formulaire);
formulaire.addEventListener("submit",function(e){
  
    let name=document.getElementById("username");
    let mail=document.getElementById("email");
    let cin=document.getElementById("cin");
    let password=document.getElementById("password");
    let nom=document.getElementById("nom");
    let pern=document.getElementById("prenom");



    let myError=document.getElementById('erreur');

 
    let regExNom=/^[a-zA-Z\s]+$/;
    let regExEmail= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ;

    
    if (nom.value.trim()=='')
    {
      myError.innerHTML='Le champ nom est requis';
      myError.style.color='red';	
      	e.preventDefault();


    }
    else if(regExNom.test(nom.value)==false){
      myError.innerHTML='Le champ nom doit être composé de lettres ou d espaces';
      myError.style.color='red';	
      	e.preventDefault();

      }
      if (prenom.value.trim()=='')
      {	myError.innerHTML='Le champ prenom est requis';
      myError.style.color='red';	
      	e.preventDefault();



      }
      else if(regExNom.test(prenom.value)==false){
        myError.innerHTML='Le champ prnom doit être composé de lettres ou d espaces';
        myError.style.color='red';	
      	e.preventDefault();
  
      }
  
  
  
      // controle du nom
      if (name.value.trim()=='')
      {	
        myError.innerHTML='Le champ username est requis';
        myError.style.color='red';	
      	e.preventDefault();
      
      }
      else if(regExNom.test(name.value)==false){
        myError.innerHTML='Le champ username doit être composé de lettres ou d espaces';
        myError.style.color='red';	
      	e.preventDefault();
  
      }
  
  
       if (cin.value.trim()=='')
      {	
        myError.innerHTML='Le champ cin  est requis';
        myError.style.color='red';	
      	e.preventDefault();
     
      }
      else
        if(cin.value.length>8  || cin.value.length < 8 ){
          myError.innerHTML='veuillez saisir un cin  valide';
        myError.style.color='red';	
      	e.preventDefault();
       
        }
  
  
  //controle de l'email
   if (mail.value.trim()=='')
  {	myError.innerHTML='Le champ Email est requis';
  myError.style.color='red';	
  e.preventDefault();
 
  
  }
  else 
    if(regExEmail.test(mail.value)==false){

      myError.innerHTML='L adresse email n est pas valide';
  myError.style.color='red';	
  e.preventDefault();
  
    }
    if (password.value.trim()=='')
    {
      myError.innerHTML='Le champ password est requis';
      myError.style.color='red';	
      	e.preventDefault();
    }
    

});}





function css2(){
  let formulaire = document.getElementById('formsignup');console.log(formulaire);
  formulaire.addEventListener("submit",function(e){

      let ep=document.getElementById("entreprise");

      let name=document.getElementById("username");
      let mail=document.getElementById("email");
      let rgc=document.getElementById("rgc");
      let password=document.getElementById("password");
      let nom=document.getElementById("nom");
      let pern=document.getElementById("prenom");
  
  
  
      let myError=document.getElementById('erreur');
  
   
      let regExNom=/^[a-zA-Z\s]+$/;
      let regExEmail= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ;
  
      
      if (nom.value.trim()=='')
      {
        myError.innerHTML='Le champ nom est requis';
        myError.style.color='red';	
          e.preventDefault();
  
  
      }
      else if(regExNom.test(nom.value)==false){
        myError.innerHTML='Le champ nom doit être composé de lettres ou d espaces';
        myError.style.color='red';	
          e.preventDefault();
  
        }
        if (prenom.value.trim()=='')
        {	myError.innerHTML='Le champ prenom est requis';
        myError.style.color='red';	
          e.preventDefault();
  
  
  
        }
        else if(regExNom.test(prenom.value)==false){
          myError.innerHTML='Le champ prnom doit être composé de lettres ou d espaces';
          myError.style.color='red';	
          e.preventDefault();
    
        }
    
    
    
        // controle du nom
        if (name.value.trim()=='')
        {	
          myError.innerHTML='Le champ username est requis';
          myError.style.color='red';	
          e.preventDefault();
        
        }
        else if(regExNom.test(name.value)==false){
          myError.innerHTML='Le champ username doit être composé de lettres ou d espaces';
          myError.style.color='red';	
          e.preventDefault();
    
        }
    
    
         if (rgc.value.trim()=='')
        {	
          myError.innerHTML='Le champ regestry code  est requis';
          myError.style.color='red';	
          e.preventDefault();
       
        }
        if (ep.value.trim()=='')
        {	
          myError.innerHTML='Le champ entreprise code  est requis';
          myError.style.color='red';	
          e.preventDefault();
       
        }
        
    
    
    //controle de l'email
     if (mail.value.trim()=='')
    {	myError.innerHTML='Le champ Email est requis';
    myError.style.color='red';	
    e.preventDefault();
   
    
    }
    else 
      if(regExEmail.test(mail.value)==false){
  
        myError.innerHTML='L adresse email n est pas valide';
    myError.style.color='red';	
    e.preventDefault();
  
        
      }
      if (password.value.trim()=='')
      {
        myError.innerHTML='Le champ password est requis';
        myError.style.color='red';	
          e.preventDefault();
  
  
      }
      
  
  });}








  function stayonp(){
    let formulaire = document.getElementById('haha');
    formulaire.addEventListener(ru,function(e){
      
            e.preventDefault();
    
    
        });}



        function css3(){
          let formulaire = document.getElementById('formsignup');console.log(formulaire);
          formulaire.addEventListener("submit",function(e){
        
              let ep=document.getElementById("entreprise");
        
              let mail=document.getElementById("email");
              let nom=document.getElementById("nom");
              let pern=document.getElementById("prenom");
          
          
          
              let myError=document.getElementById('erreur');
          
           
              let regExNom=/^[a-zA-Z\s]+$/;
              let regExEmail= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ;
          
              
              if (nom.value.trim()=='')
              {
                myError.innerHTML='Le champ nom est requis';
                myError.style.color='red';	
                  e.preventDefault();
          
          
              }
              else if(regExNom.test(nom.value)==false){
                myError.innerHTML='Le champ nom doit être composé de lettres ou d espaces';
                myError.style.color='red';	
                  e.preventDefault();
          
                }
                if (prenom.value.trim()=='')
                {	myError.innerHTML='Le champ prenom est requis';
                myError.style.color='red';	
                  e.preventDefault();
          
          
          
                }
                else if(regExNom.test(prenom.value)==false){
                  myError.innerHTML='Le champ prnom doit être composé de lettres ou d espaces';
                  myError.style.color='red';	
                  e.preventDefault();
            
                }
            
            
            
            
               
               
            
            
            
                if (ep.value.trim()=='')
                {	
                  myError.innerHTML='Le champ entreprise code  est requis';
                  myError.style.color='red';	
                  e.preventDefault();
               
                }
                
            
            
            //controle de l'email
             if (mail.value.trim()=='')
            {	myError.innerHTML='Le champ Email est requis';
            myError.style.color='red';	
            e.preventDefault();
           
            
            }
            else 
              if(regExEmail.test(mail.value)==false){
          
                myError.innerHTML='L adresse email n est pas valide';
            myError.style.color='red';	
            e.preventDefault();
          
                
              }
              
              
          
          });}
              