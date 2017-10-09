<html>
<head>
<meta charset="UTF-8">
<title>Regular Expressions Example</title>
</head>
<body>
<b>Regular Expressions</b><br>
<br>
Regex is used to match pattern within a text. There are several flavors that regex uses, but in the PHP 7 it used the PCRE, the same used as Perl.<br>
This <a href="http://www.regex101.com">site</a> is used to test some regex regular expressions within a text. In examples below, we gonna test several strings using <b>preg_match</b> function.<br>
<br>
We can use [0-9] or \d to represent one digit, [a-z] to represent lowercase character, [A-Z] to represent uppercase character, [a-zA-Z] to represent lowercase or uppercase character and symbols individually as @, !, #, % and others. The brackets represent one single character. If the brackets comes with no <b>-</b>, it deals with the characters individually. So, if the regular expression is [abc] it try to recognize in the pattern for the letter a or letter b or letter c only.<br>
<br>
preg_match(<i>&lt;regular expression(RE)&gt;</i>, <i>&lt;test string(TS)&gt;</i>) ? "It is a match!&lt;br&gt;" : "It is not a match...&lt;br&gt;";<br>
<br>
RE="/[0-9]/", TS="5" -> <?= preg_match("/[0-9]/", "5") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[0-9]/", TS="57" -> <?= preg_match("/[0-9]/", "57") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[0-9]/", TS="43T" -> <?= preg_match("/[0-9]/", "43T") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[0-9]/", TS="r43" -> <?= preg_match("/[0-9]/", "r43") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[0-9]/", TS="a" -> <?= preg_match("/[0-9]/", "a") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[0-9]/", TS="B" -> <?= preg_match("/[0-9]/", "B") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[0-9]/", TS="%$#fr5" -> <?= preg_match("/[0-9]/", "%$#fr5") ? "It is a match!<br>" : "It is not a match...<br>" ?>
<br>
RE="/[a-z]/", TS="5" -> <?= preg_match("/[a-z]/", "5") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[a-z]/", TS="57" -> <?= preg_match("/[a-z]/", "57") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[a-z]/", TS="43T" -> <?= preg_match("/[a-z]/", "43T") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[a-z]/", TS="r43" -> <?= preg_match("/[a-z]/", "r43") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[a-z]/", TS="a" -> <?= preg_match("/[a-z]/", "a") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[a-z]/", TS="B" -> <?= preg_match("/[a-z]/", "B") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[a-z]/", TS="%$#fr5" -> <?= preg_match("/[a-z]/", "%$#fr5") ? "It is a match!<br>" : "It is not a match...<br>" ?>
<br>
RE="/[A-Z]/", TS="5" -> <?= preg_match("/[A-Z]/", "5") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[A-Z]/", TS="57" -> <?= preg_match("/[A-Z]/", "57") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[A-Z]/", TS="43T" -> <?= preg_match("/[A-Z]/", "43T") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[A-Z]/", TS="r43" -> <?= preg_match("/[A-Z]/", "r43") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[A-Z]/", TS="a" -> <?= preg_match("/[A-Z]/", "a") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[A-Z]/", TS="B" -> <?= preg_match("/[A-Z]/", "B") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[A-Z]/", TS="%$#fr5" -> <?= preg_match("/[A-Z]/", "%$#fr5") ? "It is a match!<br>" : "It is not a match...<br>" ?>
<br>
RE="/[a-zA-Z]/", TS="5" -> <?= preg_match("/[a-zA-Z]/", "5") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[a-zA-Z]/", TS="57" -> <?= preg_match("/[a-zA-Z]/", "57") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[a-zA-Z]/", TS="43T" -> <?= preg_match("/[a-zA-Z]/", "43T") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[a-zA-Z]/", TS="r43" -> <?= preg_match("/[a-zA-Z]/", "r43") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[a-zA-Z]/", TS="a" -> <?= preg_match("/[a-zA-Z]/", "a") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[a-zA-Z]/", TS="B" -> <?= preg_match("/[a-zA-Z]/", "B") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[a-zA-Z]/", TS="%$#fr5" -> <?= preg_match("/[a-zA-Z]/", "%$#fr5") ? "It is a match!<br>" : "It is not a match...<br>" ?>
<br>
RE="/[!@#$%]/", TS="5" -> <?= preg_match("/[!@#$%]/", "5") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[!@#$%]/", TS="57" -> <?= preg_match("/[!@#$%]/", "57") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[!@#$%]/", TS="43T" -> <?= preg_match("/[!@#$%]/", "43T") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[!@#$%]/", TS="r43" -> <?= preg_match("/[!@#$%]/", "r43") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[!@#$%]/", TS="a" -> <?= preg_match("/[!@#$%]/", "a") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[!@#$%]/", TS="B" -> <?= preg_match("/[!@#$%]/", "B") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[!@#$%]/", TS="%$#fr5" -> <?= preg_match("/[!@#$%]/", "%$#fr5") ? "It is a match!<br>" : "It is not a match...<br>" ?>
<br>
RE="/[36@rB]/", TS="5" -> <?= preg_match("/[36@rB]/", "5") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[36@rB]/", TS="57" -> <?= preg_match("/[36@rB]/", "57") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[36@rB]/", TS="43T" -> <?= preg_match("/[36@rB]/", "43T") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[36@rB]/", TS="r43" -> <?= preg_match("/[36@rB]/", "r43") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[36@rB]/", TS="a" -> <?= preg_match("/[36@rB]/", "a") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[36@rB]/", TS="B" -> <?= preg_match("/[36@rB]/", "B") ? "It is a match!<br>" : "It is not a match...<br>" ?>
RE="/[36@rB]/", TS="%$#fr6" -> <?= preg_match("/[36@rB]/", "%$#fr6") ? "It is a match!<br>" : "It is not a match...<br>" ?>
<br>
To find characters with exception options, we can use the <b>^</b> characters. We can see some examples below:<br>
<br>

</body>
</html>





















