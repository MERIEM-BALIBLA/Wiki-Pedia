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
<body>
<?php include "include/nav.php" ?>

    <h1>CHYPPO</h1>
    <div>
        <?php if (isset($_POST['id'])) : ?>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>User</th>
                        <th>Tag</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <td ><?= $articles[0]['name'] ?></td>
                        <td><?= $articles[0]['description'] ?></td>
                        <td><?= $articles[0]['categorie_name'] ?></td>
                        <td><?= $articles[0]['user_name'] ?></td>
                        <td><?= $articles[0]['tag_name'] ?></td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>
