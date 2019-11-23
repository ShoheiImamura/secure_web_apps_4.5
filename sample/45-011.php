<?php
  function ex($s) { // XSS対策用のHTMLエスケープと表示関数
    echo htmlspecialchars($s, ENT_COMPAT, 'UTF-8');
  }
  session_start();
  $id = @$_SESSION['id']; // ユーザIDの取り出し
  $msg = filter_input(INPUT_POST, 'msg');
  $token = filter_input(INPUT_POST, 'token');
  if (empty($token) || $token !== $_SESSION['token'])
    die('正規の画面から投稿ください');
?><body style="background-color: #FFFFFF">
<?php ex($id); ?>さん、以下の内容を投稿しました<br>
<?php ex($msg); ?>
</body>
