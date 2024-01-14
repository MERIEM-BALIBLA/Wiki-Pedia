<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    /* Custom styles */
    .custom-input {
      border: none;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Adjust shadow as needed */
    }
    .navbar-toggler-icon-dark {
      background-color: #343a40; /* Dark color of your choice */
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-white">
  <div class="container-fluid">
    <a class="navbar-brand text-dark" href="javascript:void(0)">WIKI</a>
    <button class="navbar-toggler text-dark navbar-toggler-icon-dark" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
  

      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?=APP_URL?>index">Home</a>
        </li>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'author'): ?>
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?=APP_URL?>Wiki">My Wikis</a>
            </li>
        <?php endif; ?>

        <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?=APP_URL?>Statistics">Dashboard</a>
            </li>
        <?php endif; ?>

    

        <li class="nav-item">
          <a class="nav-link text-dark" href="<?=APP_URL?>login/logout">Logout</a>
        </li>
      </ul>
   
     



