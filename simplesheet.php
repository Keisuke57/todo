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
    <title>即効簡易版シート</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/stylesOfsheets.css">
    <link rel="stylesheet" href="./CSS/responsive.css">
    <link href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" rel="stylesheet">
    <script type="text/javascript" src="./JS/simplesheet.js"></script>
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
      <div id="bar-nav" class="bar-nav">
        <span class="fas fa-bars"></span>
      </div>
      <div id="simplesheet-heading" class="sheets-heading">
        <div class="container">
          <div class="inner">
            <div class="top">
              <h2>即効簡易版シート</h2>
            </div>
            <div class="bottom">
              <p>「即効簡易版シート」では、今までの基本設定シート、実践設定シートが中長期的な目標を達成するためのものだったのに対して、明日までの書類作りを急に頼まれた時などの短期的な目標にに取り組むためのシンプルなシートです。これから5つの項目があります、それぞれの入力フォームにあなたの答えを書いてください。また、それぞれの項目に説明文があります。ご覧になってから入力フォームにご入力ください。</p>
            </div>
          </div>
        </div>
      </div>
      <div class="item Ideal">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>1.理想イメージング</h2>
            <div class="setopacity">このステップでは、目の前のタスクを達成したら、どのようなポジティブなことが起きるかを想像して書き出します。</div>
            <div class="setopacity sample">
              <div>例：タスク「明日までに書類を作る」</div>
              <div>理想イメージング「達成感を得られる」「上司に褒められる」「緊急の仕事もこなせるという自信がつく」</div>
            </div>
            <form>
              <input type="text" id="answerOfIdeal" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfIdeal" value="追加" class="btn">
            </form>
            <div id="taskOfIdeal" class="userstask simplesheet"></div>
          </div>
        </div>
        </div>
      </div>
      <div class="item Positive">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>2.ポジティブ選択</h2>
            <div class="setopacity">
              「1.理想イメージング」であげたメリットの中から、自分にとってもっともポジティブなものを選んでください。それぞれのメリットを頭のなかでイメージして、1番ポジティブなものをピックアップすればOKです。
            </div>
            <form>
              <input type="text" id="answerOfPositive" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfPositive" value="追加" class="btn">
            </form>
            <div id="taskOfPositive" class="userstask simplesheet"></div>
          </div>
        </div>
        </div>
      </div>
      <div class="item Obstacle">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>3.障害コントラスト</h2>
            <div class="setopacity">
              そのタスクを達成する際に、起きそうなトラブルをいくつか想像して書き出してください
            </div>
            <div class="setopacity sample">
              <div>例：タスク「明日までに書類を作る」</div>
              <li>「同僚が話しかけてくる」</li>
              <li>「最新ニュースが気になってサイトをチェックしてしまう」</li>
              <li>「ついSNSをチェックしてしまう」</li>
            </div>
            <div class="setopacity">上記の例を参考にいくつかの障害をリストアップしましょう</div>
            <form>
              <input type="text" id="answerOfObstacle" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfObstacle" value="追加" class="btn">
            </form>
            <div id="taskOfObstacle" class="userstask simplesheet"></div>
          </div>
        </div>
        </div>
      </div>
      <div class="item Negative">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>4.ネガティブ選択</h2>
            <div class="setopacity">
              「3.障害コントラスト」で書き出したトラブルのなかから、もっとも自分にとってデメリットが大きいものを選んでください。それぞれのトラブルを頭のなかでしっかりとイメージして、実際に起きそうなものをピックアップしてください。
            </div>
            <form>
              <input type="text" id="answerOfNegative" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfNegative" value="追加" class="btn">
            </form>
            <div id="taskOfNegative" class="userstask simplesheet"></div>
          </div>
        </div>
        </div>
      </div>
      <div class="item Action">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>5.質問型アクション</h2>
            <div class="setopacity">
              最後にあなたがすべきタスクを「質問型アクション」のフォーマットに変換すれば終了です。
            </div>
            <div class="setopacity sample"><li>[自分の名前]は、[時間]に[場所]で[タスク]をするか？</li></div>
            <div class="setopacity">
              上記の例のようにタスクを変換し終えたら、常に目に付くところに置いておきましょう。
            </div>
            <form>
              <input type="text" id="answerOfAction" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfAction" value="追加" class="btn">
            </form>
            <div id="taskOfAction" class="userstask simplesheet"></div>
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
              <p>お疲れ様でした、これで「即効簡易版シート」は完成になります。最後に下の<span>完成ボタン</span>を押してください。完成ボタンを押すとポップアップであなたの入力した内容がまとまった表が出てきますので、スクリーンショットやメモ等を使って保存してください。</p>
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
            <table border="1" style="border-collapse: collapse" class="table">
                <caption>即効簡易版シート</caption>
                <tbody>
                  <tr>
                    <th>1.理想イメージング</th>
                    <td id="tdOfIdeal">

                    </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <th>2.ポジティブ選択</th>
                    <td id="tdOfPositive">

                    </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <th>3.障害コントラスト</th>
                    <td id="tdOfObstacle">

                    </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <th>4.ネガティブ選択</th>
                    <td id="tdOfNegative">

                    </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <th>5.質問型アクション</th>
                    <td id="tdOfAction">

                    </td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
    <script type="text/javascript" src="./JS/script.js"></script>
  </body>
</html>
