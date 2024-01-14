<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background: rgb(128, 128, 128,0.2);">
<?php include "App/view/include/navbar.php" ?>
        <form class="d-flex">
            <input class="form-control me-2 text-info bg-white custom-input" id="searchInput" type="text" placeholder="Search">
            <button class="btn btn-primary text-white" type="button" id="searchInput">Search</button>
        </form>
        </div>
    </div>
    </nav>
    <div class="container mt-5">
<div class="row">
<div class="col-md-6 offset-md-3">


    <form method="POST" action="insert" class="shadow p-4" style="background: #ffffff;">

        <div class="form-group">
            <label class="form-label">Wiki</label>
            <input type="text" class="form-control" name="wiki" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Wiki title" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <!-- <input type="text" class="form-control" name="description" id="exampleInputPassword1" placeholder="Description" class="form-control"> -->
            <textarea type="text" class="form-control" name="description" id="exampleInputPassword1" placeholder="Description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Categorie</label>
            <select name="categorie" id="categorie" placeholder="Description" class="form-control" required>
                <option value="">Category</option>
                <?php foreach($categories as $categorie) :?>
                    <option value="<?= $categorie['id'] ?>"><?= $categorie['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div>
            <label class="form-label">Tags</label>
            <select name="tag[]" id="tag" multiple required>
                <?php foreach($tags as $tag) :?>
                    <option value="<?= $tag['id'] ?>"><?= $tag['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <input type="hidden" class="form-control" name="user" value="<?= $_SESSION['user_id']?>" class="form-control">    
    
        <button type="submit" name="submit" class="btn btn-success mt-4">Save</button>
        <a href="<?=APP_URL?>Wiki"><button type="button" class="btn btn-primary mt-4">Cancel</button></a>


    </form>
    </div>
    </div>
    </div>
    </div>


    
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <!-- <script>
    new MultiSelectTag('tag')  // id
</script> -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new MultiSelectTag('tag', {
            // enable_search: true,
            // search_placeholder: 'Search tags...',
        });
    });
</script>

</body>
</html>