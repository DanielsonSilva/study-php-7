<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Internationalization Example</title>	
</head>
<body>
<b>Internationalization</b><br>
<br>
The users from around the globe use different letters to express themselves. The encoding ASCII serve only to english audience, and do not accept latin characters.<br>
The encoding of the file has to be changed as well. This file encoding if <b>UTF-8</b>.<br>
To PHP accept latin characters, we have to define the globals as UTF-8, like down below, that characters can have 8 bits and has latin characters. If the required language is a japanese or chinese, UTF-16 or UTF-32 can be used to raise the maximum allowed bits.<br>
<br>
mb_internal_encoding('UTF-8');<br>
mb_http_output('UFT-8');<br>
mb_http_input('UTF-8');<br>
mb_language('uni');<br>
<br>
The <b>meta</b> tag of the page has to define the charset like: <i>&lt;meta charset="UTF-8"&gt;</i>
<?php 
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_language('uni');
?><br>
英語 -> is a two character word for "english" in japanese.<br>
strlen("英語") = <?= strlen("英語") ?><br>
mb_strlen("英語") = <?= mb_strlen("英語") ?><br>
<br>
The <b>mb</b> package, enabled in phpinfo(), can detect that each japanese character is 1 character, even if one character use 3 bytes, as <b>strlen</b> function detected.<br>
&#x30C3; is &#38;&#35;x30C3; => unicode code<br>
</body>
</html>