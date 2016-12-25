---
title: Introduction
template: page
---

Soushi (草紙 in Japanese) is a bimodal site generator powered by PHP.

### Concept

In what way is Soushi bimodal?

Soushi is bimodal in terms of that it supports both generating a static Web site for [GitHub Pages](https://pages.github.com/) and serving contents dynamically via PHP scripts which can be simply put onto Web server, making HTML files from source files written in Markdown.

Soushi exploits the strength of PHP which allows us to easily deploy scripts and which is, itself, a template language, being enhanced by [Plates](http://platesphp.com/) library.

### Source

Repository: https://github.com/kentaro/soushi

This Web site itself is built with Soushi. You can also consult the repository above to get an example of how to create a Web site with Soushi.

### Installation

Firstly, create a directory for your awesome site and track a remote repository from there.

```sh
$ mkdir your-awesome-site
$ cd your-awesome-site
$ git init
$ git remote add origin git@github.com:your-github-account/your-awesome-site.git
```

Secondly, add dependency on kentaro/soushi using composer.

```sh
$ composer require kentaro/soushi
```

And finally, initialise the project using `soushi` command.

```sh
$ ./vendor/bin/soushi init
```

As a result, you can see some files and directories tree like below:

```
.gitignore
config.php
build/
public/
    └── index.php
source/
templates/
```

Now you are ready to enjoy Soushi!
