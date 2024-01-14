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
<body tyle="background: rgb(128, 128, 128,0.2);">
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

    <form method="post" action="<?= APP_URL ?>wiki/update" class="shadow p-4">

        <input type="hidden" name="id" value="<?= $wiki[0]['id'] ?>">

        <div class="form-group">
            <label class="form-label">Wiki</label>
            <input type="text" class="form-control" name="wiki" value="<?= $wiki[0]['name'] ?>"required>
        </div>

        <!-- <php var_dump($wiki)?> -->
        <div class="form-group">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="exampleInputPassword1"  class="form-control" value="<?= $wiki[0]['description'] ?>" required>
        </div>

        <select name="categorie_id" id="categorie" class="form-control" required>
            <option value="<?= $wiki[0]['categorie_id'] ?>"><?= $wiki[0]['categorie_name'] ?></option>
            <?php foreach($categories as $categorie) :?>
                <option value="<?= $categorie['id'] ?>"><?= $categorie['name'] ?></option>
            <?php endforeach ?>
        </select>

        <div>
            <label class="form-label">Tags</label>
            <select name="tag[]" id="tag" multiple required>
                <?php foreach($tags as $tag) :?>
                    <option value="<?= $tag['id'] ?>"><?= $tag['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <button type="submit" name="submit" class="btn btn-success mt-4">Save</button>
        <a href="<?=APP_URL?>Wiki"><button type="button" class="btn btn-primary mt-4">Cancel</button></a>
    </form>
</div>
</div>
</div>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
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
