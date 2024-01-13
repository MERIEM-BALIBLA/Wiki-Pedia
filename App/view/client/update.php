<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <title>Document</title>
</head>
<body>

    <form method="POST" action="<?= APP_URL ?>wiki/update">

        <!-- <input type="hidden" name="id" value="<= $wiki[0]['id'] ?>"> -->
        <input type="hidden" name="user" value="<?= $wiki[0]['user_id'] ?>">

        <input type="hidden" name="id" value="<?= $wiki[0]['id'] ?>">

        <div class="form-group">
            <label class="form-label">Wiki</label>
            <input type="text" name="wiki" placeholder="wiki title" value="<?= $wiki[0]['name'] ?>">
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="exampleInputPassword1" placeholder="Description" class="form-control" value="<?= $wiki[0]['description'] ?>">
        </div>

        <div class="form-group">
            <label class="form-label">Categorie</label>
            <select name="categorie" id="categorie" placeholder="Description" class="form-control">
                <option><?= $wiki[0]['categorie_name'] ?></option>
                <?php foreach($categories as $categorie) :?>
                    <option value="<?= $categorie['id'] ?>"><?= $categorie['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
   
        <div>
            <label class="form-label">Tags</label>
            <select name="tag[]" id="tag" multiple class="form-control">
                <!-- <option><= $wiki[0]['tag_name'] ?></option> -->
                <?php foreach($tags as $tag) :?>
                    <option value="<?= $tag['id'] ?>"><?= $tag['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>


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
