<? require_once 'vendor/components/head.php' ?>
<?
$sql = 'SELECT * FROM users WHERE login=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['user']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT *, DATE_FORMAT(`date`, "     %k:%i  %d.%m.%Y     ") as `date` FROM posts WHERE author=? AND thread_id="self"';
$stmt = $pdo->prepare($sql);
$stmt->execute([$user['login']]);

$threads = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT *, DATE_FORMAT(`date`, "     %k:%i  %d.%m.%Y     ") as `date` FROM posts WHERE author=? AND thread_id <> "self"';
$stmt = $pdo->prepare($sql);
$stmt->execute([$user['login']]);

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$postsCount = count($posts);
$threadsCount = count($threads);
$reg = (string) date('Y-m-d') - $user['reg'];
?>

<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?>
    <main class="main">
      <div class="content">
        <div class="profile">
          <div class="profile__avatar">
            <img class="avatar" src="<? echo $user['avatar'] ?>" alt="Картинка профиля">
          </div>
          <div class="profile__info">
            <p class="info__el login"><? echo $user['login']; ?></p>
            <p class="info__el">На форуме уже <? echo $reg;
                                              if (strlen($reg - 1) == '1') {
                                                echo ' день';
                                              }
                                              if (substr($reg, -1) || substr($reg, -2) || substr($reg, -3)) {
                                                echo ' дня';
                                              } else {
                                                echo ' дней';
                                              } ?></p>
            <p class="info__el">Создал <? echo $postsCount + $threadsCount ?> постов, из них <? echo $threadsCount ?> тредов</p>
          </div>
        </div>
        <div class="settings">
          <a class="settings__link selected" id="threadSelect">Треды</a>
          <a class="settings__link" id="postSelect">Посты</a>
        </div>
        <div id="threads" class="posts">
          <?
          for ($i = 0; $i < count($threads); $i++) {
            $sql = 'SELECT avatar FROM users WHERE login=?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$threads[$i]['author']]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            echo '
                  <div id="' .  $threads[$i]['id'] . '" class="post">
                    <div class="post__info">';
            if ($user['avatar'] != '') {
              echo ' <a class="post__author" href="profile.php?user=' . $threads[$i]['author'] . '"><img class="circle" src="' . $user['avatar'] . '" alt=""></a>';
            } else {
              echo ' <a class="post__author" href="profile.php?user=' . $threads[$i]['author'] . '"><img class="circle"src="assets/images/user_icon.png" alt="" class=""></a>';
            }
            echo '
                      <a class="post__author" href="profile.php?user=' . $threads[$i]['author'] . '">' . $threads[$i]['author'] . '</a>
                      <p class="post__date">' . $threads[$i]['date'] . '</p>
                      <a class="post__id" href="thread.php?id=' . $threads[$i]['id'] . '">#' . $threads[$i]['id'] . '</a>
                    </div>
                    <div class="post__content">';
            if ($threads[$i]['pic']) {
              echo '<img class="post__image" src="' . $threads[$i]['pic'] . '" alt="">';
            }
            echo '<p class="post__body">' . $threads[$i]['body'] . '</p>
                    </div>
                  </div>
                  ';
          }
          ?>
        </div>
        <div id="posts" class="posts">
          <?
          for ($i = 0; $i < count($posts); $i++) {
            $sql = 'SELECT avatar FROM users WHERE login=?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$posts[$i]['author']]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            echo '
            <div id="' .  $posts[$i]['id'] . '" class="post">
            <div class="post__info">';
            if ($user['avatar'] != '') {
              echo '<a class="post__author" href="profile.php?user=' . $posts[$i]['author'] . '"><img class="circle" src="' . $user['avatar'] . '" alt=""></a>';
            } else {
              echo '<a class="post__author" href="profile.php?user=' . $posts[$i]['author'] . '"><img class="circle" src="assets/images/user_icon.png" alt="" class=""></a>';
            }
            echo '
                <a class="post__author" href="profile.php?user=' . $posts[$i]['author'] . '">' . $posts[$i]['author'] . '</a>
                <p class="post__date">' . $posts[$i]['date'] . '</p>
                <a class="post__id" href="thread.php?id=' . $posts[$i]['thread_id'] . '">#' . $posts[$i]['id'] . '</a>
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
      <script src="assets/js/transition.js"></script>
      <script src="assets/js/swap.js"></script>
    </main>
  </div>
</body>

</html>