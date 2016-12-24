---
title: "Soushi: Bimodal Site Generator Powered by PHP"
template: page
---

Soushi (草紙 in Japanese) is a bimodal site generator powered by PHP.

## Concept

In what way is Soushi bimodal?

That is, Soushi supports both generating a static Web site for [GitHub Pages](https://pages.github.com/) and serving contents dynamically via PHP scripts which can be simply put onto Web server, making HTML files from source files written in Markdown.

Soushi exploits the strength of PHP which allows us to easily deploy scripts and which is, itself, a template language, being enhanced by [Plates](http://platesphp.com/) library.

## Getting Started

Firstly, create a directory for your awesome site.

```sh
$ mkdir your-awesome-site
$ cd your-awesome-site
$ git init
```

Secondly, add dependency on kentaro/soushi using composer.

```sh
$ composer require kentaro/soushi
```

And finally, initialise the project using `soushi` command.

```sh
$ ./vendor/bin/soushi init
```

As a result, you can see a files/directories tree like below:

```
.gitignore
config.php
build/
    └── index.html
public/
    └── index.php
source/
templates/
```
