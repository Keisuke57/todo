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
    <title>実践設定シート</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/stylesOfsheets.css">
    <link rel="stylesheet" href="./CSS/responsive.css">
    <link href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" rel="stylesheet">
    <script type="text/javascript" src="./JS/practicesheet.js"></script>
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
      <div id="practicesheet-heading" class="sheets-heading">
        <div class="container">
          <div class="inner">
            <div class="top">
              <h2>実践設定シート</h2>
            </div>
            <div class="bottom">
              <p>「実践設定シート」では、基本設定でリストアップした「デイリータスク」を実際にこなすための作業を行います。数分から数時間で終わるような短期間のタスクしか扱わないので、このシートは毎日使用してください。</p>
            </div>
          </div>
        </div>
      </div>
      <div class="item Choice">
        <div class="container">
          <div class="inner">
            <h2>1.デイリータスク選択</h2>
            <div class="setopacity">基本設定で考えた「デイリータスク」の中から、「その日のうちに手をつけねばならないもの」や「最長で2～3時間で終わりそうなもの」だけに的を絞り、3～5つほどピックアップしてください。</div>
            <div class="setopacity">「デイリータスク」はあまりに多すぎると逆効果ですので、とりあえず1日の作業は最大でも５つまでにして、時間があまったらそのたびにつけたすようにしてください。</div>
            <form>
              <input type="text" id="answerOfChoice" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfChoice" value="追加" class="btn">
            </form>
            <div id="taskOfChoice" class="userstask practicesheet"></div>
          </div>
        </div>
      </div>
      <div class="item Contrast">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>2.障害コントラスト</h2>
            <div class="setopacity">
              選んだデイリータスクを達成する際に、発生しそうなトラブルを書き出してください。
            </div>
            <div class="setopacity">
              例えば「1㎞走る」というデイリータスクであれば「仕事で疲れてやる気がでない」「ついスマホをいじってしまう」といったように、ゴールのジャマになりそうなものを最低1つ考えてみましょう。
            </div>
            <div class="setopacity">
              障害が思いつかない場合は、次の質問の答えを考えてみてください。
            </div>
            <div class="setopacity sample">
              <li>どんな「考え方」、「行動」、「癖や習慣」、「思い込み」、「感情」が目標の達成を妨げているか？</li>
            </div>
            <form>
              <input type="text" id="answerOfContrast" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfContrast" value="追加" class="btn">
            </form>
            <div id="taskOfContrast" class="userstask practicesheet"></div>
          </div>
        </div>
        </div>
      </div>
      <div class="item Fix">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>3.障害フィックス</h2>
            <div class="setopacity">
              「2.障害コントラスト」で想定した障害に対して、あなたが取れそうな対策を考えて書き込みましょう。
            </div>
            <div class="setopacity sample">例①：障害「スマホの通知で気がそれる」→対策「スマホの通知をすべて切る」</div>
            <div class="setopacity sample">例②：障害「エクササイズをさぼってしまう」→対策「さぼったら友人に罰金を払うと事前に決めておく」</div>
            <div class="setopacity">
              人間の心は「2.障害コントラスト」でトラブルの発生を想定してモチベーションを保ちますが、その障害が現実になったらやる気を失ってしまうという性質を持っているので、トラブルの予想と対策をセットで考えてください。
            </div>
            <form>
              <input type="text" id="answerOfFix" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfFix" value="追加" class="btn">
            </form>
            <div id="taskOfFix" class="userstask practicesheet"></div>
          </div>
        </div>
        </div>
      </div>
      <div class="item Question">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>4.質問型アクション</h2>
            <div class="setopacity">
              「1.デイリータスク」で選んだデイリータスクについて、それぞれ「質問型アクション」を設定します。
            </div>
            <div class="setopacity sample"><li>[自分の名前]は、[時間]に[場所]で[デイリータスク]をするか？</li></div>
            <div class="setopacity">上記のフォーマットにデイリータスクを変換しましょう。</div>
            <div class="setopacity sample">
              <div>デイリータスク：企画書の文書の見直しをする</div>
              <div>質問型アクション：［山田太郎］は、［午前9時］に［会社の自分の席］で［企画書の見直し］をするか？</div>
            </div>
            <div class="setopacity">
              わざわざタスクを質問形式に変えるのは、宣言文よりも質問文のほうが影響力が強いからです。
            </div>
            <form>
              <input type="text" id="answerOfQuestion" class="textbox" placeholder="こちらにご入力ください"><br>
              <input type="button" id="btnOfQuestion" value="追加" class="btn">
            </form>
            <div id="taskOfQuestion" class="userstask practicesheet"></div>
          </div>
        </div>
        </div>
      </div>
      <div class="item Real">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>5.現実イメージング</h2>
            <div class="setopacity">
              質問型アクションを達成するまでのプロセスを、できるだけリアルに頭のなかで思い描いてください。
            </div>
            <div class="setopacity sample">
              <div>例：質問型アクション「山田太郎は、午前9時に会社の自分の席で企画書の見直しをするか？」</div>
              <div>現実イメージング「実用な資料のファイルをひとつのフォルダにまとめる自分」→「いつものエディタを起動してフォーマットを開く自分」→「まずはさっと概要を読み流す自分」→「文章を修正する自分」</div>
            </div>
            <div class="setopacity">
              このステップは<span>書き出す必要はありません。</span>大事なのは、どこまで具体的にプロセスをイメージできるかです。ゴールまでのステップを脳内でリアルに思い描くほど、集中力アップの効果は高まります。
            </div>
          </div>
        </div>
        </div>
      </div>
      <div class="item Reminder">
        <div class="fadein"> <!-- アニメーションを付け加えるための空タグ -->
        <div class="container">
          <div class="inner">
            <h2>6.固定式ビジュアルリマインダー</h2>
            <div class="setopacity">
              最後に、ダメ押しでリマインダーを設定しましょう。人間は、定期的に「質問アクション」を思い出さないとすぐに忘れてしまいます。リマインダーはなんでもよいです、スマホのアプリを使ってもよいですし、手帳に書きこんでもかまいません。大事なことはリマインダーをつねに目に入る場所に置いておくことです。
            </div>
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
              <p>お疲れ様でした、これで「実践設定シート」は完成になります。最後に下の<span>完成ボタン</span>を押してください。完成ボタンを押すとポップアップであなたの入力した内容がまとまった表が出てきますので、スクリーンショットやメモ等を使って保存してください。</p>
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
                <caption>実践設定シート</caption>
                <tbody>
                  <tr>
                    <th>1.デイリータスク選択</th>
                    <td id="tdOfChoice">

                    </td>
                  </tr>
                </tbody>
                <tbodyx>
                  <tr>
                    <th>2.障害コントラスト</th>
                    <td id="tdOfContrast">

                    </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <th>3.障害フィックス</th>
                    <td id="tdOfFix">

                    </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <th>4.質問型アクション</th>
                    <td id="tdOfQuestion">

                    </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <th class="height">5.現実イメージング</th>
                    <td>
                      <p>(Q.4の質問型アクションを達成するまでのプロセスを、できるだけリアルに頭のなかに思い描いてください)</p>
                    </td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <th class="height">6.固定式ビジュアルリマインダー</th>
                    <td>
                      <div>Q.４の質問型アクションを思い出させるものを、目に見える場所に置きましょう。</div>
                      <div>(スクリーンショット、スマホのリマインダーアプリ、手帳に記入など)</div>
                    </td>
                  </tr>
                </tbody>
            </table>
            <button><a id="csv" href="#" download="実践設定シート.csv" onclick="handleDownload()" align="right">CSV</a></button>
          </div>
        </div>
      </div>
    </main>
    <script type="text/javascript" src="./JS/script.js"></script>
  </body>
</html>
