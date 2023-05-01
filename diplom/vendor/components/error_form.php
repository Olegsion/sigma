<?
if ($_SESSION['error']) {
    echo '
<div class="layout" style="display:block;"></div>
<div class="error-messege">
    <h1 class="error-heading">Ошибка!</h1>
    <p class="error-desc">' . $_SESSION['error'] . '</p>
    <a href="vendor/scripts/clear.php?from=' . $page . '"><button class="button">Понятно</button></a>
    <a href="vendor/scripts/clear.php?from=' . $page . '"><img class="close-icon" src="./assets/images/close_icon.png" alt=""></a>
</div>
';
}
