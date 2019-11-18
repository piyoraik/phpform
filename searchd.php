<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="text.css">
<title>無題ドキュメント</title>
</head>

<body>
<?php

include("./search.php");

$info = $_POST["info"];

$where = [];

if(!empty($info[0])){
	$where[] = "NO LIKE '%$info[0]%'";
}
if(!empty($info[1])){
	$where[] = "NAMA LIKE '%$info[1]%'";
}
if(!empty($info[2])){
    $where[] = "CLAS LIKE '%$info[2]%'";
}
if(!empty($info[3])){
    $where[] = "TANNIN LIKE '%$info[3]%'";
}
if(!empty($info[4])){
    $where[] = "SYUSEKI LIKE '%$info[4]%'";
}
if(!empty($info[5])){
    $where[] = "GAKUSEKI LIKE '%$info[5]%'";
}
if(!empty($info[6])){
    $where[] = "MYIID LIKE '%$info[6]%'";
}
if($where){
    $wheresql = implode(' AND ', $where);
    $sql = 'SELECT NO,NAMA,HURI,CLAS,TANNIN,SYUSEKI,GAKUSEKI,MYIID FROM USER WHERE ' . $wheresql;
}else {
    $sql = 'SELECT NO,NAMA,HURI,CLAS,TANNIN,SYUSEKI,GAKUSEKI,MYIID FROM USER';
}
print "<h2>検索結果</h2>";  

$select = $sql;
$select_u = $s->query($select);

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
    </tr>  
eot;
    
print $mozi;

while($kekka=$select_u->fetch()){
	print "<tr>";
    for($a=0;$a<=7;$a++){
     print "<td>".$kekka[$a]."</td>";   
    }
    print "</tr>";
}

print "</table>";

?>
</body>
</html>