# Yabancı Dizi Botu Php / Class V 2.0

---
- [Kurulum](#kurulum)
- [Bilgilendirme](#bilgilendirme)
- [Ornekler](#ornekler)
- [Ornek Site](#ornek-site)
---


### Kurulum

Php üzerinde basit kurulum:

    require_once("class.php");
    require 'class.php';

### Bilgilendirme

Class 5.X sürümlerinde test edilmiştir.
Class'ın işleyisini ve mantığını daha iyi anlamak için indirip hazırlamış olduğum örnek siteyinin kodlarını inceleyebilirsiniz.

### Ornek Site
#### Anasayfa
![Örnek](https://i.hizliresim.com/nlzjoR.png)
![Örnek](https://i.hizliresim.com/Q2DvGr.png)
#### İzle
![Örnek](https://i.hizliresim.com/vPkXlD.png)
#### Dizi Sayfası
![Örnek](https://i.hizliresim.com/yqYNDM.png)

### Ornekler


```php
//Kurulum
	require("class.php");
	use eperen\yabancidizi;
	$dizi = new yabancidizi();
	
//Popüler dizilerin listesini alma
	$populerdiziler= $dizi->populer();
	print_r($populerdiziler);

//Yeni eklenen altyazılı bölümleri alma
	$yenieklenenler= $dizi->yeni(35,1);
	print_r($yenieklenenler);

//Dizileri getirir . | tüm,anime,asya,yabancı | sayfa
	$diziliste= $dizi->diziliste("tüm",1);
	print_r($diziliste);

//Diziye ait bilgileri, dizinin sayfasını getirir.
	$dizisayfasi= $dizi->dizisayfa("elite");
	print_R($dizisayfasi);

//Bölüme ait playeri alma. | bölüm adı | tercih edilen player boş bırakılırsa otomatik seçer
	$izle= $dizi->izle("the-flash-5-sezon-1-bolum","vidmolytr");
	print_r($izle);

//Dizi araması yapar
	$arama= $dizi->arama("mr robot");
	print_r($arama)
```
Geliştirci: © ErenKrt
İg: Ep.Eren
