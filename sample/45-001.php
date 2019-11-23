<?php // ログインしたことにする確認用のスクリプト
  session_start();
  $id = filter_input(INPUT_GET, 'id');
  if (empty($id)) $id = 'yamada';
  $_SESSION['id'] = $id;
?><body>
ログインしました(id:<?php echo 
  htmlspecialchars($id, ENT_NOQUOTES, 'UTF-8'); ?>)<br>
<a href="45-002.php">パスワード変更</a><br>
<a href="45-010.php">掲示板</a>
</body>
