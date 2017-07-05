window.onload = function(){

              var error1 = document.getElementById("er1");
              var error2 = document.getElementById("er2");
              var error3 = document.getElementById("er3");
              var error4 = document.getElementById("er4");
              var error5 = document.getElementById("er5");
              var error6 = document.getElementById("er6");
              var error7 = document.getElementById("er7");
              var error8 = document.getElementById("er8");
              var error9 = document.getElementById("er9");
              var error10 = document.getElementById("er10");

              var phone = document.getElementById("phone");
              var email = document.getElementById("email");
              var name = document.getElementById("name");
              var surname = document.getElementById("surname");
              var user = document.getElementById("user");
              var pass = document.getElementById("pass");
              var cpass = document.getElementById("cpass");

    // document.getElementById("myForm").addEventListener("submit", validacionJava);
    var form = document.getElementById("myForm");

  form.addEventListener("submit", function(e){

     if(!valJavaScript()){
       e.preventDefault();
        }
   });

    function valJavaScript()
        {
              if (name.value.lenght === 0) {
              name.style.border = "red solid 2px";
              error1.style.display = "block";
              return false;
              }
              if ( !/^[a-zA-Z()]*$/.test(name.value) ) {
              name.style.border = "red solid 2px";
              error7.style.display = "block";
              return false;
              }
              if (surname.value.lenght === 0) {
              surname.style.border = "red solid 2px";
              error2.style.display = "block";
              return false;
              }
              if ( !/^[a-zA-Z()]*$/.test(surname.value) ) {
              name.style.border = "red solid 2px";
              error8.style.display = "block";
              return false;
              }
              if (user.value.lenght === 0) {
              user.style.border = "red solid 2px";
              error3.style.display = "block";
              return false;
              }
              if (phone.value.lenght === 0 ) {
              phone.style.border = "red solid 2px";
              error4.style.display = "block";
              return false;
              }
              if (email.value.lenght === 0 ) {
              phone.style.border = "red solid 2px";
              error9.style.display = "block";
              return false;
              }
              if (!(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(email))) {
              email.style.border = "red solid 2px";
              error5.style.display = "block";
              return false;
              }
              if (pass.value.lenght === 0) {
              pass.style.border = "red solid 2px";
              error6.style.display = "block";
              return false;
              }
              if (cpass.value.lenght === 0) {
              cpass.style.border = "red solid 2px";
              error10.style.display = "block";
              return false;
              }
              return true;
          }

  }
