<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // checks if logged in
   if (isset($_SESSION['id'])) 
   {
    
    if(empty($_POST['students']))
    {
        die();
    }

    foreach ($_POST['students'] as $studentID)
    {
        $sql = "DELETE FROM student WHERE studentid = $studentID";
        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo "Record Deleted!";
        }
    }
    

    
    header("Location: students.php");  

   } 
   else {
      header("Location: index.php");
   }

   

?>