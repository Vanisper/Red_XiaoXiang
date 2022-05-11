<?php
$url="http://49.235.95.232/red/";
$out=req_curl($url);
echo $out;
function req_curl($url, &$status = null, $options = array()){
    $res = '';
    $options = array_merge(array(
    'follow_local' => true,
    'timeout' => 30,
    'max_redirects' => 4,
    'binary_transfer' => false,
    'include_header' => false,
    'no_body' => false,
    'cookie_location' => dirname(__FILE__) . '/cookie',
    'useragent' => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1',
    'post' => array() ,
    'referer' => null,
    'ssl_verifypeer' => 0,
    'ssl_verifyhost' => 0,
    'headers' => array(
        'Expect:'
    ),
    'auth_name' => '',
    'auth_pass' => '',
    'session' => false
    ) , $options);
    $options['url'] = $url;

    $s = curl_init();    if (!$s) return false;

    curl_setopt($s, CURLOPT_URL, $options['url']);
    curl_setopt($s, CURLOPT_HTTPHEADER, $options['headers']);
    curl_setopt($s, CURLOPT_SSL_VERIFYPEER, $options['ssl_verifypeer']);
    curl_setopt($s, CURLOPT_SSL_VERIFYHOST, $options['ssl_verifyhost']);
    curl_setopt($s, CURLOPT_TIMEOUT, $options['timeout']);
    curl_setopt($s, CURLOPT_MAXREDIRS, $options['max_redirects']);
    // curl_setopt($s, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($s, CURLOPT_FOLLOWLOCATION, $options['follow_local']);
    curl_setopt($s, CURLOPT_COOKIEJAR, $options['cookie_location']);
    curl_setopt($s, CURLOPT_COOKIEFILE, $options['cookie_location']);    if (!empty($options['auth_name']) && is_string($options['auth_name']))
    {
        curl_setopt($s, CURLOPT_USERPWD, $options['auth_name'] . ':' . $options['auth_pass']);
    }    if (!empty($options['post']))
    {
        curl_setopt($s, CURLOPT_POST, true);
        curl_setopt($s, CURLOPT_POSTFIELDS, $options['post']);        //curl_setopt($s, CURLOPT_POSTFIELDS, array('username' => 'aeon', 'password' => '111111'));
    }    if ($options['include_header'])
    {
        curl_setopt($s, CURLOPT_HEADER, true);
    }    if ($options['no_body'])
    {

        curl_setopt($s, CURLOPT_NOBODY, true);
    }    if ($options['session'])
    {
        curl_setopt($s, CURLOPT_COOKIESESSION, true);
        curl_setopt($s, CURLOPT_COOKIE, $options['session']);
    }
    curl_setopt($s, CURLOPT_USERAGENT, $options['useragent']);
    curl_setopt($s, CURLOPT_REFERER, $options['referer']);
    $res = curl_exec($s);
    $status = curl_getinfo($s, CURLINFO_HTTP_CODE);
    curl_close($s);
    return $res;
}
?>