<?php

/*
入力例
30 30 10
3
6 0
7 0
8 0

a b c　　#配座駅へまで時間 a 分, 配座駅から儀野駅の乗車時間 b 分, 儀野駅から会社までの時間 c 分
N　　　　#配座駅から出る電車の本数を表す整数 N
h_1 m_1　#1本目の電車の発車時刻 h_1 時 m_1 分
h_2 m_2　#2本目の電車の発車時刻 h_2 時 m_2 分
...
h_N m_N　#N本目の電車の発車時刻 h_N 時 m_N 分
hh:mm　　　#自宅を出発する最も遅い時間 hh(0埋め二桁) 時 mm(0埋め二桁) 分
*/

$input_line = fgets(STDIN);
$timearray = explode(" ", $input_line);

$a = $timearray['0'];//家から駅まで
$bc = (int)$timearray['1'] + (int)$timearray['2'];//駅から会社まで（b+c）
//echo '家から駅まで: '.$a. "分\n";
//echo '駅から会社まで（b+c）: '.$bc. "分\n";

$d = 60 - $bc;
$e = 0;
while (!ctype_digit($d)){
    $d = 60 - (-$d);
    $e++; 
}

$e = 8 - $e;
//echo 'この時刻までの電車にのる: '.$e.':'.$d. "分\n";
if ($d == 0){
    $d = '00';
}
$starttime = $e . $d;

//電車の時間取得
for ($i = 0; $i < $input_line; $i++) {
    $input_line = fgets(STDIN);
    if ($i === 0){
        $n = $input_line; //駅からでる電車の本数
    }else{
        if ($input_line != false){
            $timearray2 = explode(" ", $input_line);
            if ($timearray2['1'] == 0){
                $timearray2['1'] = '00';
            }
            $str[] = $timearray2['0'].$timearray2['1'];
        }
    }
}

//電車に近い時刻に並び替え
$reversed = array_reverse($str);
foreach ($reversed as $key => $value){
    if ((int)$value < (int)$starttime){
        $result = $value;
    }
}

//echo '電車の出版は、'.$result;
$result = str_replace(array("\r\n","\r","\n"), '', $result);
$resulta = substr($result,1);
$resultb = substr($result, 0, 1);
$gole= (int)$resulta - $a;

$h = 0;
while (!ctype_digit($gole)){
    $gole = 60 - (-$gole);
    $h++; 
}

$resultHour = $resultb - (int)$h;
if (is_array($resultHour)) {
    if (count($resultHour) === 1){
        $resultHour = '0' . $resultHour;
    }
}
echo $resultHour . ':' . $gole;


?>
