<?php
	class Person {
		private $name;
		private $dob;
		
		function __construct($name, $dob) {
			$this->name = $name;
			$this->dob = $dob;	
		}
		
		public function get_name() {
			return $this->name;
		}
		
		public function get_dob() {
			return $this->dob;
		}
		
		public function get_age() {
			//Calculate age
			$dob = new Datetime($this->dob);
			$today = new Datetime(date('Y-m-d'));
			$age = $today->diff($dob);
			
			//Return Age in Years
			return $age->y;
		}
	}

    class Student extends Person {
		private $gpa;
		private $graduation_year;
		
		function __construct($name, $dob, $graduation_year = null, $gpa = 0.00) {
			parent::__construct($name, $dob);
			$this->graduation_year = ( ! is_null( $graduation_year ) ) ? $graduation_year : date( 'Y', strtotime('+4 years', strtotime(date('Y'))));
			$this->gpa = $gpa;
		}
		
		public function get_graduation_year() {
			return $this->graduation_year;
		}
		
		public function get_gpa() {
			return $this->gpa;
		}
		
		public function set_gpa( $gpa ) {
			$this->gpa = $gpa;
		}
	}

    $alice = new Student('Alice', '2002-10-12', '2023', '3.45');
	$bob = new Student( 'Bob', '2005-05-04');
	$jane = new Student( 'Jane', '2007-06-01', '2028');

	echo $alice->get_name() . ' graduates in ' . $alice->get_graduation_year() . '<br/>';
	echo $bob->get_name() . ' graduates in ' . $bob->get_graduation_year() . '<br/>';
	echo $jane->get_name() . ' is ' . $jane->get_age() . ' years old. <br/>';
	$bob->set_gpa(2.79);
	$jane->set_gpa(4.0);


    function class_average( $students ) {
		$total = 0.00;
		foreach ($students as $student ) {
			$total += $student->get_gpa();
		}
		
		return $total / sizeof($students);
	}

    echo '<p>The Class Average is ' . class_average([$alice, $bob, $jane]) . '</p>';