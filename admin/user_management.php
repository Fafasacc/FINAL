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
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" href="assets/images/favicon/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="assets/images/favicon/favicon.png" type="image/x-icon">
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
            <h3>Account Management</h3>

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


<!-- CONTENT -->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <!-- Admin List -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h3>Admin List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="adminTable">
                                <!-- Admin data will be populated here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAdminModal" onclick="openCreateModal()">Create New Admin</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Admin Modal -->
<div class="modal fade" id="createAdminModal" tabindex="-1" aria-labelledby="createAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createAdminModalLabel">Create New Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="adminForm">
                    <div class="mb-3">
                        <label class="form-label" for="username">Username:</label>
                        <input class="form-control" id="username" name="username" type="text" placeholder="Enter username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="name">Name:</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Enter full name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password:</label>
                        <div class="input-group">
                            <input class="form-control" id="password" name="password" type="password" placeholder="Enter password" required>
                            <button type="button" class="btn btn-outline-secondary" id="toggleRePassword" onclick="togglePassword('password')">Show</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="rePassword">Re-enter Password:</label>
                        <div class="input-group">
                            <input class="form-control" id="rePassword" name="rePassword" type="password" placeholder="Re-enter password" required>
                            <button type="button" class="btn btn-outline-secondary" id="toggleRePassword" onclick="togglePassword('rePassword')">Show</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearModal()">Close</button>
                <button type="submit" class="btn btn-primary" id="saveAdminBtn" onclick="saveAdmin()">Save Admin</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Admin Modal -->

<div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAdminModalLabel">Edit Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="adminForm">
                    <input type="hidden" id="adminId" name="id">
                    <div class="mb-3">
                        <label class="form-label" for="editUsername">Username:</label>
                        <input class="form-control" id="editUsername" name="username" type="text" placeholder="Enter username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="editName">Name:</label>
                        <input class="form-control" id="editName" name="name" type="text" placeholder="Enter full name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="currentPassword">Enter Current Password:</label>
                        <div class="input-group">
                            <input class="form-control" id="currentPassword" name="currentPassword" type="password" placeholder="Enter current password" required>
                            <button type="button" class="btn btn-outline-secondary" id="toggleRePassword" onclick="togglePassword('currentPassword')">Show</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="newPassword">Enter New Password:</label>
                        <div class="input-group">
                            <input class="form-control" id="newPassword" name="newPassword" type="password" placeholder="Enter new password" required>
                            <button type="button" class="btn btn-outline-secondary" id="toggleNewPassword" onclick="togglePassword('newPassword')">Show</button>
                        </div>
                        <!-- Password strength bar -->
                        <div class="strength-bar" id="passwordStrengthBar" style="display:none;">
                            <span id="strengthProgressFill"></span>
                        </div>
                        <!-- Password strength text -->
                        <div id="strengthText" style="display:none;" class="strength-text"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="confirmPassword">Confirm New Password:</label>
                        <div class="input-group">
                            <input class="form-control" id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm new password" required>
                            <button type="button" class="btn btn-outline-secondary" id="toggleConfirmPassword" onclick="togglePassword('confirmPassword')">Show</button>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-pill">Save</button>
                        <button type="button" class="btn btn-danger btn-pill" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
// Toggle password visibility
function togglePassword(id) {
    const passwordField = document.getElementById(id);
    const toggleButton = document.getElementById('toggle' + id.charAt(0).toUpperCase() + id.slice(1));

    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleButton.textContent = "Hide";
    } else {
        passwordField.type = "password";
        toggleButton.textContent = "Show";
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const adminTable = document.getElementById("adminTable");
    const adminForm = document.getElementById("adminForm");

    // Fetch and display admin list
function fetchAdmins() {
    fetch("admin_crud.php?action=fetch")
        .then((response) => response.json())
        .then((data) => {
            const loggedInUsername = sessionStorage.getItem("username"); // Get the logged-in username from sessionStorage
            adminTable.innerHTML = ""; // Clear the table before populating it

            data.forEach((admin) => {
                // Check if the current admin is the logged-in admin
                const isLoggedInAdmin = admin.username === loggedInUsername;

                adminTable.innerHTML += `
                    <tr>
                        <td>${admin.id}</td>
                        <td>${admin.username}</td>
                        <td>${admin.name}</td>
                        <td>${new Date(admin.date_created).toLocaleString()}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" onclick="editAdmin(${admin.id}, '${admin.username}', '${admin.name}')">Edit</button>
                            ${isLoggedInAdmin ? "" : `<button class="btn btn-sm btn-danger" onclick="deleteAdmin(${admin.id})">Delete</button>`}
                        </td>
                    </tr>
                `;
            });
        })
        .catch((error) => console.error("Error fetching admin list:", error));
}


    // Add new admin (modal submit)
    window.saveAdmin = () => {
        const formData = new FormData(adminForm);
        const password = document.getElementById("password").value;
        const rePassword = document.getElementById("rePassword").value;

        if (password !== rePassword) {
            alert("Passwords do not match.");
            return;
        }

        fetch("admin_crud.php?action=add", {
            method: "POST",
            body: formData
        })
        .then((response) => response.json())
        .then((data) => {
            alert(data.message || data.error);
            $('#createAdminModal').modal('hide'); // Hide the modal after submission
            fetchAdmins(); // Refresh admin list
            clearModal(); // Reset modal content
        })
        .catch((error) => console.error("Error saving admin:", error));
    };

    // Edit admin (prefill the form)
    window.editAdmin = (id, username, name) => {
        document.getElementById("adminId").value = id;
        document.getElementById("editUsername").value = username;
        document.getElementById("editName").value = name;
        $('#editAdminModal').modal('show');
        clearModal(); // Reset modal content
    };

    // Update admin (modal submit)
    
window.updateAdmin = () => {
    const adminId = document.getElementById("adminId").value;  // Get admin ID
    const username = document.getElementById("editUsername").value; // Get username
    const name = document.getElementById("editName").value; // Get name
    const currentPassword = document.getElementById("currentPassword").value;  // Current password (if needed)
    const newPassword = document.getElementById("newPassword").value;  // New password
    const reEnterNewPassword = document.getElementById("reEnterNewPassword").value; // Re-enter new password

    // Ensure required fields are filled
    if (!username || !name || !adminId) {
        alert("ID, Username, and Name are required.");
        clearModal();  // Reset modal content
        return;
    }

    // Ensure passwords match (if any new password is provided)
    if (newPassword !== reEnterNewPassword) {
        alert("Passwords do not match.");
        clearModal();  // Reset modal content
        return;
    }

    const formData = new FormData();
    formData.append("id", adminId);
    formData.append("username", username);
    formData.append("name", name);
    if (newPassword) {
        formData.append("newPassword", newPassword);
    }
    if (currentPassword) {
        formData.append("currentPassword", currentPassword);
    }

    fetch("admin_crud.php?action=update", {
        method: "POST",
        body: formData
    })
    .then((response) => response.json())
    .then((data) => {
        alert(data.message || data.error);
        $('#editAdminModal').modal('hide');  // Hide the modal after update
        fetchAdmins();  // Refresh the admin list
        clearModal();  // Reset modal content
    })
    .catch((error) => console.error("Error updating admin:", error));
    clearModal();  // Reset modal content
};


    // Delete admin
    window.deleteAdmin = (id) => {
        if (confirm("Are you sure you want to delete this admin?")) {
            fetch(`admin_crud.php?action=delete&id=${id}`)
                .then((response) => response.json())
                .then((data) => {
                    alert(data.message || data.error);
                    fetchAdmins(); // Refresh admin list
                })
                .catch((error) => console.error("Error deleting admin:", error));
        }
    };

    // Clear modal content
    window.clearModal = () => {
        document.getElementById("adminForm").reset();
    };

    // Fetch the admin list when the page loads
    fetchAdmins();
});
</script>


<script></script>




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
              <a href="logout.php" class="btn btn-danger">Yes</a>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>



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

</script>

</body>


</html>