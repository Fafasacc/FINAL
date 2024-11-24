<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" href="/images/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
  <title>Appointment</title>
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
  <script type="module" src="fetch_appointment.js" defer></script>
 
  

</head>

<style>   
.table-responsive {
    position: relative;
}

.sticky-header {
    position: sticky;
    top: 0; /* Stick to the top of the container */
    
}

.table-dark th {
    background-color: #343a40; /* Bootstrap dark color for header */
    color: #ffffff; /* White text for contrast */
}

.table-dark th, .table-dark td {
    padding: 12px; /* Add some padding for better appearance */
    text-align: left; /* Align text to the left */
}


</style>
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



        <div class="left-header col horizontal-wrapper ps-0">
          <div class="left-menu-header">
            <ul class="app-list">

              <li class="onhover-dropdown">

              </li>
            </ul>

          </div>
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



<!--CONTENT--><div class="page-body">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">My Appointments</h3>
            <div class="table-responsive theme-scrollbar" style="max-height: 400px; overflow-y: auto;"> <!-- Set a max-height for scrolling -->
              <table class="table table-hover table-striped">
                <thead class="table-dark sticky-header">
                  <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Pet Name</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="appointmentsBody">
                  <!-- Appointment records will be inserted here -->
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-between">
            <nav>
              <!-- Navigation controls can go here -->
            </nav>
            <div>
              <a href="set_appointment.php">
                <button class="btn btn-primary">Make an Appointment</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Include Flatpickr CSS (Ensure you include the Flatpickr library) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Reschedule Appointment Modal -->
<div id="rescheduleModal" class="modal">
    <div class="modal-content">
        <h4>Reschedule Appointment</h4>
        <p>Please select a new date and time for your appointment:</p>
        <form id="rescheduleForm">
            <label for="newDate">Date:</label>
            <input type="text" id="dateOfVisit" required>

            <div id="timeSlots" style="display: none;">
                <label for="newTime">Time:</label>
                <div id="timeSlotsContainer"></div>
            </div>

            <button type="submit" class="btn btn-primary">Reschedule</button>
            <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
        </form>
    </div>
</div>

<style>
    /* Modal Styling */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 10px;
    }

    

    .time-slot {
        padding: 8px;
        margin: 5px 0;
        cursor: pointer;
        background-color: #e0e0e0;
        border-radius: 5px;
    }

    .time-slot:hover {
        background-color: #c0c0c0;
    }
</style>

<!-- Include Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- Firebase SDK -->
<script src="https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js"></script>



<script>


// Function to close the modal
function closeModal() {
    const modal = document.getElementById("rescheduleModal");
    modal.style.display = "none";
}

// Click outside the modal to close it
window.onclick = function(event) {
    const modal = document.getElementById("rescheduleModal");
    if (event.target === modal) {
        closeModal();
    }
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

document.addEventListener('DOMContentLoaded', () => {
   
    const loggedInUserId = localStorage.getItem('loggedInUserId');
    
    if (loggedInUserId) {
        // User is logged in
        console.log("Logged in as: ", loggedInUserEmail);
        // Proceed with showing logged-in content or redirect to the dashboard
    } else {
      localStorage.removeItem('loggedInUserId');
        // User is not logged in
        console.log("No active session.");
        // Optionally redirect to the login page
        window.location.href = 'login.html';

    }
});

    </script>
    
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
    <!-- latest jquery-->
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
    <script src="assets/js/icons/icons-notify.js"></script>
    <script src="assets/js/icons/icon-clipart.js"></script>
    <script src="assets/js/tooltip-init.js"></script>
    <!-- Template js-->
    <script src="assets/js/script.js"></script>
   

    <!-- Modal for displaying decline reason -->
<div class="modal fade" id="declineReasonModal" tabindex="-1" aria-labelledby="declineReasonModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="declineReasonModalLabel">Decline Reason</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="declineReasonBody">
              <!-- Decline reason will be populated here -->
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>

<script>

// Function to show decline reason in a modal
function viewDeclineReason(reason) {
    const modalBody = document.getElementById("declineReasonBody");
    modalBody.textContent = reason;
    const declineModal = new bootstrap.Modal(document.getElementById("declineReasonModal"));
    declineModal.show();
}

</script>
</body>


</html>