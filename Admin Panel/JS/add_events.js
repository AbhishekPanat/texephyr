// const actualBtn = document.getElementById('actual_btn');

// const fileChosen = document.getElementById('file_chosen');

// actualBtn.addEventListener(onchange, function(){
//   // fileChosen.textContent = this.files[0].name;
//   // console.log(this.files);
//   // fileChosen.value=actualBtn.value.split('.')[0];
//   // extension.value=inputfile.value.split('.')[1];
// });

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


function getoutput(){
  outputfile.value=inputfile.value.split('.')[0];
  extension.value=inputfile.value.split('.')[1];}