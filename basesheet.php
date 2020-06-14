<?php
  require_once(__DIR__.'/config/config.php');

  function h($s){ //XSS対策
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

  session_start();
  //ログインしているかを判定
  if(isset($_SESSION['EMAIL'])){
    //ログインしていた場合の処理
    $logout = '<a href="/php/logout.php">ログアウト</a>';
  }else{
    header('Location:' . SITE_URL. '/login.php');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>基本設定シート</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/stylesOfsheets.css">
    <link rel="stylesheet" href="./CSS/responsive.css">
    <link href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" rel="stylesheet">
    <script type="text/javascript" src="./JS/basesheet.js"></script>
    <script type="text/javascript" src="./JS/makecsv.js"></script>
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
                <li class="linkOftop"><a href="./top.php">トップページ</a></li>
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
      <div id="bar-nav" class="bar-nav">
        <span class="fas fa-bars"></span>
      </div>
      <div id="basesheet-heading" class="sheets-heading">
        <div class="container">
          <div class="inner">
            <div class="top">
              <h2>基本設定シート</h2>
            </div>
            <div class="bottom">
              <p>「基本設定シート」では、集中力が出ないタスクの意味や価値をあらためて確認して、あなたの取り組むべきデイリータスクを絞り込んでいきます。</p>
            </div>
          </div>
        </div>
      </div>
      <div class="item Target">
        <div class="container">
          <div class="inner">
            <h2>1.ターゲット</h2>
            <div class="setopacity">どうしても集中力が続かない作業のなかから、自分にとって最も重要なものを選んで書き込んでください。「企画書の作成」のような仕事のタスクから、「もっと運動をする」や「食事の改善」のような日常の目標でもOKです。</div>
            <div class="setopacity">すぐに気がそれてしまう、、、ついついスマホをいじってしまう、、、なんだかやる気が起きない、、、そんなタスクの中から一つ選んで書き込んでください。</div>
            <form>
              <input type="text" id="answerOfTarget" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfTarget" value="追加" class="btn">
            </form>
            <div id="taskOfTarget" class="userstask basesheet"></div>
          </div>
        </div>
      </div>
      <div class="item Important">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>2.重要度チェック</h2>
            <div class="setopacity">
              「1.ターゲット」で入力した目標を達成しなければならない理由を考えて。もっとも大事なものをひとつだけ書き込んでください。
            </div>
            <div class="setopacity">
              たとえば「企画書の作成」という目標の場合、「会社に貢献する」、「お金を稼ぐため」、「社内の評価をあげるため」などがあげられます。どのような理由でもいいので考えてみましょう。ここであらためて目標の価値を確認しましょう。
            </div>
            <form>
              <input type="text" id="answerOfImportant" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfImportant" value="追加" class="btn">
            </form>
            <div id="taskOfImportant" class="userstask basesheet"></div>
          </div>
        </div>
        </div>
      </div>
      <div class="item Imazing">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>3.具象イメージング</h2>
            <div class="setopacity">
              「1.ターゲット」で選んだ目標をより具体的なイメージに変換してください。
            </div>
            <div class="setopacity sample">
              例：目標「企画書を作成する」→変換「企画書を上司に提出してホッと一息ついたところで映画でも見に行く」
            </div>
            <div class="setopacity">
              この「具象イメージング」では、目標が抽象的なままではゴールの現実感を持てず、どうしても意欲がわからなくなることを防ぎます。
            </div>
            <form>
              <input type="text" id="answerOfImazing" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfImazing" value="追加" class="btn">
            </form>
            <div id="taskOfImazing" class="userstask basesheet"></div>
          </div>
        </div>
        </div>
      </div>
      <div class="item Reverce">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>4.リバースプランニング</h2>
            <div class="setopacity">
              目標達成までのサブゴールと期日を設定します。未来から現在にさかのぼる形で計画を立てていきます。
            </div>
            <div class="setopacity sample"><p class="nospace">例：目標イメージ「企画書を上司に出してスッキリ」</p><p class="nospace">リバースプランニング「企画書を出す1日前に文章の見直し」→「3日前までに文章の作成をする」→「5日前までに解決策の発案をする」→「7日前までにリサーチを終える」</p></div>
            <div class="setopacity">
              サブゴールはだいたい最終期日までに3～5つ設定するのが一般的です。また、目標達成に1年以上かかるものを設定した時は、2～3か月おきに小さな目標をたててください。
            </div>
            <form>
              <input type="text" id="answerOfReverce" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfReverce" value="追加" class="btn">
            </form>
            <div id="taskOfReverce" class="userstask basesheet"></div>
          </div>
        </div>
        </div>
      </div>
      <div class="item Setting">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>5.デイリータスク設定</h2>
            <div class="setopacity">
              「リバースプランニング」で設定したサブゴールの中から、もっとも締め切りが近いものを選んで、それを達成するために毎日やるべきタスクをいくつか考えてください。
            </div>
            <div class="setopacity sample">
              <p class="nospace">例:サブゴール「7日前までにリサーチと分析を終える」</p><p class="nospace">デイリータスク「くわしそうな人に話を聞く」「文献サイトから必要な資料を集める」「集めた資料を読み込む」など</p>
            </div>
            <div class="setopacity">
              タスクの目安としては「数分から1時間で終わるレベル」ぐらいにしましょう。
            </div>
            <form>
              <input type="text" id="answerOfSetting" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfSetting" value="追加" class="btn">
            </form>
            <div id="taskOfSetting" class="userstask basesheet"></div>
          </div>
        </div>
        </div>
      </div>
      <div class="item complete">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>完成!</h2>
            <div class="setopacity">
              <p>お疲れ様でした、これで「基本設定シート」は完成になります。最後に下の<span>完成ボタン</span>を押してください。完成ボタンを押すとポップアップであなたの入力した内容がまとまった表が出てきますので、スクリーンショットやメモ等を使って保存してください。</p>
            </div>
            <input type="button" class="complete" id="complete" value="完成">
          </div>
        </div>
        </div>
      </div>
      <div id="modal-show" class="userstable">
        <div class="container">
          <div class="inner">
            <span class="fas fa-times" id="modal-close"></span>
            <table border="1" style="border-collapse: collapse" class="table" id="userstable">
                <caption>基本設定シート</caption>
                <tbody>
                  <tr>
                    <th>1.ターゲット</th>
                    <td id="tdOfTarget">

                    </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <th>2.重要度チェック</th>
                    <td id="tdOfImportant">

                    </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <th>3.具象イメージング</th>
                    <td id="tdOfImazing">

                    </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <th>4.リバースプランニング</th>
                    <td id="tdOfReverce">

                    </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <th>5.デイリータスク設定</th>
                    <td id="tdOfSetting">

                    </td>
                  </tr>
                </tbody>
            </table>
            <button><a id="csv" href="#" download="基本設定シート.csv" onclick="handleDownload()" align="right">CSV</a></button>
          </div>
        </div>
      </div>
    </main>
    <script type="text/javascript" src="./JS/script.js"></script>
  </body>
</html>
