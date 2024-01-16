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

    <!-- <php include 'view/admin/include/header.php' ?> -->
            <!-- <main class="content px-3 py-2"> -->
                <div class="container-fluid" style="width: 94%;">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Categories</b></h2>
                        </div>
                        <div class="col-sm-6">
                            
                            <a href="<?=APP_URL?>categorie/insert" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add new article</span></a>
                            <a href="<?=APP_URL?>categorie/deleteall" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>		
                           
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
                       
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($categories) && is_array($categories)) :
                        foreach ($categories as $categorie) :?>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td><?= $categorie['name'] ?></td>
                        <td><?= $categorie['description'] ?></td>
                

                        <td class="d-flex flex-row">
                         
                            <form action="<?=APP_URL?>categorie/updateview" method="POST">
                                <input type="hidden" name="id" value="<?= $categorie['id'] ?>">
                                <button type="submit" name="submit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                            </form>

                            <form action="<?=APP_URL?>categorie/delete" method="POST">
                                <input type="hidden" name="id" value="<?= $categorie['id'] ?>">
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
