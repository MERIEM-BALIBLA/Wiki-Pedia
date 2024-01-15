<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-hQNynsL8d5TY2NpvWEd8S3utVwZrO2CWOLcQ4hFZIDlB5F3rWGP4sA+V7J5E6eKtZt9zG7XeMlZjtpbP9knSBg==" crossorigin="anonymous" />

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link rel="stylesheet" href="../../public/assets/css/home.css"> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <link rel="stylesheet" href="<?=APP_URL?>public/assets/css/header_footer.css">
  <title></title>
</head>

<body>

<?php include "include/nav.php" ?>
    </div>
  </div>
</nav>

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                <form class="mx-1 mx-md-4" method="POST" action ="<?=APP_URL?>signup/adduser">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label">Your Name</label>
                      <input name="name" type="text" id="name" onkeyup="validateName()" class="form-control"/>
                      <span id="name-error"></span>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Your Email</label>
                      <input name="email" type="email" id="email"
                      onkeyup="validateEmail()" class="form-control" />
                      <span id="email-error"></span>

                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Password</label>
                      <input name="password" type="password" id="password" 
                      onkeyup="validatePass()" class="form-control" />
                      <span id="password-error"></span>

                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      <input name="confirm_password" type="password" id="confirm" 
                      onkeyup="validateConfirm()" class="form-control" />
                      <span id="confirm-error"></span>

                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <form action="">
                      <button onclick="return validateForm()" type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
                    </form>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <p>Have already an account? </p><a href="<?=APP_URL?>login">Login here</a>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

              <img src="<?=APP_URL?>public/images/login.webp" class="img-fluid" alt="Sample image">                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include "include/footer.php" ?>

<!-- ... Votre code HTML ... -->

<script>
  let nameInput = document.getElementById('name');
  let errorN = document.getElementById('name-error');
  let emailInput = document.getElementById('email');
  let errorE = document.getElementById('email-error');
  let passwordInput = document.getElementById('password');
  let errorP = document.getElementById('password-error');
  let confirmInput = document.getElementById('confirm');
  let errorC = document.getElementById('confirm-error');

  function validateName() {
    let nameValue = nameInput.value;
    if(nameValue.length == 0){
      // errorN.innerHTML = 'Name is required' 
      displayError(errorN, 'Name is required', false);
        return false;
    } 
    if(!nameValue.trim().match(/^[A-Za-z]/)){
      errorN.innerHTML ='Form name is invalid'
        return false;
    }
    if(nameValue.trim().length > 20) {
      errorN.innerHTML = 'name form is invalid'

      
        return false;
    }   
    // errorN.innerHTML = '<i class="fa-solid fa-check" style="color: green;"></i>'
    return true;
  }

  function validateEmail() {
    let emailValue = emailInput.value;
    if(emailValue.length == 0){
      errorE.innerHTML ='Email is required'
        return false;
    }
    if(!emailValue.trim().match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)){
      errorE.innerHTML ='Email form is invalid'
        return false;
    }
    // errorE.innerHTML = '<i class="fa-solid fa-check" style="color: green;"></i>'
    return true;
  }


  function validatePass(){
    var passwordValue = passwordInput.value;
    
    if (passwordValue.length === 0) {
      errorP.innerHTML = 'Password is required';
        return false;
    }
  
    if (passwordValue.length < 8) {
      errorP.innerHTML = 'Password should be at least 8 characters';
        return false;
    }

    if (passwordValue.length < 10) {
      errorP.innerHTML = 'Password should not be grater than 8 characters';
        return false;
    }


    // errorP.innerHTML = '<i class="fa-solid fa-check" style="color: green;"></i>';
    return true;
}

function validateConfirm(){
    var confirmdValue = confirmInput.value;
    
    if (confirmdValue.length === 0) {
      errorC.innerHTML = 'Password is required';
        return false;
    }
  
    if (confirmdValue.length < 8) {
      errorC.innerHTML = 'Password should match the abvious password';
        return false;
    }

    if (confirmdValue.length < 10) {
      errorC.innerHTML = 'Password should match the abvious password';
        return false;
    }


    // errorC.innerHTML = '<i class="fa-solid fa-check" style="color: green;"></i>';
    return true;
}

  function validateForm() {
    if (!validateName() || !validateEmail() || !validatePass() || !validateConfirm()) {
      return false;
    } else {
      alert("Enregistré");
      return true;
    }
  }
</script>

<!-- ... Votre code HTML ... -->


</body>

</html>