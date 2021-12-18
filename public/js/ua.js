const slidePages = document.querySelector(".slide-pages");
const nextBtnFirsts = document.querySelector(".firstNexts");
const prevBtnSecs = document.querySelector(".prev-10");
const nextBtnSecs = document.querySelector(".next-10");
const prevBtnThirds = document.querySelector(".prev-20");
const nextBtnThirds = document.querySelector(".next-20");
const prevBtnFourths = document.querySelector(".prev-30");
const submitBtns = document.querySelector(".submits");
const progressTexts = document.querySelectorAll(".step p");
const progressChecks = document.querySelectorAll(".step .check");
const bullets = document.querySelectorAll(".step .bullet");
let currents = 1;

nextBtnFirsts.addEventListener("click", function(event){
  event.preventDefault();
  slidePages.style.marginLeft = "-25%";
  bullets[currents - 1].classList.add("active");
  progressChecks[currents - 1].classList.add("active");
  progressTexts[currents - 1].classList.add("active");
  currents += 1;
});
nextBtnSecs.addEventListener("click", function(event){
  event.preventDefault();
  slidePages.style.marginLeft = "-50%";
  bullets[currents - 1].classList.add("active");
  progressChecks[currents - 1].classList.add("active");
  progressTexts[currents - 1].classList.add("active");
  currents += 1;
});
nextBtnThirds.addEventListener("click", function(event){
  event.preventDefault();
  slidePages.style.marginLeft = "-75%";
  bullets[currents - 1].classList.add("active");
  progressChecks[currents - 1].classList.add("active");
  progressTexts[currents - 1].classList.add("active");
  currents += 1;
});
submitBtns.addEventListener("click", function(){
  bullets[currents - 1].classList.add("active");
  progressChecks[currents - 1].classList.add("active");
  progressTexts[currents - 1].classList.add("active");
  currents += 1;
  setTimeout(function(){
    alert("Your Form Successfully Signed up");
    location.reload();
  },800);
});

prevBtnSecs.addEventListener("click", function(event){
  event.preventDefault();
  slidePages.style.marginLeft = "0%";
  bullets[currents - 2].classList.remove("active");
  progressChecks[currents - 2].classList.remove("active");
  progressTexts[currents - 2].classList.remove("active");
  currents -= 1;
});
prevBtnThirds.addEventListener("click", function(event){
  event.preventDefault();
  slidePages.style.marginLeft = "-25%";
  bullets[currents - 2].classList.remove("active");
  progressChecks[currents - 2].classList.remove("active");
  progressTexts[currents - 2].classList.remove("active");
  currents -= 1;
});
prevBtnFourths.addEventListener("click", function(event){
  event.preventDefault();
  slidePages.style.marginLeft = "-50%";
  bullets[currents - 2].classList.remove("active");
  progressChecks[currents - 2].classList.remove("active");
  progressTexts[currents - 2].classList.remove("active");
  currents -= 1;
});
