/* -------------------------Formulaire d'inscription---------------------- */ 
  document.getElementById("form").addEventListener("submit", function(e){  
       var error1, error2;   
          
      var email = document.getElementById("email");    
        var password = document.getElementById("password");    
           

         if (!email.value.trim()) {      
               error1 = "Veillez renseigner saisir un mail correct";     }  
               if (error1)
                {         e.preventDefault();       
                      document.getElementById("error1").innerHTML = error1;        
                 return false;    
                 }
                 else
                 {         document.getElementById("error1").innerHTML = "";  
                   }   
                    if (!password.value.trim())
                     {         error2 = "Vérifier votre mot de passe";   
                      }     if (error2) 
                      {         e.preventDefault();     
                            document.getElementById("error2").innerHTML = error2;
                        return false;
                        
                    } 


  });
