<?php header("Content-Type:text/html;charset=utf-8");
include_once('mail_config.php');//設定ファイル


// --- 自作関数 ---
// name属性の値を日本語に置き換え
function translation($src, $dest){
  return array_search($src, $dest);
}






if($_POST){//$_POSTに値がなければ、入力ページにリダイレクトする。
  foreach($_POST as $key=>$val) {
    // チェックボックスの場合、$valを分割
    if(is_array($val)){
      $val = implode(",", $val);
    }
    print translation($key,$translation_list).'=>'.$val.'<br>';
  }
}else{
  header("Location: {$redirect_url}");
  exit;
}