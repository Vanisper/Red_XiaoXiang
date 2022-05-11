<?php
//准备对接
header('Content-type: application/x-javascript');
header("Content-type: text/html; charset=uft-8");
//对接完成
//准备接收数据
$url='http://wufazhuce.com';//one一个
$data=get_file($url);
//数据接收完成
//准备分析数据
$title='/(?<=(title="Permalink to ))([^<]*)(?=(" rel="bookmark"))/';//匹配标题
$num_1=preg_match_all($title,$data,$match_title);
$img='/(?<=(<img src="))([^<]*)(?=(" alt="VOL.))/';//匹配图片
$num_2=preg_match_all($img,$data,$match_img);
$img_a='/(?<=(text-align: right;">))([^o]*)(?=(<\/p>))/';//匹配图片标题
$num_3=preg_match_all($img_a,$data,$match_imga);
$word='/(?<=(<blockquote><p>))([^<]*)(?=(<\/p><\/blockquote>))/';//匹配文字
$num_4=preg_match_all($word,$data,$match_word);
//数据分析完成
//准备处理数据
echo "function oneimg(){document.write(\"" . $match_img[0][0] . "\");}";
echo "function oneimga(){document.write(\"" . $match_imga[0][0] . "\");}";
echo "function onetitle(){document.write(\"" . $match_title[0][0] . "\");}";
echo "function oneword(){document.write(\"" . $match_word[0][0] . "\");}";
//数据处理完成
function get_file($url)
{
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$url);  
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($curl);  
    curl_close($curl);
    return $data;
}
//对接成功
?>