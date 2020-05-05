document.addEventListener('DOMContentLoaded',function(){
  function addAndRemove(answer,td,task){
    //テキストボックスの値を取得
    var answer = document.getElementById(answer);
    var value = answer.value;
    if(value ===""){
      //処理なし
    }else{
      //テキストノードを生成
      var text = document.createTextNode(answer.value);
      //<li>要素を生成
      var list = document.createElement('li');
      //テキストノードを<li>要素に追加
      list.appendChild(text);
      //この時点のlistのcloneを生成
      var clone = list.cloneNode(true);
      //テキストボックスの中身をリセット
      answer.value="";
      //<span class="far fa-trash-alt">を生成
      var span = document.createElement('span');
      var addclass = document.createAttribute('class');
      addclass.value="far fa-trash-alt";
      span.setAttributeNode(addclass);
      list.appendChild(span);
      //<td>要素を取得
      var td = document.getElementById(td);
      //<div id="task">を取得
      var task = document.getElementById(task);
      //<div>要素の直下に<li>/<i>要素の順番で追加
      task.appendChild(list);
      //<td>要素にcloneを追加
      td.appendChild(clone);
      //<span>要素をクリックしたらテキストが削除される処理(td要素の方も削除)
      span.addEventListener('click',function(){
      task.removeChild(list);
      td.removeChild(clone);
      },false);
    }
  }
  //tbOfChoiceにaddAndRemove関数を実装
  document.getElementById('btnOfChoice').addEventListener('click',function(){
    addAndRemove('answerOfChoice','tdOfChoice','taskOfChoice');
  },false);
  //tbOfContrastにaddAndRemove関数を実装
  document.getElementById('btnOfContrast').addEventListener('click',function(){
    addAndRemove('answerOfContrast','tdOfContrast','taskOfContrast');
  },false);
  //tbOfFixにaddAndRemove関数を実装
  document.getElementById('btnOfFix').addEventListener('click',function(){
    addAndRemove('answerOfFix','tdOfFix','taskOfFix');
  },false);
  //tbOfQuestionにaddAndRemove関数を実装
  document.getElementById('btnOfQuestion').addEventListener('click',function(){
    addAndRemove('answerOfQuestion','tdOfQuestion','taskOfQuestion');
  },false);
},false);
