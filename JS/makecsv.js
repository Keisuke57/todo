//ここからCSV出力＆ダウンロード
function handleDownload() {
        var bom = new Uint8Array([0xEF, 0xBB, 0xBF]);//文字コードをBOM付きUTF-8に指定
        var table = document.getElementById('userstable');//id=userstable1という要素を取得
        var data_csv="";//ここに文字データとして値を格納していく

        for(var i = 0;  i < table.rows.length; i++){
          for(var j = 0; j < table.rows[i].cells.length; j++){
            data_csv += table.rows[i].cells[j].innerText;//HTML中の表のセル値をdata_csvに格納
            if(j == table.rows[i].cells.length-1) data_csv += "\n";//行終わりに改行コードを追加
            else data_csv += ",";//セル値の区切り文字として,を追加
          }
        }

        var blob = new Blob([ bom, data_csv], { "type" : "text/csv" });//data_csvのデータをcsvとしてダウンロードする関数
        if (window.navigator.msSaveBlob) { //IEの場合の処理
            window.navigator.msSaveBlob(blob, "test.csv");
            //window.navigator.msSaveOrOpenBlob(blob, "test.csv");// msSaveOrOpenBlobの場合はファイルを保存せずに開ける
        } else {
            document.getElementById("csv").href = window.URL.createObjectURL(blob);
        }

        delete data_csv;//data_csvオブジェクトはもういらないので消去してメモリを開放
    }
    //ここまでCSV出力＆ダウンロード
