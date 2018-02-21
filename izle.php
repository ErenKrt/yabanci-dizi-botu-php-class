<?php
//    ________                          ___  ____           _
//   |_   __  |                        |_  ||_  _|         / |_
//   | |_ \_| _ .--.  .---.  _ .--.    | |_/ /    _ .--.`| |-'
//   |  _| _ [ `/'`\]/ /__\\[ `.-. |   |  __'.   [ `/'`\]| |
//  _| |__/ | | |    | \__., | | | |  _| |  \ \_  | |    | |,
// |________|[___]    '.__.'[___||__]|____||____|[___]   \__/

if(isset($_GET["isim"])){
  if($_GET["isim"]!=""){
    require_once("class.php");
    $bot= new epbot();
    $izle= $bot->izle($_GET["isim"]);
    $player= $izle["Openload"];
    ?>
    <iframe width="560" height="320" src="<?php echo base64_decode($player); ?>" frameborder="0" allowfullscreen=""></iframe>
    <?php
  }
}
