<?php
  require_once(__DIR__.'/php/Signup.php');
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>新規登録</title>
    <link rel="stylesheet" href="/CSS/stylesOfsignup.css">
  </head>
  <body>
    <div class="container">
      <h2>新規登録</h2>
      <form  method="post" id="signup">
        <p>
          <input type="text" name="email" placeholder="email">
        </p>
        <p class="err"><?php echo $InvalidEmail?></p>
        <p>
          <input type="password" name="password" placeholder="password">
        </p>
        <p class="err"><?php echo $InvalidPassword?></p>
        <p class="err"><?php echo $InvalidException?></p>
        <button type="submit" class="btn" onclick="document.getElementById('signup').submit('/php/Signup.php')">新規登録</button>
        <p class="success"><?php echo $success?></p>
        <p>※パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。</p>
      </form>
      <p>ログイン画面に<a href="/login.php">戻る</a></p>
    </div>
  </body>
</html>
