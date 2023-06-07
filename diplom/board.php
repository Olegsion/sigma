<? require_once 'vendor/components/head.php' ?>
<?
$page = $_REQUEST['page'];
$limit = 30;
$offset = ($page - 1) * $limit;

$sql = 'SELECT * FROM boards WHERE value=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['board']]);

$board = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM posts WHERE board=? AND ban <> 1 AND thread_id="self"';
$stmt = $pdo->prepare($sql);
$stmt->execute([$board['value']]);

$postsLength = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($page == 1) {
  $sql = 'SELECT *, DATE_FORMAT(`date`, "     %k:%i  %d.%m.%Y     ") as `date` FROM posts WHERE board=? AND thread_id=? AND ban<>1 AND thread_id="self" ORDER BY id DESC LIMIT ' . $limit;
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$board['value'], 'self']);

  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
  $sql = 'SELECT *, DATE_FORMAT(`date`, "     %k:%i  %d.%m.%Y     ") as `date` FROM posts WHERE board=? AND thread_id=? AND ban<>1  AND thread_id="self" ORDER BY id DESC LIMIT ' . $limit . ' OFFSET ' . $offset;
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$board['value'], 'self']);

  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?><? require_once 'vendor/components/auth_modal.php' ?>
    <main class="main">
      <div class="content">
        <div class="interactive">
          <div class="form-container">
            <h2 class="board-heading"><? echo $board['name'] ?></h2>
            <p class="board-desc"><? echo $board['description'] ?></p>
            <?
            if ($_SESSION['user']) {
              echo '
                  <form class="form post-create" action="vendor/scripts/posts/create.php?board=' . $board['value'] . '&thread_id=self" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <h2 class="form-heading">Создать тред</h2>
                    <div class="labels">
                      <label class="label">
                          <span class="label__desc">Текст</span>
                          <textarea class="input textarea" name="body" minlenght="6" maxlength="1500" autocomplete="off" required></textarea>
                      </label>
                      <label class="label file">
                          <span class="label__desc">Картинка</span>
                          <img class="preview" src="" />
                          <span class="button submit pic">Добавить</span>
                          <input class="input-image" hidden type="file" accept="image/jpeg, image/jpg, image/png, image/gif" name="pic" onchange="previewFile()">
                      </label>
                    </div>
                    <button class="button submit">Создать</button>
                  </form>
                ';
            }
            ?>
          </div>
        </div>
        <div class="posts">
          <?
          if (count($postsLength) > $limit) {
            $pages = ceil(count($postsLength) / $limit);
            $next = $page + 1;
            $prev = $page - 1;

            echo  '<div class="page-nav">';
            if ($page == 1) {
              echo '<a class="pages" href="board.php?board=' . $board['value'] . '&page=' . $next . '">Далее &#10095</a>';
            } else if ($page == $pages) {
              echo '<a class="pages" href="board.php?board=' . $board['value'] . '&page=' . $prev . '">&#10094; Назад</a>';
            } else {
              echo '
            <a class="pages" href="board.php?board=' . $board['value'] . '&page=' . $prev . '">&#10094; Назад</a>
            <a class="pages" href="board.php?board=' . $board['value'] . '&page=' . $next . '">Далее &#10095</a>
            ';
            }
            echo '</div>
            ';
          }
          ?>
          <?
          if (count($posts) == 0) {
            echo '<p style="width:85%;text-align:center;">Здесь пока нет постов</p>';
          }
          ?>
          <?
          for ($i = 0; $i < count($posts); $i++) {
            $sql = 'SELECT login, avatar FROM users WHERE login=?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$posts[$i]['author']]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            echo '
              <div id="' .  $posts[$i]['id'] . '" class="post">
              <div class="post__desc">  
                <div class="post__info">              
                  <a class="post__author" href="profile.php?user=' . $posts[$i]['author'] . '"><img class="circle" src="' . $user['avatar'] . '" alt=""></a>                 
                  <a class="post__author" href="profile.php?user=' . $posts[$i]['author'] . '">' . $posts[$i]['author'] . '</a>
                  <p class="post__date">' . $posts[$i]['date'] . '</p>
                  <a class="post__id" href="thread.php?thread=' . $posts[$i]['id'] . '">#' . $posts[$i]['id'] . '</a>
                </div>
              <div class="post__interactive">';
            // if ($_SESSION['user']['role'] === 'admin' ||  $_SESSION['user']['role'] == 'mastadmin') {
            //   echo '
            //           <a href="vendor/scripts/posts/ban.php?id=' . $posts[$i]['id'] . '&from=board.php?board=' . $board['value'] . '&page=' . $_REQUEST['page'] . '"><img class="delete" src="assets/images/ban.png" alt=""></a>
            //           ';
            // }
            if ($_SESSION['user']['role'] === 'admin' ||  $_SESSION['user']['role'] == 'mastadmin' || $_SESSION['user']['login'] == $user['login']) {
              echo '
                    <a href="vendor/scripts/posts/delete.php?id=' . $posts[$i]['id'] . '&from=board.php?board=' . $board['value'] . '&page=' . $_REQUEST['page'] . '"><img class="delete" src="assets/images/close_icon.png" alt=""></a>
                    ';
            }
            echo ' </div>
              </div>
              <div class="post__content">';
            if ($posts[$i]['pic']) {
              echo '<img class="post__image" src="' . $posts[$i]['pic'] . '" alt="">';
            }
            echo '<p class="post__body">' . $posts[$i]['body'] . '</p>
              </div>
            </div>
            ';
          }
          ?>
          <?
          if (count($postsLength) > $limit) {
            $pages = ceil(count($postsLength) / $limit);
            $next = $page + 1;
            $prev = $page - 1;

            echo  '<div class="page-nav">';
            if ($page == 1) {
              echo '<a class="pages" href="board.php?board=' . $board['value'] . '&page=' . $next . '">Далее &#10095</a>';
            } else if ($page == $pages) {
              echo '<a class="pages" href="board.php?board=' . $board['value'] . '&page=' . $prev . '">&#10094; Назад</a>';
            } else {
              echo '
            <a class="pages" href="board.php?board=' . $board['value'] . '&page=' . $prev . '">&#10094; Назад</a>
            <a class="pages" href="board.php?board=' . $board['value'] . '&page=' . $next . '">Далее &#10095;</a>
            ';
            }
            echo '</div>
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
    <script defer src="assets/js/previewImage.js"></script>
  </div>
</body>

</html>