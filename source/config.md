---
title: Configuration
template: page
---

You can set some variables used globally in your Web site using a configuration file.

### Configuration File

To run `soushi init` command, `config.php` is generated in the root of your site directory.

You can set any key/value pairs you like in the file.

**config.php**:

```php
<?php
return [
    "site_title"   => "My Homepage",
    "template_dir" => dirname(__FILE__) . "/templates",
    "source_dir"   => dirname(__FILE__) . "/source",
];
```

As you see above, it's just a PHP associative-array. You have to notice that the value is `return`ed. Otherwise, the statement which loads the file doesn't return the configuration value as an array.

### In Templates

The configurations in `config.php` is passed into templates as `$config` variable to enable you to get information from it.

```php
<title><?= $config->site_title() ?></title>
```

`$config` actually is a `\Soushi\Config` object. You can call methods with key names in the configuration hash to retrieve values which are correspond to the keys.

If you set some key/value pairs(eg. `"foo" => "bar"`), you can call `$config->foo()` to retrieve `"bar"`.
