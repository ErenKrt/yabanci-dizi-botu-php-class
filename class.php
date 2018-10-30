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
 
namespace eperen;

class yabancidizi{

  public $baseurl="https://www.dizist1.net/";

  function seflink($str, $options = array()){
    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
    $defaults = array(
        'delimiter' => '-',
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(),
        'transliterate' => true
    );
    $options = array_merge($defaults, $options);
    $char_map = array(
        // Latin
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
        'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
        'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
        'ß' => 'ss',
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
        'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
        'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
        'ÿ' => 'y',
        // Latin symbols
        '©' => '(c)',
        // Greek
        'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
        'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
        'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
        'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
        'Ϋ' => 'Y',
        'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
        'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
        'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
        'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
        'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
        // Turkish
        'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
        'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
        // Russian
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
        'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
        'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
        'Я' => 'Ya',
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
        'я' => 'ya',
        // Ukrainian
        'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
        'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
        // Czech
        'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
        'Ž' => 'Z',
        'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
        'ž' => 'z',
        // Polish
        'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
        'Ż' => 'Z',
        'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
        'ż' => 'z',
        // Latvian
        'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
        'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
        'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
        'š' => 's', 'ū' => 'u', 'ž' => 'z'
    );
    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    $str = trim($str, $options['delimiter']);
    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
  }

  function sifreleme($icerik,$islem=0){
    if($islem==0){
      return base64_encode($icerik);
    }elseif($islem==1){
      return base64_decode($icerik);
    }
  }

  private function Curl( $url="", $proxy = NULL ){
      if($url==""){
        $url=$this->baseurl;
      }else{
        $url = $this->baseurl.$url;
      }
        $options = array (
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_ENCODING => "",
            CURLOPT_REFERER => $this->baseurl,
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYPEER => false,
	          CURLOPT_FOLLOWLOCATION=>true
        );
        $ch = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err = curl_errno( $ch );
        $errmsg = curl_error( $ch );
        $header = curl_getinfo( $ch );
        curl_close( $ch );
        $header[ 'errno' ] = $err;
        $header[ 'errmsg' ] = $errmsg;
        $header[ 'content' ] = $content;
        return str_replace( array ( "\n", "\r", "\t" ), NULL, trim($header[ 'content' ]) );
    }

    function anadizigrid($dizi){
      preg_match( '/<img src="(.*?)" class="tv-poster-img">/', $dizi, $resim );
      $resim= $resim[1];
      preg_match( '/<span class="poster-alt-title text-overflow">(.*?)<\/span>/', $dizi, $tur );
      $tur= $tur[1];
      preg_match( '/<span class="rating-circle">(.*?)<\/span>/', $dizi, $imdb );
      $imdb= $imdb[1];
      preg_match( '/<a href="(.*?)" class="poster-title text-overflow">(.*?)<\/a>/', $dizi, $url );
      $isim= $url[2];
      $url= $url[1];
      $bol= explode('">',$url);
      $url= $bol[0];

      $bol= explode("/dizi/",$url);
      $url= $bol[1];

      return array("isim"=>$isim,"resim"=>$resim,"tur"=>$tur,"puan"=>$imdb,"urlname"=>$url);
    }

    function anabolumgrid($bolum){

      preg_match( '/<img src="(.*?)" class="tv-poster-img">/', $bolum, $resim );
      $resim= $resim[1];

      preg_match( '/<div class="article-release"><span>(.*?)<\/span><\/div>/', $bolum, $ytarih );
      $ytarih= $ytarih[1];

      preg_match( '/<div class="h-series-lang (.*?)"><\/div>/', $bolum, $dil );
      $dil= $dil[1];

      preg_match( '/<span class="poster-title (.*?)">(.*?)<\/span>/', $bolum, $isim );
      $isim= $isim[2];

      preg_match( '/<span class="poster-alt-title (.*?)">(.*?)<\/span>/', $bolum, $ybolum );
      $ybolum= $ybolum[2];

      preg_match( '/<a href="(.*?)">(.*?)<\/a>/', $bolum, $url );
      $url= $url[1];

      return array("isim"=>$isim,"bolum"=>$ybolum,"resim"=>$resim,"tarih"=>$ytarih,"dil"=>$dil,"url"=>$url);
    }

    function dizilistegrid($dizi){


      preg_match( '/<img src="(.*?)">/', $dizi, $resim );
      $resim= $resim[1];

      preg_match( '/<h3 class="tv-series-title ff-2 pull-left">(.*?)<\/h3>/', $dizi, $isim );
      preg_match( '/<a href="(.*?)">(.*?)<\/a>/', $isim[1], $isim );

      $url= $isim[1];
      $bol= explode("/dizi/",$url);
      $url= $bol[1];

      $isim= $isim[2];

      preg_match( '/<span class="tv-series-list-imdb pull-right">(.*?)<\/span>/', $dizi, $puan );
      preg_match( '/<span class="btn btn-xs btn-orange">IMDb: <b>(.*?)<\/b><\/span>/', $dizi, $puan );
      $puan= $puan[1];

      preg_match_all( '/<span class="primary-color (.*?)">(.*?)<\/span>/', $dizi, $bilgiler );
      $yapimyili= $bilgiler[0][0];
      $tur= $bilgiler[0][1];

      preg_match( '/<p class="tv-series-list-desc (.*?)">(.*?)<\/p>/', $dizi, $aciklama );
      $aciklama= $aciklama[2];

      return array("isim"=>$isim,"resim"=>$resim,"aciklama"=>$aciklama,"puan"=>$puan,"yapimyili"=>$yapimyili,"tur"=>$tur,"url"=>$url);
    }

    function populer(){
      $bot= $this->curl();
      preg_match( '/<section id="featured-posts" class="(.*?)">(.*?)<\/section>/', $bot, $dizirow );
      preg_match_all( '/<article class="grid-five">(.*?)<\/article>/', $dizirow[0], $diziler );
      $diziary=array();
      for ($i=0; $i < count($diziler[0]); $i++) {
        $dizi= $this->anadizigrid($diziler[0][$i]);
        array_push($diziary,$dizi);
      }
      return $diziary;
    }

    function yeni($limit,$sayfa){

        $bot= $this->curl("yeni-eklenen-bolumler/".$sayfa);
        preg_match( '/<section class="tv-series-list (.*?)">(.*?)<\/section>/', $bot, $yenirow );
        preg_match_all( '/<article class="(.*?) grid-five">(.*?)<\/article>/', $yenirow[2], $diziler );
        $veriler= array();

        $diziary= array();
        for ($i=0; $i < $limit ; $i++) {
          $dizi= $this->anabolumgrid($diziler[0][$i]);
          array_push($diziary,$dizi);
        }
        array_push($veriler,$diziary);
        preg_match( '/<ul class="cd-pagination">(.*?)<\/ul>/', $bot, $pagenation );
        preg_match( "/<li class='current'><b>(.*?)<\/b><\/li>/", $pagenation[1], $sayfa );
        $sayfa= str_replace(array('[',']'),"",$sayfa[1]);
        $bol= explode('/',$sayfa);

        array_push($veriler,array("bulunan"=>$bol[0],"max"=>$bol[1]));

      return $veriler;

    }


    function diziliste($tur,$sayfa=1){
      if($tur=="yabancı"){
        $tid= 1;
      }elseif($tur=="anime"){
        $tid=2;
      }elseif($tur=="asya"){
        $tid=4;
      }elseif($tur=="tüm"){
        $tid=3;
      }else{
        $tid=3;
      }

      $bot= $this->curl("arsiv/?category=".$tid."&page=".$sayfa);

      preg_match_all( '/<article class="tv-series-list-box">(.*?)<\/article>/', $bot, $diziler );
      $veriler= array();
      $diziary= array();
      for ($i=0; $i <count($diziler[0]) ; $i++) {
        $dizi= $this->dizilistegrid($diziler[0][$i]);
        array_push($diziary,$dizi);
      }
      array_push($veriler,$diziary);

        preg_match( '/<ul class="cd-pagination">(.*?)<\/ul>/', $bot, $pagenation );
        if($pagenation[1]==null){
          array_push($veriler,array("no pagination"));
        }else{
        preg_match( "/<li class='current'><b>(.*?)<\/b><\/li>/", $pagenation[1], $sayfa );
        $sayfa= str_replace(array('[',']'),"",$sayfa[1]);
        $bol= explode('/',$sayfa);
        array_push($veriler,array("bulunan"=>$bol[0],"max"=>$bol[1]));
        }



      return $veriler;
    }

    function dizisayfa($dizi){
     $bot= $this->curl("dizi/".$dizi);


     preg_match( '/<section class="tv-series-profile-content tv-series-overview (.*?)">(.*?)<\/section>/', $bot, $dizisayfa );
     $dizisayfa= $dizisayfa[2];

     preg_match( '/<h1 class="tv-series-title (.*?)">(.*?)<\/h1>/', $bot, $isim );
     $isim= $isim[2];

     preg_match( '/<img src="(.*?)" alt="(.*?)">/', $dizisayfa, $resim );
     $resim= $resim[1];

     preg_match( '/<div class="tv-series-desc (.*?)">(.*?)<\/div>/', $bot, $aciklama );
     preg_match( '/<p>(.*?)<\/p>/', $aciklama[2], $aciklama );
     $aciklama= $aciklama[1];

     preg_match( "/<p class='tv-series-profile-tag'>(.*?)<\/p>/", $bot, $taglar );
     preg_match_all( '/<span class="btn btn-xs btn-(.*?)">(.*?)<\/span>/', $bot, $detaylar );

     $yapimyili= $detaylar[2][0];
     $tur= $detaylar[2][1];
     $sure=$detaylar[2][2];
     $yapimulke=$detaylar[2][3];
     $yonetmen=$detaylar[2][4];

     preg_match( '/<section class="tv-seasons-container (.*?)">(.*?)<\/section>/', $bot, $sezonrow );
     $sezonrow= $sezonrow[2];
     //echo $sezonrow;

     preg_match_all( '/<div class="season-tab" data-season="(.*?)">(.*?)<\/div>/', $sezonrow, $sezonlar );
     $sezonlar= $sezonlar[2];

     $sezonlarary= array();

     include 'htmlparser.php';
     $bul= str_get_html($sezonrow);

     for($i=1; $i<=count($sezonlar); $i++){

      $sezon= $bul->find("div[class=tv-episode-tables sz$i]");

      $sezonbolumlerary= array();
      for($a=0; $a<=count($sezon[0]->children())-1; $a++){

        $bolum= $sezon[0]->children($a)->find("a")[0]->innertext();
        $bolumadi= $sezon[0]->children($a)->find("a")[1]->innertext();
        $link= $sezon[0]->children($a)->find("a")[0]->href;
        $bol= explode("/izle/",$link);
        $link= $bol[1];
        array_push($sezonbolumlerary,array("bolum"=>$bolum,"adi"=>$bolumadi,"url"=>$link));

     }

      array_push($sezonlarary,$sezonbolumlerary);

     }
     array_unshift($sezonlarary,"Sezonlar Listesi #Ep.Eren");

     return array("adi"=>$isim,"resim"=>$resim,"aciklama"=>$aciklama,"detaylar"=>array("yapimyili"=>$yapimyili,"tur"=>$tur,"sure"=>$sure,"yapimulke"=>$yapimulke,"yonetmen"=>$yonetmen),"sezonlar"=>$sezonlarary);
    }

    function izle($uri=null,$player=null){
      if($uri!=null){

        if($player!=null){
          $bot= $this->curl("izle/".$uri."?source=".$player);
        }else{
          $bot= $this->curl("izle/".$uri);
        }

        include 'htmlparser.php';
        $bul= str_get_html($bot);
        $bolumisim= $bul->find("h1[class=h4 m-b-0 fw-regular]")[0]->innertext;

        $videorow= $bul->find("div[id=video-area]");
        $videorow= $videorow[0];

        $playerary= array();

          for($i=0; $i<count($videorow->find("div[class=span-nine]")[0]->find("a")); $i++){
            $isim= $videorow->find("div[class=span-nine]")[0]->find("a")[$i]->innertext;
            $source= $videorow->find("div[class=span-nine]")[0]->find("a")[$i]->href;
            $bol=explode("?source=",$source);
            $source=$bol[1];
            array_push($playerary,array("isim"=>$isim,"source"=>$source));
          }

          $embedurl= $videorow->find("iframe")[0]->src;

          return array("isim"=>$bolumisim,"playerler"=>$playerary,"embedurl"=>$embedurl);

      }
    }

    function arama($isim,$sayfa=1){
      $isim= urlencode($isim);

      $bot= $this->curl("arsiv/?q=".$isim."&page=".$sayfa);

      preg_match_all( '/<article class="tv-series-list-box">(.*?)<\/article>/', $bot, $diziler );

      $veriler= array();
      $diziary= array();
      for ($i=0; $i <count($diziler[0]) ; $i++) {
        $dizi= $this->dizilistegrid($diziler[0][$i]);
        array_push($diziary,$dizi);
      }
      array_push($veriler,$diziary);


        preg_match( '/<ul class="cd-pagination">(.*?)<\/ul>/', $bot, $pagenation );
        if($pagenation[1]==null){
          array_push($veriler,array("no pagination"));
        }else{
        preg_match( "/<li class='current'><b>(.*?)<\/b><\/li>/", $pagenation[1], $sayfa );
        $sayfa= str_replace(array('[',']'),"",$sayfa[1]);
        $bol= explode('/',$sayfa);
        array_push($veriler,array("bulunan"=>$bol[0],"max"=>$bol[1]));
        }

        return $veriler;
    }

}
