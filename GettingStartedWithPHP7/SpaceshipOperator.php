<html>
<title>Testing Spaceship Operator in PHP 7</title>
<body>

The <b>Spaceship Operator</b> serves to make the comparisons that returns <b>0</b> if values is equal, <b>-1</b> if the first is lower than the second and <b>1</b> if the first is higher than the second. An example will be:<br>
<br>
if ($value1 == $value2) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return 0;<br>
} else {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return ($value1 < $value2) ? -1 : 1;<br>
}<br>
<br>
Because the symbol used resembles a spaceship (<b><=></b>), it named the operator.<br>
So, the same operations in code above could become: <b>return $value1 <=> $value2;</b><br>
<br>
Let's test some other values:<br>
1 <=> 2 ? <b><?= 1 <=> 2 ?></b><br>
2 <=> 2 ? <b><?= 2 <=> 2 ?></b><br>
3 <=> 2 ? <b><?= 3 <=> 2 ?></b><br>
<br>
1.34 <=> 1.33 ? <b><?= 1.34 <=> 1.33 ?></b><br>
4.6784 <=> 4.6784 ? <b><?= 4.6784 <=> 4.6784 ?></b><br>
8.56 <=> 8.60 ? <b><?= 8.56 <=> 8.60 ?></b><br>
<br>
"c" <=> "b" ? <b><?= "c" <=> "b" ?></b><br>
"acb" <=> "abz" ? <b><?= "acb" <=> "abz" ?></b><br>
"egg" <=> "egt" ? <b><?= "egg" <=> "egt" ?></b><br>
"Hello" <=> "hello" ? <b><?= "Hello" <=> "hello" ?></b><br>
";.,Hello" <=> ".;,hello" ? <b><?= "Hello" <=> "hello" ?></b><br>
"a" <=> "A" ? <b><?= "a" <=> "A" ?></b><br>
"10" <=> "4" ? <b><?= "10" <=> "4" ?></b><br>
"10" <=> "40" ? <b><?= "10" <=> "40" ?></b><br>
"23.54" <=> "21" ? <b><?= "23.54" <=> "21" ?></b><br>
<br>
true <=> true ? <b><?= true <=> true ?></b><br>
true <=> false ? <b><?= true <=> false ?></b><br>
false <=> true ? <b><?= false <=> true ?></b><br>
false <=> false ? <b><?= false <=> false ?></b><br>
<br>
array(20,20,20) <=> array(20,20,20) ? <b><?= array(20,20,20) <=> array(20,20,20) ?></b><br>
array(20,19,30) <=> array(20,20,10) ? <b><?= array(20,19,30) <=> array(20,20,10) ?></b><br>
array(20,19,30) <=> array(20,20) ? <b><?= array(20,19,30) <=> array(20,20) ?></b><br>
array(10,10) <=> array(10,10,10) ? <b><?= array(10,10) <=> array(10,10,10) ?></b><br>
array(10) <=> array(10,0,-5) ? <b><?= array(10) <=> array(10,0,-5) ?></b><br>
<br>
2 <=> true ? <b><?= 2 <=> true ?></b><br>
0 <=> false ? <b><?= 0 <=> false ?></b><br>
false <=> -5 ? <b><?= false <=> -5 ?></b><br>
</body>
</html>