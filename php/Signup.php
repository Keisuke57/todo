<?php
require_once(__DIR__.'/../config/config.php');
//データベースへ接続、テーブルがない場合は作成
try {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec("create table if not exists users(
      id int not null auto_increment primary key,
      email varchar(255),
      password varchar(255),
      created timestamp not null default current_timestamp
    )");
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
if($_SERVER['REQUEST_METHOD']=== 'POST'){
  //POSTのValidate。
  if (!$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $InvalidEmail = 'メールアドレスを入力してください。';
    return false;
  }
  //パスワードの正規表現
  if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  } else {
    $InvalidPassword = 'パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください。';
    return false;
  }
  //登録処理
  try {
    $stmt = $pdo->prepare("insert into users(email, password) value(?, ?)");
    $stmt->execute([$email, $password]);
    $success = '登録完了！<br>ログイン画面からログインしてください。';
  } catch (Exception $e) {
    $InvalidException = '登録済みのメールアドレスです。';
    return false;
  }
}
