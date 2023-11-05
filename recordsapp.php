<?php

require ('C:\xampp\htdocs\myphp\aaa\faker\vendor\autoload.php');

$faker = Faker\Factory::create();
$conn = mysqli_connect("localhost","root","root","recordsapp");

if(!$conn)
{   
die(mysqli_error());
}  

$name = $faker->company();
$contacts = $faker->phoneNumber();
$email = $faker->companyEmail();
$address = $faker->address();   
$city = $faker->city();
$country = $faker->country();
$postal = $faker->postcode();

for ($i=1; $i <= 1; $i++){   
$sql = "INSERT INTO recordsapp.office(name, contactnum, email, address, city, country, postal) 
values('".$name."', '".$contacts."', '".$email."', '".$address."','".$city."', '".$country."', '".$postal."')";     


// $lname = $faker->lastName;
// $fname = $faker->firstName;
// $officeID = $faker->numberBetween(1,25);
// $address = $faker->address;   

// for ($i=0; $i <= 1; $i++) 
// $sql = "INSERT INTO recordsapp.employees(lastname, firstname, office_id, address)
// values('".$lname."', '".$fname."', '".$officeID."', '".$address."')";    


// $employeeId = $faker->numberBetween(1,25);
// $officeiD = $faker->numberBetween(1,25);
// $datelog = $faker->date($format = 'Y-m-d H:i:s', $max = 'now');
// $action = $faker->randomElement(['IN' ,'OUT', 'COMPLETE']);   

// $documentCode = $faker->numberBetween(1,100);   

// for ($i=1; $i <= 1; $i++) 
// $sql = "INSERT INTO recordsapp.transaction(employee_id, office_id, date_log, action, documentcode)
// values('".@$employeeId."', '".$officeiD."', '".$datelog."', '".$action."', '".$documentCode."')";    

mysqli_query($conn, $sql);}

?>