<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?=APP_URL?>public/assets/css/header_footer.css">
<link rel="stylesheet" href="<?=APP_URL?>public/assets/css/article.css">

  <title></title>
</head>
<body style="background-color: #eee;">

<?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'author' || $_SESSION['role'] === 'admin'): ?>
    <?php include "include/navbar.php"; ?>
<?php else: ?>
    <?php include "include/nav.php"; ?>
<?php endif; ?>

    <form class="d-flex" method="POST" id="searchForm" onsubmit="search">

        <input class="form-control me-2 text-info bg-white custom-input" id="searchInput" type="text" placeholder="Search" name="search">
        <!-- <button class="btn btn-primary text-white" type="button" id="search">Search</button> -->
        <button type="submit" name="" class="btn btn-primary text-white" id="searchBtn">Search</button>

      </form>
    </div>
  </div>
</nav>

<section style="width:100%; background-color: #ffffff;">
            <div class="text-center p-2" style=" background-color: #839ba4; color: #fff; font-size:20px">All Wikis</div>
        </div>
    </section>

   <!-- Autres éléments HTML avant la section de recherche -->
<!-- <div id="wiki"></div> -->
<!-- Autres éléments HTML après la section de recherche -->

    <div class="container mt-4" id="wiki">
        <div class="row">

    <?php foreach ($articles as $article) :?>
        <div class=" col-md-6 text-center mb-4">
            <div class="article-title card text-dark card-has-bg click-col" style="background-image:url('<?=APP_URL?>public/images/article.jpg');">
                <div class="card-img-overlay d-flex flex-column">
                    <div class="card-body">
                        <h4 class="card-title mt-0 text-center"><?= $article['name'] ?></h4>
                        <p class="content mt-0 text-center"><?= $article['categorie_name'] ?></p>
                        <p class="content mt-0"><?= $article['description'] ?></p>
                        <!-- <a href="Singlepage/index?id=<= $article['id'] ?>">Read more</a> -->
                        <form method="POST" action="<?=APP_URL?>Singlepage/index">
                            <input type="hidden" name="id" value="<?= $article['id'] ?>">
                            <button type="submit" name="submit">Read more</button>
                        </form>

                    </div>
                </div>
        </div></div>
    <?php endforeach; ?>

        </div>
    </div>

<section class="p-4 row">
<?php foreach ($categories as $category) :?>
    <div class="col-3 p-2 me-4" style="background:linear-gradient(to right, #87CEEB, #1E90FF); text-align: center; color: black; border-radius: 10px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);">
        <h3><?= $category['name'] ?></h3>
        <p><?= $category['description'] ?></p>
    </div>
<?php endforeach; ?>
</section>
</div>

<?php include "include/footer.php" ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="<?=APP_URL?>public/assets/js/search_script.js"></script>
</body>
</html>