alert("hello");
document.addEventListener('DOMContentLoaded',function(){
  document.getElementById('btn').addEventListener('click',function(){
    //テキストボックスの値を取得
    var answer = document.getElementById('answer');
    //<li>要素を生成
    var list = document.createElement('li');
    //テキストノードを生成して、<li>要素の直下に追加
    var text = document.createTextNode(answer.value);
    list.appendChild(text);
    //テキストボックスの中身をリセット
    answer.value="";
    //<i class="far fa-trash-alt">を生成
    var i = document.createElement('i');
    var addclass = document.createAttribute('class');
    addclass.value="far fa-trash-alt";
    i.setAttributeNode(addclass);
    list.appendChild(i);
    //<div id="task">を取得
    var task = document.getElementById('task');
    //<div>要素の直下に<li>/<i>要素の順番で追加
    task.appendChild(list);

    //<i>要素をクリックしたらテキストが削除される処理
    i.addEventListener('click',function(){
      task.removeChild(task.lastChild);
      far.disabled = true;
    },false);

  },false);

},false);
