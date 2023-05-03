const profile = document.querySelector(".circle");
const buttons = document.querySelector(".buttons");
const layout = document.querySelector(".layout");

profile.addEventListener("click", () => {
  buttons.style.display = "flex";
  layout.style.display = "flex";
});

layout.addEventListener("click", () => {
  if (buttons.style.display === "flex") {
    buttons.style.display = "none";
    layout.style.display = "none";
  }
});
