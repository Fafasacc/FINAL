<?php
// Start the session to check login status
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to the login page
    header("Location : login.html");
    exit();      
}
?>
<!DOCTYPE html>
<html>
<head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" href="assets/images/favicon/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="assets/images/favicon/favicon.png" type="image/x-icon">
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
  <link rel="stylesheet" type="text/css" href="assets/css/calendar.css">
  <link rel="stylesheet" type="text/css" href="">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  
  <script type="module" src="appointment_fetch.js" defer></script>


  <link rel="stylesheet" type="text/css" href="assets/css/notification.css">

  <style>
/* Position the notification badge to the right of the bell */
.notification-box {
    position: relative;
    display: inline-block;
}

.notification-badge {
    position: absolute;
    top: -5px;
    right: -11px;
    background-color: red;  /* Set the background color to red */
    color: white;  /* Set the text color to white */
    font-size: 12px;  /* Adjust font size */
    width: 18px;  /* Set width of the badge */
    height: 18px;  /* Set height of the badge */
    border-radius: 50%;  /* Make the badge circular */
    text-align: center;
    line-height: 18px;  /* Vertically center the number */
    font-weight: bold;  /* Make the number bold */
    display: flex;
    justify-content: center;
    align-items: center;
}
  </style>


</head>


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
            <h3>Appointments</h3>
            <ul class="app-list">

              <li class="onhover-dropdown">

              </li>
            </ul>

          </div>
        </div>

        <div class="nav-right col-6 pull-right right-header p-0">

        <ul class="nav-menus">
            <li>

            </li>

              
           <li class="onhover-dropdown">
    <div class="notification-box" onclick="toggleDropdown()">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
            <path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path>
        </svg>
        <span id="notification-badge" class="notification-badge">0</span> <!-- Notification badge -->
    </div>
    <ul id="notification-dropdown" class="notification-dropdown custom-notification-dropdown onhover-show-div" style="display: none;">
        <li class="notification-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                <path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path>
            </svg>
            <h6 class="f-18 mb-0">Notifications</h6>
        </li>
        <!-- Notification items will be inserted here -->
    </ul>
</li>

             
             

            
          </ul>

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
                    href="index.php"><i data-feather="home"> </i><span>Dashboard</span></a></li>



                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title ink-nav"
                    href="javascript:void(0)"><i data-feather="user"></i><span class="">Administration</span></a>
                  <ul class="sidebar-submenu">
                    <li><a class="" href="administration.php">Administration</a></li>
                    <li><a class="" href="user_management.php">User Management</a></li>
                    
                  </ul>
                </li>

                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title ink-nav"
                    href="javascript:void(0)"><i data-feather="database"></i><span class="">Inventory</span></a>
                  <ul class="sidebar-submenu">
                    <li><a class="" href="inventory.php">inventory</a></li>
                    <li><a class="" href="product.php">Product</a></li>
                    <li><a class="" href="POS.php">POS/Invoice</a></li>
                    <li><a class="" href="Report.php">Report</a></li>
                  </ul>
                </li>
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav"
                  href="History.php"><i data-feather="file-text"> </i><span>Transaction History</span></a></li>




                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav"
                    href="records.php"><i class="fa-solid fa-box-archive fa-lg" style="color: #ffffff;"></i><span style="padding-left: 15px;">Patient Records</span></a></li>


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

      <!--CONTENT-->
      <div class="page-body">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title text-center mb-4">Today's Schedule</h3>
                  <div class="row">
                    <!-- Left Side: Today's Schedule (70%) -->
                    <div class="col-md-8">
    <div class="table-responsive theme-scrollbar" style="max-height: 400px; overflow-y: auto;">
        <table class="table table-hover table-striped" id="scheduleTable">
            <thead class="table-dark">
                <tr>
                    <th>Time</th>
                    <th>Name</th>
                    <th>Service</th>
                </tr>
            </thead>
            <tbody id="schedule-list">
                <!-- Add more schedule entries here -->
            </tbody>
        </table>
    </div>
</div>



                    <!-- Right Side: FullCalendar (30%) -->
                    <div class="col-md-4">
    <div id="calendar-container" style="max-width: 100%; overflow: hidden;">
        <div class="calendar" style="max-width: 100%;">
            <div class="left">
                <p id="date">01</p>
                <p id="day">Saturday</p>
            </div>
            <div class="right">
                <p id="month">October</p>
                <p id="year">2023</p>
            </div>
        </div>
    </div>
</div>

                  </div>
                  



                  <!-- Review/Approve Table -->
                  <h3 class="card-title text-center mb-4">Pending's Schedule</h3>
                 <div class="table-responsive theme-scrollbar" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-hover table-striped" id="appointmentTable">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Date - Time</th>
                <th>Service</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="appointment-list">
            <!-- Appointment rows will be dynamically added here -->
        </tbody>
    </table>
</div>

    

      


    </div>

  </div>

  <script>
    
  
  </script>





<!-- Review Appointment Modal -->

<!-- Review Appointment Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Review Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reviewForm">
                    <input type="hidden" id="appointmentId"/> <!-- Changed to hidden -->
                    <div class="mb-3">
                        <label for="ownerEmail" class="form-label">Owner Email</label>
                        <input type="text" class="form-control" id="ownerEmail" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="ContactNumber" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="ContactNumber" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="completeAdd" class="form-label">Complete Address</label>
                        <input type="text" class="form-control" id="completeAdd" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="ownerName" class="form-label">Owner Name</label>
                        <input type="text" class="form-control" id="ownerName" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="petName" class="form-label">Pet Name</label>
                        <input type="text" class="form-control" id="petName" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="petAge" class="form-label">Pet Age</label>
                        <input type="text" class="form-control" id="petAge" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="dateOfVisit" class="form-label">Date of Visit</label>
                        <input type="text" class="form-control" id="dateOfVisit" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="petBreed" class="form-label">Pet Breed</label>
                        <input type="text" class="form-control" id="petBreed" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="serviceType" class="form-label">Service Type</label>
                        <input type="text" class="form-control" id="serviceType" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="chiefComplaint" class="form-label">Chief Complaint</label>
                        <input type="text" class="form-control" id="chiefComplaint" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="medicalConcerns" class="form-label">Medical Concerns</label>
                        <input type="text" class="form-control" id="medicalConcerns" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="declineReason" class="form-label">Decline Reason</label>
                        <select class="form-select" id="declineReason">
                            <option value="">Select a reason</option>
                            <option value="Not available">Not available</option>
                            <option value="Owner request">Owner request</option>
                            <option value="Service not available">Service not available</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-danger" id="declineButton" onclick="triggerDecline()">Decline</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Review appointment function
      window.reviewAppointment = async function (appointmentId) {
    try {
        const docRef = doc(db, "appointments", appointmentId);
        const docSnapshot = await getDoc(docRef);
        
        if (docSnapshot.exists()) {
            const appointment = docSnapshot.data();

            // Populate modal fields with appointment data
            document.getElementById("ownerEmail").value = appointment.ownerEmail || '';
            document.getElementById("ContactNumber").value = appointment.ContactNumber || '';
            document.getElementById("completeAdd").value = appointment.completeAdd || '';
            document.getElementById("ownerName").value = appointment.ownerName || '';
            document.getElementById("petName").value = appointment.petName || '';
            document.getElementById("petAge").value = appointment.petAge || '';
            document.getElementById("dateOfVisit").value = appointment.dateOfVisit || '';
            document.getElementById("petBreed").value = appointment.petBreed || '';
            document.getElementById("serviceType").value = appointment.serviceType || '';
            document.getElementById("chiefComplaint").value = appointment.chiefComplaint || '';
            document.getElementById("medicalConcerns").value = appointment.medicalConcerns || '';
            document.getElementById("appointmentId").value = appointmentId; // Set the appointment ID

            // Show the modal
            const reviewModal = new bootstrap.Modal(document.getElementById("reviewModal"));
            reviewModal.show();
            
        } else {
            console.log("No such document!");
        }
    } catch (error) {
        console.error("Error fetching appointment details: ", error);
     }
    };



    // Decline appointment function
    window.declineAppointment = async function () {
      // Show the modal
        const reviewModal = new bootstrap.Modal(document.getElementById("reviewModal"));
       
        const appointmentId = document.getElementById("appointmentId").value; // Get the appointment ID from the hidden input
        const declineReason = document.getElementById("declineReason").value;

        if (!declineReason) {
            alert("Please select a reason for declining the appointment.");
            return;
        }

        try {
            if (!appointmentId) {
                console.error("Invalid appointment ID.");
                throw new Error("Invalid appointment ID.");
            }

            const appointmentRef = doc(db, "appointments", appointmentId);
            const docSnapshot = await getDoc(appointmentRef);
            if (!docSnapshot.exists()) {
                throw new Error("Appointment does not exist.");
            }

            // Update the appointment status to "declined" and set the reason
            await updateDoc(appointmentRef, {
                status: "declined",
                reason: declineReason
            });
            const reviewModal = bootstrap.Modal.getInstance(document.getElementById("reviewModal"));
            alert("Appointment declined successfully.");
            refreshPage();

            await fetchPendingAppointments(); // Refresh the appointment list
            reviewModal.hide();
            // Close the modal
            
            
            console.log("CLOSEEE");
            
        } catch (error) {
            console.error("Error declining appointment:", error);
            alert("Failed to decline appointment: " + error.message);
            
        }
    };

    // Event listener for decline button

    // Trigger decline appointment function
    window.triggerDecline = async function () {
    const appointmentId = document.getElementById("appointmentId").value; // Get the appointment ID from the hidden input
    const declineReason = document.getElementById("declineReason").value;

    if (!declineReason) {
        alert("Please select a reason for declining the appointment.");
    
        return;
    }

    // Call the declineAppointment function with the appointmentId
    await declineAppointment(appointmentId); // Call your existing decline function
};



  </script>

  <script>


  </script>

</body>

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

  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>

  <!-- Include FullCalendar's CSS and JS files -->
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />


  <!-- Logout Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header justify-content-center">
              <img src="assets/images/logo/logo.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
            </div>
            <div class="modal-body text-center">
              <h5 class="modal-title" id="logoutModalLabel">Do you want to logout?</h5>
            </div>
            <div class="modal-footer justify-content-center">
              <a href="/index.php" class="btn btn-danger">Yes</a>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            </div>
          </div>
        </div>
        </div>
  </div>
  <script>
        const date = document.getElementById("date");
        const day = document.getElementById("day");
        const month = document.getElementById("month");
        const year = document.getElementById("year");

        const today = new Date();

        const weekDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

        const allMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        
        date.innerHTML = (today.getDate() < 10 ? "0" : "") + today.getDate();
        day.innerHTML = weekDays[today.getDay()];
        month.innerHTML = allMonths[today.getMonth()];
        year.innerHTML = today.getFullYear();
    </script>





 <!-- Firebase App (core SDK) -->
 <script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js"></script>

<!-- Firestore SDK -->
<script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore-compat.js"></script>


<script>
 // Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyCr9Hpr7nYKiUCsmou8_L4moyx8KIJnopM",
    authDomain: "vetease-91e29.firebaseapp.com",
    projectId: "vetease-91e29",
    storageBucket: "vetease-91e29.appspot.com",
    messagingSenderId: "13605053466",
    appId: "1:13605053466:web:e487ab8b3618f9ba7d9da3"
};

// Initialize Firebase
const app = firebase.initializeApp(firebaseConfig);
const db = firebase.firestore(app);

// Select the notification dropdown, box, and badge
const notificationDropdown = document.querySelector('.notification-dropdown');
const notificationBadge = document.getElementById('notification-badge');

// Function to add a new notification for stock alert
function addStockNotification(stockData) {
    const newNotification = document.createElement('li');
    newNotification.innerHTML = `
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                    class="feather feather-file-text">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
            </div>
            <div class="flex-grow-1">
                <p><a href="inventory.php">${stockData.name} - ${stockData.status}</a></p>
            </div>
        </div>
    `;
    
    // Add the new notification to the top of the dropdown
    notificationDropdown.insertBefore(newNotification, notificationDropdown.children[1]);
    
    // Increment the notification count
    updateNotificationCount();
}

// Function to fetch stock alerts from the PHP backend
function fetchStockNotifications() {
    fetch('check_stock.php') // Adjust the path as needed
        .then(response => response.json())
        .then(data => {
            data.forEach(stockData => {
                addStockNotification(stockData);
            });
        })
        .catch(error => console.error('Error fetching stock alerts:', error));
}

// Function to update the notification count
// Function to update the notification count
function updateNotificationCount() {
    // Get the actual notifications only, skipping the header or any static items
    const notificationCount = notificationDropdown.querySelectorAll('li').length - 1; // Subtract 1 to exclude the header or unwanted item
    notificationBadge.textContent = notificationCount;
}


// Fetch stock notifications every minute (or adjust as needed)
setInterval(fetchStockNotifications, 3600000);

// Initial fetch on page load
fetchStockNotifications();

// Function to add a new notification to the dropdown (for appointment notifications)
function addNotification(appointmentData) {
    const newNotification = document.createElement('li');
    newNotification.innerHTML = `
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                    class="feather feather-file-text">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
            </div>
            <div class="flex-grow-1">
                <p><a href="appointment.php?id=${appointmentData.id}">New Appointment: ${appointmentData.ownerName}</a></p>
            </div>
        </div>
    `;
    
    // Add the new notification to the top of the dropdown
    notificationDropdown.insertBefore(newNotification, notificationDropdown.children[1]);
    
    // Increment the notification count
    updateNotificationCount();
}

// Listen for new "pending" appointments in the Firestore collection
const appointmentsRef = db.collection('appointments').where("status", "==", "pending");
appointmentsRef.onSnapshot((snapshot) => {
    snapshot.docChanges().forEach((change) => {
        if (change.type === 'added') {
            const newAppointment = change.doc.data();
            addNotification({
                id: change.doc.id,
                ownerName: newAppointment.ownerName,  // Replace with the actual field name in your database
            });
        }
    });
});


  
</script>

<script>

function toggleDropdown() {
    const dropdown = document.getElementById('notification-dropdown');
    
    // Check if the dropdown is currently hidden
    if (dropdown.style.display === 'none' || dropdown.style.display === '') {
        dropdown.style.display = 'block';  // Show the dropdown
    } else {
        dropdown.style.display = 'none';  // Hide the dropdown
    }
}



   </script>
</html>