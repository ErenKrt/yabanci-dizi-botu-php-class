<?php
//    ________                          ___  ____           _
//   |_   __  |                        |_  ||_  _|         / |_
//   | |_ \_| _ .--.  .---.  _ .--.    | |_/ /    _ .--.`| |-'
//   |  _| _ [ `/'`\]/ /__\\[ `.-. |   |  __'.   [ `/'`\]| |
//  _| |__/ | | |    | \__., | | | |  _| |  \ \_  | |    | |,
// |________|[___]    '.__.'[___||__]|____||____|[___]   \__/

error_reporting(0);
require_once("class.php");

$bot= new epbot();

$deneme= $bot->sonlar();

for($i=0; $i<count($deneme); $i++){
  echo "<a href='izle.php?isim=".$bot->seourl($deneme[$i][adi]." ".$deneme[$i][epadi])."' target='_blank'>".$deneme[$i][adi]."-".$deneme[$i][epadi]." | ".$deneme[$i][tarih]."<br><img src='resim.php?url=".$deneme[$i][resim]."' height='200' width='200'></a><hr>";
}

?>
