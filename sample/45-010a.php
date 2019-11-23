<?php
  function ex($s) { // XSS対策用のHTMLエスケープと表示関数
    echo htmlspecialchars($s, ENT_COMPAT, 'UTF-8');
  }
  header('X-Frame-Options: deny');
  session_start();
  $id = @$_SESSION['id']; // ユーザIDの取り出し
  if (empty($_SESSION['token'])) {
    $token = bin2hex(openssl_random_pseudo_bytes(24));
    $_SESSION['token'] = $token; 
  } else {
    $token = $_SESSION['token'];
  }
  $msg = '';
  if (!empty($_GET['intent'])) {
    $msg = $_GET['intent'];
  }
?><body style="background-color: #FFFFFF">
<?php ex($id); ?>さん、投稿をどうぞ<br>
<form action="45-011.php" method="post">
<textarea cols="40" name="msg"><?php ex($msg); ?></textarea><br>
<input type="hidden" name="token" value="<?php ex($token); ?>">
<input type="submit" value="投稿">
</form>
</body>
