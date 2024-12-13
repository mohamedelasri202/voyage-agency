<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="tailwind.js"></script>
    <title>Document</title>
</head>
<body>
<?php 
include("database.php");

if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];
    $date = $_POST['date_of_birth'];

   
    $hh = "INSERT INTO client (name, last_name, email, phone, adresse, date_of_birth) 
            VALUES ('$name', '$lastname', '$email', '$phone', '$adresse', '$date')";

    
    if (mysqli_query($db, $hh)) {
        // echo "Data ";
    } else {
        // echo "nop " . mysqli_error($db);
    }
}
?>







</body>
</html>
