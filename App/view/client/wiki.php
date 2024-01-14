<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofpXoCq4M9IcVqZmevNcEm1N7uP4fcdC"
        crossorigin="anonymous"></script>


  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="<?=APP_URL?>public/assets/css/header_footer.css">

  <title></title>
</head>
<body style="background-color: white;">
    <?php include "App/view/include/navbar.php" ?>
        <form class="d-flex">
            <input class="form-control me-2 text-info bg-white custom-input" id="searchInput" type="text" placeholder="Search">
            <button class="btn btn-primary text-white" type="button" id="searchInput">Search</button>
        </form>
        </div>
    </div>
    </nav>
    
    <section class="p-4" style="width:100%; background-color: #ffffff;">
        <a style="font-size:20px;text-decoration:none;" href="<?=APP_URL?>wiki/add">
            <div class="text-center p-2" style=" background-color: rgba(0, 123, 255, 0.2); color: rgba(0, 0, 0, 0.5);font-weight:bold;border-radius:10px"><?php   echo "Welcome back " . $_SESSION['name'];?><br>You have any new Wikis ? please <span style="text-decoration:underline;color:blue">Enter here</span></div></a>
        </div>
    </section>

    
    <div class="container mt-4">
        <div class="row">
                 <!-- <php   echo "Hello, " . $_SESSION['name'];
                    var_dump($_SESSION['user_id'])
                 ?> -->
        <table class="table table-light">
                <thead>
                    <tr style="">
                        <th scope="col">Article name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Categories name</th>
                        <th scope="col">User name</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
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
                         
                            <form action="<?=APP_URL?>wiki/updateview" method="POST">
                                <input type="hidden" name="id" value="<?= $article['id'] ?>" />
                                <button type="submit" name="submit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                            </form>

                            <form action="<?=APP_URL?>wiki/delete" method="POST">
                                <input type="hidden" name="id" value="<?= $article['id'] ?>" />
                                <!-- <button type="submit" name="submit"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button> -->
                                <!-- ... Votre code existant ... -->

                        <!-- <td class="d-flex flex-row"> -->
                            <!-- ... Vos autres boutons ... -->

                            <!-- Bouton pour afficher la modal de confirmation -->
                            <button type="button" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?= $article['id'] ?>">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </button>

                            <!-- Fenêtre modale de confirmation -->
                            <div class="modal fade" id="confirmDeleteModal<?= $article['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-white">
                                        <div class="modal-body">
                                            Are you sure about deleting this Wiki ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="<?=APP_URL?>wiki/delete" method="POST">
                                                <input type="hidden" name="id" value="<?= $article['id'] ?>" />
                                                <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

<!-- ... Votre code existant ... -->

                                
                            </form>


                        </td>
                    </tr>
                <?php endforeach;
                endif;?>		
                </tbody>
            </table>
        </div>
    </div>






</div>

<?php include "include/footer.php" ?>
</body>