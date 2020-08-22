<?php
    $input_line = fgets(STDIN);
    //末尾から文字を取得
    $word = substr($input_line, -2);
    $oneword = substr($input_line, -1);
    $replace = [
        // '置換前の文字' => '置換後の文字',
        's' => 'ses',
        'sh' => 'shes',
        'ch' => 'ches',
        'o' => 'oes',
        'x' => 'xes',
        'f' => 'ves',
        'fe' => 'ves',
        'y' => 'ies',
        ];
    //共通処理　
    function common ($input_line, $length, $word, $replace){
        $tmp = substr($input_line, 0, $length);
        $tmp2 = strtr($word, $replace);
        return $tmp . $tmp2;
    }
    
    if ($oneword === 's' || $oneword === 'o' || $oneword === 'x' || $oneword === 'f'){
        $length = strlen($input_line) -1;
        echo common($input_line, $length, $oneword, $replace);
    }elseif ($word === 'sh' || $word === 'ch' || $word === 'fe'){
        $length = strlen($input_line) -2;
        echo common($input_line, $length, $word, $replace);
    }elseif ($oneword === 'y' && $word != 'ay' || $word != 'iy' || $word != 'uy' || $word != 'ey' || $word != 'oy') {
        $length = strlen($input_line) -1;
        echo common($input_line, $length, $oneword, $replace);
    }else{
        echo $word . 's'; 
    }
?>
