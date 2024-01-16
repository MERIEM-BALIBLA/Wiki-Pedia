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

   
        <div class="row" style="margin-top:4%;">
                <div class="col-2 px-4 py-2 " style="background-color: #eee;margin-left: 2.5%;text-align: left; color: black; border-radius: 4px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3); border: 2px solid rgba(0, 0, 255, 0.2);">
                    <h4>Number of categories</h4>
                    <p><?php echo $countCat; ?></p>
                </div>
                <div class="col-2 px-4 py-2 " style="background-color: #eee;margin-left: 2.5%;text-align: left; color: black; border-radius: 4px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3); border: 2px solid rgba(0, 0, 255, 0.2);">
                    <h4>Number of Tags</h4>
                    <p><?php echo $countTag; ?></p>
                </div>
                <div class="col-2 px-4 py-2 " style="background-color: #eee;margin-left: 2.5%;text-align: left; color: black; border-radius: 4px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3); border: 2px solid rgba(0, 0, 255, 0.2);">
                    <h4>Number of Articles</h4>
                    <p><?php echo $countArticle; ?></p>
                </div>
        </div>
        <div>
        
        <!-- article qui ewiste au milieu -->
        <!-- <p>Midle Article Title : <php echo $midle['name']; ?></p>
        <p>Author : <php echo $midle['user_name']; ?></p> -->

        <!-- les articles qui ont la meme categorie -->
        <!-- <php foreach ($Artcount as $category): ?>
            <div style="background:black">
            
                <p>Articles of <php echo $category['category_name']; ?>: <php echo $category['article_count']; ?></p>
                <div> <php echo $category['article_list']; ?></div>
            </div>
        <php endforeach; ?> -->

        <!-- les articles qui ont le meme tag -->
        <!-- <php foreach ($ArtCountTag as $tag): ?>
            <div style="background:white">
            
                <p>Articles of tag <php echo $tag['tag_name']; ?>: <php echo $tag['article_count']; ?></p>
                <div> <php echo $tag['article_list']; ?></div>
            </div>
        <php endforeach; ?> -->



        </div>
                    
                    
        </div>
    </div>


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script> -->

</body>

</html>
