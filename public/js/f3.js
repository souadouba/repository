
var c = 3;
function myf(){
 var z = 	document.getElementById("annonces_images_2").files[0];
 var currentimage3  = document.getElementById("changeimage3");
var reader =   new FileReader();
 reader.onload = function(){
 if(c == "3"){
currentimage3.src = reader.result;
}
}
reader.readAsDataURL(z);
}