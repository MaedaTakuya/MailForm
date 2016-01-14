<?php header("Content-Type:text/html;charset=utf-8");
// POSTの値を変数にセット
// 開発者ツール等で入力エリアを消された場合は空の変数をセット
if ($_POST){
  $name = isset($_POST["name"])? htmlspecialchars($_POST["name"]) : "";
  $kana = isset($_POST["kana"])? htmlspecialchars($_POST["kana"]) : "";
  $mail = isset($_POST["mail"])? htmlspecialchars($_POST["mail"]) : "";
  $selectbox = isset($_POST["selectbox"])? $_POST["selectbox"] : "";
  $radio = isset($_POST["radio"])? $_POST["radio"] : "";
  $checkbox = isset($_POST["checkbox"])? $_POST["checkbox"] : "";
  if($checkbox){
    $checkbox = implode(",", $_POST["checkbox"]);
  }else{
    $checkbox = "チェック無し";
  }
  $body = isset($_POST["body"])? htmlspecialchars($_POST["body"]) : "";
  $body = nl2br($body);//改行文字の前に<br>タグを挿入する
}

  print '名前 => '.$name.'<br>';
  print 'フリガナ => '.$kana.'<br>';
  print 'メール => '.$mail.'<br>';
  print 'セレクトボックス => '.$selectbox.'<br>';
  print '性別 => '.$radio.'<br>';
  print 'チェックボックス => '.$checkbox.'<br>';
  print '本文 => '.$body.'<br>';