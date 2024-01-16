<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link rel="stylesheet" href="../../public/assets/css/home.css"> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <link rel="stylesheet" href="<?=APP_URL?>public/assets/css/header_footer.css">
  <title></title>
</head>
<body >
<?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'author' || $_SESSION['role'] === 'admin'): ?>
    <?php include "include/navbar.php"; ?>
<?php else: ?>
    <?php include "include/nav.php"; ?>
<?php endif; ?>
    </div>
  </div>
</nav>

    <section class="p-4" style="text-align:center;background:#0f5470 ;color:white">
        <h3>Wiki Details</h3>
        <div style="width:30% ;margin: 0 auto;">
        <p> Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
        </div>
    </section>
   
    <div  style="background:#eee; height: 70vh; width: 100%;" class="p-4">
    <div class="container mt-4" style="background:#eee;">
        <div class="row">
            <?php if (isset($_POST['id'])) : ?>
                <div class="col-lg-6 order-1 order-lg-2 hero-img d-flex flex-column justify-content-center" data-aos="zoom-in" data-aos-delay="200" style="padding: 2%;">
                    <div class="my-4">
                        <h1><?= $articles['name'] ?></h1>
                        <p style="font-size:20px;">category : <?= $articles['categorie_name'] ?></p>
                        <p style="font-size:20px;">Content : <?= $articles['description'] ?></p>
                    </div>
                    <div class="my-4">
                        <p style="font-size:20px;">The Author : <?= $articles['user_name'] ?></p>
                        <p style="font-size:20px;"><?= $articles['tag_name'] ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-lg-6 order-1 order-lg-2 hero-img d-flex flex-column justify-content-center" data-aos="zoom-in" data-aos-delay="200">
                <div class="mb-4">
                    <img src="<?=APP_URL?>public/images/singlepage.jpg" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </div>
</div>




<?php include "include/footer.php" ?>

</body>

</html>
