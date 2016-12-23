<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->e($title) ?></title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <div class="title"><?= $this->e($title) ?></div>
      </div>
      <div class="body">
        <?= $this->section("content") ?>
      </div>
    </div>
  </body>
</html>
