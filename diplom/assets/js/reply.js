let idArr = document.querySelectorAll(".post__id");
let replyArr = document.querySelectorAll(".reply");
let postsArr = document.querySelectorAll(".post");
let textarea = document.querySelector(".textarea");

idArr.forEach((id) => {
  id.addEventListener("click", () => {
    let link = id.innerHTML;
    textarea.value += "<span class='reply'>" + link + "</span>";
    window.scrollTo(0, 0);
  });
});

console.log(postsArr);
replyArr.forEach((reply) => {
  reply.addEventListener("click", () => {
    let i = 0;
    let rep = reply.innerHTML;
    rep = rep.replace("#", "");
    postsArr.forEach((post) => {
      if (post.id == rep) {
        post.style.animation = "light 2s ease";
        post.scrollIntoView({ block: "center" });
        setTimeout(() => {
          post.style.animation = "";
        }, 2000);
      } else {
        i += 1;
      }
    });
    if (i == postsArr.length) {
      document.body.innerHTML += `
      <div class="layout" style="display:block;"></div>
      <div class="error-messege">
      <h1 class="error-heading">Ошибка!</h1>
      <p class="error-desc">Пост не найден</p>
      <a href="vendor/scripts/clear.php?from=`+ window.location.href.split('/').pop() +`"><button class="button">Понятно</button></a>
      <a href="vendor/scripts/clear.php?from=`+ window.location.href.split('/').pop() +`"><img class="close-icon" src="./assets/images/close_icon.png" alt=""></a>
      </div>
      `;
    }
  });
});
