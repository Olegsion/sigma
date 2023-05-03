const postSelect = document.querySelector("#postSelect");
const threadSelect = document.querySelector("#threadSelect");
const posts = document.querySelector("#posts");
const threads = document.querySelector("#threads");

postSelect.addEventListener("click", () => {
  posts.style.display = "flex";
  threads.style.display = "none";
  postSelect.classList.add("selected");
  threadSelect.classList.remove("selected");
});

threadSelect.addEventListener("click", () => {
  posts.style.display = "none";
  threads.style.display = "flex";
  postSelect.classList.remove("selected");
  threadSelect.classList.add("selected");
});
