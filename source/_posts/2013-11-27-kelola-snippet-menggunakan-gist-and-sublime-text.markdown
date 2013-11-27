---
layout: post
title: "Kelola Snippet menggunakan Gist &amp; Sublime Text"
date: 2013-11-27 15:02:44 +0700
comments: true
categories: Sublime-Text Github
keywords: sublime text github gist
description: mengelola source code menggunakan gist dan sublime text
---

Ingatan saya termasuk kurang bagus karena selalu lupa dengan syntax-syntax yang biasa saya gunakan. Karena itu saya menyimpan potongan-potongan source (snippet) code yang saya anggap penting. Sebelum adanya [Github](http://github.com) saya menyimpan snippet di text file. 

Sekarang menyimpan snippet bisa lebih mudah menggunakan fasilitas gist dari github. Selain di record juga perubahan pada snippet-snippet-nya kita juga bisa menshare snippet yang kita punya dengan orang lain.

Karena sehari-hari untuk *coding* saya menggunakan Sublime Text, saya akhirnya menginstall plugin Gist di sublime text untuk memudahkan mengambil, meng-update juga meng-create snippet baru.

### Buat account github
Silakan registrasi account github. Service github tentunya gratis namun kita nya bisa membuat repositori public. Jika ingin memiliki repositori yang prive kita bisa upgrage ke account yang berbayar (paling murah $7 per-bulan).

### Buat API Github
Setelah membuat account github dan login buat token di [https://github.com/settings/applications](https://github.com/settings/applications) pada bagian Personal Access Token. Tinggal masukkan deskripsi token lalu klik ==Create Token==. 

### Install Plugin Gist
Jika Anda juga menggunakan Sublime Text gunakan shortcut `ctrl+shit+p` untuk mengaktifkan window *palette* kemudian cari plugin *gist*. Setelah plugin selesai di install masuk ke `Preferences > Package Settings > Gists > Settings - User`. Jika baru pertama kali menginstall plugin gist mungkin file setting ini masih kosong.

Tambahkan script di bawah :

~~~json
{
	"token": "TOKEN ANDA"
}
~~~

Copy token yang tadi telah dibuat di gihub pada ==TOKEN ANDA== lalu simpan.

### Menggunakan Plugin
Untuk menggunakan plugin gist, aktifkan *palette* (`ctrl+shit+p`) lalu ketik gist, maka muncul perintah git yang bisa digunakan.

- Gist: Insert Gist
- Gist: Open Gist
- Gist: Create Private Gist
- Gist: Create Public Gist
- Gist: Add File to Gist

Selanjutnya jika ingin membuat gist baru, tinggal copykan snippet yang akan di simpan di sublime text lalu pilih `Gist: Create Private Gist` jika ingin snippet tidak di akses orang lain, namun pilih yang public jika sekaligus ingin men-share snippet tersebut.

Jika ingin mengakses gist yang telah dibuat, pilih `Gist: Open Gist` maka akan muncul list file snippet yang telah dibuat. 

Bahan Bacaan :

- [Sublime Text](http://www.sublimetext.com)
- [Shortcut Sublime Text Windows](http://docs.sublimetext.info/en/latest/reference/keyboard_shortcuts_win.html)
- [Essential Sublime Text 2 Plugins and Extensions](http://net.tutsplus.com/tutorials/tools-and-tips/essential-sublime-text-2-plugins-and-extensions/)
- [Create and Open GitHub Gists from Sublime Text](http://aspirecode.com/create-and-open-github-gists-from-sublime-text/)