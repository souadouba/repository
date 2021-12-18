
const steps = Array.from(document.querySelectorAll(".but .step2"));
const nextBtn2 = document.querySelectorAll("form .next-btn");
const prevBtn2 = document.querySelectorAll("form .previous-btn");
const form2 = document.querySelector(".but");

nextBtn2.forEach((label) => {
  label.addEventListener("click", () => {
    changeStep("next");
  });
});
prevBtn2.forEach((label) => {
  label.addEventListener("click", () => {
    changeStep("prev");
  });
});

function changeStep(btn) {
  let index = 0;
  const active = document.querySelector(".active");
  index = steps.indexOf(active);
  steps[index].classList.remove("active");
  if (btn === "next") {
    index++;
  } else if (btn === "prev") {
    index=0;
  }
  steps[index].classList.add("active");
}