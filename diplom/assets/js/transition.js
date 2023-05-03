const postsId = document.querySelectorAll(".post__id");

postsId.forEach((id) => {
  id.addEventListener("click", () => {
    let rep = id.innerHTML;
    console.log(rep);
    rep = rep.replace("#", "");
    localStorage.setItem("scrollTo", rep);
  });
});
