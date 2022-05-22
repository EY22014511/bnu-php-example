<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


echo template("templates/partials/header.php");
echo template("templates/partials/nav.php");

if (isset($_POST['submit']) && count($_FILES) > 0)
{
    {

        $studentID = mysqli_real_escape_string($conn, $_POST['studentid']);
        $password = $_POST['password'];
        //HASHED THE PASSWORD
        $hashPassword = mysqli_real_escape_string($conn,password_hash($password,PASSWORD_DEFAULT));
        $DOB = mysqli_real_escape_string($conn,$_POST['dob']);
        $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
        $surname = mysqli_real_escape_string($conn, $_POST['surname']) ;
        $house = mysqli_real_escape_string($conn, $_POST['house']);
        $town = mysqli_real_escape_string($conn,$_POST['town']) ;
        $county = mysqli_real_escape_string($conn, $_POST['county']);
        $country = mysqli_real_escape_string($conn,$_POST['country']);
        $postcode = mysqli_real_escape_string($conn,$_POST['postcode']);

        $sql = "INSERT INTO student (studentid, password, dob, firstname, surname, house, town, county, country, postcode)
        VALUES ('$studentID', '$hashPassword', '$DOB','$firstname', '$surname', '$house','$town', '$county', '$country','$postcode')";

        $result = mysqli_query($conn, $sql);

        if ($result) 
        {
        echo "<h2>You have added a new record!</h2>";
        }
    }
}
?>
<h2>Add New Student</h2>
<form name="frmLogin" action="addstudent.php" method="post" enctype= "multipart/form-data"><br/>
        Student ID:
        <input name="studentid" type="text" value= "" maxlength ="8"/><br/> 
        Student Password:  
        <input name="password" type="text" value= ""/><br/>
        Student D.O.B:
        <input type="date" name="dob" value=""/><br/>
        First Name :
        <input name="firstname" type="text" value="" /><br/>
        Surname :
        <input name="surname" type="text"  value="" /><br/>
        Number and Street :
        <input name="house" type="text"  value="" /><br/>
        Town :
        <input name="town" type="text"  value="" /><br/>
        County :
        <input name="county" type="text"  value="" /><br/>
        Country :
        <input name="country" type="text"  value="" /><br/>
        Postcode :
        <input name="postcode" type="text"  value="" /><br/>
        <input type='submit' name='submit' value='Submit' class='submitButton'/>
        </form>