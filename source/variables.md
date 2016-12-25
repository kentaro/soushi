---
title: Variables
template: page
---

### Configuration

* `$config`

Refers to the configuration in `config.php`. See [Configuration](./config) section for details.

### Page Matadata

* `$title`
* `$template`

Metadata variables come from the metadata section of page written in Front Matter like below.

```
---
title: Variables
template: page
---
```

### Page Content

* `$content`

Contains an HTML string generated from Markdown-formatted string in a page.
