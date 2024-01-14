<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<div class="container mt-5">
<div class="row">
<div class="col-md-6 offset-md-3">
    <form method="POST" action="insert" class="shadow p-4">

        <div class="form-group">
            <label class="form-label"  for="exampleInputEmail1">Tag</label>
            <input class="form-control" type="text" class="form-control" name="tag" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Categorie">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    </form>
</body>
</html>