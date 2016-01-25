<?php

function complete_view($pram){
echo <<< EOM
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>PHP MailForm Xample</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h1>送信完了画面</h1>
<p>下記内容を送信いたしました。</p>
$param
</div>
</body>
</html>
EOM;
}