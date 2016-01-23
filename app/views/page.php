<!DOCTYPE html>
<html>
    <head>
        <title><?= $this->section('title', 'Welcome') ?></title>
        <link rel="stylesheet" type="text/css" href="/css/reset.css" />
<? if (isset($stylesheets)): ?>
    <? foreach ($stylesheets as $stylesheet): ?>
        <link rel="stylesheet" type="text/css" href="<?= $stylesheet ?>">
    <? endforeach ?>
<? endif ?>
<? if (isset($scripts)): ?>
    <? foreach ($scripts as $script): ?>
        <script type="text/javascript" src="<?= $script ?>"></script>
    <? endforeach ?>
<? endif ?>
    </head>
    <body>
        <div id="content"><?= $this->section('content') ?></div>
    </body>
</html>
