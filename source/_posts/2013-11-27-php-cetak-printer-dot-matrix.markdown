---
layout: post
title: "PHP Cetak Printer DOT MATRIX (Bagian 1)"
date: 2013-11-27 11:02:37 +0700
comments: true
categories: PHP
keywords: PHP dot matrix printer
description: Bagaimana cara mencetak PHP ke dot matrix
---

Trik ini saya gunakan ketika saya membuat project program untuk sistem perguruan tinggi. Karena keperluan mencetak laporan dan daftar hadir yang masih dicetak menggunakan printer dot matrix.

### Menggunakan RAW text
Cara ini saya dapatkan karena pernah menggunakan program EPSBED versi DOS dari DIKTI, pada dasarnya program tersebut (EPSBED) ketika melakukan proses cetak akan menciptakan file text sementara yang kemudian dicetak.

Setelah melakukan experimen ternyata kita bisa mencetak text ke printer Dot Matrix dengan command prompt.
	
    // Print Listing directory
    dir > LPT1
    // atau
    type file_yang_akan_dicetak > LPT1
    // atau
    copy file_yang_akan_dicetak LPT1
    
Dengan asumsi printer diinstall pada port LPT1.

Selanjutnya saya buat program PHP untuk menggenerate laporan dalam format text yang dapat didownload ke komputer klien. Berikut snippet source PHP-nya

<!-- more -->

{% include_code [ lang:php ] laporan.ipk.php  %}

Untuk memformat posisi dari isi laporan gunakan [str_pad](http://www.php.net/str_pad), proses untuk mengetahui posisi yang tepat memang harus melalui trial dan error. Kemudian untuk mengetahui kapan ==posisi printer harus meng-eject atau format font apa bisa diatur menggunakan escape code==. Tergantung merk printer yang digunakan maka escape code-nya berbeda. Jika menggunakan [printer Epson](http://www.lprng.com/DISTRIB/RESOURCES/PPD/epson.htm) atau [printer HP](http://www.devenezia.com/docs/HP/index.html?2-esc-code). Source code di atas menggunakan Epson.

Hasilnya

{% include_code laporan_ipk.js %}

Setelah file text didownload, kemudian bisa menggunakan perintah dos (Command Prompt) lalu pada direktori tempat file berada `copy laporan_ipk.txt > LPT1`. Maka proses print akan segera di jalankan.

Namun tentu saja akan merepotkan jika harus menjalankan perintah dari command prompt setiap akan nge-print, oleh sebab itu saya membuat program kecil dari delphi untuk dijalankan setiap file dari php di download. Programnya bisa di download di sini [SgPrint.exe](https://dl.dropboxusercontent.com/u/328320/sgprint.exe). Karena program itu saya buat beberapa tahun yang lalu source code delphi-nya tidak bisa saya temukan jadinya tidak bisa saya share. Tapi program kecil tersebut kira-kira seperti ini flow-nya :

- Pastikan printer dot matrix menjadi default printer.
- File text yang digenerate PHP harus ber-extensi .pts (singkatan perguruan tinggi swasta, waktu buat sgprint ini saya bingung harus buat extensi apa hehe..).
- Jalankan sekali file sgprint, programnya akan membuat `C:/Program Files/sgprint/sgprint.exe`.
- Klik kanan file .pts-nya lalu pilih `open with` nya arahkan ke sgprint. Check pada bagian always open-nya agar extension .pts selalu dijalankan oleh sgprint.

Yup cukup seperti itu. ==Penting! Karena trik ini saya gunakan ketika belum ada Windows 7, jadi saya tidak bisa pastikan bisa berjalan di Windows 7==. Terus terang cara ini mungkin sudah tidak up-to-date karena sekarang saya menggunakan PDF sebagai format laporan dan saya tidak mengembangkan lagi program sgprint-nya untuk Windows 7. Tapi *InsyaAllah* cara ini masih bisa digunakan untuk klien dengan Windows XP.

Posting selanjutnya

- Menggunakan [TCPDF](http://tcpdf.org) untuk membuat laporan dari PHP.
- Setting PDF agar bisa dicetak menggunakan Dot Matrix
- Karena di milis [PHP-ID](http://groups.yahoo.com/neo/groups/id-php/info) dibahas tentang [jZebra](https://code.google.com/p/jzebra/) dan [jspdf](http://parall.ax/products/jspdf) (Om Mardius Ady H), saya sedang experimen menggunakan jZebra & jspdf yang juga nanti saya coba bahas di bagian 3 & 4.

Bacaan :

- [str_pad](http://www.php.net/str_pad)
- [Milis PHP-ID]( http://id-php.org/)
- [TCPDF](http://tcpdf.org)
- [jZebra](https://code.google.com/p/jzebra/)
- [jspdf](http://parall.ax/products/jspdf)
- [Escape Code Epson](http://www.lprng.com/DISTRIB/RESOURCES/PPD/epson.htm)
- [Escape Code HP](http://www.devenezia.com/docs/HP/index.html?2-esc-code)
