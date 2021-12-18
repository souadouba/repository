
var a = 2;
function my(){
 var y = 	document.getElementById("annonces_images_1").files[0];
 var currentimage2  = document.getElementById("changeimage2");
var reader =   new FileReader();
 reader.onload = function(){
 if(a == "2"){
currentimage2.src = reader.result;
}
}
reader.readAsDataURL(y);
}