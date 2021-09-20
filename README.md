<p align="center"><img src="https://ramomen.co/wp-content/uploads/2021/09/ramomen-1-e1631745719247.jpg" width="200"></p>

## About the API

You can get data of the latest announcements, the current schedules of **Hacettepe University Ankara Chamber of Industry Campus** as JSON.  Also, you can get the dining hall data of **all campuses of Hacettepe University.**




## How it works?

This project post a curL request to related web pages of Hacettepe ASO and Hacettepe SKSDB like a Google Bot. Then it processes (DOMDocument, DomXpath) received data and converts it to dynamic JSON data.

###### Curl Request:
```php
 $Url = 'http://hacettepeaso.hacettepe.edu.tr/yeni-duyuru-kategorisi-110';
        $UserAgent = 'Mozilla/5.0 (compatible; Googlebot/2.1; +[url]http://www.google.com/bot.html)';
        $Referer = 'http://www.google.com/';
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $Url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_REFERER, $Referer);
        curl_setopt ($ch, CURLOPT_USERAGENT, $UserAgent);
        $return = curl_exec($ch);
        curl_close($ch);
        
```

## Live Version
###### Get Dining Hall Data (Hacettepe Yemekhane API)
  GET `  https://hacettepeasoapi.ramomen.co/api/dining-hall`
  
Response:
```json
{
    "Content": [
        {
            "date": "1) 17.09.2021 Cuma ",
            "url": "Yemekler :                             \nSoslu Sebze Çorbası\nEtli Nohut\nPirinç Pilavı\nAyran*Etsiz Nohut\nKalori : 1141\n"
        },
        {
            "date": "2) 18.09.2021 Cumartesi ",
            "url": "Yemekler :  \nSultan Çorbası\nEtli Mantar Sote\nSpagetti Napoliten\nÜzüm Hoşafı\n* Etsiz Mantar Sote\nKalori : 1420\n"
        },
		.
		.
		.
        {
            "date": "30) 16.10.2021 Cumartesi ",
            "url": "Yemekler :  \nDomates Çorbası\n Orman Kebabı\n Bulgur Pilavı\n Yoğurt\n * Etsiz Yeşil Mercimek\nKalori : 1140\n"
        },
        {
            "date": "31) 17.10.2021 Pazar ",
            "url": "Yemekler :  \nKöylü Çorbası\n Etli Taze Fasulye\n Spagetti Napoliten\n Keşkül\n * Etsiz Taze Fasulye\nKalori : 1460\n"
        }
    ],
    "Count": 31,
    "Source": "http://www.sksdb.hacettepe.edu.tr/bidbnew/grid.php?parameters=qbapuL6kmaScnHaup8DEm1B8maqturW8haidnI%2Bsq8F%2FgY1fiZWdnKShq8bTlaOZXq%2BmwWjLzJyPlpmcpbm1kNORopmYXI22tLzHXKmVnZykwafFhImVnZWipbq0f8qRnJ%2BioF6go7%2FOoplWqKSltLa805yVj5agnsGmkNORopmYXam2qbi%2Bo5mqlXRrinJdf1BQUFBXWXVMc39QUA%3D%3D"
}
```
`Count`: Number of Total Daily Dining List items

###### Get Latest Announcements Hacettepe ASO (Hacettepe ASO Son Duyurular)
  GET ` https://hacettepeasoapi.ramomen.co/api/duyuru-lastest`
  
Example Response:
  ```json
[
{
"title": "2021-2022 GÜZ DÖNEMİ DERS PROGRAMLARI (ÖNEMLİ)",
"url": "http://hacettepeaso.hacettepe.edu.tr//yeni/2021-2022-guz-donemi-ders-programlari-onemli-duyurusu-1557",
"date": "\r\n                            17 Eylül 2021\r\n                        "
},
{
"title": "İNG 127 Temel İngilizce I, İNG 128 Temel İngilizce II, İNG 137 Yabancı Dil I ve İNG 138 Yabancı Dil II Derslerinin Uzaktan Eğitim Programı Hk",
"url": "http://hacettepeaso.hacettepe.edu.tr//yeni/ing-127-temel-ingilizce-i-ing-128-temel-ingilizce-ii-ing-137-yabanci-dil-i-ve-ing-138-yabanci-dil-ii-derslerinin-uzaktan-egitim-programi-hk-duyurusu-1556",
"date": "\r\n                            17 Eylül 2021\r\n                        "
},
{
"title": "H.Ü ÖĞRENCİ KİMLİK DAĞITIMI HAKKINDA",
"url": "http://hacettepeaso.hacettepe.edu.tr//yeni/hu-ogrenci-kimlik-dagitimi-hakkinda-duyurusu-1555",
"date": "\r\n                            17 Eylül 2021\r\n                        "
},
{
"title": "ÜNİ 101 “Üniversite Yaşamına Giriş\" Dersi Gün ve Saat Değişikliği",
"url": "http://hacettepeaso.hacettepe.edu.tr//yeni/uni-101-universite-yasamina-giris-dersi-gun-ve-saat-degisikligi-duyurusu-1554",
"date": "\r\n                            17 Eylül 2021\r\n                        "
},
{
"title": "2021-2022 Eğitim-Öğretim yılı Güz Dönemi Ders Alma ve Uygulama Kuralları Hakkında",
"url": "http://hacettepeaso.hacettepe.edu.tr//yeni/2021-2022-egitim-ogretim-yili-guz-donemi-ders-alma-ve-uygulama-kurallari-hakkinda-duyurusu-1552",
"date": "\r\n                            15 Eylül 2021\r\n                        "
},
{
"title": "STAJ YERİ BULAMAYAN ÖĞRENCİLERİN DİKKATİNE",
"url": "http://hacettepeaso.hacettepe.edu.tr//yeni/staj-yeri-bulamayan-ogrencilerin-dikkatine-duyurusu-1550",
"date": "\r\n                            10 Eylül 2021\r\n                        "
},
{
"title": "DİPLOMA TESLİMİ HAKKINDA",
"url": "http://hacettepeaso.hacettepe.edu.tr//yeni/diploma-teslimi-hakkinda-duyurusu-1549",
"date": "\r\n                            10 Eylül 2021\r\n                        "
},
{
"title": "Yeni Kazanan ve Kayıt Olan Öğrencilerin Yapacağı İşlemler ",
"url": "http://hacettepeaso.hacettepe.edu.tr//yeni/yeni-kazanan-ve-kayit-olan-ogrencilerin-yapacagi-islemler-duyurusu-1548",
"date": "\r\n                            10 Eylül 2021\r\n                        "
},
{
"title": "ÜNİ 101 “Üniversite Yaşamına Giriş\" dersi hakkında",
"url": "http://hacettepeaso.hacettepe.edu.tr//yeni/uni-101-universite-yasamina-giris-dersi-hakkinda-duyurusu-1547",
"date": "\r\n                            10 Eylül 2021\r\n                        "
},
{
"title": "2021-2022 EĞİTİM ÖĞRETİM YILI GÜZ DÖNEMİNDE STAJ YAPACAK ÖĞRENCİLERİMİZİN DİKKATİNE",
"url": "http://hacettepeaso.hacettepe.edu.tr//yeni/2021-2022-egitim-ogretim-yili-guz-doneminde-staj-yapacak-ogrencilerimizin-dikkatine-duyurusu-1545",
"date": "\r\n                            06 Eylül 2021\r\n                        "
}
]
```

###### Get Schedule Hacettepe ASO (Hacettepe ASO Ders Programları)
  GET `https://hacettepeasoapi.ramomen.co/api/schedule`
  
Example Response:

```json
[
{
"title": "Alternatif Enerji Kaynakları Teknolojisi (2020-2021 Bahar Yarıyılı)",
"url": "http://hacettepeaso.hacettepe.edu.tr/../../../Content/Upload/Dosya/2020-2021_BAHAR_AEK_Ders .Programı.pdf"
},
{
"title": "Elektrik Programı (2020-2021 Bahar Yarıyılı)",
"url": "http://hacettepeaso.hacettepe.edu.tr/../../../Content/Upload/Dosya/2020-2021_BAHAR_HEL_Ders.Programı.pdf"
},
{
"title": "Endüstri Ürünleri Tasarımı Programı (2020-2021 Bahar Yarıyılı)",
"url": "http://hacettepeaso.hacettepe.edu.tr/../../../Content/Upload/Dosya/EUT - 2020-2021 BAHAR DERS PROG_son 0103.pdf"
},
{
"title": "Makine Programı (2020-2021 Bahar Yarıyılı)",
"url": "http://hacettepeaso.hacettepe.edu.tr/../../../Content/Upload/Dosya/2020-21-MAKİNE-BAHAR.pdf"
}
]
```



## License

<p align="center"><img src="https://sites.google.com/site/goeksendenemee/_/rsrc/1520951244196/config/customLogo.gif?revision=1" width="100"></p>

<p align="center">
This project is only for personal and educational things. **Not for profit**.  
The logo belongs to Hacettepe University. All rights reserved.

</p>
