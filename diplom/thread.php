<? require_once 'vendor/components/head.php' ?>
<?
$sql = 'SELECT *, DATE_FORMAT(`date`, "     %k:%i  %d.%m.%Y     ") as `date`FROM posts WHERE id=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$thread = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT *, DATE_FORMAT(`date`, "     %k:%i  %d.%m.%Y     ") as `date` FROM posts WHERE thread_id=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$thread['id']]);

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?>
    <main class="main">
      <div class="content">
        <?
        if ($_SESSION['user']) {
          echo '
                  <form class="form post-create" action="vendor/scripts/posts/create.php?board=' . $thread['board'] . '&thread_id=' . $thread['id'] . '&from=thread.php?id=' . $thread['id'] . '" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <h2 class="form-heading">Ответить в тред</h2>
                    <div class="labels">
                      <label class="label">
                          <span class="label__desc">Текст</span>
                          <textarea class="input textarea" name="body" maxlength="1500" autocomplete="off" required></textarea>
                      </label>
                      <label class="label file">
                          <span class="label__desc">Картинка</span>
                          <img class="preview" src="" />
                          <span class="button submit">Добавить</span>
                          <input class="input-image" hidden type="file" accept="image/jpeg, image/jpg, image/png, image/gif" name="pic" onchange="previewFile()">
                      </label>
                    </div>
                    <button class="button submit">Отправить</button>
                  </form>
                ';
        }
        ?>
        <div class="posts">
          <div id="<? echo  $thread['id'] ?>" class="post">
            <div class="post__info">
              <a class="post__author" href="profile.php?user=<? echo  $thread['author'] ?>"><? echo  $thread['author'] ?></a>
              <p class="post__date"><? echo  $thread['date'] ?></p>
              <a class="post__id">#<? echo  $thread['id'] ?></a>
            </div>
            <div class="post__content">
              <img class="post__image" src="<? echo  $thread['pic'] ?>" alt="">
              <p class="post__body"><? echo  $thread['body'] ?></p>
            </div>
          </div>
          <?
          for ($i = 0; $i < count($posts); $i++) {
            echo '
            <div id="' .  $posts[$i]['id'] . '" class="post">
              <div class="post__info">
                <a class="post__author" href="profile.php?user=' . $posts[$i]['author'] . '">' . $posts[$i]['author'] . '</a>
                <p class="post__date">' . $posts[$i]['date'] . '</p>
                <a class="post__id">#' . $posts[$i]['id'] . '</a>
              </div>
              <div class="post__content"> 
                <img class="post__image" src="' . $posts[$i]['pic'] . '" alt="">
                <p class="post__body">' . $posts[$i]['body'] . '</p>
              </div>
            </div>
            ';
          }
          ?>
        </div>
      </div>
      <? require_once 'vendor/components/nav.php' ?>
    </main>
    <?
    $page = basename(__FILE__);
    require_once 'vendor/components/error_form.php';
    ?>
    <?
    if ($_SESSION['user'] != NULL) {
      echo '
      <script defer src="assets/js/previewImage.js"></script>
      <script defer src="assets/js/reply.js"></script>
      ';
    }
    ?>
  </div>
</body>

</html>