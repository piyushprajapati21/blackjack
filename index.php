<?php  
session_start(); // use session

// cards on pile
if(!isset($_SESSION["pile"])) $_SESSION["pile"] = array(
  1           =>  1,
  2           =>  2,
  3           =>  3,
  4           =>  4,
  5           =>  5,
  6           =>  6,
  7           =>  7,
  8           =>  8,
  9           =>  9,
  10          =>  10,
  'Jack'      =>  10,
  'Queen'     =>  10,
  'King'      =>  10,
  'Ace'       =>  11);

// cards in hand
if(!isset($_SESSION["hand"])) $_SESSION["hand"] = array();

// draw a card from the pile into the hand
function draw_card() {
  $card = array_rand($_SESSION["pile"]);
  $_SESSION["hand"][$card] = $_SESSION["pile"][$card];
  unset($_SESSION["pile"][$card]);
}

function list_hand() {
  foreach($_SESSION["hand"] as $card=>$points) {
    echo 'card: ' . $card . '<br>';
    echo 'points: ' . $points . '<br><br>';
  }
}

// detect which form was triggered
function FORM($value) {
  return isset($_POST["form"]) && $_POST["form"]==$value;
}

// handle the draw form
if(FORM("draw")) draw_card();
list_hand();
?>

<form method="post">
  <input type="hidden" name="form" value="draw">
  <input type="submit" value="Draw a card">
</form>