

const submitit = document.getElementById('myButton');

submitit.addEventListener("click",function(event){
    event.preventDefault(); // prevents from submitting the form directly.

    const emailid = document.getElementById('email_id');
    const password = document.getElementById('password');
if (emailid.value == "texephyrAdmin" && password.value == "Tex@admin") {
        // window.location.href=window.location.origin+"/new.html";   both are correct
        window.location.pathname = "events.php";
      }

  else{
    window.location.pathname = "index.html";
  }
    });





