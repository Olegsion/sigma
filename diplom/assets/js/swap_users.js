const usersSelect = document.querySelector("#usersSelect");
const adminsSelect = document.querySelector("#adminsSelect");
const users = document.querySelector("#users");
const admins = document.querySelector("#admins");

usersSelect.addEventListener("click", () => {
  users.style.display = "flex";
  admins.style.display = "none";
  usersSelect.classList.add("selected");
  adminsSelect.classList.remove("selected");
});

adminsSelect.addEventListener("click", () => {
  users.style.display = "none";
  admins.style.display = "flex";
  usersSelect.classList.remove("selected");
  adminsSelect.classList.add("selected");
});
