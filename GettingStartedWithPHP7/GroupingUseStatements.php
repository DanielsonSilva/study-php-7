<html>
<title>Grouping Use Statements Example</title>
<body>
<b>Grouping <i>Use</i> Statements</b><br>
When using use statements to import class, functions or constants, the readability is bad. Before PHP 7, the use statements was:<br>
<br>
use App\Student;<br>
use App\Teacher;<br>
use App\Admin;<br>
use App\Backpack;<br>
use App\Janitor;<br>
<br>
From PHP 7, we can group these statements using the syntax below:<br>
<br>
use App\{Student, Teacher, Admin, Backpack, Janitor};<br>
<br>
</body>
</html>