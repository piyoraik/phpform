<!doctype html>
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
print "<h2>登録確認</h2>";
//個人情報
$info = $_POST[ "info" ];
$seireki_d = $_POST[ "nen" ];
$tuki_d = $_POST[ "tuki" ];
$niti_d = $_POST[ "niti" ];
//こっから検定
//エキスパート
$cgarts_e = $_POST[ "cgarts_e" ];
//ベーシック
$cgarts_b = $_POST[ "cgarts_b" ];

print "<table class='form'>";
print "<tr>";
print "<th>お名前</th>";
print "<td>" . $info[0] . "</td>";
print "<th rowspan='6' id='sentaku'>受験検定</th>";
print "<td rowspan='6' id='check'>";

//エキスパート受験数カウント用
$cgartse_c = array();
//ベーシック受験数カウント用
$cgartsb_c = array();

//エキスパート
print( "<br>" );
if ( !empty( $cgarts_e[ 0 ] ) ) {
  print $cgarts_e[ 0 ] . "<br>";
  $cgartse_c[ 0 ] = 1;
} else {
  print "";
  $cgarts_e[ 0 ] = NULL;
}
if ( !empty( $cgarts_e[ 1 ] ) ) {
  print $cgarts_e[ 1 ] . "<br>";
  $cgartse_c[ 1 ] = 1;
} else {
  print "";
  $cgarts_e[ 1 ] = NULL;
}
if ( !empty( $cgarts_e[ 2 ] ) ) {
  print $cgarts_e[ 2 ] . "<br>";
  $cgartse_c[ 2 ] = 1;
} else {
  print "";
  $cgarts_e[ 2 ] = NULL;
}
if ( !empty( $cgarts_e[ 3 ] ) ) {
  print $cgarts_e[ 3 ] . "<br>";
  $cgartse_c[ 3 ] = 1;
} else {
  print "";
  $cgarts_e[ 3 ] = NULL;
}  
if ( !empty( $cgarts_e[ 4 ] ) ) {
  print $cgarts_e[ 4 ] . "<br>";
  $cgartse_c[ 4 ] = 1;
} else {
  print "";
  $cgarts_e[ 4 ] = NULL;
}
//エキスパートここまで
//ベーシック
if ( isset( $cgarts_b[ 0 ] ) ) {
  print $cgarts_b[ 0 ] . "<br>";
  $cgartsb_c[ 0 ] = 1;
} else {
  print "";
  $cgarts_b[ 0 ] = NULL;
}
if ( isset( $cgarts_b[ 1 ] ) ) {
  print $cgarts_b[ 1 ] . "<br>";
  $cgartsb_c[ 1 ] = 1;
} else {
  print "";
  $cgarts_b[ 1 ] = NULL;
}
if ( isset( $cgarts_b[ 2 ] ) ) {
  print $cgarts_b[ 2 ] . "<br>";
  $cgartsb_c[ 2 ] = 1;
} else {
  print "";
  $cgarts_b[ 2 ] = NULL;
}
if ( isset( $cgarts_b[ 3 ] ) ) {
  print $cgarts_b[ 3 ] . "<br>";
  $cgartsb_c[ 3 ] = 1;
} else {
  print "";
  $cgarts_b[ 3 ] = NULL;
}
if ( isset( $cgarts_b[ 4 ] ) ) {
  print $cgarts_b[ 4 ] . "<br>";
  $cgartsb_c[ 4 ] = 1;
} else {
  print "";
  $cgarts_b[ 4 ] = NULL;
}
print "<br>";
//ベーシックここまで

// エキスパート配列内の合計    
$sume = array_sum( $cgartse_c );
// ベーシック配列内の合計
$sumb = array_sum( $cgartsb_c );

$cge = 6600;
$cgb = 5500;


print "</td>";
print "</tr>";
print "<tr>";
print "<th>フリガナ</th>";
print "<td>" . $info[1] . "</td>";
print "</tr>";
print "<tr>";
print "<th>クラス記号</th>";
print "<td>" . $info[2] . "</td>";
print "</tr>";
print "<tr>";
print "<th>担任教師</th>";
print "<td>" . $info[3] . "</td>";
print "</tr>";
print "<tr>";
print "<th>出席番号</th>";
print "<td>" . $info[4] . "</td>";
print "</tr>";
print "<tr>";
print "<th>学籍番号</th>";
print "<td>" . $info[5] . "</td>";
print "</tr>";
print "<tr>";
print "<th>個人ID</th>";
print "<td>" . $info[6] . "</td>";
print "<th>受験数</th>";
print "<td>エキスパート:" . $sume . "<br>ベーシック:" . $sumb . "</td>";
print "</tr>";
print "<tr>";
print "<th>生年月日</th>";
print "<td>" . $seireki_d . "年" . $tuki_d . "月" . $niti_d . "日</td>";
print "<th>受験料</th>";
print "<td>";

$exba = ($sume + $sumb) * 1000;

if ($sume == 0 && $sumb ==0) {
  print "未選択";
  $total = 0;
}
else if ($sume == 1 && $sumb == 0) {
  $total = $cge * $sume;
  print $total."円";
}
else if ($sume == 0 && $sumb == 1) {
  $total = $cgb * $sumb;
  print $total."円";
}
else if ($sume >= 3 || $sumb >= 3 ){
  print "受験数オーバー";
  $total = 0;
}
else {
  $total = $cge * $sume + $cgb * $sumb - $exba;
  print $total."円";
}

print "</td>";
print "</tr>";
print "<tr>";
print "<th colspan='4'>";
print "<form method='POST' class='backnext' action='./index.php'>";
print "<input type='submit' value='戻る/修正'>";
print "</form>";
// 個人情報
print "<form method='POST' class='backnext' action='./signup.php'>";
for($i=0;$i<=6;$i++){
  print "<input type='hidden' name='info[]' value=".$info[$i].">";
}
// 生年月日
print "<input type='hidden' name='nen' value=".$seireki_d.">";
print "<input type='hidden' name='tuki' value=".$tuki_d.">";
print "<input type='hidden' name='niti' value=".$niti_d.">";

//受験数、受験料
print "<input type='hidden' name='zyukene' value=".$sume.">";
print "<input type='hidden' name='zyukenb' value=".$sumb.">";
print "<input type='hidden' name='total' value=".$total.">";

//  エキスパート受験リスト
for($o=0;$o<=5;$o++){
  print "<input type='hidden' name='cgarts_e[]' value=".$cgarts_e[$o].">";
}

//  ベーシック受験リスト
for($p=0;$p<=5;$p++){
  print "<input type='hidden' name='cgarts_b[]' value=".$cgarts_b[ $p ].">";
}

print "<input type='submit' value='登録'>";
print "</form>";
print "</th>";
print "</tr>";
print "</table>";
?>
</body>
</html>