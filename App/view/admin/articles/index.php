<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?=APP_URL?>public/assets/css/sb-admin-2.min.css">

 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body style="display :flex">
<?php include 'App/view/admin/include/side.php' ?>

                <div class="container-fluid" style="width: 94%;">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Articles</b></h2>
                        </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
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
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td><?= $article['name'] ?></td>
                        <td><?= $article['description'] ?></td>
                        <!-- <td><= $article['status'] ?></td> -->
                        <td><?= $article['categorie_name'] ?></td>
                        <td><?= $article['user_name'] ?></td>
                        <td><?= $article['tag_name'] ?></td>
                        <td class=" text-center">
                        <form action="wiki/updateState/<?= $article['id'] ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $article['id'] ?>">
                            <div class="" style="display: flex; flex-direction: row;">
                                <div class="">
                                    <select name="status" class="form-select">
                                        <option selected value="<?= $article['status'] ?>"><?= $article['status'] ?></option>
                                        <?php if ($article['status'] == "in progress") : ?>
                                            <option value="accepted">accepted</option>
                                        <?php elseif ($article['status'] == "accepted") : ?>
                                            <option value="in progress">in progress</option>
                                        <?php endif ?>
                                    </select>
                                </div>
                                <div class="ml-2">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>

                                </td>

                        <td class="d-flex flex-row">
                         
                            <form action="updateview" method="POST">
                                <input type="hidden" name="id" value="<?= $article['id'] ?>">
                                <button type="submit" name="submit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                            </form>

                            <form action="delete" method="POST">
                                <input type="hidden" name="id" value="<?= $article['id'] ?>">
                                <button type="submit" name="submit"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach;
                endif;?>
                    
					
                </tbody>
            </table>
                    
        </div>
    </div>


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script> -->

</body>

</html>
