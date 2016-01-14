<?php header("Content-Type:text/html;charset=utf-8");
include_once('mail_config.php');//設定ファイル
// --- 変数一覧 ---
$errMsg = array();//エラーメッセージ用配列。

// --- 自作関数 ---
// name属性の値を日本語に置き換え
function translation($src, $dest){
  return array_search($src, $dest);
}






if($_POST){//$_POSTに値がなければ、入力ページにリダイレクトする。
  foreach($_POST as $key=>$val) {
    // 必須項目のチェック
    if (in_array($key, $required)) {
      if(empty($val)) {
        array_push($errMsg,translation($key,$translation_list).'は必須項目です。');
      }
    }
    // チェックボックスの場合、$valを分割
    if(is_array($val)){
      $val = implode(",", $val);
    }
  print translation($key,$translation_list).'=>'.$val.'<br>';
  }
  // エラーメッセージを表示
  if (!empty($errMsg)) {
    for($i = 0 ; $i < count($errMsg); $i++){
      echo $errMsg[$i]."<br>";
    }
  }
}else{
  header("Location: {$redirect_url}");
  exit;
}