document.addEventListener('DOMContentLoaded',function(){
  function addAndRemove(answer,task){
    //テキストボックスの値を取得
    var answer = document.getElementById(answer);
    //<li>要素を生成
    var list = document.createElement('li');
    //テキストノードを生成して、<li>要素の直下に追加
    var text = document.createTextNode(answer.value);
    list.appendChild(text);
    //テキストボックスの中身をリセット
    answer.value="";
    //<i class="far fa-trash-alt">を生成
    var span = document.createElement('span');
    var addclass = document.createAttribute('class');
    addclass.value="far fa-trash-alt";
    span.setAttributeNode(addclass);
    list.appendChild(span);
    //<div id="task">を取得
    var task = document.getElementById(task);
    //<div>要素の直下に<li>/<i>要素の順番で追加
    task.appendChild(list);

    //<i>要素をクリックしたらテキストが削除される処理
    span.addEventListener('click',function(){
    task.removeChild(list);
    },false);
    //ここから完成ボタンの機能
    //<input>要素を取得
    var input = document.getElementsByTagName('input');
    //<textarea>要素を取得
    var textarea= document.getElementsByTagName('textarea');
    //<br>要素を取得
    var br = document.getElementsByTagName('br');
    document.getElementById('complete').addEventListener('click',function(){
      //すべての<input要素>をdisplay:noneに
      for(var i = 0,len1 = input.length;i < len1; i++){
        input[i].classList.toggle('complete');
      }
      //すべての<textarea>要素をdisplay:noneに
      for(var x = 0,len2 = textarea.length;x < len2;x++){
        textarea[x].classList.toggle('complete');
      }
      for(var y = 0,len1 = br.length;y < len1; y++){
        br[y].classList.toggle('complete');
      }
      list.removeChild(span)
    },false);
  };
  //tbOfTargetにaddAndRemove関数を実装
  document.getElementById('btnOfTarget').addEventListener('click',function(){
    addAndRemove('answerOfTarget','taskOfTarget');
  },false);
  //tbOfImportantにaddAndRemove関数を実装
  document.getElementById('btnOfImportant').addEventListener('click',function(){
    addAndRemove('answerOfImportant','taskOfImportant');
  },false);
  //tbOfImazingにaddAndRemove関数を実装
  document.getElementById('btnOfImazing').addEventListener('click',function(){
    addAndRemove('answerOfImazing','taskOfImazing');
  },false);
  //tbOfReverceにaddAndRemove関数を実装
  document.getElementById('btnOfReverce').addEventListener('click',function(){
    addAndRemove('answerOfReverce','taskOfReverce');
  },false);
  //tbOfSettingにaddAndRemove関数を実装
  document.getElementById('btnOfSetting').addEventListener('click',function(){
    addAndRemove('answerOfSetting','taskOfSetting');
  },false);
  //tbOfChoiceにaddAndRemove関数を実装
  document.getElementById('btnOfChoice').addEventListener('click',function(){
    addAndRemove('answerOfChoice','taskOfChoice');
  },false);
  //tbOfContrastにaddAndRemove関数を実装
  document.getElementById('btnOfContrast').addEventListener('click',function(){
    addAndRemove('answerOfContrast','taskOfContrast');
  },false);
  //tbOfFixにaddAndRemove関数を実装
  document.getElementById('btnOfFix').addEventListener('click',function(){
    addAndRemove('answerOfFix','taskOfFix');
  },false);
  //tbOfQuestionにaddAndRemove関数を実装
  document.getElementById('btnOfQuestion').addEventListener('click',function(){
    addAndRemove('answerOfQuestion','taskOfQuestion');
  },false);
  //tbOfRealにaddAndRemove関数を実装
  document.getElementById('btnOfReal').addEventListener('click',function(){
    addAndRemove('answerOfReal','taskOfReal');
  },false);

},false);
