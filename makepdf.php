<?php
require(__DIR__.'/basesheet.php');
require(__DIR__.'/tcpdf/tcpdf.php'); // include_path配下に設置したtcpdf.phpを読み込む

  $tcpdf = new TCPDF();
  $tcpdf->AddPage(); // 新しいpdfページを追加
  $tcpdf->SetFont("kozgopromedium", "", 10); // デフォルトで用意されている日本語フォント

  echo $basesheet;
  $tcpdf->writeHTML($basesheet); // 表示htmlを設定
  $tcpdf->Output('basesheet.pdf', 'I'); // pdf表示設定
?>
