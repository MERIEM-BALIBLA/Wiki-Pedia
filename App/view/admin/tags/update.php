<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="update">

        <input type="hidden" name="id" value="<?= $tag['id']?>">

        <div class="form-group">
            <label for="exampleInputEmail1">tag</label>
            <input type="text" class="form-control" name="tag" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tag" value="<?=  $tag['name']; ?>">
        </div>

        <!-- <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" name="description" id="exampleInputPassword1" placeholder="Description" value="<= $tag['description']; ?>">
        </div> -->

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    </form>
</body>
</html>
