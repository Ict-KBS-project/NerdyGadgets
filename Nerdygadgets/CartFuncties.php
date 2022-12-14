<?php

session_start();                                // altijd hiermee starten als je gebruik wilt maken van sessiegegevens

function getCart()
{
    if (isset($_SESSION['cart'])) {               //controleren of winkelmandje (=cart) al bestaat
        $cart = $_SESSION['cart'];                  //zo ja:  ophalen
    } else {
        $cart = array();                            //zo nee: dan een nieuwe (nog lege) array
    }
    return $cart;                               // resulterend winkelmandje terug naar aanroeper functie
}

function saveCart($cart)
{
    $_SESSION["cart"] = $cart;      // werk de "gedeelde" $_SESSION["cart"] bij met de meegestuurde gegevens
}

function addProductToCart($stockItemID){
    $cart = getCart();                          // eerst de huidige cart ophalen

    if (array_key_exists($stockItemID, $cart)) {  //controleren of $stockItemID(=key!) al in array staat
        $cart[$stockItemID] += 1;                   //zo ja: aantal met 1 verhogen
    } else {
        $cart[$stockItemID] = 1;                    //zo nee: key toevoegen en aantal op 1 zetten.
    }

    saveCart($cart);                            // werk de "gedeelde" $_SESSION["cart"] bij met de bijgewerkte cart
}
function deleteProductFromCart($stockItemID){
    $cart = getCart();                          // eerst de huidige cart ophalen
    if(array_key_exists($stockItemID, $cart)){  //controleren of $stockItemID(=key!) al in array staat
        unset($cart[$stockItemID]);             //zo ja:  delete van cart
        saveCart($cart);
    }
}

function updateProductToCart($stockItemID, $aantal)
{
    $cart = getCart();                                  // eerst de huidige cart ophalen
    $cart[$stockItemID] = $aantal;      //zo ja: aantal naar $aantal veranderen
    saveCart($cart);
}

function isCardEmpty() {
    $cart = getCart();  // haal de huidige cart op

    if (count($cart) == 0) {  // kijk of de cart leeg is
        return true; // als de cart leeg is, geef true terug
    }
    return false; // als de cart niet leeg is, geef false terug
}

function changeStock($value, $stockItemID, $databaseConnection){//zodra een bestelling wordt geplaatst, worden de bestelde hoeveelheden van de voorraad afgeschreven.
    $Query = "UPDATE StockItemHoldings 
            SET QuantityOnHand = QuantityOnHand - '$value' WHERE StockItemID = '$stockItemID'";
    $result = mysqli_query($databaseConnection, $Query);
}