function valJavaScript()
{
  if (firstname.value == 0) {
    firstname.style.border = "red solid 2px";
    error1.style.display = "block";
    return false;
  }else {
    error1.style.display = "none";
    firstname.style.border = "1px solid rgba(0,0,0,0.2)";
  }
  if ( !/^[a-zA-Z()]*$/.test(firstname.value) ) {
    firstname.style.border = "red solid 2px";
    error7.style.display = "block";
    return false;
  }
  else {
    error7.style.display = "none";
    firstname.style.border = "1px solid rgba(0,0,0,0.2)";
  }
  if (surname.value == 0) {
    surname.style.border = "red solid 2px";
    error2.style.display = "block";
    return false;
  }else {
    error2.style.display = "none";
    surname.style.border = "1px solid rgba(0,0,0,0.2)";
  }
  if ( !/^[a-zA-Z()]*$/.test(surname.value) ) {
    surname.style.border = "red solid 2px";
    error8.style.display = "block";
    return false;
  }else {
    error8.style.display = "none";
    surname.style.border = "1px solid rgba(0,0,0,0.2)";
  }
  if (user.value == 0) {
    user.style.border = "red solid 2px";
    error3.style.display = "block";
    return false;
  }else {
    error3.style.display = "none";
    user.style.border = "1px solid rgba(0,0,0,0.2)";
  }
  if (phone.value == 0 ) {
    phone.style.border = "red solid 2px";
    error4.style.display = "block";
    return false;
  }else {
    error4.style.display = "none";
    phone.style.border = "1px solid rgba(0,0,0,0.2)";
  }
  if (email.value == 0 ) {
    email.style.border = "red solid 2px";
    error5.style.display = "block";
    return false;
  }else {
    error5.style.display = "none";
    email.style.border = "1px solid rgba(0,0,0,0.2)";
  }
  onlyemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if (onlyemail.test(email)) {
    email.style.border = "red solid 2px";
    error9.style.display = "block";
    return false;
  }else {
    error9.style.display = "none";
    email.style.border = "1px solid rgba(0,0,0,0.2)";
  }
  if (pass.value == 0) {
    pass.style.border = "red solid 2px";
    error6.style.display = "block";
    return false;
  }else {
    error6.style.display = "none";
    pass.style.border = "1px solid rgba(0,0,0,0.2)";
  }
  if (cpass.value == 0) {
    cpass.style.border = "red solid 2px";
    error10.style.display = "block";
    return false;
  }else {
    error10.style.display = "none";
    cpass.style.border = "1px solid rgba(0,0,0,0.2)";
  }
  return true;
}
var error1 = "";
var error2 = "";
var error3 = "";
var error4 = "";
var error5 = "";
var error6 = "";
var error7 = "";
var error8 = "";
var error9 = "";
var error10 = "";

var phone = "";
var email = "";
var firstname = "";
var surname = "";
var user = "";
var pass = "";
var cpass = "";

window.onload = function(){


              error1 = document.getElementById("er1");
              error2 = document.getElementById("er2");
              error3 = document.getElementById("er3");
              error4 = document.getElementById("er4");
              error5 = document.getElementById("er5");
              error6 = document.getElementById("er6");
              error7 = document.getElementById("er7");
              error8 = document.getElementById("er8");
              error9 = document.getElementById("er9");
              error10 = document.getElementById("er10");

              phone = document.getElementById("phone");
              email = document.getElementById("email");
              firstname = document.getElementById("name");
              surname = document.getElementById("surname");
              user = document.getElementById("user");
              pass = document.getElementById("pass");
              cpass = document.getElementById("cpass");

    // document.getElementById("myForm").addEventListener("submit", validacionJava);
    var form = document.getElementById("myForm");


          form.addEventListener("submit", function(e){
            if(!valJavaScript()){
              e.preventDefault();
            }
          });

  }
