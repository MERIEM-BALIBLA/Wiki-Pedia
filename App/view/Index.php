<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- header footer -->
<script src=" ../../public/assets/dist/js_bootstrap/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/e80051e55f.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jockey+One&family=Roboto&display=swap" rel="stylesheet">

<!-- articles -->
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css"> -->

<link rel="stylesheet" href="<?=APP_URL?>public/assets/css/header_footer.css">
<link rel="stylesheet" href="<?=APP_URL?>public/assets/css/article.css">
<script src="<?=APP_URL?>public/assets/css/article.css"></script>

  <title></title>
</head>
<body style="background-color: #eee;">
    <?php include "include/nav.php" ?>
    
    <a href="<?=APP_URL?>login/logout"><button>logout</button></a>

   
    <div class="container mt-4">
        <div class="row">

    <?php foreach ($articles as $article) :?>
        <div class=" col-md-6 text-center mb-4">
            <div class="article-title card text-dark card-has-bg click-col" style="background-image:url('public/images/article.jpg');">
                <div class="card-img-overlay d-flex flex-column">
                    <div class="card-body">
                        <h4 class="card-title mt-0 text-center"><?= $article['name'] ?></h4>
                        <p class="content mt-0 text-center"><?= $article['categorie_name'] ?></p>
                        <p class="content mt-0"><?= $article['description'] ?></p>
                        <!-- <a href="Singlepage/index?id=<= $article['id'] ?>">Read more</a> -->
                        <form method="POST" action="Singlepage/index">
                            <input type="hidden" name="id" value="<?= $article['id'] ?>">
                            <button type="submit" name="submit">Read more</button>
                        </form>

                    </div>
                </div>
        </div></div>
    <?php endforeach; ?>

        </div>
    </div>

<!-- categorie -->
<div style="background-color : red;">
    <?php foreach ($categories as $category) :?>
        <h1><?= $category['name'] ?></h1>
        <p><?= $category['description'] ?></p>
    <?php endforeach; ?>
</div>




</div>

<?php include "include/footer.php" ?>
</body>