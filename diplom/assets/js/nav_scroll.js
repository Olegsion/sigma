window.addEventListener("scroll", () => {
  let nav = document.querySelector(".nav");
  let header = document.querySelector(".header");

  let head = header.getBoundingClientRect();
  if (window.pageYOffset > 0) {
    nav.style.height = "100%";
  }
  if (window.pageYOffset > head.bottom + 70) {
    nav.style.top = "0";
    nav.style.position = "fixed";
  } else {
    nav.style.top = "10%";
    nav.style.position = "absolute";
  }
});
