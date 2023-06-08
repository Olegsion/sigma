<? require_once 'vendor/components/head.php' ?>
<?
$sql = 'SELECT * FROM offers ORDER BY id DESC';
$stmt = $pdo->prepare($sql);
$stmt->execute([]);

$offers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?><? require_once 'vendor/components/auth_modal.php' ?>
    <main class="main">
      <div class="content">
        <div class="interactive">
          <div class="form-container">
            <h2 class="board-heading">Обратная связь</h2>
            <p class="board-desc">Сообщения от пользователей</p>
          </div>
        </div>
        <div class="posts">
          <?
          if (count($offers) == 0) {
            echo '<p style="width:85%;text-align:center;">Нет отправленных сообщений</p>';
          }
          for ($i = 0; $i < count($offers); $i++) {
            echo '
            <div class="post">
              <h2 class="board-name">' . $offers[$i]['theme'] . '</h2>';
            if ($offers[$i]['user'] == 'гость') {
              echo '<p>Гость</p>';
            } else {
              echo '<a class="post__author" href="profile.php?user=' . $offers[$i]['user'] . '">' . $offers[$i]['user'] . '</a>';
            }
            echo '<p>' . $offers[$i]['text'] . '</p>
            <a class="offer" href="vendor/scripts/offers/delete.php?id=' . $offers[$i]['id'] . '"><img class="delete" src="assets/images/close_icon.png" alt=""></a>
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
  </div>
</body>

</html>