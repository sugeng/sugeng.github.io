---
layout: post
title: "Fix Octopress Repository Setelah git clone"
date: 2013-11-25 08:57:11 +0700
comments: true
categories: Octopress Github
---

Setelah saya berhasil menginstall octopress pada account github saya melalui notebook, saya ingin mengupdate post-post melalui PC di kantor saya namun setelah melakukan `git clone` dari repository di github ternyata saya tidak bisa melakukan push `rake deploy`

~~~
To https://github.com/username/username.github.io
 ! [rejected]        master -> master (non-fast-forward)
 error: failed to push some refs to 'https://github.com/username/username.github.io'
 hint: Updates were rejected because the tip of your current branch is behind
 hint: its remote counterpart. Merge the remote changes (e.g. 'git pull')
 hint: before pushing again.
 hint: See the 'Note about fast-forwards' in 'git push --help' for details.

## Github Pages deploy complete
cd -
~~~
{:lang="text"}
    
Cara memperbaikinya setelah saya baca di [sini](http://http://weishi.github.io/blog/2013/07/24/setup-an-existing-octopress-repository-after-git-clone/) akhirnya saya bisa mengupdate blog post di github.

~~~
	git clone https://github.com/username/username.github.io.git
	git checkout source
    mkdir _deploy
    cd _deploy
    git init
    git remote add -t master -f origin https://github.com/username/username.github.io.git
~~~
{:lang="text"}    
