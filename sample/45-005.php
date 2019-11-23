<?php
  function ex($s) { // XSS対策用のHTMLエスケープと表示関数
    echo htmlspecialchars($s, ENT_COMPAT, 'UTF-8');
  }
  session_start();
  $id = @$_SESSION['id']; // ユーザIDの取り出し
  // ログイン確認…省略
  $tmpfile = $_FILES["imgfile"]["tmp_name"];
  $tofile = $_FILES["imgfile"]["name"];
  if (! is_uploaded_file($tmpfile)) {
    die('ファイルがアップロードされていません');
  // 画像を img ディレクトリに移動
  } else  if (! move_uploaded_file($tmpfile, "img/$tofile")) {
    die('ファイルをアップロードできません');
  }
  $imgurl = 'img/' . urlencode($tofile);
?><body>
ID:<?php ex($id); ?><br>以下の画像をアップロードしました<br>
<a href="<?php ex($imgurl); ?>"><img src="<?php ex($imgurl); ?>"></a>
</body>
