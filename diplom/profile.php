<?
require_once 'vendor/components/head.php' ?>
<?
$sql = 'SELECT *, DATE_FORMAT(`reg`, "     %d.%m.%Y     ") as `reg` FROM users WHERE login=? AND ban<>1';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['user']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT *, DATE_FORMAT(`date`, "     %k:%i  %d.%m.%Y     ") as `date` FROM posts WHERE author=? AND thread_id="self" AND ban<>1 ORDER BY id DESC';
$stmt = $pdo->prepare($sql);
$stmt->execute([$user['login']]);

$threads = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT *, DATE_FORMAT(`date`, "     %k:%i  %d.%m.%Y     ") as `date` FROM posts WHERE author=? AND thread_id<>"self" AND ban<>1 ORDER BY id DESC';
$stmt = $pdo->prepare($sql);
$stmt->execute([$user['login']]);

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$postsCount = count($posts);
$threadsCount = count($threads);
$reg = new DateTime($user['reg']);
$today = new DateTime('now');
$diff = $reg->diff($today);
$days = ['11', '12', '13', '14', '15', '16', '17', '18', '19']
?>


<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?><? require_once 'vendor/components/auth_modal.php' ?>
    <main class="main">
      <div class="content">
        <div class="profile">
          <div class="profile__avatar">
            <img class="avatar" src="<? echo $user['avatar'] ?>" alt="Картинка профиля">
          </div>
          <div class="profile__info">
            <p class="info__el login"><? echo $user['login']; ?></p>
            <p class="info__el">На форуме уже <? echo $diff->days;
                                              for ($i = 0; $i < count($days); $i++) {
                                                if (substr($diff->days, -2) == $days[$i]) {
                                                  $day = ' дней';
                                                  echo $day;
                                                }
                                              }
                                              if ($day == '') {
                                                if (substr($diff->days, -1) == '1') {
                                                  $day = ' день';
                                                  echo  $day;
                                                } else if (substr($diff->days, -1) == '2' || substr($diff->days, -1) == '3' || substr($diff->days, -1) == '4') {
                                                  $day = ' дня';
                                                  echo $day;
                                                } else {
                                                  $day = ' дней';
                                                  echo $day;
                                                }
                                              }
                                              ?>, начиная с <? echo $user['reg'] ?></p>
            <p class="info__el">Создал <? echo $postsCount + $threadsCount ?> постов, из них <? echo $threadsCount ?> тредов</p>
            <?
            if ($_SESSION['user']['login'] == $user['login']) {
              echo '<a href="profile_edit.php?user=' . $user['login'] . '"><button class="button">Изменить профиль</button></a>';
            }
            if ($_SESSION['user']['login'] == $user['login'] || $_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'mastadmin') {
              echo '<a href="vendor/scripts/users/delete.php?user=' . $user['login'] . '"><button class="button">Удалить профиль</button></a>';
            }
            ?>
          </div>
        </div>
        <div class="settings">
          <a class="settings__link selected" id="threadSelect">Треды</a>
          <a class="settings__link" id="postSelect">Посты</a>
        </div>
        <div id="threads" class="posts">
          <?
          if (count($threads) == 0) {
            echo '<p style="width:85%;text-align:center;"</p>Здесь пока нет тредов</p>';
          }
          ?>
          <?
          for ($i = 0; $i < count($threads); $i++) {
            $sql = 'SELECT login, avatar FROM users WHERE login=?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$threads[$i]['author']]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            echo '
                  <div id="' .  $threads[$i]['id'] . '" class="post">
                  <div class="post__desc">  
                    <div class="post__info">';
            if ($user['avatar'] != '') {
              echo ' <a class="post__author" href="profile.php?user=' . $threads[$i]['author'] . '"><img class="circle" src="' . $user['avatar'] . '" alt=""></a>';
            } else {
              echo ' <a class="post__author" href="profile.php?user=' . $threads[$i]['author'] . '"><img class="circle"src="assets/images/user_icon.png" alt="" class=""></a>';
            }
            echo '
              <a class="post__author" href="profile.php?user=' . $threads[$i]['author'] . '">' . $threads[$i]['author'] . '</a>
              <p class="post__date">' . $threads[$i]['date'] . '</p>
              <a class="post__id" href="thread.php?thread=' . $threads[$i]['id'] . '">#' . $threads[$i]['id'] . '</a>
              </div>
              <div class="post__interactive">';
            if ($_SESSION['user']['role'] == 'admin' ||  $_SESSION['user']['role'] == 'mastadmin' || $_SESSION['user']['login'] == $user['login']) {
              echo '
                  <a href="vendor/scripts/posts/delete.php?id=' . $threads[$i]['id'] . '&from=profile.php?user=' . $user['login'] . '"><img class="delete" src="assets/images/close_icon.png" alt=""></a>
                ';
            }
            echo ' </div>      
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
          if (count($posts) == 0) {
            echo '<p style="width:85%;text-align:center;"</p>Здесь пока нет постов</p>';
          }
          ?>
          <?
          for ($i = 0; $i < count($posts); $i++) {
            $sql = 'SELECT avatar, login FROM users WHERE login=?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$posts[$i]['author']]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            echo '
            <div id="' .  $posts[$i]['id'] . '" class="post">
            <div class="post__desc">  
              <div class="post__info">';
            if ($user['avatar'] != '') {
              echo ' <a class="post__author" href="profile.php?user=' . $posts[$i]['author'] . '"><img class="circle" src="' . $user['avatar'] . '" alt=""></a>';
            } else {
              echo ' <a class="post__author" href="profile.php?user=' . $posts[$i]['author'] . '"><img class="circle"src="assets/images/user_icon.png" alt="" class=""></a>';
            }
            echo '
        <a class="post__author" href="profile.php?user=' . $posts[$i]['author'] . '">' . $posts[$i]['author'] . '</a>
        <p class="post__date">' . $posts[$i]['date'] . '</p>
        <a class="post__id" href="thread.php?thread=' . $posts[$i]['thread_id'] . '">#' . $posts[$i]['id'] . '</a>
        </div>
        <div class="post__interactive">';
            if ($_SESSION['user']['role'] == 'admin' ||  $_SESSION['user']['role'] == 'mastadmin' || $_SESSION['user']['login'] == $user['login']) {
              echo '
            <a href="vendor/scripts/posts/delete.php?id=' . $posts[$i]['id'] . '&from=profile.php?user=' . $user['login'] . '"><img class="delete" src="assets/images/close_icon.png" alt=""></a>
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
        </div>
      </div>
      <?
      require_once 'vendor/components/nav.php';

      ?>
      <script src="assets/js/transition.js"></script>
      <script src="assets/js/swap_posts.js"></script>
    </main>
  </div>
</body>

</html>