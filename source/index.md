---
title: Getting Started
template: page
---

Soushi (草紙 in Japanese) is a bimodal site generator powered by PHP.

### Concept

In what way is Soushi bimodal?

That is, Soushi supports both generating a static Web site for [GitHub Pages](https://pages.github.com/) and serving contents dynamically via PHP scripts which can be simply put onto Web server, making HTML files from source files written in Markdown.

Soushi exploits the strength of PHP which allows us to easily deploy scripts and which is, itself, a template language, being enhanced by [Plates](http://platesphp.com/) library.

### Installation

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
public/
    └── index.php
source/
templates/
```

### Your First Page

#### Pages

By default, pages are supposed to be in `source/` directory. Soushi supports Markdown for write page contents and [Front Matter](https://jekyllrb.com/docs/frontmatter/) for metadata of pages.

Here's your first page, `source/index.md`:

```markdown
---
title: My Homepage
template: page
---

This is my homepage!
```

#### Templates

By default, templates are supposed to be in `templates/` directory. Templates are just plain PHP scripts enhanced by [Plates](http://platesphp.com/) library.

`templates/page.php`:

```php
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title><?= $config->siteTitle ?></title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h1><?= $config->siteTitle ?></h1>
      </div>
      <div class="body">
        <h2><?= $title ?></h2>
        <?= $content ?>
      </div>
    </div>
  </body>
</html>

```

See the document of [Plates](http://platesphp.com/) library for details.

#### Assets

Files in `source/` directory that have non-`*md` extension are recognized as assets such as CSS, JavaScript, images. You can put whatever static files you like in the directory.

`source/main.css`:

```css
/* some css descriptions */
```

### Preview Server

Run `soushi server` to preview your site in browser.

```sh
$ ./vendor/bin/soushi server
```

By default, the server sits on `http://127.0.0.1:8000`.

### Generating Static Files

Run `soushi build` to generate static files:

```sh
$ ./vendor/bin/soushi build
```

Files are placed in `build/` directory like below:

```
build/
    └── main.css
    └── index.php
```

### Deployment

Run `soushi gh-pages` command to deploy the site to GitHub Pages. Needless to say, you need to create remote repository on GitHub and track it from your local repository in advance.

```sh
$ ./vendor/bin/soushi gh-pages
```
