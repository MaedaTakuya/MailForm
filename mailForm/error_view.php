<?php

function error_view($pram){
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
<h1>エラー画面</h1>
<p>下記内容を修正してください</p>
$pram
<a class="btn btn-default" href="javascript:history.back();">修正する</a>
</div>
</body>
</html>
EOM;
}