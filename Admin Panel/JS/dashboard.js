let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");

btn.onclick = function(){
    sidebar.classList.toggle("active");
}

var reload_page = document.getElementById('log_out');
reload_page.addEventListener("click",function(event){
    window.location.pathname = "index.html";
    // reload_page.onclick(location.reload());
    location.replace("index.html");
    sessionStorage.clear();
    
});


