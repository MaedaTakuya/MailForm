<?php
/* ------ リファラーチェック ------ */
// お問い合わせフォームを設置したサイトのドメインと、フォーム送信元のリファラーが同一かチェック
// チェックする true / チェックしない false
$referer_check_flag = true;
$site_domain = "192.168.33.10";//フォームを設置したサイトのドメイン

// PHPファイルに直接アクセスされた場合のリダイレクト先のURL（絶対パス）
$redirect_url = "http://192.168.33.10/mail.html";





/* ------ formのname属性の値を翻訳 ------ */
// 翻訳する true / 翻訳しない false
$translation_flag = true;
// 翻訳用の配列
// '翻訳したい日本語' => 'formのname属性の値'の形式で記述。
$translation_list = array(
  '[名前]' => 'name',
  '[フリガナ]' => 'kana',
  '[メール]' => 'mail',
  '[セレクトボックス]' => 'selectbox',
  '[ラジオボダン]' => 'radio',
  '[チェックボックス]' => 'checkbox',
  '[本文]' => 'body',
);





/* ------ 必須項目のチェック ------ */
// チェックする true / チェックしない false
$requiredCheck_flag = true;
// '指定するname属性の値','指定するname属性の値'の形式で記述。
$required = array('name','mail','checkbox','body');





/* ------ メールアドレスのチェック ------ */
// チェックする true / チェックしない false
$mailCheck_flag = true;





/* ------ 自動変数メールの設定 ------ */
// 送信する true / 送信しない false
// ※自動返信メールを送信する場合は、返信アドレス用のフォームのname属性をmailにし、メールアドレスのチェック、必須項目の指定を行ってください。
$replyMail = true;
$replyMail_name = "name";//自動返信メールに表示するお客様の名前。お名前入力欄のname属性を指定。
$replyMail_subject = "自動返信メールの件名";//自動返信メールの件名
$replyMail_from = "xxx@xxx.com";//自動返信メールに表示される送信元メールアドレス
// 自動返信メールの冒頭
$replyMail_head = <<< EOM
この度は、お問い合わせいただき誠にありがとうございます。
下記の内容で承りましたのでご連絡申し上げます。

お問い合わせ内容
-----------------------------------

EOM;
// 自動返信メールの署名
$replyMail_foot = <<< EOM

※このメールは自動配信しております。
※本メールへの返信はできません。ご了承ください。

*******************************************
　株式会社SAMPLE ○○部 
　山田 太郎 / YAMADA TAROU
　〒000-0000 東京都XX区XX XXビル XF
　TEL: 00-0000-0000 FAX: 00-0000-0000
　Email: sample@sample.com
　URL: http://sample.com/
*******************************************
EOM;





/* ------ 管理人宛てメールの設定 ------ */
// ※メールアドレスを複数指定する場合 => "aaa@sample.com,bbb@sample.com"
$adminMail_to = "xxx@xxx.com";// 管理人宛てメールの送信先メールアドレス
$adminMail_from = "xxx@xxx.com";// 管理人宛てメールに表示される送信元メールアドレス
$adminMail_cc = "";// 管理人宛てメールのcc送信先メールアドレス ※不要なら空のままでOK.
$adminMail_bcc = "";// 管理人宛てメールのbcc送信先メールアドレス ※不要なら空のままでOK.
$adminMail_subject = "管理人宛てメールの件名";//管理人宛てメールの件名
// 管理人宛てメールから、入力されたメールアドレスに直接返信できるようにする
// 返信する true / 返信しない false
// ※返信する場合は、返信アドレス用のフォームのname属性をmailにし、メールアドレスのチェック、必須項目の指定を行ってください。
$adminMail_reply_flag = true;
// 管理人宛てメールの冒頭
$adminMail_head = <<< EOM
ホームページからお問い合わせメールが届きました。

お問い合わせ内容
-----------------------------------

EOM;
// 管理人宛てメールの署名
$adminMail_foot = <<< EOM

*******************************************
　株式会社SAMPLE ○○部 
　山田 太郎 / YAMADA TAROU
　〒000-0000 東京都XX区XX XXビル XF
　TEL: 00-0000-0000 FAX: 00-0000-0000
　Email: sample@sample.com
　URL: http://sample.com/
*******************************************
EOM;
