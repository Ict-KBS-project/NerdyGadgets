head>
<style type="text/css">
    table, td, th
    {
        border:1px solid #666;
    }
    th
    {
        background-color:#666;
        color:white;
    }
    td{
        max-width: 180px;
    }
</style>

</head>

<?php
include "CartFuncties.php";
include __DIR__ . "/header.php";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
</head>
<style type="text/css">
    table {
        width: 900px;
        background-color: #337ab7;
    }
    table  ,tr{
        /*border: 9px solid black;*/
    }
    table ,th{
        /*border-bottom: 2px solid black !important;*/
        margin-top: 20px;
    }

    .button {
        background-color: #24298f;
        text-transform: uppercase;
        font-size: 0.8rem;
        font-weight: 600;
        display: block;
        color: #FFFFFF;
        width: 100%;
        padding: 1rem;
        border-radius: 0.25rem;
        border: 0;
        cursor: pointer;
        outline: 0;}


    .totaalprijs {
        text-align: right;
        color: white !important;
        /* border: 0px solid #656cf9; */
        /* background: #656cf9; */
        width: 899px;
        padding: 10px 20px 10px 20px;
        background: NONE;
        border: none;
    }

    .verderknop{
        text-align: right;
        color: white !important;
        /* border: 0px solid #656cf9; */
        /* background: #656cf9; */
        width: 899px;
        padding: 10px 20px 10px 20px;
        background-color: #337ab7;
        text-align: center;
        margin-left: 725px;
        width: 120px;
    }


</style>
<center>
    <table class="cart" cellpadding="10" cellspacing="1"
    <body>
    <h1>Inhoud Winkelwagen</h1>

    <?php
    global $TotaalPrijs;
    $databaseConnection = connectToDatabase();

    if (isset($_POST["save"])) {
        unset($_POST["save"]);
        updateProductToCart($_POST["ItemID"], $_POST["aantal"]);
    }

    if (isset($_POST["Delete"])){
        deleteProductFromCart($_POST["ItemID"]);
    }
    $cart = getCart();

    # Producten in $cart tonen + prijs
    foreach ($cart as $stockItemID => $aantal) {
        $TotaalPrijs += $TotaalPrijs;

        $NaamProduct = "";
        $PrijsProduct = 0;



        if ($stockItemID != NULL) {
            $Query = PakQueryName($stockItemID);
            $ToevoegenAanDatabase = mysqli_prepare($databaseConnection, $Query);
            mysqli_stmt_execute($ToevoegenAanDatabase);
            #query is toegevoegd aan database ^
            # resultaat v
            $Uitkomst = mysqli_stmt_get_result($ToevoegenAanDatabase);
            $Uitkomst = mysqli_fetch_all($Uitkomst, MYSQLI_ASSOC);
            #print_r($Uitkomst); //<-- test resultaat
            foreach ($Uitkomst as $UitkomstID => $item) {
                foreach ($item as $stockitem => $ItemNaam) {
                    $NaamProduct = $ItemNaam;
                }
            }

            $Query = PakQueryPrijs($stockItemID);
            $ToevoegenAanDatabase = mysqli_prepare($databaseConnection, $Query);
            mysqli_stmt_execute($ToevoegenAanDatabase);
            #query is toegevoegd aan database
            # resultaat v
            $Uitkomst = mysqli_stmt_get_result($ToevoegenAanDatabase);
            $Uitkomst = mysqli_fetch_all($Uitkomst, MYSQLI_ASSOC);
            #print_r($Uitkomst); //<-- test resultaat
            foreach ($Uitkomst as $UitkomstID => $item) {
                foreach ($item as $stockitem => $ItemPrijs) {
                    $PrijsProduct = $ItemPrijs;
                }
            }


        }
        echo "<center>";
        echo "<table> 
        <tr>
        <th>Naam</th>
        <th>Aantal</th>
        <th>Verwijderen</th>
        <th>Prijs</th>
        </tr>";

        print("<tr>");

        print("<td> <a class='text-white' href='view.php?id=$stockItemID'>$NaamProduct </a></td>");


        ?>

        <td>
            <form action="Cart.php" method="post">
                <input type="number" name="aantal"  value="<?php print($aantal);?>" min="1"/><br>
                <input type="number" id="Prijs"  name="ItemID"   value="<?php print($stockItemID);?>" readonly hidden>
                <input type="submit" name="save" value="Opslaan">
        </td>
        <td>
            <input type="submit" name="Delete" value="Verwijder">
            </form>
        </td>

        <?php
        $TotaalPrijsPerProduct = $aantal*$PrijsProduct;
        $TotaalPrijs += $TotaalPrijsPerProduct;
        print("<td>"."€". round($TotaalPrijsPerProduct,2) ."</td>");
        print("</tr>");
        echo "</table>";
        echo "</center>";



    //echo "<table>
    //<tr>
    //<th>
    //Totaal Prijs:
    //</th>
    //</tr>
    //";
    //print("<tr>");
    //print("<td>". "€" .round($TotaalPrijs,2)."</td>");
    ////print ("<a href='view.php?id0'>Naar artikelpagina van artikel 0")
    //?>


    <?php
    echo "<center>";
    //    print("  <a class='betalen' href='betaalpagina.php'>betalen </a>");
    print("<div class='totaalprijs'>". "Totaal prijs: €" .round($TotaalPrijs,2)."</div>");
    print("<div class='verderknop'> <a href='index.html.php'>betalen</a> </div>");
    echo "</center>";

        }



// Database connection




?>

</body>
</html>