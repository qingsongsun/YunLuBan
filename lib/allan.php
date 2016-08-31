<?php

function post($url, $data) {
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}
/**
 * 
 */
function urlGet($str){
    $data = array();
    $parameter = @explode('&',end(@explode('?',$str)));
    foreach($parameter as $val){
        $tmp = explode('=',$val);
        $data[$tmp[0]] = $tmp[1];
    }
    return $data;
}
function urlMake($array){
    $str="?";
    foreach($array as $key=>$value){
        $str.="{$key}={$value}&";
    }
    return trim($str,'&');
}
function autocut($strContent, $strFormat, $v = '{v}') {
    if ($strFormat == $v)
        return $strContent;
    $cut_left = ex($strFormat, $v, 0);
    $cut_right = ex($strFormat, $v, 1);
    $get_v = cut($strContent, $cut_left, $cut_right);
    return $get_v;
}

function curl($url, $header = 0) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl, CURLOPT_TIMEOUT, 15);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp');
    if (!$data = curl_exec($curl))
        return FALSE;
    curl_close($curl);
    return $data;
}

function cut($file, $from, $end) {
    $dong = '[dong*]';
    if (strpos($from, $dong)) {
        $dongqian = ex($from, $dong, 0);
        $donghou = ex($from, $dong, 1);

        $from = $dongqian . ex(ex($file, $dongqian, 1), $donghou, 0) . $donghou;
    }

    $message = explode("$from", "$file");
    $ot = $message [1] . $message [2] . $message [3] . $message [4];
    $message = explode("$end", $ot);
    return $message [0];
}

function ex($contents, $sp, $type) {
    $c = @explode($sp, $contents);
    return $c[$type];
}

function dom($contents, $html, $id_or_class = '') {
    // 模拟DOM找到对应�?
    if ($id_or_class === '')
        $start = 1;
    $contents = str_replace("<{$html}", "<{$html}_[!!!!]", $contents);
    $contents = str_replace("</{$html}", "<{$html}_[@@@@]", $contents);

    $c_ev = explode("<{$html}_", $contents);
    //print_r($c_ev);
    for ($i = 1; $i <= count($c_ev) - 1; $i++) {

        if ($d === 0)
            break;

        if (strstr($c_ev [$i], "$id_or_class")) {
            $start = 1;
        }

        //�?始计�?
        if (strstr($c_ev [$i], "[!!!!]") and $start === 1)
            $d++;
        if (strstr($c_ev [$i], "[@@@@]") and $start === 1)
            $d--;

        if ($d >= 0 and $start == 1) {
            $new_c = $new_c . $c_ev [$i];
        }

        $new_c = str_replace('[!!!!]', "<{$html}", $new_c);
        $new_c = str_replace('[@@@@]', "</{$html}", $new_c);
    }
    return $new_c;
}
