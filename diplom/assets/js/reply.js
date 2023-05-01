let idArr = document.querySelectorAll(".post__id");
let replyArr = document.querySelectorAll(".reply");
let postsArr = document.querySelectorAll(".post");
let textarea = document.querySelector(".textarea");

idArr.forEach((id) => {
  id.addEventListener("click", () => {
    let link = id.innerHTML;
    textarea.value += '<a class="reply">' + link + "</a>";
    window.scrollTo(0, 0);
  });
});

replyArr.forEach((reply) => {
  reply.addEventListener("click", () => {
    let rep = reply.innerHTML;
    rep = rep.replace("#", "");
    postsArr.forEach((post) => {
      if (post.id == rep) {
        post.style.animation = "light 2s ease";
        post.scrollIntoView({ block: "center" });
        setTimeout(() => {
          post.style.animation = "";
        }, 2000);
      }
    });
  });
});
