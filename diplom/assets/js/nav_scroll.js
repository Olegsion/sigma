window.addEventListener("scroll", () => {
  let nav = document.querySelector(".nav");
  let header = document.querySelector(".header");

  let head = header.getBoundingClientRect();

  console.log(window.pageYOffset);
  console.log(head.bottom);
  if (window.pageYOffset > head.bottom) {
    nav.style.top = "0";
  } else {
    nav.style.top = "10%";
  }
});
