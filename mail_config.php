<?php

// PHPファイルに直接アクセスされた場合のリダイレクト先のURL（絶対パス）
$redirect_url = "http://xxxx/mail.html";

// 翻訳用の配列
// '翻訳したい日本語' => 'formのname属性の値'の形式で記述。
$translation_list = array(
  '名前' => 'name',
  'フリガナ' => 'kana',
  'メール' => 'mail',
  'セレクトボックス' => 'selectbox',
  'ラジオボダン' => 'radio',
  'チェックボックス' => 'checkbox',
  '本文' => 'body',
);
