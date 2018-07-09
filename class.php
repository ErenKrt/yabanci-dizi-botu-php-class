<?php

//    ________                          ___  ____           _
//   |_   __  |                        |_  ||_  _|         / |_
//   | |_ \_| _ .--.  .---.  _ .--.    | |_/ /    _ .--.`| |-'
//   |  _| _ [ `/'`\]/ /__\\[ `.-. |   |  __'.   [ `/'`\]| |
//  _| |__/ | | |    | \__., | | | |  _| |  \ \_  | |    | |,
// |________|[___]    '.__.'[___||__]|____||____|[___]   \__/

/**
 * Class Yabancı Dizi Bot PHP / Class
 * @author Eren Kurt (ErenKrt)
 * @mail kurteren07@gmail.com
 * @date 21.02.2018
 * @update 10.07.2018
 */

class epbot{

  private function Curl( $url, $proxy = NULL )
    {
        $options = array ( CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_ENCODING => "",
            CURLOPT_REFERER => "http://dizipub.co/",
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
        return str_replace( array ( "\n", "\r", "\t" ), NULL, $header[ 'content' ] );
    }

    function anaduzenle($dizi){

      preg_match("/<span class='post-date'>(.*?)<\/span>/", $dizi, $tarih);
      $tarih=$tarih[1];
      preg_match('/<a href="(.*?)">(.*?)<\/a>/',$dizi,$url);
      $url= $url[1];
      preg_match('/<h3 class="archive-name">(.*?)<\/h3>/',$dizi,$adi);
      $adi= $adi[1];
      preg_match('/<h4 class="episode-name">(.*?)<\/h4>/',$dizi,$epadi);
      $epadi= $epadi[1];
      preg_match('/<img src="(.*?)" alt="(.*?)" title="(.*?)" class="(.*?)" \/>/',$dizi,$resim);
      $resim=base64_encode($resim[1]);

      if($tarih==""){
        $tarih="X";
      }
      if($url==""){
        $url="#";
      }
      if($adi==""){
        $adi="Dizi adı";
      }
      if($epadi==""){
        $epadi="Bölüm x";
      }
      if($resim==""){
        $resim= base64_encode("https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/No_image_3x4.svg/1024px-No_image_3x4.svg.png");
      }

      $ary= array(
        "adi"=>$this->clear($adi),
        "epadi"=>$this->clear($epadi),
        "tarih"=>$this->clear($tarih),
        "url"=>$this->clear($url),
        "resim"=>$this->clear($resim)
      );

      return $ary;
    }

    function sonlar($uzunluk=10){
      $bot= $this->curl("http://dizipub.co/");
      preg_match_all( '/<article class="poster-article ">(.*?)<\/article>/', $bot, $normalcikti );
      preg_match_all( '/<article class="poster-article mr0">(.*?)<\/article>/', $bot, $mrcikti );
      preg_match_all( '/<article class="poster-article  new-tv-series">(.*?)<\/article>/', $bot, $new );

      $diziler= array_merge($normalcikti[1],$mrcikti[1],$new[1]);

      if($uzunluk > count($diziler)){
        $uzunluk= count($diziler);
      }

      $diziarray= array();
      for($i=0; $i <$uzunluk; $i++){
      $veri= $this->anaduzenle($diziler[$i]);
      array_push($diziarray,$veri);
      }

      return $diziarray;
    }

    function dizicek($isim){
      $isim= $this->seourl($isim);

      $bot= $this->curl("http://dizipub.co/dizi/".$isim."/");

      preg_match('/<article id="post-summary">(.*?)<\/article>/',$bot,$bilgi);
      $bilgi= $bilgi[1];

      preg_match('/<h1>(.*?)<\/h1>/',$bot,$isim);
      $isim= $isim[1];
      preg_match('/<p>(.*?)<\/p>/',$bot,$aciklama);
      $aciklama= $aciklama[1];

      preg_match('/<aside id="archive-sidebar" class="sidebar">(.*?)<\/aside>/',$bot,$sidebar);
      $sidebar= $sidebar[1];

      preg_match('/<img src="(.*?)" alt="(.*?)" class="(.*?)">/',$sidebar,$resim);
      $resim= $resim[1];

      preg_match('/<span class="imdb-score"> <mark>IMDb Puanı:<\/mark> (.*?) <small>\/10<\/small> <\/span>/',$sidebar,$imdb);
      $imdb= $imdb[1];

      preg_match('/<ul class="seasons-tab-list tabsSelector">(.*?)<\/ul>/',$bot,$sezonlar);
      $sezonlar=$sezonlar["1"];

      preg_match_all('/<li><a href="(.*?)" class="btn-radius button(.*?)"> (.*?) <\/a><\/li>/',$sezonlar,$sezonlar);
      $sezonlar= $sezonlar[3];

      $sezonbler= array();


      for($i=1; $i<=count($sezonlar); $i++){
      preg_match_all('/<div id="'.$i.'" class="list-table"><article class="article-list">(.*?)<\/article><\/div>/',$bot,$sezonbölümleri);
      $sezonbölümleri= $sezonbölümleri[1][0];
      preg_match_all('/<a href="(.*?)">(.*?)<\/a>/',$sezonbölümleri,$sezonbölümleri);
      $sezonbölümleri= $sezonbölümleri[2];
      array_push($sezonbler,$sezonbölümleri);
      }

      $ary= array("isim"=>$isim,"aciklama"=>$aciklama,"resim"=>base64_encode($resim),"sezonlar"=>$sezonlar,"bölümler"=>$sezonbler);
      return $ary;
    }
    function playerbul($link){
      $bot= $this->curl($link);
      preg_match('/<div id="video-player-container"><span class="object-wrapper">(.*?)<\/span><\/div>/',$bot,$player);
      $player= $player["1"];
      preg_match('/<iframe(.*?)><\/iframe>/',$player,$player);
      $player= $player["1"];
      preg_match('/src="(.*?)"/',$player,$player);
      $player= $player["1"];
      return base64_encode($player);
    }

    function izle($isim){
        $url= "http://dizipub.co/".$isim."/";

        $bot= $this->curl($url);
        preg_match('/<div class="player-alternatives"><div class="button-hole">(.*?)<\/div><\/div>/',$bot,$alternatifler);
        $alternatifler=$alternatifler[1];
        preg_match_all('/<a href="(.*?)">(.*?)<\/a>/',$alternatifler,$playerlar);

        $alternatif= array(
          $playerlar[2][0]=>$this->playerbul($playerlar[1][0]),
          $playerlar[2][1]=>$this->playerbul($playerlar[1][1])
        );
        $default= $this->playerbul($url);
        $defaultary= array("default"=>$default);
        $alternatif=array_merge($defaultary,$alternatif);
        return $alternatif;
    }
    function clear($yazi){
	   $yazi = preg_replace("/\s+/", " ", $yazi);
	   $yazi = trim($yazi);
	   return $yazi;
   }

  function seourl($str, $options = array()){
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

}
