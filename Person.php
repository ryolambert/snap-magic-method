<?php

class Person {
	private $personName;
	private $personAge;

	public function __construct(string $newPersonName, int $newPersonAge) {
		try {
			$this->setPersonName($newPersonName);
			$this->setPersonAge($newPersonAge);
		} catch(\InvalidArgumentException | \RangeException | \TypeError | Exception $e) {
			//determine what exception type was thrown
			throw(new \Exception($e->getMessage(), 0, $e));
		}
	}

	public function getPersonName(): string {
		return ($this->personName);
	}

public function setPersonName(string $newPersonName): void {
		$newPersonName = trim($newPersonName);
		$newPersonName = filter_var($newPersonName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newPersonName) === true) {
			throw(new \InvalidArgumentException("Entered name is either empty or insecure."));
		}
		if(strlen($newPersonName) > 65) {
			throw(new \RangeException("Entered name is too large, please try a shorter variation."));
		}
		// store the person's name
	$this->personName = $newPersonName;
}

public function getPersonAge(): int {
		return ($this->personAge);
}

	public function setPersonAge(int $newPersonAge): void {
		$newPersonAge = trim($newPersonAge);
		$newPersonAge = filter_var($newPersonAge, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newPersonAge) === true) {
			throw(new \InvalidArgumentException("Entered age is empty or insecure"));
		}
		// verify identity of person with specified age
		if($newPersonAge === 0) {
			echo ("hi, caleb");
		}
		if($newPersonAge < 19) {
			echo ("hi, caleb");
		}
		if($newPersonAge > 118) {
			echo ("captain @deepdivedylan");
		}
		$this->personAge = $newPersonAge;
	}

	public function __toString() {
		return "<tr> ".$this->personName." is ".$this->personAge." years old. </tr>";
	}
}

$newPerson= new Person("Professor", 120);
echo $newPerson;


