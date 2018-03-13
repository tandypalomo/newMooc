<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="keywords" content="<?php echo $this->metaKeywords; ?>"/>
        <meta name="description" content="<?php echo $this->metaDescription; ?>"/>
        <meta name="author" content="<?php echo $this->metaAuthor; ?>">

        <!-- Facebook -->
        <meta prefix="og: http://ogp.me/ns#" property="og:title" content="<?php echo $this->metaOgDataArray['name']; ?>" />
        <meta prefix="og: http://ogp.me/ns#" property="og:image:width" content="450"/>
        <meta prefix="og: http://ogp.me/ns#" property="og:image:height" content="300"/>
        <meta prefix="og: http://ogp.me/ns#" property="og:image" content="<?php echo $this->metaOgDataArray['photo_url']; ?>" />
        <meta prefix="og: http://ogp.me/ns#" property="og:url" content="<?php echo $this->metaOgDataArray['url']; ?>" />
        <meta prefix="og: http://ogp.me/ns#" property="og:site_name" content="<?php echo $this->metaOgDataArray['name']; ?>"/>
        <meta prefix="og: http://ogp.me/ns#" property="og:description" content="<?php echo $this->metaOgDataArray['description']; ?>" />
        <meta prefix="og: http://ogp.me/ns#" property="og:type" content="website"/>

        <!-- Twitter -->
        <meta name="twitter:card" content="<?php echo $this->metaOgDataArray['description']; ?>">
        <meta name="twitter:url" content="<?php echo $this->metaOgDataArray['url']; ?>">
        <meta name="twitter:title" content="<?php echo $this->metaOgDataArray['name']; ?>">
        <meta name="twitter:description" content="<?php echo $this->metaOgDataArray['description']; ?>">
        <meta name="twitter:image" content="<?php echo $this->metaOgDataArray['photo_url']; ?>">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="theme-color" content="#ffffff">

        <link type="text/css" rel="stylesheet" href="/css/app.min.css" />
        <?php foreach ($this->stylesheets as $href): ?>
            <link href="<?php echo $href; ?>" rel="stylesheet" type="text/css">
        <?php endforeach; ?>

        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|PT+Sans|Fira+Mono" rel="stylesheet">



    </head>
    <body id="page-top" class="index">

        <?php
        if(is_array($resp)) extract($resp);
        require_once 'app/views/template/' . $page . '.php';
        ?>

        <div id="ajaxFormAlert" class="alert alert-feedback-fixed">
            <button type="button" class="close" id="alert-close" data-toggle="alert"><span class="icon-cross"></span></button>
            <h4> <span class="icon-warning"></span> Oops!</h4>
            <p id="alertFeedbackText">Parece que algo deu errado. Não se preocupe, te ajudaremos a encontrar o caminho <span class="icon-emoji-flirt"></span>.</p>
        </div>

        <script type='text/javascript' src="/js/app.min.js"></script>
        <?php foreach ($this->scripts as $path): ?>
            <script type='text/javascript' src="<?php echo $path; ?>"></script>
        <?php endforeach; ?>

    </body>
</html>
