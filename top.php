<?php
  require_once(__DIR__.'/config/config.php');

  function h($s){ //XSS対策
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

  session_start();
  //ログインしているかを判定
  if(isset($_SESSION['EMAIL'])){
    //ログインしていた場合の処理
    $logout = '<a href="/php/Logout.php">ログアウト</a>';
  }else{
    header('Location:' . SITE_URL. '/login.php');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>タスク管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/stylesOftop.css">
    <link rel="stylesheet" href="./CSS/responsive.css">
    <link href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
    <header>
      <div class="container">
        <div id="modal-nav" class="modal-nav">
          <div class="header-left">
            <span class="fas fa-times"></span>
          </div>
          <div class="header-center">
            <nav>
              <ul>
                <li class="linkOftop"><a href="./index.php">トップページ</a></li>
                <li class="linkOfbasesheet"><a href="./basesheet.php">基本設定シート</a></li>
                <li class="linkOfpracticesheet"><a href="./practicesheet.php">実践設定シート</a></li>
                <li class="linkOfsimplesheet"><a href="./simplesheet.php">即効簡易版シート</a></li>
              </ul>
            </nav>
          </div>
          <div class="header-right">
            <?php echo $logout?>
          </div>
        </div>
      </div>
    </header>
    <main>
      <div id="top">
        <div id="bar-nav" class="bar-nav">
          <span class="fas fa-bars"></span>
        </div>
        <div class="container">
          <h2>あなたのやる気を楽しく、最大限に。</h2>
        </div>
      </div>
      <div id="Introduction-wrapper" class="fadein">
        <div class="container">
          <div class="inner">
            <h2>はじめに</h2>
            <div class="intro">このサイトでは、<span class="emphasis">「ヤバい集中力:鈴木祐（著）」</span>という本のタスク管理法を使ってあなたの集中力を最大にします。集中力を最大限に発揮することで得られる効果は言うまでもなく絶大なものです。集中すれば1時間で終わる作業も「スマホに気を取られて30分無駄にしてしまった、、、」ということが少なくないでしょう。一日の始まりや一日の終わりにタスクを設定して「スマホをいじってしまう」、「作業に集中できない」、「やらなければならない仕事を先延ばしにしてしまう」といった悩みを解消しましょう。</div>
          </div>
        </div>
      </div>
      <div id="about-wrapper" class="fadein">
        <div class="container">
          <div class="inner">
            <h2>報酬感覚プランニング</h2>
            <p>「報酬感覚プランニング」とは、1970年代からの研究で生まれた大量の集中力に関する対策から特に効果が高いものを厳選したワークシートです。このワークシートは、大きく分けて3つあります。中長期的な目標を改めて確認してデイリータスクを絞り込む<span class="emphasis">「基本設定シート」</span>、絞り込んだデイリータスクをこなすために毎日使う<span class="emphasis">「実践設定シート」</span>、短期的な作業に取り組むための<span class="emphasis">「即効簡易版シート」</span>の3つです。</p>
          </div>
        </div>
      </div>
      <div id="guide-wrapper" class="fadein">
        <div class="container">
          <h2>それぞれの目的に合わせてご利用ください。</h2>
          <div class="selectsheets">
            <a href="./basesheet.php" id="basesheet">
              <div class="basesheet-top">
                「基本設定シート」
              </div>
              <div class="basesheet-bottom">
                初めてご利用になられる方、中長期的な目標がある方はこちら
              </div>
            </a>
            <a href="./practicesheet.php" id="practicesheet">
              <div class="practicesheet-top">
                「実践設定シート」
              </div>
              <div class="practicesheet-bottom">
                基本設定が終わり、デイリータスクからご利用になられる方はこちら
              </div>
            </a>
            <a href="./simplesheet.php" id="simplesheet">
              <div class="simplesheet-top">
                「即効簡易版シート」
              </div>
              <div class="simplesheet-bottom">
                明日までの作業など、短期的な目標達成をしたい方はこちら
              </div>
            </a>
          </div>
        </div>
      </div>
    </main>
    <script type="text/javascript" src="./JS/script.js"></script>
  </body>
</html>
