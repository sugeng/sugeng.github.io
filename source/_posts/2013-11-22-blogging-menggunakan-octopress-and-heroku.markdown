---
layout: post
title: "Blogging Menggunakan Octopress &amp; Heroku"
date: 2013-11-22 09:49:24 +0700
comments: true
categories:
---

Setelah lama menggunakan wordpress sebagai media untuk blogging akhirnya saya memutuskan untuk bermigrasi menggunakan octopress. Alasan kenapa saya bermigrasi sebagai berikut :

### Plugin Wordpress terlalu banyak
Salah satu keunggulan worpress adalah tersedianya plugin yang banyak, namun untuk mengelola plugin-plugin yang terinstall terlalu makan waktu sehingga terkadang malah tidak fokus pada tujuan nge-blog yaitu menulis.

### Cepat dan Efisien
Octopress framework menggunakan [Jekyll](https://github.com/mojombo/jekyll "Jekyll Page") untuk menggenerate halaman-halaman websitenya. Semua halaman blog adalah static page sehingga tidak membutuhkan proses yang berat pada server dan dapat didownload secepatnya ke browser client.

### Hosting di Github Pages
Web static octopress bisa dihosting-kan di [Github pages](https://help.github.com/articles/what-are-github-pages) yang notabene gratis. Terlebih github selalu online dan waktu respon yang cepat.

### Mudah digunakan
Workflow penggunaan octopress juga sangat mudah, cukup dengan perintah command line posting blog lansung selesai.
	rake new_post['Judul Posting']
	rake deploy

### Markdown
Sebagai editor, octopress menggunakan [Markdown](http://daringfireball.net/projects/markdown/).

