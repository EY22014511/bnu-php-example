<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // checks if logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      $sql = "SELECT * FROM student";

      $result = mysqli_query($conn,$sql);

      // Changes table into a form
      $data['content'] .= "<form action='deletestudents.php' method='POST'>";
      
      // Page content
      $data['content'] .= "<table border='1'>";
      
      $data['content'] .= "<tr><th>StudentID</th><th>Password</th><th>DOB</th><th>FirstName</th>
      <th>Surname</th><th>House</th><th>Town</th><th>County</th><th>Country</th><th>Postcode</th></tr>";
      
      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
        $data['content'] .= "<tr>";
        $data['content'] .= "<td> {$row["studentid"]} </td>";
        $data['content'] .= "<td> {$row["password"]} </td>";
        $data['content'] .= "<td> {$row["dob"]} </td>";
        $data['content'] .= "<td> {$row["firstname"]} </td>";
        $data['content'] .= "<td> {$row["usrname"]} </td>";
        $data['content'] .= "<td> {$row["house"]} </td>";
        $data['content'] .= "<td> {$row["town"]} </td>";
        $data['content'] .= "<td> {$row["county"]} </td>";
        $data['content'] .= "<td> {$row["country"]} </td>";
        $data['content'] .= "<td> {$row["postcode"]} </td>";
        $data['content'] .= "<td> <input type= 'checkbox' name='students[]' value='$row[studentid]' /></td>";
        $data['content'] .= "</tr>";
      }
      $data['content'] .= "</table>";
      // Button to delete
      $data['content'] .= "<input type='submit' name='deletebtn' value='Delete'/>";

      $data['content'] .= "</form>";
      

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>