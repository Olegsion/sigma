<? require_once 'vendor/components/head.php' ?>
<?
if ($_SESSION['user']['role'] != 'admin' && $_SESSION['user']['role'] != 'mastadmin') {
  header('Location: /');
}

$sql = 'SELECT * FROM users WHERE role="user"';
$stmt = $pdo->prepare($sql);
$stmt->execute([]);

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM users WHERE role="admin"';
$stmt = $pdo->prepare($sql);
$stmt->execute([]);

$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?>
    <main class="main">
      <div class="content">
        <div class="interactive">
          <div class="info-block">
            <h1 class="board-heading">Список пользователей</h1>
          </div>
          <?
          if ($_SESSION['user']['role'] == 'mastadmin') {
            echo '
            <div class="settings">
            <a class="settings__link selected" id="usersSelect">Пользователи</a>
            <a class="settings__link" id="adminsSelect">Админы</a>
          </div>
            ';
          }
          ?>
        </div>
        <div class="users-container" id="users">
          <?
          for ($i = 0; $i < count($users); $i++) {
            echo '<div class="user-block">
                   <div class="user-info">
                    <a class="user__avatar" href="profile.php?user=' . $users[$i]['login'] . '"><img class="circle" src="' . $users[$i]['avatar'] . '" alt=""></a>
                    <a class="user__login" href="profile.php?user=' . $users[$i]['login'] . '">' . $users[$i]['login'] . '</a>
                   </div>
                   <div class="buttons-block">
                   <a href="vendor/scripts/users/delete.php?user=' . $users[$i]['login'] . '&from=users.php"><button class="button">Забанить</button></a>';
            if ($_SESSION['user']['role'] == 'mastadmin') {
              echo '<a href="vendor/scripts/users/admin.php?user=' . $admins[$i]['login'] . '&from=users.php"><button class="button">Дать админку</button></a>';
            }
            echo '</div>
                  </div>';
          }
          ?>
        </div>
        <div class="users-container" id="admins">
          <?
          if ($_SESSION['user']['role'] == 'mastadmin') {
            for ($i = 0; $i < count($admins); $i++) {
              echo '<div class="user-block">
                   <div class="user-info">
                    <a class="user__avatar" href="profile.php?user=' . $admins[$i]['login'] . '"><img class="circle" src="' . $admins[$i]['avatar'] . '" alt=""></a>
                    <a class="user__login" href="profile.php?user=' . $admins[$i]['login'] . '">' . $admins[$i]['login'] . '</a>
                   </div>
                   <div class="buttons-block">
                   <a href="vendor/scripts/users/delete.php?user=' . $admins[$i]['login'] . '&from=users.php"><button class="button">Забанить</button></a>
                   <a href="vendor/scripts/users/disadmin.php?user=' . $admins[$i]['login'] . '&from=users.php"><button class="button">Лишить админки</button></a>
                  </div>
                  </div>';
            }
          }
          ?>
        </div>
      </div>
      <? require_once 'vendor/components/nav.php' ?>
      <script defer src="assets/js/swap_users.js"></script>
    </main>
  </div>
</body>

</html>