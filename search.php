<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="text.css">
	<title></title>
</head>
<body>
<?php
require_once("/var/data/info.php");
try {
    $s= new PDO ("mysql:host=$SERV;dbname=CGARTS","$USER","$PASS");
    print "【DB接続OK】<hr>";
}catch (PDOException $e) {
    print "【DB接続NG】エラーメッセージ:". $e->getMessage();
    print "<hr>";
}

$searchdata=<<<eot
<form method='POST' action='./searchd.php'>
<table class="form">
<tr>
<th colspan="2">検索フォーム</th>
</tr>
<tr>
<th>No</th>
<td><input method="text" name="info[]"></td>
</tr>
<th>お名前</th>
<td><input method="text" name="info[]"></td>
</tr>
</tr>
<th>クラス</th>
<td><input method="text" name="info[]"></td>
</tr>
</tr>
<th>担任教師</th>
<td><input method="text" name="info[]"></td>
</tr>
</tr>
<th>出席番号</th>
<td><input method="text" name="info[]"></td>
</tr>
</tr>
<th>学籍番号</th>
<td><input method="text" name="info[]"></td>
</tr>
</tr>
<th>個人ID</th>
<td><input method="text" name="info[]"></td>
</tr>
eot;

print $searchdata;

print "<tr>";
print "<th colspan='2'>";
print "<input type='submit' value='検索'>";
print "</form></div>";

print "<div><form method='POST' action='./index.php'>";
print "<input type='submit' value='戻る'>";
print "</form></div>";
print "</th>";
print "</tr>";
print "</table>";


?>
</body>
</html>