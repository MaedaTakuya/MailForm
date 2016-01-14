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



// 言語設定、内部エンコーディングを指定する
mb_language("japanese");
mb_internal_encoding("UTF-8");
 
$to = $mail;//送信先のメールアドレス
$subject = "メールフォームからのお問い合わせ";//メールの件名
$message = $name."(".$kana.")さんからのお問い合わせ。";//メールの本文
$from = "From:xxx@xxx.com";//差し出しメールアドレス

if(mb_send_mail($to,$subject,$message,$from)){
  echo "メール送信に成功しました。";
}else{
  echo "メール送信に失敗しました。";
}