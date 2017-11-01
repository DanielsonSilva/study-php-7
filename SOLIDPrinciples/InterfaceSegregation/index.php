<html>
<head>
<meta charset="UTF-8">
<title>SOLID Principles - Interface Segregation Example</title>
</head>
<body>
<b>Interface Segregation Principle</b><br>
<br>
This principle states that the subclasses should not be forced to depend on methods they do not use from a interface. 
This means that the interfaces we create have to be cohesive and optimal for subclasses do implement. 
Normally the result of those interfaces are small interfaces instead of a big interface.<br>
For example:
<xmp>Transaction.php
class Transaction
{
	public function deposit(float $amount): string
	{
		return "You've deposited U\$$amount." . PHP_EOL;
	}
	
	public function withdraw(float $amount): string
	{
		return "You've withdrawed U\$$amount." . PHP_EOL;
	}
}</xmp>
If a class depend on <b>Transaction</b> class and use only <i>deposit</i> function, this class do not depend on method <i>withdraw</i>. 
The solution is segregate this big class in smaller interfaces:
<xmp>TransactionDeposit.php
class TransactionDeposit
{
	public function deposit(float $amount): string
	{
		return "You've deposited U\$$amount." . PHP_EOL;
	}
}

TransactionWithdraw.php
class TransactionWithdraw
{
	public function withdraw(float $amount): string
	{
		return "You've withdrawed U\$$amount." . PHP_EOL;
	}
}</xmp>
This way, a class that uses only <i>deposit</i> function will depend only to <b>TransactionDeposit</b> class and a class that uses only <i>withdraw</i> function will depend only to <b>TransactionWithdraw</b> class. 
Continuing, if the class uses the two functions (<i>deposit</i> and <i>withdraw</i>) can depend from both classes with no problem.<br>
</body>
</html>