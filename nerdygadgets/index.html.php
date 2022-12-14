<!DOCTYPE html>
<html>
<head>
    <?php
    include "CartFuncties.php";
include "database.php";
$databaseConnection = connectToDatabase();
    ?>
    <title>betaalpagina</title>
    <style> .terugknop{
            background-color: #337ab7;
            /* border: none; */
            border-radius: 5px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 0px;
            cursor: pointer;
        }
        a:hover {
            color: white !important;
            text-decoration: none !important;
        }</style>
    <link rel="stylesheet" type="text/css" href="bootstrap.css" />
</head>
<body>
<div class="container">
    <div class="row col-md-6 col-md-offset-3">

        <a class="terugknop" href="cart.php"> Terug naar winkelmandje </a>
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h1>Voer uw gegevens in</h1>
            </div>
            <div class="panel-body">
                <form action="connect.php" method="post">
                    <div class="form-group">
                        <label for="Voornaam">Voornaam</label>
                        <input
                            type="text"
                            class="form-control"
                            id="Voornaam"
                            name="Voornaam"
                        />
                    </div>
                    <div class="form-group">
                        <label for="Achternaam">Achternaam</label>
                        <input
                            type="text"
                            class="form-control"
                            id="Achternaam"
                            name="Achternaam"
                        />
                    </div>

                    <div class="form-group">
                        <label for="Email">* Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="Email"
                            name="Email"
                        required/>
                    </div>
                    <div class="form-group">
                        <label for="Adres">* Straat en huisnummer</label>
                        <input
                            type="text"
                            class="form-control"
                            id="Adres"
                            name="Adres"
                        required/>
                    </div>
                    <div class="form-group">
                        <label for="Postcode">* Postcode</label>
                        <input
                            type="text"
                            class="form-control"
                            id="Postcode"
                            name="Postcode"
                       required />
                    </div>
                    <div class="form-group">
                        <label for="Woonplaats">* Woonplaats</label>
                        <input
                            type="text"
                            class="form-control"
                            id="Woonplaats"
                            name="Woonplaats"
                        required/>
                    </div>
                    <div class="form-group">
                        <label for="Land">* Land</label>
                        <input
                            type="text"
                            class="form-control"
                            id="Land"
                            name="Land"
                        required/>
                    </div>


                    <div class="form-group">
                        <label for="Telefoonnummer">Telefoonnummer</label>
                        <input
                            type="text"
                            class="form-control"
                            id="Telefoonnummer"
                            name="Telefoonnummer"
                        />
                    </div>
                    <input type="submit" class="btn btn-primary" href="ideal.php"</input>
                    <?php  if ((isset ($_SESSION["cart"]))) {
                        $cart = ($_SESSION["cart"]);
                        foreach ($cart as $stockItemID => $value) {
                            changeStock($value, $stockItemID, $databaseConnection);
                        }
                        unset($_SESSION["cart"]);
                    } ?>

                </form>
            </div>


        </div>
    </div>
</div>


</div>

</body>
</html>
