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



<link rel="stylesheet" href="<?=APP_URL?>public/assets/css/header_footer.css">
<link rel="stylesheet" href="<?=APP_URL?>public/assets/css/article.css">
<script src="<?=APP_URL?>public/assets/css/article.css"></script>

  <title></title>
</head>
<body style="background-color: #eee;">
    <?php include "include/nav.php" ?>
    
    <a href="<?=APP_URL?>login/logout"><button>logout</button></a>

    <section>
        <a href="<?=APP_URL?>wiki/add">Add a new article</a>
    </section>
    <div class="container mt-4">
        <div class="row">
                 <?php   echo "Hello, " . $_SESSION['name'];
                    var_dump($_SESSION['user_id'])
                 ?>
        <table >
                <thead>
                    <tr>
                        <th>Article name</th>
                        <th>Description</th>
                        <!-- <th>Status</th> -->
                        <th>Categories name</th>
                        <th>User name</th>
                        <th>Tags</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($articles) && is_array($articles)) :
                        foreach ($articles as $article) :?>
                    <tr>
						
                        <td><?= $article['name'] ?></td>
                        <td><?= $article['description'] ?></td>
                        <!-- <td><= $article['status'] ?></td> -->
                        <td><?= $article['categorie_name'] ?></td>
                        <td><?= $article['user_name'] ?></td>
                        <td><?= $article['tag_name'] ?></td>
                        <td><?= $article['status'] ?></td>

                        <td class="d-flex flex-row">
                         
                            <form action="Wiki/updateview" method="POST">
                                <input type="hidden" name="id" value="<?= $article['id'] ?>" />
                                <button type="submit" name="submit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                                
                            </form>

                            <form action="Wiki/delete" method="POST">
                                <input type="hidden" name="id" value="<?= $article['id'] ?>" />
                                <button type="submit" name="submit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                                
                            </form>


                        </td>
                    </tr>
                <?php endforeach;
                endif;?>
                    
					
                </tbody>
            </table>

        </div>
    </div>

<!-- categorie -->





</div>

<?php include "include/footer.php" ?>
</body>