---
title: Deployment
template: page
---

As already said, Soushi is bimodal. That is, you can choose from two methods to deploy your Web site; static Web site for GitHub Pages and dynamic Web site for Web server (ex. httpd).

### Static Web Site

Soushi enables you to easily deploy your Web site to GitHub Pages.

#### Generating Static Files

Run `soushi build` to generate static files:

```sh
$ ./vendor/bin/soushi build
```

Files are placed in `build/` directory like below:

```
build/
    └─ main.css
    └─ index.html
```

#### Deployment

Run `soushi gh-pages` command to deploy the site to GitHub Pages.

```sh
$ ./vendor/bin/soushi gh-pages
```

Needless to say, you need to create remote repository on GitHub and track it from your local repository in advance.

### Dynamic Web Site

Just put the whole directory in which your site is to a Web server via FTP or anything.
