<?php
//    ________                          ___  ____         _
//   |_   __  |                        |_  ||_  _|       / |_
//   | |_ \_| _ .--.  .---.  _ .--.    | |_/ /    _ .--.`| |-'
//   |  _| _ [ `/'`\]/ /__\\[ `.-. |   |  __'.   [ `/'`\]| |
//  _| |__/ | | |    | \__., | | | |  _| |  \ \_  | |    | |,
// |________|[___]    '.__.'[___||__]|____||____|[___]   \__/
/**
 * Class Yabancı Dizi Bot PHP / Class
 * @author Eren Kurt (ErenKrt)
 * @mail kurteren07@gmail.com
 * @İnstagram ep.eren
 * @date 30.10.2018
 */
 
require '../class.php';
use eperen\yabancidizi;
$dizi = new yabancidizi();

if(isset($_GET["url"])){
  if($_GET["url"]!=""){
    require "sabitler/header.php";
    if($_GET["source"]!=""){
      $source= $_GET["source"];
      $izle= $dizi->izle($_GET["url"],$source);
    }else{
      $izle= $dizi->izle($_GET["url"]);
    }

    ?>
    <!-- single -->
    <div class="single-page-agile-main">
    <div class="container">
    		<!-- /w3l-medile-movies-grids -->
    			<div class="agileits-single-top">
    				<ol class="breadcrumb">
    				  <li><a href="#">Dizi</a></li>
    				  <li class="active"><?php echo $izle["isim"]; ?></li>
    				</ol>
    			</div>
    			<div class="single-page-agile-info">
            <h1><?php echo $izle["isim"]; ?></h1><br>
          <?php
          for ($i=0; $i <count($izle["playerler"]) ; $i++) {
            if($source==""){
              ?>
              <a href="izle.php?url=<?php echo $_GET["url"]; ?>&source=<?php echo $izle["playerler"][$i]["source"]; ?> "><button type="button" class="btn <?php if($i==0){ echo "btn-primary"; } ?>"><?php echo $izle["playerler"][$i]["isim"]; ?></button></a>
              <?php
            }else{
            ?>
              <a href="izle.php?url=<?php echo $_GET["url"]; ?>&source=<?php echo $izle["playerler"][$i]["source"]; ?> "><button type="button" class="btn <?php if($source==$izle["playerler"][$i]["source"]){ echo "btn-primary"; }else{ echo "btn-secondary"; } ?>"><?php echo $izle["playerler"][$i]["isim"]; ?></button></a>
              <?php
            }
          }
          ?>


         <div class="show-top-grids-w3lagile">
    				<div class="col-sm-12 single-left">
    					<div class="song">

    						<div class="col-sm-12 video-grid-single-page-agileits">
    							<div id="video" style="height: 600px;"><iframe style="width:100%;height:100%;" src="<?php echo $izle["embedurl"]; ?>"></iframe></div>
    						</div>

    					</div>

    					<div class="clearfix"> </div>

    				</div>


    			</div>
    <?php
    require "sabitler/footer.php";
  }else{
    exit;
  }
}else{
  exit;
}
