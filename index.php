<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>無題ドキュメント</title>
<link rel="stylesheet" type="text/css" href="text.css">
</head>

<body>
<h2>CG-ARTS検定 会員登録フォーム</h2>
<!-- <form method="post" action="kekka.php"> -->
  <form method="POST" action="kekka.php">
  <table class="form">
    <tr>
      <th>メールアドレス</th>
      <td>eeeeeee</td>
    </tr>
    <tr>
      <th>お名前</th>
      <td><input type="text" name="info[]"></td>
    </tr>
    <tr>
      <th>フリガナ</th>
      <td><input type="text" name="info[]"></td>
    </tr>
    <tr>
      <th>クラス記号</th>
      <td><input type="text" name="info[]"></td>
    </tr>
    <tr>
      <th>担任教師</th>
      <td><input type="text" name="info[]"></td>
    </tr>
    <tr>
      <th>出席番号</th>
      <td><input type="text" name="info[]"></td>
    </tr>
    <tr>
      <th>学籍番号</th>
      <td><input type="text" name="info[]"></td>
    </tr>
    <tr>
      <th>個人ID</th>
      <td><input type="text" name="info[]">
        <br>
        <em id="kozin">2005年後期以降に取得個人IDを記入すると<br>
        受験履歴に登録されます。</em></td>
    </tr>
    <tr>
      <th>生年月日</th>
      <td><select name="nen">
          <option value="">----年</option>
          <?php
          for ( $nen = 1990; $nen <= 2019; $nen++ ) {
            print "<option value=" . $nen . ">" . $nen . "年</option>";
          }
          ?>
        </select>
        <select name="tuki">
          <option value="">--月</option>
          <?php
          for ( $tuki = 1; $tuki <= 12; $tuki++ ) {
            print "<option value=" . $tuki . ">" . $tuki . "月</option>";
          }
          ?>
        </select>
        <select name="niti">
          <option value="">--日</option>
          <?php
          for ( $niti = 1; $niti <= 31; $niti++ ) {
            print "<option value=" . $niti . ">" . $niti . "日</option>";
          }
          ?>
        </select></td>
    </tr>
    <tr>
      <th id="sentaku">受験検定選択<br>
        <em class="ryoukin">【受験料】</em><br>
        <em class="ryoukin">エキスパート:各6600円</em><br>
        <em class="ryoukin">ベーシック:各5500円</em> </th>
      <td id="check"><em class="lebel">【エキスパート】</em><br>
        
        <input type="checkbox" name="cgarts_e[0]" value="CGクリエイターエキスパート">
        CGクリエイター
        <input type="checkbox" name="cgarts_e[1]" value="Webデザイナーエキスパート">
        Webデザイナー<br>
        <input type="checkbox" name="cgarts_e[2]" value="CGエンジニアエキスパート">
        CGエンジニア 
        　
        <input type="checkbox" name="cgarts_e[3]" value="画像処理エンジニアエキスパート">
        画像処理エンジニア<br>
        <input type="checkbox" name="cgarts_e[4]" value="マルチメディアエキスパート">
        マルチメディア<br>
        <em class="lebel">【ベーシック】</em><br>
        <input type="checkbox" name="cgarts_b[0]" value="CGクリエイターベーシック">
        CGクリエイター
        <input type="checkbox" name="cgarts_b[1]" value="Webデザイナーベーシック">
        Webデザイナー<br>
        <input type="checkbox" name="cgarts_b[2]" value="CGエンジニアベーシック">
        CGエンジニア     　
        <input type="checkbox" name="cgarts_b[3]" value="画像処理エンジニアベーシック">
        画像処理エンジニア<br>
        <input type="checkbox" name="cgarts_b[4]" value="マルチメディアベーシック">
        マルチメディア </td>
    </tr>
    <tr>
      <th colspan="4"><input type="submit" value="登録"></th>
    </tr>
    <tr>
      <th colspan="4">既に登録済みの方は<a href="...html">こちら</a></th>
    </tr>
    <tr>
      <th colspan="4"><a href="./user.php">登録者一覧</a></th>
    </tr>
    <tr>
      <th colspan="4"><a href="./search.php">検索</a></th>
    </tr>
    <tr>
      <td colspan="4" id="waribiki"> ※ベーシック2検定、エキスパート2検定まで受験可能で、最大で4検定の受験が可能です。<br>
        【併用受験の割引について】<br>
        →2検定同時申し込み→合計から￥2000引き。<br>
        →3検定同時申し込み→合計から￥3000引き。<br>
        →4検定同時申し込み→合計から￥4000引き。<br></td>
    </tr>
  </table>
</form>
</body>
</html>