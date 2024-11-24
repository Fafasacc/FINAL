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
  <title>Inventory</title>
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
  <link rel="stylesheet" type="text/css" href="assets/css/notification.css">


  <style>
.d-flex {
  display: flex;
  align-items: center;
}
#searchInput {
  flex-grow: 1; /* Makes the search bar take up remaining space */
}
#filterButton {
  padding: 8px 12px;
  cursor: pointer;
  display: flex;
  align-items: center;
}
.position-relative {
  position: relative;
}
.dropdown-menu {
  position: absolute;
  top: 100%;
  right: 0;
  z-index: 1000;
  display: none; /* Initially hidden */
  min-width: 200px;
}

/* Make the funnel icon black and white */
#filterButton i.bi-funnel {
  color: black; /* Set the color to black */
}
#filterButton:hover i.bi-funnel {
  color: black; /* Keep color black even on hover */
}

/* Styling for text next to the funnel icon */
#filterButton span {
  font-size: 14px;
  font-weight: 500;
  margin-left: 8px; /* Space between icon and text */
}

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
  <style>

  </style>

<script src="https://kit.fontawesome.com/93f7471c43.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="assets/css/TOAST.CSS">
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
            <h3>Inventory</h3>

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
  
     <!--CONTENT-->
     <div class="page-body">
      
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">

          <!-- SEARCH BAR -->
          <div class="card-body">
            
            <h3 class="card-title text-center mb-4">Inventory</h3>

            <!-- Search input field and Filter Funnel Icon (aligned to the right) -->
            <div class="d-flex align-items-center mb-3">
              <!-- Search Input -->
              <input type="text" id="searchInput" class="form-control w-75" placeholder="Search Products">
              
              <!-- Funnel Icon and Filter Text -->
              <div class="ms-3 position-relative">
                <button class="btn btn-outline-secondary" id="filterButton" title="Filter by Category">
                  <i class="bi bi-funnel" style="color: black;"></i> <!-- Funnel icon in black -->
                  <span id="filterText" class="ms-2">Filter by Category: All</span> <!-- Dynamic text for selected category -->
                </button>

                <!-- Dropdown Menu for Category Filter -->
                <div id="categoryDropdown" class="dropdown-menu" style="display: none;">
                  <a class="dropdown-item" href="#" data-category="All">All</a> <!-- Default All filter -->
                  <a class="dropdown-item" href="#" data-category="Vitamins">Vitamins</a>
                  
                  <a class="dropdown-item" href="#" data-category="Antibiotics">Antibiotics</a>
                  <a class="dropdown-item" href="#" data-category="Anti-Inflammatory">Anti-Inflammatory</a>
                  <a class="dropdown-item" href="#" data-category="Others">Others</a>
                  <!-- Add more categories as necessary -->
                </div>
              </div>
              
            </div>

            <!-- Table to display inventory format -->
            <div class="table-responsive theme-scrollbar" style="max-height: 550px; overflow-y: auto;">
              
              <table class="table table-hover table-striped">
                <thead class="table-dark">
                  <tr>
                    <th style="position: sticky; top: 0; background-color: #343a40; z-index: 1;">Product Name</th>
                    <th style="position: sticky; top: 0; background-color: #343a40; z-index: 1;">Supplier</th>
                    <th style="position: sticky; top: 0; background-color: #343a40; z-index: 1;">Category</th>
                    <th style="position: sticky; top: 0; background-color: #343a40; z-index: 1;">Price</th>
                    <th style="position: sticky; top: 0; background-color: #343a40; z-index: 1;">Quantity</th>
                    <th style="position: sticky; top: 0; background-color: #343a40; z-index: 1;">Stock Alert</th>
                    <th style="position: sticky; top: 0; background-color: #343a40; z-index: 1;">Actions</th>
                  </tr>
                </thead>
                <tbody id="productTableBody">
                  <!-- fetch_inventory.php will be inserted here -->
                </tbody>
              </table>
              
            </div>
            
          </div>
          <div class="card-footer d-flex justify-content-between">
              <nav aria-label="Page navigation">
                
              </nav>
              
              <div>
              
              <div class="btn-group shadow-lg rounded">
                
    <!-- Main button with dropdown -->
    <a href="product.php" class="btn btn-success fw-bold rounded-start px-4 py-2 d-flex align-items-center">
      <i class="bi bi-file-earmark-plus me-2"></i> Add Individual Product
    </a>
    <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split rounded-end px-4 py-2 d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
      <span class="visually-hidden">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu shadow-lg border-0 rounded-3">
      <!-- Import Option -->
      <li>
        <form id="importForm" action="import.php" method="post" enctype="multipart/form-data" style="margin: 0;">
          <input type="file" id="importFile" name="importFile" accept=".xlsx, .xls" required style="display: none;" onchange="handleFileUpload(event)">
          <button type="button" class="dropdown-item text-success hover-shadow" onclick="triggerFileUpload()">
            <i class="bi bi-upload me-2"></i> Import Excel
          </button>
        </form>
      </li>
      <!-- Export Option -->
      <li>
        <form action="export.php" method="post" style="margin: 0;">
          <button type="submit" class="dropdown-item text-success hover-shadow">
            <i class="bi bi-download me-2"></i> Export to Excel
          </button>
        </form>
      </li>
    </ul>
    
  </div>
  
</div>
        </div>
        
      </div>
      <!-- Unique ID for the toast notification box -->
      
    </div>
  </div>
</div>



<script>
// Show/hide the dropdown when the funnel icon is clicked
document.getElementById('filterButton').addEventListener('click', function() {
  const dropdown = document.getElementById('categoryDropdown');
  dropdown.style.display = (dropdown.style.display === 'none' || dropdown.style.display === '') ? 'block' : 'none';
});

// Handle category selection from the dropdown
const dropdownItems = document.querySelectorAll('#categoryDropdown .dropdown-item');
dropdownItems.forEach(item => {
  item.addEventListener('click', function(e) {
    e.preventDefault(); // Prevent default anchor behavior
    const category = this.getAttribute('data-category');
    updateFilterText(category); // Update the filter text with the selected category
    filterByCategory(category); // Filter by the selected category
    document.getElementById('categoryDropdown').style.display = 'none'; // Hide dropdown after selection
  });
});

// Function to update the filter button text
function updateFilterText(category) {
  const filterText = document.getElementById('filterText');
  filterText.textContent = `Filter by Category: ${category}`;
}

// Function to filter rows based on selected category
function filterByCategory(category) {
  const rows = document.querySelectorAll('#productTableBody tr');
  rows.forEach(row => {
    const categoryCell = row.querySelector('td:nth-child(3)'); // Assuming the 3rd column is Category
    if (category === "All" || (categoryCell && categoryCell.textContent.trim().toLowerCase() === category.toLowerCase())) {
      row.style.display = ''; // Show rows that match the category or if 'All' is selected
    } else {
      row.style.display = 'none'; // Hide rows that don't match the category
    }
  });
}
</script>



<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Custom Styles -->
<style>
  .btn-group {
    position: relative;
  }

  .btn-success {
    background: linear-gradient(145deg, #61ae41, #4a9f36);
    border: 1px solid #4a9f36;
    color: white;
    font-weight: 600;
    border-radius: 10px;
    box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
  }

  .btn-success:hover {
    background: linear-gradient(145deg, #4a9f36, #61ae41);
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
  }

  .dropdown-item {
    padding: 10px 20px;
    transition: background-color 0.3s, transform 0.2s;
  }

  .dropdown-item:hover {
    background-color: #d1f1d1;
    transform: scale(1.05);
  }

  .hover-shadow:hover {
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.15);
  }

  .dropdown-menu {
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 5px 0;
  }

  .dropdown-toggle-split {
    border-radius: 0 10px 10px 0;
  }

  .me-2 {
    margin-right: 0.5rem;
  }
</style>

<!-- JavaScript for triggering file input -->
<script>
  function triggerFileUpload() {
    document.getElementById('importFile').click();
  }

  function handleFileUpload(event) {
    document.getElementById('importForm').submit();
  }
</script>


<!-- JavaScript for triggering file input -->
<script>
  function triggerFileUpload() {
    document.getElementById('importFile').click();
  }

  function handleFileUpload(event) {
    document.getElementById('importForm').submit();
  }
</script>





            <div class="modal fade" id="productReviewModal" tabindex="-1" aria-labelledby="productReviewModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="productReviewModalLabel">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    <p><strong>Product Name:</strong> <span id="modalProductName"></span></p>
                    <p><strong>Brand:</strong> <span id="modalBrand"></span></p>
                    <p><strong>Category:</strong> <span id="modalCategory"></span></p>
                    <p><strong>Supplier:</strong> <span id="modalSupplier"></span></p>
                    <p><strong>Product Unit:</strong> <span id="modalUnit"></span></p>
                    <p><strong>Status:</strong>
                      <select id="Status" class="form-control" disabled>
                       
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                      </select>
                    </p>
                    <p><strong>Quantity:</strong> <input type="number" id="modalQuantity" class="form-control" disabled /></p>
                    <p><strong>Product Cost:</strong> <input type="number" id="modalCost" class="form-control" disabled /></p>
                    <p><strong>Price:</strong> <input type="number" id="modalPrice" class="form-control" disabled /></p>
                    <p><strong>Stock Alert:</strong>
                      <select id="modalStockAlert" class="form-control" disabled>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                      </select>
                    </p>
                    <p><strong>Shelf:</strong>
                      <select id="modalShelf" class="form-control" disabled>
                        <option value="">Select Shelf</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                    </p>
                    <p><strong>Notes:</strong> <input type="text" id="modalNotes" class="form-control" disabled /></p>
                  </div>
                  
                  <div class="modal-footer">
                  
                    <!-- Inside your modal footer -->
<button type="button" class="btn btn-danger" id="deleteProductButton" data-id="">Delete</button>
                    <button type="button" class="btn btn-primary" id="editProductButton">Modify</button>
                    <button type="button" class="btn btn-success" id="updateProductButton" style="display: none;">Update</button>
                  </div>
                </div>
              </div>
            </div>

            

            <!-- Logout Modal POP UP YES / NO ONCE CLICK LOG OUT -->
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
                    <a href="/index.php" class="btn btn-danger">Yes</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
  

    <script>
        const uniqueToastNotificationBox = document.getElementById('uniqueToastNotificationBox');

        const toastMessageTemplates = {


            psuccess: '<i class="fa-solid fa-circle-check"></i>Product updated successfully!',

            success: '<i class="fa-solid fa-circle-check"></i> Product deleted successfully!',

            error: '<i class="fa-solid fa-circle-xmark"></i> There was an error processing your request!',

            invalid: '<i class="fa-solid fa-circle-exclamation"></i> Invalid input, check again!'
        };

        function displayUniqueToast(messageType) {
            const messageContent = toastMessageTemplates[messageType];
            if (!messageContent) return; // Exit if the type is not valid

            const newToastNotification = document.createElement('div');
            newToastNotification.classList.add('uniqueToastNotification');
            newToastNotification.innerHTML = messageContent;

            // Apply specific class for errors and invalid messages
            if (messageType === 'error') {
                newToastNotification.classList.add('errorToast');
            } else if (messageType === 'invalid') {
                newToastNotification.classList.add('invalidToast');
            }

            uniqueToastNotificationBox.appendChild(newToastNotification);

            // Remove the toast after 6 seconds
            setTimeout(() => {
                newToastNotification.remove();
            }, 6500); // 6 seconds for the toast to disappear after animation
        }

        function executeUniqueAction() {
            // Simulate some process logic
            const actionSuccessful = false; // Change this to false to simulate an error

            // Show the toast notification based on the success of the process
            if (actionSuccessful) {
                displayUniqueToast('success'); // Show success toast
            } else {
                displayUniqueToast('error'); // Show error toast
            }
        }
    </script>
      


      <!-- footer start-->
    </div>
  </div>
</div>

<!-- Add this CSS to your styles -->
<style>
  .theme-scrollbar {
    max-height: 10000px; /* Adjust the height as needed */
    overflow-y: auto; /* Enable vertical scrolling */
  }
  
  
  
</style>


<!-- Latest jquery-->
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

<!-- Template js-->
<script src="assets/js/script.js"></script>
<script>
  function triggerFileUpload() {
    const fileInput = document.getElementById('importFile');
    fileInput.click(); // Automatically open file explorer
  }

  function handleFileUpload(event) {
    const input = event.target;
    const fileName = input.files[0] ? input.files[0].name : '';

    if (fileName) {
      const confirmUpload = confirm(`Are you sure you want to upload this "${fileName}"?`); // Backticks for template literal
      if (confirmUpload) {
        document.getElementById('importForm').submit(); // Submit the form if confirmed
      }
    }
  }
</script>


<script>
// Function to disable or enable modal inputs
function disableModalInputs(disable) {
    document.getElementById('modalQuantity').disabled = disable;
    document.getElementById('modalCost').disabled = disable;
    document.getElementById('modalPrice').disabled = disable;
    document.getElementById('modalStockAlert').disabled = disable;
    document.getElementById('modalShelf').disabled = disable;
    document.getElementById('modalNotes').disabled = disable;
    document.getElementById('Status').disabled = disable;

}
/// Show product details in modal
// Show product details in modal
function showProductDetails(button) {
    const productId = button.getAttribute('data-id'); // Get product ID from button
    
    fetch(`get_product_details.php?id=${productId}`)
        .then(response => response.json())
        .then(data => {
            // Populate modal with product details
            document.getElementById('modalProductName').innerText = data.product_name || 'N/A';
            document.getElementById('modalBrand').innerText = data.brand || 'N/A';
            document.getElementById('modalCategory').innerText = data.category || 'N/A';
            document.getElementById('modalQuantity').value = data.product_quantity || 0;
            document.getElementById('modalUnit').innerText = data.product_unit || 'N/A';
            document.getElementById('modalSupplier').innerText = data.supplier || 'N/A';
            document.getElementById('modalCost').value = data.product_cost || 0;
            document.getElementById('modalPrice').value = data.product_price || 0;
            document.getElementById('modalStockAlert').value = data.stock_alert || 'Low';
            document.getElementById('modalShelf').value = data.shelf || '';
            document.getElementById('modalNotes').value = data.notes || '';

            // Set status dropdown based on active status
            // Assuming active is true for active and false for inactive
            document.getElementById('Status').value = data.active ? "1" : "2"; // "1" for active, "2" for inactive

            // Set the productId on the edit button's data-id attribute
            document.getElementById('editProductButton').setAttribute('data-id', productId);
            document.getElementById('deleteProductButton').setAttribute('data-id', productId); // Set product ID for delete button

            // Disable inputs initially
            disableModalInputs(true);

            // Toggle button visibility for Modify/Update
            document.getElementById('editProductButton').style.display = 'block';
            document.getElementById('updateProductButton').style.display = 'none';

            // Show the modal
            const modal = new bootstrap.Modal(document.getElementById('productReviewModal'));
            modal.show();
        })
        .catch(error => {
            console.error('Error fetching product details:', error);
            alert("An error occurred: " + error.message);
        });
}



document.getElementById('editProductButton').addEventListener('click', function() {
    document.getElementById('modalQuantity').disabled = false;
    document.getElementById('modalCost').disabled = false;
    document.getElementById('modalPrice').disabled = false;
    document.getElementById('modalStockAlert').disabled = false;
    document.getElementById('modalShelf').disabled = false;
    document.getElementById('modalNotes').disabled = false;
    document.getElementById('Status').disabled = false; // Enable the status dropdown
    this.style.display = 'none'; // Hide modify button
    document.getElementById('updateProductButton').style.display = 'inline-block'; // Show update button
});


// Update button functionality
document.getElementById('updateProductButton').addEventListener('click', function() {
    // Ensure the product ID is correctly retrieved from the edit button
    const productId = document.getElementById('editProductButton').getAttribute('data-id');
    
    if (productId) {
        console.log("Product ID:", productId); // Verify productId is being retrieved

        const updatedData = {
            quantity: parseInt(document.getElementById("modalQuantity").value, 10),
            product_cost: parseFloat(document.getElementById("modalCost").value),
            product_price: parseFloat(document.getElementById("modalPrice").value),
            stockAlert: document.getElementById("modalStockAlert").value,
            shelf: document.getElementById("modalShelf").value,
            notes: document.getElementById("modalNotes").value,
            Status: document.getElementById("Status").value

            

            


        };
        console.log(Status);
        // Log the data to be submitted in a structured format
        console.log("Data to be submitted:", updatedData);
        console.log("Data to be submitted (JSON):", JSON.stringify(updatedData, null, 2));
        
        // Make the AJAX request to update the product
        fetch(`update_product_details.php?id=${productId}`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(updatedData) // Ensure updated data is sent in the body
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok: " + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
              alert("Product updated successfully!");
              window.location.reload();
                disableModalInputs(true); // Disable inputs after update
                document.getElementById('updateProductButton').style.display = 'none'; // Hide update button
                document.getElementById('editProductButton').style.display = 'block'; // Show modify button
                fetchProducts(); // Optionally refresh the product list
            } else {
                alert("Error updating product: " + data.error);
              
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred while updating the product.");
            
        });
    } else {
        console.error("Product ID not found. Please ensure the edit button contains a valid data-id.");
        alert("Failed to retrieve product ID.");
    }
});


// Initialize selected category
let selectedCategory = 'All';


// Handle category selection
document.querySelectorAll('#categoryDropdown .dropdown-item').forEach(item => {
    item.addEventListener('click', function (event) {
        event.preventDefault();
        selectedCategory = this.getAttribute('data-category'); // Get selected category
        document.getElementById('filterText').innerText = `Filter by Category: ${selectedCategory}`; // Update filter text
        document.getElementById('categoryDropdown').style.display = 'none';
        fetchProducts(document.getElementById('searchInput').value); // Fetch products based on search and category
    });
});

// Function to fetch and display products
function fetchProducts(query = '') {
    const xhr = new XMLHttpRequest();
    
    // Include the selected category in the query string
    xhr.open('GET', `fetch_inventory.php?search=${query}&category=${selectedCategory}`, true);
    xhr.onload = function () {
        if (this.status === 200) {
            document.getElementById('productTableBody').innerHTML = this.responseText;
        }
    };
    xhr.send();
}

// Fetch all products on page load
window.onload = function() {
    fetchProducts();
};

// Listen for search input and fetch filtered products
document.getElementById('searchInput').addEventListener('keyup', function() {
    const query = this.value;
    fetchProducts(query);
});


</script>


<script>

document.getElementById('deleteProductButton').addEventListener('click', function() {
    const productId = this.getAttribute('data-id'); // Retrieve the product ID from the data-id attribute
    
    // Confirm delete action
    if (confirm("Are you sure you want to delete this product?")) {
        // Debugging: Log the product ID being sent
        console.log("Product ID to delete:", productId);

        // Fetch the delete_product.php script
        fetch('delete_product.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json' // Set content type to application/json
            },
            body: JSON.stringify({ productId: productId }) // Send productId as JSON
        })
        .then(response => {
            // Check if the response status is ok (200-299)
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json(); // Parse the JSON response
        })
        .then(data => {
            // Debugging: Log the decoded JSON data
            console.log("Decoded JSON data:", data);

            // Check the status returned from the server
            if (data.status === "success") {
                // Find and remove the row containing the delete button for this productId
                const row = this.closest('tr');
                
                if (row) {
                    row.remove(); // Remove the row from the DOM
                    console.log("Successfully deleted product with ID:", productId);
                    alert("Product deleted successfully."); // Provide user feedback
                    
                } else {
                 
                    alert("Product deleted successfully.");
                    location.reload();
                   
                    
                    fetchProducts();
                    
                  

                }
            } else {
                alert("Error deleting product: " + data.message);
                console.error("Server error:", data);
            }
        })
        .catch(error => {
            console.error("Fetch error:", error);
            alert("An error occurred while deleting the product. Please try again.");
        });
    }
});

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
<div id="uniqueToastNotificationBox"></div> 

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