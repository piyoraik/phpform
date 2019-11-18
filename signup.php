<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>無題ドキュメント</title>
	<link rel="stylesheet" type="text/css" href="text.css">
</head>
<body>
<?php
require_once( "/var/data/info.php" );
try {
  $s = new PDO( "mysql:host=$SERV;dbname=CGARTS", "$USER", "$PASS" );
  print "【DB接続OK】<hr><br>";
} catch ( PDOException $e ) {
  print "【DB接続NG】エラーメッセージ:" . $e->getMessage();
  print "<hr>";
}

// 個人情報
$info = $_POST[ "info" ];
$nen  = $_POST["nen"];
$tuki = $_POST["tuki"];
$niti = $_POST["niti"];

//受験科目
$cgarts_e = $_POST["cgarts_e"];
$cgarts_b = $_POST["cgarts_b"];

//受験数、受験料
$sume = $_POST["zyukene"];
$sumb = $_POST["zyukenb"];
$total = $_POST["total"];

$table=<<<eot
<table class="form">
<tr>
	<th colspan="2">登録完了</th>
</tr>
<tr>
	<th>ログインID</th>
	<td>＊＊＊＊＊＊＊＊＊＊＊</td>
</tr>
<tr>
	<th>パスワード</th>
	<td>＊＊＊＊＊＊＊＊＊＊＊</td>
</tr>
<tr>
	<td colspan="2">登録内容はトップページのログインページから確認できます。</td>
</tr>
<tr>
	<th colspan="2">
	<form method="POST" action="./index.php">
		<input type="submit" value="トップページへ戻る">
	</form> 
	</th>
</tr>
</table>
eot;

print $table;

    
try{
$info_d = "INSERT INTO USER (NAMA,HURI,CLAS,TANNIN,SYUSEKI,GAKUSEKI,MYIID,SEIREKI,TUKI,NITI) VALUES ('".$info[0]."','".$info[1]."','".$info[2]."','".$info[3]."',".$info[4].",'".$info[5]."','".$info[6]."','".$nen."','".$tuki."','".$niti."');";

$zyuken_d = "INSERT INTO ZYUKEN (CGCE,WBDE,CGEE,PICEE,MME,CGCB,WBDB,CGEB,PICEB,MMB) VALUES ('".$cgarts_e[0]."','".$cgarts_e[1]."','".$cgarts_e[2]."','".$cgarts_e[3]."','".$cgarts_e[4]."','".$cgarts_b[0]."','".$cgarts_b[1]."','".$cgarts_b[2]."','".$cgarts_b[3]."','".$cgarts_b[4]."');";

$total = "INSERT INTO MONEY (ZYUKENE,ZYUKENB,TOTAL) VALUES (".$sume.",".$sumb.",".$total.");";
$s->query($info_d);
$s->query($zyuken_d);
$s->query($total);
    
}catch(PDOException $Exception) {  
	print "エラー：".$Exception->getMessage(); 
}

?>
</body>
</html>