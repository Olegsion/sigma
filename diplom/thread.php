<? require_once 'vendor/components/head.php' ?>
<?
$sql = 'SELECT *, DATE_FORMAT(`date`, "     %k:%i  %d.%m.%Y     ") as `date`FROM posts WHERE id=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['thread']]);

$thread = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM boards WHERE value=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$thread['board']]);

$board = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT *, DATE_FORMAT(`date`, "     %k:%i  %d.%m.%Y     ") as `date` FROM posts WHERE thread_id=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$thread['id']]);

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT avatar FROM users WHERE login=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$thread['author']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?>
    <main class="main">
      <div class="content">
        <div class="interactive">
          <div class="form-container">
            <h2 class="board-heading"><? echo $board['name'] ?></h2>
            <p class="board-desc"><? echo $board['description'] ?></p>
            <?
            if ($_SESSION['user']) {
              echo '
                  <form class="form post-create" action="vendor/scripts/posts/create.php?board=' . $thread['board'] . '&thread_id=' . $thread['id'] . '&from=thread.php?thread=' . $thread['id'] . '" method="POST" enctype="multipart/form-data" autocomplete="off">
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
          </div>
        </div>
        <div class="posts">
          <div id="<? echo  $thread['id'] ?>" class="post">
            <div class="post__desc">
              <div class="post__info">
                <?
                echo ' <a class="post__author" href="profile.php?user=' .  $thread['author'] . '"><img class="circle" src="' . $user['avatar'] . '" alt=""></a>';
                ?>
                <a class="post__author" href="profile.php?user=<? echo  $thread['author'] ?>"><? echo  $thread['author'] ?></a>
                <p class="post__date"><? echo  $thread['date'] ?></p>
                <a class="post__id">#<? echo  $thread['id'] ?></a>
              </div>
              <div class="post__interactive">
                <?
                if ($_SESSION['user']['role'] == 'admin' ||  $_SESSION['user']['role'] == 'mastadmin') {
                  echo '<a href="vendor/scripts/posts/delete.php?id=' . $thread['id'] . '&from=board.php?board=' . $board['value'] . '"><img class="delete" src="assets/images/close_icon.png" alt=""></a>';
                }
                ?>
              </div>
            </div>
            <div class="post__content">
              <?
              if ($thread['pic']) {
                echo '<img class="post__image" src="' . $thread['pic'] . '" alt="">';
              }
              ?>
              <p class="post__body"><? echo  $thread['body'] ?></p>
            </div>
          </div>
          <?
          for ($i = 0; $i < count($posts); $i++) {
            $sql = 'SELECT avatar FROM users WHERE login=?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$posts[$i]['author']]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            echo '
            <div id="' .  $posts[$i]['id'] . '" class="post">
            <div class="post__desc">
              <div class="post__info">';

            echo '<a class="post__author" href="profile.php?user=' . $posts[$i]['author'] . '"><img class="circle" src="' . $user['avatar'] . '" alt=""></a>';

            echo '
                <a class="post__author" href="profile.php?user=' . $posts[$i]['author'] . '">' . $posts[$i]['author'] . '</a>
                <p class="post__date">' . $posts[$i]['date'] . '</p>
                <a class="post__id">#' . $posts[$i]['id'] . '</a>
              </div>
              <div class="post__interactive">';
            if ($_SESSION['user']['role'] == 'admin' ||  $_SESSION['user']['role'] == 'mastadmin') {
              echo '<a href="vendor/scripts/posts/delete.php?id=' . $posts[$i]['id'] . '&from=thread.php?thread=' . $thread['id'] . '"><img class="delete" src="assets/images/close_icon.png" alt=""></a>';
            }
            echo '</div> 
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
        </div>
      </div>
      <? require_once 'vendor/components/nav.php' ?>
    </main>
    <?
    $page = basename(__FILE__);
    require_once 'vendor/components/error_form.php';
    ?>
    <script defer src="assets/js/previewImage.js"></script>
    <script defer src="assets/js/reply.js"></script>
  </div>
</body>

</html>