/* ***********************controle de saisie formulaire inscription ***************************/
/* ***********************sa partie style se trouve sur inscription.php ***************************/
const form = document.querySelector('#form');
const nomInput = document.querySelector('#nom');
const emailInput = document.querySelector('#email');
const passwordInput = document.querySelector('#password');
const confirmPasswordInput = document.querySelector('#password2');
const prenomInput = document.querySelector('#prenom');
const roleInput = document.querySelector('#inputState');

form.addEventListener('submit', (event)=>{
    
    validateForm();
    console.log(isFormValid());
    if(isFormValid()==true){
        form.submit();
     }else {
         event.preventDefault();
     }

});

function isFormValid(){
    const inputContainers = form.querySelectorAll('.info1');
    let result = true;
    inputContainers.forEach((container)=>{
        if(container.classList.contains('error')){
            result = false;
        }
    });
    return result;
}

function validateForm() {
    //NOM
    if(nomInput.value.trim()==''){
        setError(nomInput, 'Le nom ne doit pas etre vide');
    }else if(nomInput.value.trim().length <2 || nomInput.value.trim().length > 15){
        setError(nomInput, 'Il faut au moins 2 caracteres et au plus 15caracteres');
    }else if(!nomInput.value.match(/^[a-zA-Z]/)){
        let message ="Le nom doit commencer par une lettre";
        setError(nomInput,message)
      }
    
    else {
        setSuccess(nomInput);
    }
    // PRENOM
    if(prenomInput.value.trim()==''){
        setError(prenomInput, 'Le prenom ne doit pas etre vide');
    }else if(prenomInput.value.trim().length <2 || prenomInput.value.trim().length > 15){
        setError(prenomInput, 'Il faut au moins 2 caracteres et au plus 15caracteres');
    }else if(!prenomInput.value.match(/^[a-zA-Z]/)){
        let message ="Le prenom doit commencer par une lettre";
        setError(prenomInput,message)
      }
    
    else {
        setSuccess(prenomInput);
    }

    //EMAIL
    if(emailInput.value.trim()==''){  
        setError(emailInput, 'Saisir une adresse mail');
    }else if(isEmailValid(emailInput.value)){
        setSuccess(emailInput);
    }else{
        setError(emailInput, 'saisir une adresse mail valide');
    }

    //PASSWORD
    if(passwordInput.value.trim()==''){
        setError(passwordInput, 'Le mot de passe ne doit pas etre vide');
    }else if(passwordInput.value.trim().length <2|| passwordInput.value.trim().length >20){
        setError(passwordInput, 'Minimum 2 caracteres pour le mot de passe');
    }else {
        setSuccess(passwordInput);
    }
    //CONFIRM PASSWORD
    if(confirmPasswordInput.value.trim()==''){
        setError(confirmPasswordInput, 'Le mot de passe ne doit pas etre vide');
    }else if(confirmPasswordInput.value !== passwordInput.value){
        setError(confirmPasswordInput, 'Les mots de passe ne correspondent pas');
    }else {
        setSuccess(confirmPasswordInput);
    }
    // ROLE
   
    if((roleInput.value !='admin')&&(roleInput.value !='utilisateur')){
        setError(roleInput, 'Le role est obigatoire: veuillez choisir un role');
    }
    else {
        setSuccess(roleInput);
    }
}

function setError(element, errorMessage) {
    const parent = element.parentElement;
    if(parent.classList.contains('success')){
        parent.classList.remove('success');
    }
    parent.classList.add('error');
    const paragraph = parent.querySelector('p');
    paragraph.textContent = errorMessage;
}

function setSuccess(element){
    const parent = element.parentElement;
    if(parent.classList.contains('error')){
        parent.classList.remove('error');
    }
    parent.classList.add('success');
}

function isEmailValid(email){
    const reg =/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    return reg.test(email);
}

