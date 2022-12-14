<?php
$voornaam = $_POST['Voornaam'];
$achternaam = $_POST['Achternaam'];
$email = $_POST['Email'];
$adres = $_POST['Adres'];
$postcode = $_POST['Postcode'];
$woonplaats = $_POST['Woonplaats'];
$land = $_POST['Land'];
$telefoonnummer = $_POST['Telefoonnummer'];


// Database connection
$conn = new mysqli('localhost','root','','nerdygadgets');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registratieForm(voornaam, achternaam, email, adres, postcode, woonplaats, land, telefoonnummer) 
values(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $voornaam, $achternaam, $email, $adres, $postcode, $woonplaats, $land, $telefoonnummer );
    $stmt->execute();
    header("Location: http://localhost/Nerdygadgets/ideal.php");
    $stmt->close();
    $conn->close();
}
?>