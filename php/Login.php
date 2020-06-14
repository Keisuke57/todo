<?php

require_once(__DIR__.'/../config/config.php');

session_start();
if($_SERVER['REQUEST_METHOD']=== 'POST'){
  //POSTのvalidate
  if(empty($_POST['email'])){ //入力していない場合
    $EmptyEmail = 'メールアドレスを入力してください';
    return false;
  }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $InvalidEmail = 'メールアドレスが間違っています。';
    return false;
  }else{
  }
  //DB内でPOSTされたメールアドレスを検索
  try {
    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $stmt = $pdo->prepare('select * from users where email = ?');
    $stmt->execute([$_POST['email']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
  }
  //emailがDB内に存在しているか確認
  if (!isset($row['email'])){
    $Invalid = 'メールアドレス又はパスワードが間違っています。';
    return false;
  }
  //パスワード確認後sessionにメールアドレスを渡す
  if (password_verify($_POST['password'], $row['password'])) {
    session_regenerate_id(true); //session_idを新しく生成し、置き換える
    $_SESSION['EMAIL'] = $row['email'];
    header('Location:'. SITE_URL . '/top.php');
    exit;
  } else {
    $Invalid = 'メールアドレス又はパスワードが間違っています。';
    return false;
  }
}
