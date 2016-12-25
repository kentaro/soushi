---
title: "Your First Page"
template: page
---

### Page

By default, pages are supposed to be placed in `source/` directory. Soushi supports Markdown for page contents and [Front Matter](https://jekyllrb.com/docs/frontmatter/) for metadata of a page.

**source/index.md**:

```markdown
---
title: My Homepage
template: page
---

This is my homepage!
```

The metadata properties used in above page are to:

* `title`: refer to the page title
* `template`: refer to the template file for the page

### Template

By default, templates are supposed to be placed in `templates/` directory. Templates are just plain PHP scripts enhanced by [Plates](http://platesphp.com/) library.

**templates/page.php**:

```php
<html>
  <head>
    <link rel="stylesheet" href="main.css">
    <title><?= $config->site_title() ?></title>
  </head>
  <body>
    <h1><?= $config->site_title() ?></h1>
    <h2><?= $title ?></h2>
    <?= $contents ?>
  </body>
</html>
```

For details, see [Variables](./variables) and [Template](./template) sections of this site.

### Assets

Files in `source/` directory that have non-`.md` extension are recognized as assets such as CSS, JavaScript, or images. You can put whatever static files you like in the directory.

**source/main.css**:

```css
/* some css descriptions below */
```

**CAVEAT**: Assets are **NOT** automatically copied into `public/` directory which can be shown via preview server described below. Thus, you have to make symlinks to each assets from `public/` directory:

```sh
$ cd public
$ ln -sf ../source/main.css main.css
```

### Preview

Run `soushi server` to preview your site in browser.

```sh
$ ./vendor/bin/soushi server
```

By default, the server launches at `http://127.0.0.1:8000`.
