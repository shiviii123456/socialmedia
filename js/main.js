function preview(){
    var input = document.getElementById("chooseimg");
    var outer_div = document.getElementById('post_preview');
    var prdiv = document.getElementById('preview_div');
    var freader = new FileReader();

    freader.readAsDataURL(input.files[0]);
    freader.onloadend = function(event){
               prdiv.innerHTML="";
               prdiv.style.background = "url("+event.target.result+")";
               outer_div.classList.remove("d-none");

           }
}