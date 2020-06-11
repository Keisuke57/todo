<?php
require_once(__DIR__.'/../config/config.php');
session_start();

if (isset($_SESSION["EMAIL"])) {
  //セッション変数のクリア
  $_SESSION = array();
  //セッションクッキーも削除
  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }
  //セッションクリア
  @session_destroy();
  //ログイン画面に強制遷移
  header('Location:'.SITE_URL.'/login.php');
  exit;
} else {
  echo 'SessionがTimeoutしました。';
}
?>
