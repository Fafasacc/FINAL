
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" href="/KALB-QITTA_CASTONE HTML 2/KALB-QITTA_CASTONE HTML 2/KALB-QITTA_CASTONE HTML/images/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
  <title>Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/icofont.css">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>

  </style>
</head>

<script type="module" src="userProfile.js" def></script>
<body>
  <!-- tap on top starts-->
  <div class="tap-top"><i data-feather="chevrons-up"></i></div>
  <!-- tap on tap ends-->

  <!-- page-wrapper Start-->
  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->



    <div class="page-header">
      <div class="header-wrapper row m-0">

        <div class="header-logo-wrapper col-auto p-0">
          <div class="toggle-sidebar" checked="checked"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="feather feather-grid status_toggle middle sidebar-toggle">
              <rect x="3" y="3" width="7" height="7"></rect>
              <rect x="14" y="3" width="7" height="7"></rect>
              <rect x="14" y="14" width="7" height="7"></rect>
              <rect x="3" y="14" width="7" height="7"></rect>
            </svg></div>
          <div class="logo-header-main"><a href="index.php"><img class="img-fluid for-light img-100"
                src="assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark"
                src="assets/images/logo/logo.png" alt=""></a></div>
        </div>



        
        <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
        <script class="empty-template"
          type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
      </div>
    </div>
    <!-- Page Header Ends-->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
      <!-- Page Sidebar Start-->
      <div class="sidebar-wrapper">
        <div>
          <div class="logo-wrapper"><a href="index.php"><img class="img-fluid for-light"
                src="assets/images/logo/logo.png" style="max-width: 150px; padding-top:15px ; " alt=""></a>
            <div class="back-btn"><i data-feather="grid"></i></div>
            <div class="toggle-sidebar icon-box-sidebar"><i class="status_toggle middle sidebar-toggle"
                data-feather="grid"> </i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="index.php">
              <div class="icon-box-sidebar"><i data-feather="grid"></i></div>
            </a></div>
          <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
              <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn">
                  <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                      aria-hidden="true"></i></div>
                </li>
                <li class="pin-title sidebar-list">
                  <h6>Pinned</h6>
                </li>
                <hr>
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav"
                    href="index.php"><i data-feather="user"></i> </i><span>My Account</span></a></li>
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav"
                    href="mypet.php"><i data-feather="github"></i></i><span>My Pet</span></a></li>



                

                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav"
                    href="appointment.php"><i data-feather="calendar"> </i><span>My Appointment</span></a></li>
                    <li class="sidebar-list sidebar-logout">
                      <a class="sidebar-link sidebar-title link-nav" href="#logoutModal" data-bs-toggle="modal">
                          <i data-feather="log-out"></i>
                          <span>Logout</span>
                      </a>
                  </li>



              </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
          </nav>
        </div>
      </div>
      <!-- Page Sidebar Ends-->


      <!--FOR FETCH NG DATA TO DASHBOARD -->
      <div class="page-body">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center mb-4">My Account</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="text" class="form-control" id="contact" placeholder="Enter your contact number" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="Enter your address" disabled>
                                </div>
                                <div class="mb-3">
                                  <label for="email" class="form-label">Email</label>
                                  <input type="email" class="form-control" id="email" placeholder="Enter your email address" readonly>
                              </div>

                                <button type="button" class="btn btn-primary" id="edit-btn" onclick="enableEdit()">Edit</button>
                                <button type="button" class="btn btn-success d-none" id="save-btn" onclick="saveChanges()">Save</button>
                                <button type="button" class="btn btn-danger d-none" id="cancel-btn" onclick="cancelEdit()">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
  
    
    
      <script>
      function enableEdit() {
        document.getElementById('name').disabled = false;
        document.getElementById('contact').disabled = false;
        document.getElementById('address').disabled = false;
        document.getElementById('email').disabled = false;
        
        document.getElementById('edit-btn').classList.add('d-none');
        document.getElementById('save-btn').classList.remove('d-none');
        document.getElementById('cancel-btn').classList.remove('d-none');
      }
      
      function saveChanges() {

        //disable the fields and switch back to the "Edit" button
        disableFields();
      }
      
      function cancelEdit() {
      
        //disable the fields and switch back to the "Edit" button
        disableFields();
      }
      
      function disableFields() {
        document.getElementById('name').disabled = true;
        document.getElementById('contact').disabled = true;
        document.getElementById('address').disabled = true;
        document.getElementById('email').disabled = true;
      
        document.getElementById('edit-btn').classList.remove('d-none');
        document.getElementById('save-btn').classList.add('d-none');
        document.getElementById('cancel-btn').classList.add('d-none');
      }
      </script>
      
      <!--CONTENT END-->
   
  
<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <img src="assets/images/logo/logo.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
            </div>
            <div class="modal-body text-center">
                <h5 class="modal-title" id="logoutModalLabel">Do you want to logout?</h5>
            </div>
            <div class="modal-footer justify-content-center">
                <!-- Added id="logoutButton" to the Yes button -->
                <button type="button" id="logoutButton" class="btn btn-danger">Yes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>


    
<script>
    
    document.getElementById('logoutButton').addEventListener('click', () => {
    // Clear session and local storage
    sessionStorage.removeItem('loggedInUserEmail');
    localStorage.removeItem('loggedInUserId');

    // Redirect to the login page after logging out
    window.location.href = 'login.html'; 
});

</script>
        <!-- footer start-->


      </div>

    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="assets/js/scrollbar/simplebar.js"></script>
    <script src="assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="assets/js/config.js"></script>
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/icons/icons-notify.js"></script>
    <script src="assets/js/icons/icon-clipart.js"></script>
    <script src="assets/js/tooltip-init.js"></script>
    <!-- Template js-->
    <script src="assets/js/script.js"></script>

    <!-- login js-->

<!-- Firebase Authentication -->
<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth.js"></script>





<script>
  // Fetch user data from sessionStorage
  const userId = localStorage.getItem('loggedInUserId');

</script>



<!-- The Modal -->
<div id="privacyModal" class="modal">
        <div class="modal-content">
            <button class="close" onclick="closeModal()">&times;</button>
            <h2>Privacy Policy</h2>
            <p><strong>Last updated:</strong> [Date]</p>
            <p>Thank you for choosing to use our services. We are committed to protecting your personal data and respecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website or use our services. By accessing or using our services, you agree to the terms of this Privacy Policy.</p>
            
            <h3>1. Information We Collect</h3>
            <p>We may collect personal information from you when you use our services, such as:</p>
            <ul>
                <li><strong>Personal Identification Information:</strong> Name, email address, phone number, and other contact details.</li>
                <li><strong>Account Information:</strong> Information related to your account, including login credentials.</li>
                <li><strong>Usage Data:</strong> Information about how you interact with our website or app, such as pages visited, time spent, and features used.</li>
                <li><strong>Cookies and Tracking Technologies:</strong> We use cookies and similar tracking technologies to monitor activity on our services.</li>
            </ul>
            
            <h3>2. How We Use Your Information</h3>
            <p>We use the collected information for various purposes, including:</p>
            <ul>
                <li><strong>To provide and maintain our service:</strong> Ensure our services operate efficiently and securely.</li>
                <li><strong>To personalize your experience:</strong> Tailor content and features to your preferences.</li>
                <li><strong>To improve our services:</strong> Analyze data to enhance our website or app.</li>
                <li><strong>To communicate with you:</strong> Send you notifications, updates, and support messages.</li>
                <li><strong>To comply with legal obligations:</strong> Fulfill any legal requirements and enforce our policies.</li>
            </ul>
            
            <h3>3. Sharing Your Information</h3>
            <p>We may share your information with:</p>
            <ul>
                <li><strong>Service Providers:</strong> Trusted third-party companies that assist us in operating our website, conducting our business, or serving you.</li>
                <li><strong>Legal Requirements:</strong> Authorities if required by law or to protect our rights, users' safety, or public safety.</li>
                <li><strong>Business Transfers:</strong> In the event of a merger, sale, or transfer of assets, your information may be transferred to the new owner.</li>
            </ul>
            
            <h3>4. Data Security</h3>
            <p>We implement appropriate technical and organizational measures to protect your personal data from unauthorized access, use, or disclosure. However, please note that no method of transmission over the internet is completely secure.</p>
            
            <h3>5. Your Privacy Rights</h3>
            <p>Depending on your location, you may have rights under data protection laws, such as:</p>
            <ul>
                <li><strong>Access:</strong> The right to request copies of your personal information.</li>
                <li><strong>Correction:</strong> The right to ask us to correct or update inaccurate or incomplete information.</li>
                <li><strong>Deletion:</strong> The right to request that we delete your personal information under certain circumstances.</li>
                <li><strong>Objection:</strong> The right to object to how we process your information in some cases.</li>
            </ul>
            <p>To exercise any of these rights, please contact us at [your contact email].</p>
            
            <h3>6. Cookies Policy</h3>
            <p>We use cookies to collect and store information about your use of our services. You can manage your cookie preferences through your browser settings. Note that disabling cookies may impact the functionality of our services.</p>
            
            <h3>7. Changes to This Privacy Policy</h3>
            <p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page. We encourage you to review this policy periodically for any updates.</p>
            
            <h3>8. Contact Us</h3>
            <p>If you have any questions or concerns about this Privacy Policy, please contact us at:</p>
            <p><strong>Email:</strong> [Your Contact Email]</p>
            <p><strong>Address:</strong> [Your Business Address]</p>
        </div>
    </div>

    <script>
        // Functions to open and close the modal
        function openModal() {
            document.getElementById('privacyModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('privacyModal').style.display = 'none';
        }

        // Close modal when clicking outside of the modal content
        window.onclick = function(event) {
            const modal = document.getElementById('privacyModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>

</body>





