<?
require_once 'vendor/components/head.php';
$sql = 'SELECT * FROM users LIMIT 5';
$stmt = $pdo->prepare($sql);
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?><? require_once 'vendor/components/auth_modal.php' ?>
    <main class="main">
      <div class="content">
        <div class="salute">
          <h1 class="board-heading">Добро пожаловать на наш форум!</h1>
          <img class="main-logo" src="assets/images/logo.png" alt="">
          <p class="salute__text">
            Здесь, на главной странице, вы найдете все необходимые сведения о нашей платформе, чтобы максимально комфортно и эффективно проводить время в нашем сообществе.
          </p>
          <p class="salute__text">
            Что такое MooChan? Это место, где вы можете делиться мнениями и обсуждать волнующие вас вопросы и многое другое. Наша платформа предоставляет возможность объединить людей с общими интересами, создавая пространство для творчества, общения и взаимного вдохновения. Здесь вы сможете найти тематические разделы, каждый из которых посвящен определенной области: науки, искусству, развлечениям и многому другому. Вы можете перемещаться по разделам, кликая по ссылкам на панели в правой части страницы.
          </p>

          <h1 class="board-heading">Руководство пользователя:</h1>
          <p class="salute__text">
            <span class="accent">Создайте аккаунт:</span><br />
            <img class="main-logo" src="assets/images/guide/reg.png"><br />
            Чтобы получить доступ ко всем функциям форума, создайте свой аккаунт. Это займет всего несколько минут, а если вам что-то не понравится вы всегда сможете отредактировать или удалить его.
          </p>
          <p class="salute__text">
            <span class="accent">Исследуйте разделы:</span><br />
            Ознакомьтесь с различными разделами, доступными на форуме. Просмотрите их список в навигационной панели в правой части страницы и выберите тот, который вам интересен, и начинайте погружаться в увлекательный мир обсуждений.
          </p>
          <p class="salute__text">
            <span class="accent">Участвуйте в обсуждениях:</span><br />
            Общайтесь с другими участниками форума. Загружайте изображения, которые вы считаете уникальными, интересными или вдохновляющими.
            Участвуйте в обсуждениях, оставляйте комментарии и задавайте вопросы. Вы можете обмениваться мнениями и идеями с другими участниками, создавая взаимодействие и поддерживая дружественную атмосферу на форуме.<br /><br />
            <img class="main-logo" src="assets/images/guide/id.png"><br />
            Нажмите на id поста, чтоб ответить на него или перейти к ветке обсуждения.
          </p>
          <p class="salute__text">
            <span class="accent">Соблюдайте правила:</span><br />
            Уважайте <a class="accent" href="rules.php">правила</a> нашего сообщества, чтобы создать безопасную и приятную обстановку для всех участников. Не забывайте о том, что взаимное уважение и толерантность – основа нашего сообщества.
            Мы надеемся, что наш форум станет вашим любимым местом для общения.
          </p>
          <form class="form post-create" action="vendor/scripts/offers/create.php" method="POST" autocomplete="off">
            <h2 class="form-heading">Обратная связь</h2>
            <div class="labels">
              <label class="label">
                <span class="label__desc">Тема</span>
                <input class="input" name="theme" type="text" maxlength="50" placeholder="Укажите какая тема вас беспокоит" autocomplete="off" required>
              </label>
              <label class="label">
                <span class="label__desc">Текст</span>
                <textarea class="input textarea" name="text" minlenght="6" maxlength="1500" autocomplete="off" required></textarea>
              </label>
            </div>
            <button class="button submit">Создать</button>
          </form>
        </div>
      </div>

      <? require_once 'vendor/components/nav.php' ?>
      <? require_once 'vendor/components/error_form.php' ?>
    </main>
  </div>
</body>

</html>