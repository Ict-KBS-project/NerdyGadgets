<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $land = $_POST['land'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $provincie = $_POST['provincie'];
//    $bank = $_POST['bank'];

$conn = mysqli_connect("localhost", "root", "", "nerdygadgets");
//    $conn = new mysqli('localhost','root','','nerdygadgets');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    } else{
        $stmt = $conn->prepare("insert into bananen(firstname, lastname, address, land, zipcode, city, provincie, bank)
        values(?, ?, ?, ?, ?, ?, ?, ?,)");
        $stmt->bind_param("ssssssss", $firstname, $lastname, $address, $land, $zipcode, $city, $provincie, $bank);
        $stmt->execute();
        echo "registration succesfully";
        $stmt->close();
        $conn->close();
    }
?>
