<?php
include("header.php");
$voornaam = $_POST['Voornaam'];
?>


<!DOCTYPE html>
<html>
<body>

<h2> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Kies uw Bank</h2>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<img src="https://zakelijkesoftware.com/wp-content/uploads/2019/06/ideal-betalen-700x228.jpg" alt="Trulli" width="733" height="228">
<h1>hello<?php
    print ($voornaam);
    ?> </h1>
<style> .field {
width: 100%;
display: flex;
flex-direction: column;
border: 1px solid var(--color-lighter-gray);
padding: .5rem;
border-radius: .25rem;

    .button {
        background-color: #000;
        text-transform: uppercase;
        font-size: 0.8rem;
        font-weight: 600;
        display: block;
        color: #fff;
        width: 100%;
        padding: 1rem;
        border-radius: 0.25rem;
        border: 0;
        cursor: pointer;
        outline: 0;
    }
    .button:focus-visible {
        background-color: #333;
        </style>

<div class="field">
    <label class="field">
        <span class="field__label" for="bank"></span>
        <select class="field__input" id="bank">
            <option value=""></option>
            <option value="ING">ING</option>
            <option value="KNAB">KNAB</option>
            <option value="RABO">RABO</option>
            <option value="ABN">ABN</option>
        </select>
</div>
<a class= "button" href='Bedankt%20bestellen.php'>betalen </a>
<?php print($stockItemID);?>

</body>
</html>
