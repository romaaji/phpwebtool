<?php
/**
 * Online Video Converter
 * @author Achunk JealousMan
 * @link http://fb.me/achunks
 * @link http://convert2mp3.net
 * @license GPL
 * @Cara menggunakannya, upload atau kopi paste ke hosting anda masing-masing dan jalankan, contoh: http://situs-anda.com/file.php?id=id_youtube
 */
@set_time_limit(0);
$video_url = 'https://www.youtube.com/watch?v='.$_GET['id'].''; // supported sites:  YouTube, Dailymotion, Vevo and Clipfish
$format = 'mp3'; //supported format: mp3, m4a, aac, flac, ogg, wma, mp4, 3gp, avi, wmp
$user_agent = 'Opera/9.80 (J2ME/MIDP; Opera Mini/9.80 (S60; SymbOS; Opera Mobi/23.348; U; en) Presto/2.5.25 Version/10.54';
$cookie = dirname(__file__) . '/convert2mp3.txt';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://convert2mp3.net/en/index.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
$result = curl_exec($ch);
preg_match('/\<input type\=\"hidden\" name\=\"([a-z0-9]+)\" value\=\"([\d]+)\"\>/', $result, $matches, PREG_OFFSET_CAPTURE);
if (!$matches)
{
    header("HTTP/1.0 404 Not Found");
    die('Error');
}
$params = implode('&', array(
    'url=' . urlencode($video_url),
    'format=' . $format,
    'quality=1',
    $matches[1][0] . '=' . $matches[2][0],
    'convert=1',
    ));
$url = 'http://convert2mp3.net/en/index.php?p=convert';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
$res = curl_exec($ch);
$exp = explode('<iframe id="convertFrame" src="', $res);
$sub = explode('"', $exp[1]);
$frame_url = $sub[0];
curl_setopt($ch, CURLOPT_URL, $frame_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
$res = curl_exec($ch);
parse_str(parse_url($frame_url, PHP_URL_QUERY));
$sid = substr(parse_url($frame_url, PHP_URL_HOST), 5, -16);
$file_url = 'http://cdl' . $sid . '.convert2mp3.net/download.php?id=' . $id . '&key=' . $key . '&d=y';
curl_setopt($ch, CURLOPT_URL, $file_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
$out = curl_exec($ch);
$out = explode("\n", $out);
foreach ($out as $header)
{
    preg_match('#(.*?)\:\s(.*)#', $header, $matches);
    if (isset($matches[1]) && isset($matches[2]))
        header($matches[1] . ': ' . $matches[2]);
}
curl_setopt($ch, CURLOPT_URL, $file_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
echo curl_exec($ch);
curl_close($ch);