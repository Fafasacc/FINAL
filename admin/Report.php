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
  <title>Report</title>
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
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



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
  <!-- tap on tap ends--> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


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
            <h3>Inventory > Report</h3>
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
<!-- CONTENT -->
<div class="page-body">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card text-center">
          <div class="card-body">
            <h3 class="card-title">Generate Report</h3>
            <div class="d-grid gap-2 mt-4">
              <!-- Date Selection Button -->
              <button id="range" class="btn btn-primary btn-lg" type="button">Select Date</button>

              <!-- Datepicker Container -->
              <div id="datepicker-container"style="display: none;" >
                <input id="datepicker-input" type="text" style="display:none;" />
                <div class="d-flex justify-content-center mt-3">
                  <!-- Set and Cancel Buttons -->
                  <button id="set-btn" class="btn btn-primary btn-sm me-2">Set</button>
                  <button id="cancel-btn" class="btn btn-secondary btn-sm">Cancel</button>
                </div>
              </div>

              <!-- Generate PDF Button -->
              <button id="generate-pdf" class="btn btn-secondary btn-lg" type="button">Generate PDF</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- CONTENT END -->


<!-- JS Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

<script>
 document.addEventListener("DOMContentLoaded", function() {
    const rangeBtn = document.getElementById('range');
    const datepickerContainer = document.getElementById('datepicker-container');
    const setBtn = document.getElementById('set-btn');
    const cancelBtn = document.getElementById('cancel-btn');
    const generatePdfBtn = document.getElementById('generate-pdf');
    let selectedDateRange = '';
    let startDate = '';
    let endDate = '';

    // Initialize Flatpickr with range mode
    const datePicker = flatpickr("#datepicker-input", {
      mode: "range",
      dateFormat: "Y-m-d",
      inline: true,
    });

    // Show datepicker on button click
    rangeBtn.addEventListener('click', function() {
      datepickerContainer.style.display = 'block';
    });

    // Set selected dates
    setBtn.addEventListener('click', function() {
      const selectedDates = datePicker.selectedDates;
      if (selectedDates.length === 2) {
        startDate = datePicker.formatDate(selectedDates[0], "Y-m-d");
        endDate = datePicker.formatDate(selectedDates[1], "Y-m-d");
        selectedDateRange = `${startDate} to ${endDate}`;
        rangeBtn.textContent = `Selected: ${selectedDateRange}`;
        datepickerContainer.style.display = 'none';
      }
    });

    // Clear selection and reset selectedDateRange on cancel
    cancelBtn.addEventListener('click', function() {
      datePicker.clear();  // Clear selected dates
      selectedDateRange = '';  // Reset the selected date range
      rangeBtn.textContent = 'Select Date';  // Reset button text
      datepickerContainer.style.display = 'none';  // Hide the datepicker container
    });


// Generate PDF report
generatePdfBtn.addEventListener('click', function() {
  if (!selectedDateRange) {
    alert("Please select a date range first.");
    return;
  }

  // Fetch sales data
  fetch(`fetch_sales_report.php?start_date=${startDate}&end_date=${endDate}`)
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        throw new Error(data.error);
      }
      const salesData = data.sales_data;
      const totalRevenue = data.total_revenue; // Fetch the total revenue
      const totalTransactions = data.total_transactions; // Fetch the total transactions
      if (!Array.isArray(salesData)) {
        throw new Error("Unexpected response format.");
      }


      
      // Initialize jsPDF
      const { jsPDF } = window.jspdf;
      const doc = new jsPDF();

      // Set title and date range in the PDF
      doc.setFontSize(18);
      doc.text("Sales Report", 105, 20, { align: "center"  });
      doc.setFontSize(12);
      doc.text(`Date Range: ${selectedDateRange}`, 20, 30);
      doc.text(`Total Revenue: php ${totalRevenue.toFixed(2)}`, 20, 36); 
      doc.text(`Total Transactions: ${totalTransactions}`, 20, 42); 

      // Prepare table headers and rows
      const headers = [["Transaction ID", "Date", "Payment Method","Total Amount" , "Product Name", "Quantity", "Cost", "Sale Price", "Subtotal"]];
      const rows = salesData.map(sale => [
        sale.transaction_id,
        sale.transaction_date,
        sale.payment_method,
        sale.total_amount,
        sale.product_name, 
        sale.quantity,
        sale.product_cost,
        sale.sale_price,   
        sale.subtotal
      ]);

      // Add table to PDF
      doc.autoTable({
        head: headers,
        body: rows,
        startY: 50,
        theme: 'striped',
      });

      // Save the PDF
      doc.save(`Sales_Report_${selectedDateRange}.pdf`);
    })
    .catch(error => {
      console.error("Error fetching sales data:", error);
      alert("Failed to generate the report. Please try again.");
    });
    });
  });
</script>




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






        <!-- footer start-->


      </div>

    </div>
    <link rel="stylesheet" href="https://cdn.mobiscroll.com/5.15.0/css/mobiscroll.min.css">
    <!-- Flatpickr CSS -->
 
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
    <script src="assets/js/sidebar-price-range.js"></script>
    <script src="assets/js/product-customize.js"></script>
    
    
  <!-- Flatpickr JS -->
 



  


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
</body>


</html>