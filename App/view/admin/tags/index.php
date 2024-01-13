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
                            <h2>Manage <b>Employees</b></h2>
                        </div>
                        <div class="col-sm-6">
                            
                            <a href="insert" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add new article</span></a>
                            <a href="deleteall" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>		
                           
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
                        <th>Tag name</th>
                       
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($tags) && is_array($tags)) :
                        foreach ($tags as $tag) :?>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td><?= $tag['name'] ?></td>
                        

                        <td class="d-flex flex-row">
                         
                            <form action="updateview" method="POST">
                                <input type="hidden" name="id" value="<?= $tag['id'] ?>">
                                <button type="submit" name="submit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                            </form>

                            <form action="tag/delete" method="POST">
                                <input type="hidden" name="id" value="<?= $tag['id'] ?>">
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