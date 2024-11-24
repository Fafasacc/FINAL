<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="/KALB-QITTA_CASTONE HTML/css/passwordchecker.css">
  <link rel="icon" href="/images/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
  <title>Creaate An Account</title>
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/icofont.css">
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="module" src="fireabaseauth.js" defer></script>



</head>




<style> 

.show-hide {
  position: absolute;
  right: 10px;
  top: 0%;
  transform: translateY(-65%);
  cursor: pointer;
  font-size: 14px;
  color: #007bff;
}
  /* Strength Bar Styles */
#password-strength {
  width: 80%;
  height: 10px;
  background-color: #e0e0e0; /* Light gray for the background */
  border-radius: 5px;
  margin-top: 5px;
  overflow: hidden;
}

#progress-fill {
  height: 100%;
  width: 0; /* Initially 0% width */
  background-color: red; /* Initial color */
  transition: width 0.3s ease, background-color 0.3s ease; /* Smooth transition */
}

#password-strength-text {
  font-size: 14px;
  margin-top: 5px;
}

</style>
<body style="background-image: url('assets/images/Bg.jpg'); background-size: cover; background-position: center;">

  <!-- login page start-->
  <div class="container-fluid p-0">
    <div class="row m-0">
      <div class="col-12 p-0">
        <div class="login-card">
          <div>
            <div style="text-align: center;">
              <a class="logo" style="display: inline-block; max-width: 200px;" href="/index.php">
                <img class="img-fluid for-light" src="assets/images/logo/logo.png" alt="loginpage">
              </a>
            </div>
            <div class="login-main">
              <form class="theme-form">
                <!-- ACCOUNT CREATION -->
                <h4 class="text-center">Create an Account</h4>
                <p class="text-center">Fill in the details below to register</p>
                
                <!-- Add this message div -->
                <div id="signUpMessage" style="display: none; color: red; text-align: center; margin-bottom: 10px;"></div>
                
                <div class="form-group">
                  <label class="col-form-label">Name</label>
                  <input class="form-control" id="Username" type="text" required="" placeholder="Enter your username">
                </div>
                <div class="form-group">
                  <label class="col-form-label">Email Address</label>
                  <input class="form-control" id="email" type="email" required="" placeholder="Enter your email">
                </div>
                <div class="form-group">
                  <label class="col-form-label">Phone Number</label> 
                  <input class="form-control" id="Number" type="tel" required="" placeholder="Enter your phone number">
                </div>

                
                <div class="form-group">

                  <label class="col-form-label">Password</label>

                  <div class="form-input position-relative">
                    <input class="form-control" id="Pass" type="password" name="login[password]" required placeholder="Enter your password">
                    <div class="show-hide"><span class="show"> </span>

                  </div>


                  <div id="password-strength" class="progress-bar">

                     <div id="progress-fill"></div>
                     
                  </div>

                  <p id="password-strength-text"></p>


                  </div>
                </div>

                <div class="form-group mb-0">
                  <div class="text-end mt-3">
                    <button class="btn btn-primary btn-block w-100" id="submitSignUp" type="submit">Register Account</button>
                    <a href="login.html" class="btn btn-primary btn-block w-100" style="margin-top: 10px;">Back</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
  
  const passwordInput = document.getElementById('Pass');
const strengthBar = document.getElementById('password-strength');
const progressFill = document.getElementById('progress-fill');
const strengthText = document.getElementById('password-strength-text');

// Hide strength bar and text initially
strengthBar.style.display = 'none';
strengthText.style.display = 'none';

// Prevent spacebar input
passwordInput.addEventListener('keydown', function(e) {
  if (e.code === 'Space') {
    e.preventDefault(); // Prevent the space from being added to the input field
  }
});

// Handle password strength display
passwordInput.addEventListener('input', function() {
  const password = passwordInput.value;

  // Show strength bar and text if password has data, otherwise hide them
  if (password.length > 0) {
    strengthBar.style.display = 'block';
    strengthText.style.display = 'block';
    updateStrength(password);
  } else {
    strengthBar.style.display = 'none';
    strengthText.style.display = 'none';
  }
});

function updateStrength(password) {
  let strength = calculateStrength(password);

  // Set width and color of progress fill based on strength level
  if (strength === 1) {
    progressFill.style.width = '25%';
    progressFill.style.backgroundColor = 'red';
    strengthText.textContent = 'Weak';
  } else if (strength === 2) {
    progressFill.style.width = '50%';
    progressFill.style.backgroundColor = 'orange';
    strengthText.textContent = 'Medium';
  } else if (strength === 3) {
    progressFill.style.width = '75%';
    progressFill.style.backgroundColor = 'yellowgreen';
    strengthText.textContent = 'Strong';
  } else if (strength === 4) {
    progressFill.style.width = '100%';
    progressFill.style.backgroundColor = 'green';
    strengthText.textContent = 'Very Strong';
  }
}

function calculateStrength(password) {
  let strength = 0;
  if (password.length >= 6) strength++;  // Minimum length
  if (/[A-Z]/.test(password)) strength++;  // Uppercase letters
  if (/[0-9]/.test(password)) strength++;  // Numbers
  if (/[\W]/.test(password)) strength++;   // Special characters
  return strength;
}

  </script>
  
 

  <!-- latest jquery-->
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap js-->
  <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <!-- feather icon js-->
  <script src="assets/js/icons/feather-icon/feather.min.js"></script>
  <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
  <!-- scrollbar js-->
  <!-- Sidebar jquery-->
  <script src="assets/js/config.js"></script>
  <!-- Template js-->
  <script src="assets/js/script.js"></script>
  

</body>

</html>
