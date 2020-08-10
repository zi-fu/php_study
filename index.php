<?php

$file = new SplFileObject('access.log', 'r');
$file->setFlags(SplFileObject::DROP_NEW_LINE);

foreach ($file as $n => $line) {
    $i=0;
    if ($line === false) continue;
    //スペースの統一
    $line = mb_convert_kana($line, "s");
    $pieces = explode(" ", $line);
    //対象のデータのみを変数に格納
    if (!empty($pieces['6'])) {
      $tmp[] = $pieces['6'];
    }
    $i++;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHP Practice</title>
</head>
<body>
  <p>アクセスログから、スペース区切りで7番目のデータを取りだすプログラム</p>
<?php foreach ($tmp as $j => $data) { echo "$data <br>";}?>
</body>
</html>