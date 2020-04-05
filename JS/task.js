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
    //<br>要素を生成
    var br = document.createElement('br');
    //<i class="far fa-trash-alt">を生成
    var span = document.createElement('span');
    span.classList.add("far fa-trash-alt");
    //<div id="task">を取得
    var task = document.getElementById('task');
    //<div>要素の直下に<li>/<i>/<br>要素の順番で追加
    task.appendChild(list);
    task.appendChild(span);
    task.appendChild(br);
  },false);
},false);
