<?php
function debug($data){
	echo "<pre>";
	var_dump($data);
	echo "<pre>";
	exit();
}
function tohtml($text){
	return nl2br(htmlentities($text));
}
function keycode($text){
	$text = preg_replace('#{url}#si', URL, $text);
	return $text;
}
function bbcode($text){
	$find = array(
		'#\[b](.+?)\[/b]#is',
		'#\[i](.+?)\[/i]#is',
		'#\[u](.+?)\[/u]#is',
		'#\[s](.+?)\[/s]#is',
		'!\[size=([0-9]{3})](.+?)\[/size]!is',
		'!\[color=(#[0-9a-f]{3}|#[0-9a-f]{6}|[a-z\-]+)](.+?)\[/color]!is',
		'!\[bg=(#[0-9a-f]{3}|#[0-9a-f]{6}|[a-z\-]+)](.+?)\[/bg]!is',
		'#\[quote](.+?)\[/quote]#is',
		'#\[left](.+?)\[/left]#is',
		'#\[right](.+?)\[/right]#is',
		'#\[center](.+?)\[/center]#is',
		'#\[html](.+?)\[/html]#is',
		'#\[img=(.+?)\](.+?)\[/img]#is',
		'#\[img=(.+?)\]#is',
		'#\[img](.+?)\[/img]#is',
		'#\[font=(.+?)\](.+?)\[/font]#is',
		'~\[url\]((?:ftp|https?)://.*?)\[/url\]~s',
		'~\[url=((?:ftp|https?)://.*?)\](.+?)\[/url\]~s',
		'#\[table](.+?)\[/table]#is',
		'#\[tr](.+?)\[/tr]#is',
		'#\[td](.+?)\[/td]#is',
	);
	$replace = array(
		'<span style="font-weight: bold">$1</span>',
		'<span style="font-style:italic">$1</span>',
		'<span style="text-decoration:underline">$1</span>',
		'<span style="text-decoration:line-through">$1</span>',
		'<font size="$1">$2</font>',
		'<span style="color:$1">$2</span>',
		'<span style="background-color:$1">$2</span>',
		'<blockquote class="blockquote">$1</blockquote>',
		'<div align="left">$1</div>',
		'<div align="right">$1</div>',
		'<div align="center">$1</div>',
		'<pre>$1</pre>',
		'<img src="$1" alt="IMAGE"/>',
		'<img src="$1" alt="IMAGE"/>',
		'<img src="$1" alt="IMAGE"/>',
		'<font face="$1">$2</font>',
		'<a href="$1">$1</a>',
		'<a href="$1">$2</a>',
		'<table>$1</table>',
		'<tr>$1</tr>',
		'<td>$1</td>',
	);
	foreach ($find as $el) {
		while(preg_match($el, $text)) {
			$text = preg_replace($find,$replace,$text);
		}
	}
	return $text;
}
function bbcodeold($text = '') {
	$find = array(
		'~\[b\](.*?)\[/b\]~s',
		'~\[i\](.*?)\[/i\]~s',
		'~\[u\](.*?)\[/u\]~s',
		'~\[quote\](.*?)\[/quote\]~s',
		'~\[size=(.*?)\](.*?)\[/size\]~s',
		'~\[color=(.*?)\](.*?)\[/color\]~s',
		'~\[url\]((?:ftp|https?)://.*?)\[/url\]~s',
		'~\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s'
	);
	// HTML tags to replace BBcode
	$replace = array(
		'<b>$1</b>',
		'<i>$1</i>',
		'<span style="text-decoration:underline;">$1</span>',
		'<pre>$1</'.'pre>',
		'<span style="font-size:$1;">$2</span>',
		'<span style="color:$1;">$2</span>',
		'<a href="$1">$1</a>',
		'<img src="$1" alt="" />'
	);
	$text = preg_replace('#\[b\](.*?)\[/b\]#si', '<span style="font-weight: bold;">\1</span>', $text);
	$text = preg_replace('#\[i\](.*?)\[/i\]#si', '<span style="font-style:italic;">\1</span>', $text);
	$text = preg_replace('#\[u\](.*?)\[/u\]#si', '<span style="text-decoration:underline;">\1</span>', $text);
	$text = preg_replace('#\[center\](.*?)\[/center\]#si', '<div align="center">\1</div>', $text);
	$text = preg_replace('#\[left\](.*?)\[/left\]#si', '<div align="left">\1</div>', $text);
	$text = preg_replace('#\[right\](.*?)\[/right\]#si', '<div align="right">\1</div>', $text);
	$text = preg_replace('#\[color=(.*?)\](.*?)\[/color\]#si', '<font color="\1">\2</font>', $text);
	$text = preg_replace('#\[size=(.*?)\](.*?)\[/size\]#si', '<span style="font-size:\1%">\2</span>', $text);
	$text = preg_replace('#\[face=(.*?)\](.*?)\[/face\]#si', '<span face="\1">\2</span>', $text);
	$text = preg_replace('#\\[img=http://#', '[img=', $text);
	$text = preg_replace('#\\[url=http://#', '[url=', $text);
	$text = preg_replace('#\\[img\\]http://#', '[img]', $text);
	$text = preg_replace('#\\[url]http://#', '[url]', $text);
	$text = preg_replace('~https?://((www.)?[0-9a-z\.-]+\.[0-9a-z]{2,6}[0-9a-zA-Z/\?\.\~&amp;_=/%-:\#\@]*)~', '[url]\1[/url]', $text);
	$text = preg_replace('~\\[url=(.+?)\\](.+?)\\[/url\\]~', '<a href="http://\1">\2</a>', $text);
	$text = preg_replace('~\\[url\\](.+?)\\[/url\\]~', '<a href="http://\1">\1</a>', $text);
	$text = preg_replace('#\[img=(.+?)\]#is', '<img src="http://\1" alt="image"/>', $text);
	$text = preg_replace('#\[img](.+?)\[/img]#is', '<img src="http://\1" alt="image"/>', $text);
	$text = preg_replace('#\[img=(.+?)\][/img]#is', '<img src="http://\1" alt="image"/>', $text);
	$text = preg_replace('#\[youtube\](.*?)\[/youtube\]#si', '<div class="embed"><iframe width="90%" src="https://www.youtube.com/embed/\1" frameborder="0" allowfullscreen></iframe></div>', $text);
	$text = preg_replace('#\[quote\](.*?)\[/quote\]#si', '<blockquote class="blockquote">\1</blockquote>', $text);
		return $text;
	}

	function pagination($page, $total){
		$startindex = $page - 1;
		$startindex = $page == $total && $total > 2 ? ($total - 2) : $startindex;
		$startindex = $page == 1 ? 1 : $startindex;
		$limit = $total < 3 ? $total : 3;
		$endindex   = $startindex + $limit;
		for($i = $startindex; $i < $endindex; $i++){
			$navs[] = $i;
		}
		$first = ($startindex > 1) ? true : false;
		$last  = ($endindex <= $total) ? true : false;
		return array('list' => $navs, 'first' => $first, 'last' => $last);
	}
	function mobile_detect()
	{
		if (isset($_SESSION['is_mobile'])) {
			return $_SESSION['is_mobile'] == 1 ? true : false;
		}
		$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? strtolower($_SERVER['HTTP_USER_AGENT']) : '';
		$accept = isset($_SERVER['HTTP_ACCEPT']) ? strtolower($_SERVER['HTTP_ACCEPT']) : '';
		if ((strpos($accept, 'text/vnd.wap.wml') !== false) || (strpos($accept, 'application/vnd.wap.xhtml+xml') !== false)) {
			$_SESSION['is_mobile'] = 1;

			return true;
		}
		if (isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE'])) {
			$_SESSION['is_mobile'] = 1;

			return true;
		}
		if (preg_match('/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $user_agent)
		|| preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i', substr($user_agent, 0, 4))
		) {
			$_SESSION['is_mobile'] = 1;

			return true;
		}
		$_SESSION['is_mobile'] = 2;

		return false;
	}
	function timeago($timestamp) {
		$diff = time() - (int)$timestamp;

		if ($diff < 30)
		return 'vừa xong';

		$intervals = array
		(
		1                   => array('năm',    31556926),
		$diff < 31556926    => array('tháng',   2628000),
		$diff < 2629744     => array('tuần',    604800),
		$diff < 604800      => array('ngày',     86400),
		$diff < 86400       => array('giờ',    3600),
		$diff < 3600        => array('phút',  60),
		$diff < 60          => array('giây',  1)
	);

	$value = floor($diff/$intervals[1][1]);
	return $value.' '.$intervals[1][0].' trước';
}
function display_time($time = false){
	if(!$time) $time=time();
	return date("F j, Y, g:i a",$time);
}

function goout(){
	header("Location: ".URL);
	exit();
}
function notfound(){
	header("Location: ".URL."404/");
	exit();
}
function noaccess(){
	header("Location: ".URL."noaccess/");
	exit();
}
function redirect($link){
	header("Location: $link");
}
function deactiveMagicQuotes(&$array, $depth = 0)
{
	if ($depth > 10 || !is_array($array))
	{
		return;
	}
	foreach ($array AS $key => $value)
	{
		if (is_array($value))
		{
			deactiveMagicQuotes($array[$key], $depth + 1);
		}
		else
		{
			$array[$key] = stripslashes($value);
		}
		if (is_string($key))
		{
			$new_key = stripslashes($key);
			if ($new_key != $key)
			{
				$array[$new_key] = $array[$key];
				unset($array[$key]);
			}
		}
	}
}
function rawurl($data){
	$marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
	"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
	,"ế","ệ","ể","ễ",
	"ì","í","ị","ỉ","ĩ",
	"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
	,"ờ","ớ","ợ","ở","ỡ",
	"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
	"ỳ","ý","ỵ","ỷ","ỹ",
	"đ",
	"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
	,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
	"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
	"Ì","Í","Ị","Ỉ","Ĩ",
	"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
	,"Ờ","Ớ","Ợ","Ở","Ỡ",
	"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
	"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
	"Đ");

	$marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
	,"a","a","a","a","a","a",
	"e","e","e","e","e","e","e","e","e","e","e",
	"i","i","i","i","i",
	"o","o","o","o","o","o","o","o","o","o","o","o"
	,"o","o","o","o","o",
	"u","u","u","u","u","u","u","u","u","u","u",
	"y","y","y","y","y",
	"d",
	"A","A","A","A","A","A","A","A","A","A","A","A"
	,"A","A","A","A","A",
	"E","E","E","E","E","E","E","E","E","E","E",
	"I","I","I","I","I",
	"O","O","O","O","O","O","O","O","O","O","O","O"
	,"O","O","O","O","O",
	"U","U","U","U","U","U","U","U","U","U","U",
	"Y","Y","Y","Y","Y",
	"D","","","","","–", "-");
	//Special string
	//	$text = preg_replace("/( |!|"|#|$|%|')/", '', $text);
	$string = preg_replace("#-(-+)#", "-", str_replace($marTViet,$marKoDau,$data));
	$url = str_replace("'", '', $string);
	$url = str_replace('%20', ' ', $url);
	$url = preg_replace('~[^\\pL0-9_]+~u', '-', $url); // substitutes anything but letters, numbers and '_' with separator
	$url = trim($url, "-");
	$url = iconv("utf-8", "us-ascii//TRANSLIT", $url);  // you may opt for your own custom character map for encoding.
	$url = strtolower($url);
	$url = preg_replace('~[^-a-z0-9_]+~', '', $url); // keep only letters, numbers, '_' and separator
	return $url;
}
?>
