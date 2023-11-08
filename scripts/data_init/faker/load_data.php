<!DOCTYPE html>
<html>
    <head>
        <title> PHP FAKER </title>
    </head>
    <body>
        <?php
        require_once 'vendor/autoload.php';
        require_once 'C:\xampp\htdocs\myphp\aaa\bootstrap\scripts\data_init\faker\vendor\autoload.php';
        $faker = Faker\Factory::create('en_PH');


        // Create connection
        $conn = new mysqli("localhost", "root", "root", "records_app");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Seed the random number generator
        mt_srand(time());

        // Fake data generation for employees table
        for ($i = 1; $i <= 200; $i++) {
            $lastname = $faker->lastName();
            $firstname = $faker->firstName();
            $office_id = $faker->unique($reset = true)->numberBetween(0,50);
            $address = $faker->address();

            $lastname = mysqli_real_escape_string($conn, $lastname);
            $firstname = mysqli_real_escape_string($conn, $firstname);
            $office_id = mysqli_real_escape_string($conn, $office_id);
            $address = mysqli_real_escape_string($conn, $address);

            // Insert data into employees table
            $sql = "INSERT INTO employee(lastname, firstname, office_id, address) VALUES('$lastname', '$firstname', $office_id, '$address')";
            $conn->query($sql);
        }

        // Fake data generation for offices table
        for ($i = 1; $i <= 50; $i++) {
            $name = $faker->company();
            $contactnum = $faker->phoneNumber();
            $email = $faker->companyEmail();
            $address = $faker->address();
            $city = $faker->city();
            $country = $faker->country();
            $postal = $faker->postcode();

            $name = mysqli_real_escape_string($conn, $name);
            $contactnum = mysqli_real_escape_string($conn, $contactnum);
            $email = mysqli_real_escape_string($conn, $email);
            $address = mysqli_real_escape_string($conn, $address);
            $city = mysqli_real_escape_string($conn, $city);
            $country = mysqli_real_escape_string($conn, $country);
            $postal = mysqli_real_escape_string($conn, $postal);
            
            // Insert data into offices table
            $sql = "INSERT INTO office(name, contactnum, email, address, city, country, postal) VALUES('$name', '$contactnum', '$email', '$address', '$city', '$country', '$postal')";
            $conn->query($sql);
        }

        // Fake data generation for transactions table
        for ($i = 1; $i <= 500; $i++) {
            $employee_id = $faker->unique($reset = true)->numberBetween(0,200);
            $office_id = $faker->unique($reset = true)->numberBetween(0,50);
            $datelog = $faker->date($format = 'Y-m-d H:i:s', $max = 'now');
            $action = $faker->randomElement(['IN' ,'OUT', 'COMPLETE']);
            $remarks = $faker->optional($weight=.2, $default=false)->randomElement(['Done', 'Incomplete', 'Needs editing']);
            $documentcode = $faker->numberBetween(1,150);

            $employee_id = mysqli_real_escape_string($conn, $employee_id);
            $office_id = mysqli_real_escape_string($conn, $office_id);
            $datelog = mysqli_real_escape_string($conn, $datelog);
            $action = mysqli_real_escape_string($conn, $action);
            $remarks = mysqli_real_escape_string($conn, $remarks);
            $documentcode = mysqli_real_escape_string($conn, $documentcode);

            // Insert data into transactions table
            $sql = "INSERT INTO transaction(employee_id, office_id, date_log, action, remarks, documentcode) VALUES($employee_id, $office_id, '$datelog', '$action', '$remarks', '$documentcode')";
            $conn->query($sql);
        }

        echo "Fake data has been loaded successfully.";

        // Close the database connection
        $conn->close();
        ?>

    </body>
</html>