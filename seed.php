<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");
   require_once 'vendor/autoload.php';

   //echo template("templates/partials/header.php");

   
    //checks if logged in
    $faker = Faker\Factory::create();

    //build INSERT query
    //run query
    //x5

    global $result;
    for ($i = 0; $i < 5; $i++){

        $studentid = $faker->numberBetween(20000001, 29999999);
        $password = password_hash($faker->password(), PASSWORD_DEFAULT);
        $dob = $faker->date($format = 'Y-m-d', $max = '-18 years');
        $firstname = $faker->firstName($gender = 'Male'|'Female');
        $surname = $faker->surame();
        $streetAddress = $faker->streetAddress();
        $town = "Slough";
        $county = "Buckinghamshire";
        $country = "United Kingdom";
        $postcode =  "SL" $faker->numberBetween(0, 9) . $faker->numberBetween(0, 1) . " " . 
        $faker->randomNumber(2, false) . 
        strtoupper($faker->randomLetter()) . strtoupper($faker->randomLetter());
        
        $sql = "INSERT INTO student (studentid, password, dob, firstname, surname, house, town, county, country, postcode)
        VALUES ('$studentid', '$password', '$dob', '$firstname', '$surname', '$streetAddress', '$town', '$county', '$country',
         '$postcode')";
        
        $result = mysqli_query($conn, $sql);
    }

    if($result)
    {
        echo "Successfully added Students to Database!";
    }
?>