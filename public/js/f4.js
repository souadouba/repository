
var b = 4;
function myfu(){
 var w = 	document.getElementById("annonces_images_3").files[0];
 var currentimage4  = document.getElementById("changeimage4");
var reader =   new FileReader();
 reader.onload = function(){
 if(b == "4"){
currentimage4.src = reader.result;
}
}
reader.readAsDataURL(w);
}