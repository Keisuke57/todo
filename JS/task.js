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
    //<i class="far fa-trash-alt">を生成
    var i = document.createElement('i');
    var class = document.createAttribute('class');
    class.value = "far fa-trash-alt";
    i.setAttributeNode(class);
    //<div id="task">を取得
    var task = document.getElementById('task');
    //<div>要素の直下に<li>/<i>/<br>要素の順番で追加
    task.appendChild(list);
    task.appendChild(i);
  },false);
},false);
