<?php

class Client
{
    private $id_client;
    private $name;
    private $age;
    private $gender;
    private $document_id;
    private $telephone;
    private $mobile_fone;

    public function __get($property)
	{
		if (property_exists($this, $property)) {
            if ($property === "gender") {
                if ($this->$property === 0) {
                    return "Female";
                } else {
                    return "Male";
                }
            }
            return $this->$property;
		} else {
			echo "Property ($property) not found. Try again!" . PHP_EOL;
		}
	}

    public function __set($property, $value)
	{
		if (property_exists($this, $property)) {
			$this->$property = $value;
		} else {
			echo "Set this property ($property) not found. Try again!" . PHP_EOL;
		}
	}
}
