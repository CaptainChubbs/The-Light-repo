<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php

    include __DIR__.'/./includes/connect.php';

    $selectMeta = "SELECT * FROM `meta`";
    $resultMeta = mysqli_query($conn, $selectMeta);
    $row= mysqli_fetch_assoc($resultMeta);
    $meta = $row['tags'];
    ?>

  <meta name="description" content="Abahlengi Nurse Booking Service">
  <meta name="keywords" content="<?php echo $tags; ?>">
  <meta name="author" content="The Light">
    <!--Page Title-->

    <title>Abahlengi - <?php echo $title;?></title>



    <!--Linking Stylesheet-->

    <link rel="stylesheet" href="css/style.css">



    <!--Bootstrap CDN-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    

    <!--Importing Font Awesome Icons CDN-->

    <script src="https://kit.fontawesome.com/bdd911af05.js" crossorigin="anonymous"></script>

    

    <!--Google Fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Tenor+Sans&display=swap" rel="stylesheet">



    <!--Favicon Icons-->

    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon_io/apple-touch-icon.png">

    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon_io/favicon-32x32.png">

    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon_io/favicon-16x16.png">

    <link rel="manifest" href="/site.webmanifest">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>



</head>

<!-- Google tag (gtag.js) -->

<script async src="https://www.googletagmanager.com/gtag/js?id=G-QZ2GX5K4BW"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());



  gtag('config', 'G-QZ2GX5K4BW');

</script>