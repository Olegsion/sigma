window.addEventListener("scroll", () => {
  const scroll = document.querySelector(".scroll");
  const top = document.querySelector("#top");
  const bottom = document.querySelector("#bottom");
  if (window.pageYOffset > 300) {
    scroll.style.display = "flex";
  } else {
    scroll.style.display = "none";
  }
  top.addEventListener("click", () => {
    window.scrollTo(0, 0);
  });
  bottom.addEventListener("click", () => {
    window.scrollTo(0, document.body.scrollHeight);
  });
});
