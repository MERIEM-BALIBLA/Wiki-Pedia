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

  <style>
    .contain {
        background-image: url('<?=APP_URL?>public/images/background.jpg');
        background-attachment: fixed;
        background-size: cover;
        background-position:center;
        height: 100%;
    }
  </style>

  <title></title>
</head>
<body style="background-color: #eee;">

<?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'author' || $_SESSION['role'] === 'admin'): ?>
    <?php include "include/navbar.php"; ?>
<?php else: ?>
    <?php include "include/nav.php"; ?>
<?php endif; ?>

    
    </div>
  </div>
</nav>

<section class="contain" style="width:100%;">
        <div class="text-center" style="color: #fff; font-size:20px;padding:8%; background: rgb(0, 0, 255, 0.2);line-height: 2.5;">
            <div style="margin-left:3%">
            <span>Stay curious.<br></span>
                Discover stories, thinking, and expertise from writers on any topic.<br>
                Search over 200 individual encyclopedias and reference books from the worlds most trusted publishers.
            </div>
            <div class="mt-2" style="width:50%; margin:0 auto;">
                <form class="d-flex" method="POST" id="searchForm" onsubmit="search">
                    <input class="form-control me-2 text-info bg-white custom-input" id="searchInput" type="text" placeholder="Search" name="search">
                    <!-- <button class="btn btn-primary text-white" type="button" id="search">Search</button> -->
                    <button type="submit" name="" class="btn btn-primary text-white" id="searchBtn">Search</button>
                </form>
            </div>

            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-globe"></i>
                </div>
        </div>
  
    </section>

    <!-- categorie -->
    <section class="text-center d-flex" style="">
        <div class="row flex-column flex-md-row" style="margin-top:4%;">
            <?php foreach ($categories as $category) :?>
                <div class="col-8 col-md-2 px-4 py-2 mx-auto mb-2" style="background-color: #eee;margin-left: 2.5%;text-align: left; color: black; border-radius: 4px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3); border: 2px solid rgba(0, 0, 255, 0.2);">
                    <h4><?= $category['name'] ?></h4>
                    <p><?= $category['description'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <div class="container" style="margin-top:2%; margin-bottom:2%;" id="wiki">
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
                            <button class="btn btn-primary text-white mt-4" type="submit" name="submit">Read more</button>
                        </form>

                    </div>
                </div>
        </div></div>
    <?php endforeach; ?>

        </div>
    </div>


</div>

<?php include "include/footer.php" ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="<?=APP_URL?>public/assets/js/search_script.js"></script>
</body>
</html>