document.addEventListener('DOMContentLoaded', function() {
  //日本語フォント読み込み
  pdfMake.fonts = {
    GenShin: {
      normal: 'GenShinGothic-Normal.ttf',
      bold: 'GenShinGothic-Normal.ttf',
      italics: 'GenShinGothic-Normal.ttf',
      bolditalics: 'GenShinGothic-Normal.ttf'
    }
  };
  document.getElementById('makepdf').addEventListener('click', function() {

    //PDF作成処理
    var userstask = document.getElementById('table');
    console.log(userstask);
    var docDef = {
      content: [{
        table:{
          widths:['*','*','*'],
          body:[userstask]
        }
      }],
      defaultStyle: {
        font: 'GenShin',
      },
    };
    pdfMake.createPdf(docDef).download("basesheet.pdf");

  }, false);
}, false);
