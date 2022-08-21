//alert("deneme");
//start project
var close= document.getElementById("close");
var imageContanier= document.getElementById("imageContanier");
var imageContentİmg=document.getElementById("imageContentİmg");
var imgSelect= document.getElementById("imgSelect");

close.onclick = function (){
    imageContanier.style.display ="none";
}

function imageUrl(url){
    imageContentİmg.src= "http://localhost/live-message/public/chatMessageİmg/"+url;
    imageContanier.style.display ="block";
    imageContanier.style.display ="flex";
    imageContanier.style.justifyContent ="center";
    imageContanier.style.alignItems ="center";
}
document.getElementById('loaderContanier').style.display= "flex";
document.getElementById('loaderContanier').style.justifyContent= "center";
document.getElementById('loaderContanier').style.alignItems = "center";


/*$(document).ready(function(){
   $("#messageScreen").on("scrool",function (){
       console.log($(this).scrollTop());
   }) ;
});*/
