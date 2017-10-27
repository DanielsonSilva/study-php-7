<?php 
class Person
{
	const AGE_MINIMUM = 18;
	const MONTHS = [
			1 => 'January',
			2 => 'February',
			3 => 'March',
			4 => 'April',
			5 => 'May',
			6 => 'June',
			7 => 'July',
			8 => 'August',
			9 => 'September',
			10 => 'October',
			11 => 'November',
			12 => 'December'
	];
	public $name;
	public $age;
	private $documentId;
	private $birthday;
	protected $height;
	protected $weight;

	public function __construct(string $example)
	{
		$this->name = $example;
		echo "Person created. It's name is " . $this->name . PHP_EOL;
	}
	
	public function __destruct()
	{
		echo "A person named " . $this->name . " was destroyed!" . PHP_EOL;
	}
	
	private function checkAge(int $num): bool
	{
		return ($num > self::AGE_MINIMUM);
	}
	
	public function setAge(int $num): void
	{
		if ($this->checkAge($num)) {
			$this->age = $num;
			echo "This person is " . $this->age . " years old." . PHP_EOL;
		} else {
			echo "This person has to be at least " . self::AGE_MINIMUM . " years old!" . PHP_EOL;
		}
	}
	
	public function setDocumentId (string $number): void
	{
		$this->documentId = $number;
	}
	
	public function setBirthday (array $dayOfTheYear): void
	{
		if (checkdate($dayOfTheYear[0],$dayOfTheYear[1],$dayOfTheYear[2])) {
			$this->birthday = $dayOfTheYear;
		} else {
			echo "The birthday has to be an array in format(month, day, year)." . PHP_EOL;
		}
	}
	
	protected function getBirthday(): string
	{
		$birthdayString = "This " . get_class($this) . " has a birthday in {$this->birthday[1]} of ";
		$birthdayString .= self::MONTHS[$this->birthday[0]] . " of the year {$this->birthday[2]}." . PHP_EOL;
		return $birthdayString;
	}
	
	public function displayBirthday(): string
	{
		return $this->getBirthday();
	}
}
