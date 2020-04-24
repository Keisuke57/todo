<?php
  require_once(__DIR__.'/php/Login.php');
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="/CSS/stylesOfsignup.css">
  </head>
  <body>
    <div class="container">
      <h2>ようこそ、ログインしてください。</h2>
      <form method="post" id="login">
        <p>
          <input type="text" name="email" placeholder="email">
        </p>
        <p class="err"><?php echo $InvalidEmail?></p>
        <p class="err"><?php echo $EmptyEmail?></p>
        <p>
          <input type="password" name="password" placeholder="password">
        </p>
        <p class="err"><?php echo $Invalid?></p>
        <button type="submit" class="btn" onclick="document.getElementById('login').submit('/php/Login.php')">ログイン</button>
      </form>
      <p>初めての方は<a href="/signup.php">こちら</a></p>
    </div>
  </body>
</html>
