<head>
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
        background-color: #656cf9;
    }
    table  ,tr{
        border: 9px solid black;
    }
    table ,th{
        border-bottom: 2px solid black !important;
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
        <th>naam</th>
        <th>Aantal</th>
        <th>verwijderen?</th>
        <th>prijs</th>
        </tr>";

    print("<tr>");

    print("<td> <a class='text-white' href='view.php?id=$stockItemID'>$NaamProduct </a></td>");
//    print("<td>".$NaamProduct."</td>");
    ?>

    <td>
        <form action="cart.php" method="post">
            <input type="number" name="aantal"  value="<?php print($aantal);?>" min="0"/><br>
            <input type="number" name="ItemID"   value="<?php print($stockItemID);?>" readonly hidden>
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
}
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
print("<div class='totaalprijs'> <a href='betaalpagina.php'>betalen</a> </div>");
echo "</center>";
    ?>

</body>
</html>
