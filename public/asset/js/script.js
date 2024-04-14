const form = document.querySelector("form");
uField = form.querySelector(".username"),
uInput = uField.querySelector("input"),
pField = form.querySelector(".password"),
pInput = pField.querySelector("input");

form.onsubmit = (e)=>{
  e.preventDefault(); //preventing form submission
  //if username and password are blank then add shake class, otherwise call specified functions
  (uInput.value == "") ? uField.classList.add("shake", "error") : checkUsername();
  (pInput.value == "") ? pField.classList.add("shake", "error") : checkPass();

  setTimeout(()=>{ //remove shake class after 500ms
    uField.classList.remove("shake");
    pField.classList.remove("shake");
  }, 500);

  uInput.onkeyup = ()=>{checkUsername();} //call checkUsername function on username input keyup
  pInput.onkeyup = ()=>{checkPass();} //call checkPassword function on password input keyup

  function checkUsername(){ //checkUsername function
    if(uInput.value == ""){ //if username is empty, add error class and show error message
      uField.classList.add("error");
      uField.classList.remove("valid");
      let errorTxt = uField.querySelector(".error-txt");
      errorTxt.innerText = "Username can't be blank";
    }else{ //if username is not empty, remove error class and show valid
      uField.classList.remove("error");
      uField.classList.add("valid");
    }
  }

  function checkPass(){ //checkPass function
    if(pInput.value == ""){ //if password is empty, add error class
      pField.classList.add("error");
      pField.classList.remove("valid");
    }else{ //if password is not empty, remove error class and show valid
      pField.classList.remove("error");
      pField.classList.add("valid");
    }
  }

  //if uField and pField don't contain error class, user filled details properly
  if(!uField.classList.contains("error") && !pField.classList.contains("error")){
    window.location.href = form.getAttribute("action"); //redirect user to specified URL in action attribute of form tag
  }
}
