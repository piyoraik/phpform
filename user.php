<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./text.css">
<title>無題ドキュメント</title>
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
    
$kozin_d = "select * from USER ORDER BY NO";
$re=$s->query($kozin_d);
    
$zyuken_d = "select * from ZYUKEN ORDER BY NO";
$re2=$s->query($zyuken_d);
print "<h2>登録者一覧</h2>";

$total = "select * from MONEY ORDER BY NO";
$re3=$s->query($total);

$mozi=<<<eot
<table class="form">
    <tr>
    <th>No</th>
    <th>名前</th>
    <th>フリガナ</th>
    <th>クラス</th>
    <th>担任教師</th>
    <th>出席番号</th>
    <th>学籍番号</th>
    <th>個人ID</th>
    <th>西暦</th>
    <th>月</th>
    <th>日</th>
    </tr>
eot;
    
$mozi2=<<<eot
<table class="form">
    <tr>
    <th>No</th>
    <th>CGクリエイターE</th>
    <th>WebデザイナーE</th>
    <th>CGエンジニアE</th>
    <th>画像処理エンジニアE</th>
    <th>マルチメディアE</th>
    <th>CGクリエイターB</th>
    <th>WebデザイナーB</th>
    <th>CGエンジニアB</th>
    <th>画像処理エンジニアB</th>
    <th>マルチメディアB</th>
    </tr>    
eot;

$mozi3=<<<eot
<table class="form">
    <tr>
    <th>No</th>
    <th>エキスパート受験数</th>
    <th>ベーシック受験数</th>
    <th>受験料</th>
    </tr>    
eot;
    
print $mozi;
while($kekka=$re->fetch()){
    print "<tr>";
    for($a=0;$a<=10;$a++){
     print "<td>".$kekka[$a]."</td>";   
    }
    print "</tr>";
}
print "</table>";
print "<br>";

print $mozi2;
while($kekka=$re2->fetch()){
    print "<tr>";
    for($a=0;$a<=10;$a++){
     print "<td>".$kekka[$a]."</td>";   
    }
    print "</tr>";
}
print "</table>";

print "<br>";
print $mozi3;
while($kekka=$re3->fetch()){
    print "<tr>";
    for($a=0;$a<=3;$a++){
     print "<td>".$kekka[$a]."</td>";   
    }
    print "</tr>";
}
print "</table>";
?>
</body>
</html>