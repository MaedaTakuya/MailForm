<?php header("Content-Type:text/html;charset=utf-8");
// 言語設定、内部エンコーディングを指定
mb_language("japanese");
mb_internal_encoding("UTF-8");

// ファイルの読み込み
include_once('mail_config.php');//設定ファイル
include_once('complete_view.php');//完了画面

// 変数一覧
$errMsg = array();//エラーメッセージ用配列。
$content_of_inquiry = array();//お問い合わせ内容
$confirm_message = "";//確認画面表示用
$adminMail_message = "";//管理人メール用
$replyMail_message = "";//自動返信メール用
$sendMail_flag = 0;//メール送信処理フラグ

// 自作関数
// name属性の値を日本語に置き換え
function translation($src, $dest){
  return array_search($src, $dest);
}
// メールアドレスの型チェック
function mailCheck($mail){
  if(preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD', $mail)){
    return true;
  }else{
    return false;
  }
}





if($_POST){//$_POSTに値がなければ、入力ページにリダイレクト
  foreach($_POST as $key=>$val) {
    // 必須項目のチェック
    if($requiredCheck_flag){
      if (in_array($key, $required)) {
        if(empty($val)) {
          if($translation_flag){
            array_push($errMsg,translation($key,$translation_list).'は必須項目です。');
          }else{
            array_push($errMsg,$key.'は必須項目です。');
          }
        }
      }
    }
    // メールアドレスのチェック
    if($mailCheck_flag){
      if($key == 'mail' && !empty($val)) {
        if(!mailCheck($val)){
          array_push($errMsg,'メールアドレスの形式が正しくありません。');
        }
      }
    }
    // チェックボックスの場合、$valを分割
    if(is_array($val)){
      $val = implode(",", $val);
    }
    if($translation_flag){
      array_push($content_of_inquiry,translation($key,$translation_list)."\n".$val);
    }else{
      array_push($content_of_inquiry,$key."\n".$val);
    }
  }

  if (!empty($errMsg)) {//エラーメッセージの表示
    for($i = 0 ; $i < count($errMsg); $i++){
      echo $errMsg[$i]."<br>";
    }
  }else{// エラーがなければお問い合わせ内容をセットし、メール送信処理を実行
    for($i = 0 ; $i < count($content_of_inquiry); $i++){
      $confirm_message .= "<p>".nl2br(htmlspecialchars($content_of_inquiry[$i]))."</p>\n";
      $adminMail_message .= htmlspecialchars($content_of_inquiry[$i])."\n";
      $replyMail_message .= htmlspecialchars($content_of_inquiry[$i])."\n";
    }
    // 管理人宛てメール
    $adminMail_body = $adminMail_head.$adminMail_message.$adminMail_foot;
    $adminMail_from = "From:".$adminMail_from;
    $adminMail_headers = $adminMail_from;
    if($adminMail_cc != ""){
      $adminMail_headers .= "\r\n"."Cc:".$adminMail_cc;
    }
    if($adminMail_bcc != ""){
      $adminMail_headers .= "\r\n"."Bcc:".$adminMail_bcc;
    }
    if(mb_send_mail($adminMail_to,$adminMail_subject,$adminMail_body,$adminMail_headers)){
      $sendMail_flag = 1;
    }else{
      $sendMail_flag = 0;
    }
    // 自動返信メール
    if($replyMail){
      if(isset($_POST[$replyMail_name]) && $_POST[$replyMail_name] != ""){
        $replyMail_name = htmlspecialchars($_POST[$replyMail_name])."様\n\n";//お問い合わせ主の名前
      }else{
        $replyMail_name = "";
      }
      $replyMail_to = htmlspecialchars($_POST["mail"]);//返信先メールアドレス
      $replyMail_body = $replyMail_name.$replyMail_head.$replyMail_message.$replyMail_foot;
      if(mb_send_mail($replyMail_to,$replyMail_subject,$replyMail_body,"From:$replyMail_from")){
        $sendMail_flag = 1;
      }else{
        $sendMail_flag = 0;
      }
    }
    // メール送信後の表示
    if($sendMail_flag){
      complete_view($confirm_message);
    }else{
      echo "メール送信に失敗しました。";
    }
  }
}else{
  header("Location: {$redirect_url}");
  exit;
}