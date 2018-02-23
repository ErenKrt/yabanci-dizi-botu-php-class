# Yabancı Dizi Botu Php / Class

---
- [Kurulum](#kurulum)
- [Bilgilendirme](#bilgilendirme)
- [Ornekler](#ornekler)
---


### Kurulum

Php üzerinde basit kurulum:

    require_once("class.php");
    require 'class.php';

### Bilgilendirme

Class 5.3, 5.4, 5.5, 5.6 sürümlerinde çalışmaktadır.

### Ornekler
Canlı Demo: [Demo](http://bit.ly/2F3LPXv)
Daha fazla örnek için: [Örnekler](https://github.com/ErenKrt/yabanci-dizi-botu-php-class/tree/master/ornekler).
Detaylı Örnekler: ornekler/index.html
```php
require_once("class.php");
$bot= new epbot();

$deneme= $bot->sonlar(5); // Son eklenenlerden almak istediğiniz miktar

for($i=0; $i<count($deneme); $i++){
  echo "<a href='izle.php?isim=".$bot->seourl($deneme[$i][adi]." ".$deneme[$i][epadi])."' target='_blank'>".$deneme[$i][adi]."-".$deneme[$i][epadi]." | ".$deneme[$i][tarih]."<br><img src='resim.php?url=".$deneme[$i][resim]."' height='200' width='200'></a><hr>";
}
```
