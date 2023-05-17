const modal = document.querySelector(".auth_modal");
const modals = document.querySelectorAll(".modal");
const closeIcon = document.querySelector(".close-icon");

closeIcon.addEventListener("click", () => {
  localStorage.setItem("dont_show", 1);
  modal.style.display = "none";
  layout.style.display = "none";
});

modals.forEach((modal) => {
  modal.addEventListener("click", () => {
    localStorage.setItem("dont_show", 1);
    modal.style.display = "none";
    layout.style.display = "none";
  });
});

if (localStorage.getItem("dont_show")) {
  layout.style.display = "none";
  modal.style.display = "none";
} else {
  layout.style.display = "flex";
  modal.style.display = "flex";
}
