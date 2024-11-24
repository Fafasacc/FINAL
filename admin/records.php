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
  <title>Records</title>
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
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">a
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
  <!-- jQuery and Bootstrap JS -->

  <!-- Add these in the <head> or just before the closing </body> tag -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<link rel="stylesheet" type="text/css" href="assets/css/notification.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">




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
            <h3>Patient Records</h3>
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
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">

            <!-- SEARCH BAR -->
            <div class="card-body">
              <h3 class="card-title text-center mb-4">Patient Records</h3>

              <div class="mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search Patient Records">
              </div>
              
              <!-- Table to display inventory format -->
              <div class="table-responsive theme-scrollbar">
                <table class="table table-hover table-striped">
                  <thead class="table-dark">
                    <tr>
                      <th>Owner's Name</th>
                      <th>Pet Name</th>
                      <th>Gender</th>
                      <th>Age</th>
                      <th>Species</th>
                      <th>Breed</th>
                      
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="recordTableBody">
                    <!-- fetch_inventory.php will be inserted here with the updated fields -->
                  </tbody>
                </table>
              </div>

              <!-- JavaScript to handle search input and dynamic table update -->
              <script>
               

                // Fetch all records on page load
                window.onload = function() {
                  fetchRecords();
                };

                
              </script>
            </div>

            <div class="card-footer d-flex justify-content-between">
              <nav aria-label="Page navigation">
                
              </nav>
              <div>
                <form id="importForm" action="import_Patient.php" method="post" enctype="multipart/form-data">
                  <input type="file" id="importFile" name="importFile" accept=".xlsx, .xls" required style="display: none;" onchange="handleFileUpload(event)">
                  <button type="button" class="btn btn-success" onclick="openAddPatientModal()">Add Patient</button>

                 
                </form>
              </div>
            </div>
          </div>    
        </div>
      </div>
    </div>
  </div>
<script>
function openAddPatientModal() {
    $('#addPatientModal').modal('show');
}
</script>


<!-- Patient & Owner  Modal -->
<div class="modal fade" id="patientHistoryModal" tabindex="-1" role="dialog" aria-labelledby="patientHistoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Use modal-lg for large size -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="patientHistoryModalLabel">Patient & Owner Information</h5>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close" onclick="resetPatientHistoryModal()">            
    <span aria-hidden="true">&times;</span>
</button>
            </div>     
            <div class="modal-body" style="max-height: 80vh; overflow-y: auto;"> <!-- Set max-height for scrollable body -->
                <!-- Table 1: Owner and Pet Details -->
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Owner's Name:</strong></td>
                            <td id="ownerName"></td>
                        </tr>
                        <tr>
                            <td><strong>Address:</strong></td>
                            <td id="ownerAddress"></td>
                        </tr>
                        <tr>
                            <td><strong>Tel/Cellphone No:</strong></td>
                            <td id="ownerPhone"></td>
                            <td><strong>Age:</strong></td>
                            <td id="ownerAge"></td>
                        </tr>
                        <tr>
                            <td><strong>Date of Birth:</strong></td>
                            <td id="ownerDOB" colspan="3"></td>
                        </tr>
                        <tr>
                            <td><strong>Species:</strong></td>
                            <td id="petSpecies"></td>
                            <td><strong>Sex:</strong></td>
                            <td id="petSex"></td>
                        </tr>
                        <tr>
                            <td><strong>Breed:</strong></td>
                            <td id="petBreed"></td>
                            <td><strong>Markings:</strong></td>
                            <td id="petMarkings"></td>
                        </tr>
                        <tr>
                            <td><strong>Pet Name:</strong></td>
                            <td id="petName" colspan="3"></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Space between the tables -->
                <div style="margin: 50px 0;"></div>

                <!-- Title for Medical History -->
                <h6 class="text-center" style="margin-bottom: 20px; ">Medical History</h6>

                <!-- Scrollable container for Medical History Table -->
                <div style="max-height: 300px; overflow-y: auto;"> <!-- Adjust height as necessary for this section -->
                    <!-- Table 2: Medical History -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>WT (KG)</th>
                                <th>Temp (°C)</th>
                                <th>Medical History / Complaints</th>
                                <th>Treatment / Prescription</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="medicalHistoryTableBody">
                            <!-- Dynamic rows will be populated here -->
                        </tbody>
                    </table>
                </div>



                <!-- Add new history row button, hidden by default -->
                <button type="button" class="btn btn-secondary" id="addHistoryBtn" onclick="addHistoryRow()" style="display:none;">Add New History</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetPatientHistoryModal()">Close</button>
                <button type="button" class="btn btn-primary" id="modalActionBtn" onclick="toggleEditMode()">Modify</button>
            </div>
            
        </div>
    </div>
</div>

<!-- Add Patient Modal -->
<div class="modal fade" id="addPatientModal" tabindex="-1" role="dialog" aria-labelledby="addPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPatientModalLabel">Add New Patient</h5>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close" onclick="resetPatientHistoryModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addPatientForm">
                    <!-- Patient Details Section -->
                    <h5>Owner Details</h5>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><label for="ownerNameInput">Owner's Name</label></td>
                                <td><input type="text" class="form-control" id="ownerNameInput" name="owner_name" required></td>
                            </tr>
                            <tr>
                                <td><label for="ownerAddressInput">Address</label></td>
                                <td><input type="text" class="form-control" id="ownerAddressInput" name="owner_address" required></td>
                            </tr>
                            <tr>
                            <td><label for="ownerPhoneInput">Tel/Cellphone No</label></td>
                                <td>
                                    <input type="number" class="form-control" id="ownerPhoneInput" name="owner_phone" required
                                          oninput="if(this.value.length > 12) this.value = this.value.slice(0, 12);" 
                                          >
                                </td>
                            </tr>
                            <tr>
                                <td><label for="petNameInput">Pet Name</label></td>
                                <td><input type="text" class="form-control" id="petNameInput" name="pet_name" required></td>
                            </tr>
                            <tr>
                                <td><label for="petSpeciesInput">Species</label></td>
                                <td><input type="text" class="form-control" id="petSpeciesInput" name="pet_species" required></td>
                            </tr>
                            <tr>
                                <td><label for="petBreedInput">Breed</label></td>
                                <td><input type="text" class="form-control" id="petBreedInput" name="pet_breed" required></td>
                            </tr>
                            <tr>
                                <td><label for="petMarkingsInput">Markings</label></td>
                                <td><input type="text" class="form-control" id="petMarkingsInput" name="pet_markings" required></td>
                            </tr>
                            <tr>
                                <td><label for="petAgeInput">Age</label></td>
                                <td><input type="number" class="form-control" id="petAgeInput" name="pet_age" required></td>
                            </tr>
                            <tr>
                                <td><label for="petGenderInput">Gender</label></td>
                                <td>
                                    <select class="form-control" id="petGenderInput" name="pet_gender" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="petDobInput">Date of Birth</label></td>
                                <td><input type="date" class="form-control" id="petDobInput" name="pet_dob" required></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Patient History Section -->
                    <h5 style="margin-top: 20px;">Patient History</h5>
                    <div style="max-height: 200px; overflow-y: auto; border: 1px solid #dee2e6; border-radius: 0.25rem;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Weight (KG)</th>
                                    <th>Temperature (°C)</th>
                                    <th>Medical History</th>
                                    <th>Treatment / Prescription</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="historyTableBody">
                                <tr>
                                    <td><input type="date" class="form-control" name="history_date[]" required></td>
                                    <td><input type="number" class="form-control" name="history_weight[]" placeholder="Weight (KG)" step="0.01" required></td>
                                    <td><input type="number" class="form-control" name="history_temp[]" placeholder="Temperature (°C)" step="0.01" required></td>

                                    <td><input type="text" class="form-control" name="history_complaints[]" placeholder="Medical History" required></td>
                                    <td><input type="text" class="form-control" name="history_treatment[]" placeholder="Treatment / Prescription" required></td>
                                    <td><button type="button" class="btn btn-danger btn-sm" onclick="removeHistoryRow(this)">Remove</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <button type="button" class="btn btn-secondary" style="margin-top: 10px;" onclick="addEmptyHistoryRow()">Add New History Entry</button>
                    <button type="submit" class="btn btn-success" style="margin-top: 10px;">Save Patient</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Patient History Modal -->
<div class="modal fade" id="patientHistoryModal" tabindex="-1" role="dialog" aria-labelledby="patientHistoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Use modal-lg for large size -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="patientHistoryModalLabel">Patient Information</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" onclick="resetPatientHistoryModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="max-height: 80vh; overflow-y: auto;"> <!-- Set max-height for scrollable body -->
                <!-- Table 1: Owner and Pet Details -->
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Owner's Name:</strong></td>
                            <td id="ownerName"></td>
                        </tr>
                        <tr>
                            <td><strong>Address:</strong></td>
                            <td id="ownerAddress"></td>
                        </tr>
                        <tr>
                            <td><strong>Tel/Cellphone No:</strong></td>
                            <td id="ownerPhone"></td>
                            <td><strong>Age:</strong></td>
                            <td id="ownerAge"></td>
                        </tr>
                        <tr>
                            <td><strong>Date of Birth:</strong></td>
                            <td id="ownerDOB" colspan="3"></td>
                        </tr>
                        <tr>
                            <td><strong>Species:</strong></td>
                            <td id="petSpecies"></td>
                            <td><strong>Sex:</strong></td>
                            <td id="petSex"></td>
                        </tr>
                        <tr>
                            <td><strong>Breed:</strong></td>
                            <td id="petBreed"></td>
                            <td><strong>Markings:</strong></td>
                            <td id="petMarkings"></td>
                        </tr>
                        <tr>
                            <td><strong>Pet Name:</strong></td>
                            <td id="petName" colspan="3"></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Space between the tables -->
                <div style="margin: 50px 0;"></div>

                <!-- Title for Medical History -->
                <h6 class="text-center" style="margin-bottom: 20px;">Medical History</h6>

                <!-- Scrollable container for Medical History Table -->
                <div style="max-height: 300px; overflow-y: auto;"> <!-- Adjust height as necessary for this section -->
                    <!-- Table 2: Medical History -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>WT (KG)</th>
                                <th>Temp (°C)</th>
                                <th>Medical History / Complaints</th>
                                <th>Treatment / Prescription</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="medicalHistoryTableBody">
                            <!-- Initial empty row -->
                            <tr>
                                <td><input type="date" class="form-control" name="history_date[]" required></td>
                                <td><input type="number" class="form-control" name="history_weight[]" placeholder="Weight (KG)" required></td>
                                <td><input type="number" class="form-control" name="history_temp[]" placeholder="Temperature (°C)" required></td>
                                <td><input type="text" class="form-control" name="history_complaints[]" placeholder="Medical History / Complaints" required></td>
                                <td><input type="text" class="form-control" name="history_treatment[]" placeholder="Treatment / Prescription" required></td>
                                <td><button type="button" class="btn btn-danger btn-sm" onclick="removeHistoryRow(this)">Remove</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetPatientHistoryModal()">Close</button>
                <button type="button" class="btn btn-primary" id="modalActionBtn" onclick="toggleEditMode()">Modify</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#addPatientModal').on('show.bs.modal', function() {
            resetPatientHistoryModal();
        });

        $('#addPatientForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Serialize form data
            var formDataArray = $(this).serializeArray();
            var formData = {};

            // Convert the serialized array into a JSON object
            $.each(formDataArray, function(_, field) {
                formData[field.name] = field.value;
            });

            // Convert the history entries into an array of objects
            var historyEntries = [];
            $('#historyTableBody tr').each(function() {
                var entry = {
                    date: $(this).find('input[name="history_date[]"]').val(),
                    weight: $(this).find('input[name="history_weight[]"]').val(),
                    temp: $(this).find('input[name="history_temp[]"]').val(),
                    complaints: $(this).find('input[name="history_complaints[]"]').val(),
                    treatment: $(this).find('input[name="history_treatment[]"]').val()
                };
                historyEntries.push(entry);
            });

            // Add the history entries to the main formData object
            formData.history = historyEntries;

            // Log the form data to the console
            console.log(formData); // Display the form data in the console

            // Send AJAX request to PHP script with JSON data
            $.ajax({
                type: "POST",
                url: "submit_patient.php", // Replace with the path to your PHP script
                contentType: "application/json", // Specify the content type
                data: JSON.stringify(formData), // Convert data to JSON
                success: function(response) {
                    console.log(response); // Log the response to the console for debugging
                    alert(JSON.stringify(response)); // Display the response as a JSON string
                    $('#addPatientModal').modal('hide'); // Hide modal on success
                    resetPatientHistoryModal(); // Reset the modal
                    location.reload();
                },
                error: function() {
                    alert("An error occurred while submitting the form.");
                }
            });
        });
    });

    function addEmptyHistoryRow() {
        const emptyRow = `
            <tr>
                <td><input type="date" class="form-control" name="history_date[]" required></td>
                <td><input type="number" class="form-control" name="history_weight[]" placeholder="Weight (KG)" required></td>
                <td><input type="number" class="form-control" name="history_temp[]" placeholder="Temperature (°C)" required></td>
                <td><input type="text" class="form-control" name="history_complaints[]" placeholder="Medical History" required></td>
                <td><input type="text" class="form-control" name="history_treatment[]" placeholder="Treatment / Prescription" required></td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="removeHistoryRow(this)">Remove</button></td>
            </tr>
        `;
        $('#historyTableBody').append(emptyRow);
    }

    function removeHistoryRow(button) {
        $(button).closest('tr').remove(); // Remove the row containing the button
    }

    function resetPatientHistoryModal() {
        $('#addPatientForm')[0].reset(); // Reset the form
        $('#historyTableBody').empty(); // Clear history entries
        addEmptyHistoryRow(); // Add an empty row for history
    }
</script>



<!-- Include Bootstrap and jQuery in the head section of your HTML -->
<!-- Example: -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</div>

</div>


<script>

  
    function resetPatientHistoryModal() {
        // Clear out the Owner and Pet Details fields
        document.getElementById('ownerName').innerText = '';
        document.getElementById('ownerAddress').innerText = '';
        document.getElementById('ownerPhone').innerText = '';
        document.getElementById('ownerDOB').innerText = '';
        document.getElementById('petName').innerText = '';
        document.getElementById('petSpecies').innerText = '';
        document.getElementById('petSex').innerText = '';
        document.getElementById('petBreed').innerText = '';
        document.getElementById('petMarkings').innerText = '';
        document.getElementById('ownerAge').innerText = '';

        // Clear out the Medical History table
        const medicalHistoryTableBody = document.getElementById('medicalHistoryTableBody');
        medicalHistoryTableBody.innerHTML = '';

        // Reset editing mode
        isEditing = false;
        document.getElementById('modalActionBtn').innerText = 'Modify';
        document.getElementById('addHistoryBtn').style.display = 'none';
        
        // Clear currentPetId if used as a reference
        currentPetId = null;
    }

  
    let isEditing = false; // Flag to track if we are editing the history
    let historyData = []; // Declare historyData here to make it globally accessible
    let currentPetId = null;

    // Function to fetch and display records
    // Function to fetch and display records
    function fetchRecords(query = '') {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', 'fetch_record.php?search=' + encodeURIComponent(query), true);
      xhr.onload = function () {
        if (this.status === 200) {
          document.getElementById('recordTableBody').innerHTML = this.responseText;
        }
      };
      xhr.send();
    }

    // Add event listener to the search input for real-time filtering
    document.getElementById('searchInput').addEventListener('input', function () {
      const query = this.value;
      fetchRecords(query);
    });

    // Initial fetch of all records on page load
    window.onload = function() {
      fetchRecords();
    };

    

    function toggleEditMode() {
      const addHistoryBtn = document.getElementById('addHistoryBtn');
      const modalActionBtn = document.getElementById('modalActionBtn');

      if (isEditing) {
        // When exiting edit mode, submit the history to the database
        submitPatientHistory();
            resetModal();
      } else {
        // Switch to editing mode
         // Switch to edit mode
         isEditing = true;
            modalActionBtn.innerText = 'Save Changes';
            addHistoryBtn.style.display = 'inline-block';
      }
    }

    function addHistoryRow() {
      const tableBody = document.getElementById('medicalHistoryTableBody');

      const newRow = document.createElement('tr');
      newRow.innerHTML = `
        <td><input type="date" class="form-control" required></td>
        <td><input type="number" class="form-control" placeholder="Weight (KG)" required></td>
        <td><input type="number" class="form-control" placeholder="Temp (°C)" required></td>
        <td><input type="text" class="form-control" placeholder="Complaints" required></td>
        <td><input type="text" class="form-control" placeholder="Treatment" required></td>
        <td><button class="btn btn-danger" onclick="removeHistoryRow(this)">Remove</button></td>` 
      tableBody.appendChild(newRow);
    }


    function removeHistoryRow(button) {
    const row = button.closest('tr');

    // Get the date from the second cell (assuming it's the first <td> element)
    const dateCell = row.cells[0]; // Adjust this index as necessary
    const date = dateCell ? dateCell.innerText.trim() : null; // Get the date from the cell text

    if (!date) {
         row.remove();
        return;
    }

    // Convert the date from "October - 31 - 2024" to "YYYY-MM-DD"
    const formattedDate = parseDate(date);

    if (!formattedDate) {
        alert('Invalid date format. Please use "Month - Day - Year".');
        return;
    }

    const dataToSend = { petId: currentPetId, date: formattedDate }; // Prepare data to send

    // Log the data being sent to the console in JSON format
    console.log("Data being sent to the server:", JSON.stringify(dataToSend, null, 2)); // Pretty print with indentation

    const xhr = new XMLHttpRequest();
    xhr.open('DELETE', 'delete_patient_history.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

    xhr.onload = function () {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            console.log("Response from the server:", response); // Log the server's response
            if (response.status == "success") {
                alert('Patient history entry deleted successfully!');
                location.reload();
                row.remove();

            } else {
                alert( response.message);
                 location.reload();
            }
        } else {
  
            alert('Failed to delete patient history entry. Status: ' + xhr.status);
            row.remove(); // Remove the row from the table if successful
        }
    };

    xhr.onerror = function () {
        alert('An error occurred during the request.');
    };

    xhr.send(JSON.stringify(dataToSend)); // Send the JSON data
}

// Function to parse the date
function parseDate(dateStr) {
    const [month, day, year] = dateStr.split(' - ');
    const monthMap = {
        January: '01',
        February: '02',
        March: '03',
        April: '04',
        May: '05',
        June: '06',
        July: '07',
        August: '08',
        September: '09',
        October: '10',
        November: '11',
        December: '12',
    };
    const monthNum = monthMap[month.trim()]; // Get the month number
    return `${year.trim()}-${monthNum}-${day.trim().padStart(2, '0')}`; // Format to YYYY-MM-DD
}




    
    
    function submitPatientHistory() {
    const medicalHistoryTable = document.getElementById('medicalHistoryTableBody');
    const historyEntries = [];

    // Collect history data from each row
    Array.from(medicalHistoryTable.rows).forEach((row) => {
      const date = row.cells[0].querySelector('input[type="date"]')?.value || '';
      const weight = row.cells[1].querySelector('input[type="number"]')?.value || '';
      const temp = row.cells[2].querySelector('input[type="number"]')?.value || '';
      const complaints = row.cells[3].querySelector('input[type="text"]')?.value || '';
      const treatment = row.cells[4].querySelector('input[type="text"]')?.value || '';
      // Validate that the fields are not empty
      if (date && weight && temp && complaints && treatment) {
        historyEntries.push({ date, weight, temp, complaints, treatment });
      }
    });

    // Prepare JSON data with petId and historyEntries
    const dataToSend = {
      petId: currentPetId,
      historyEntries,
    };

    console.log("JSON Data to be sent:", JSON.stringify(dataToSend));

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_patient_history.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    xhr.onload = function() {
      if (xhr.status === 200) {
        alert('Patient history saved successfully!');
        location.reload();
      } else {
        alert('Failed to save patient history.');
      }
    };
    xhr.send(JSON.stringify(dataToSend));
  }

 // Reset modal after saving changes
 function resetModal() {
        const modalActionBtn = document.getElementById('modalActionBtn');
        const addHistoryBtn = document.getElementById('addHistoryBtn');

        modalActionBtn.innerText = 'Modify';
        addHistoryBtn.style.display = 'none';
        isEditing = false;
        
        $('#patientHistoryModal').modal('hide'); // Close the modal
    }

    // Function to open the modal and set initial data
    function openPatientHistoryModal(button) {
        currentPetId = button.getAttribute('data-pet-id');

        // Populate modal with patient details (e.g., ownerName, etc.)
        // and medical history if available

        // Show the modal
        $('#patientHistoryModal').modal('show');
    }
  
    
    function openPatientHistoryModal(button) {
      // Get data attributes from the button
      const medicalHistoryJson = button.getAttribute('data-medical-history');
      const medicalHistory = JSON.parse(medicalHistoryJson || '[]'); // Parse JSON or use an empty array if null

      // Populate other modal fields (owner info, pet info)
      const ownerName = button.getAttribute('data-owner');
      const ownerAddress = button.getAttribute('data-address');
      const ownerPhone = button.getAttribute('data-phone');
      const ownerDOB = button.getAttribute('data-dob');
      const petName = button.getAttribute('data-pet');
      const petSpecies = button.getAttribute('data-species');
      const petSex = button.getAttribute('data-gender');
      const petBreed = button.getAttribute('data-breed');
      const petMarkings = button.getAttribute('data-markings');
      const ownerAge = button.getAttribute('data-age');
      
      
      // Set the currentPetId from the button's data attribute
      currentPetId = button.getAttribute('data-pet-id'); // Add this line

      // Populate modal fields
      document.getElementById('ownerName').innerText = ownerName;
      document.getElementById('ownerAddress').innerText = ownerAddress;
      document.getElementById('ownerPhone').innerText = ownerPhone;
      document.getElementById('ownerDOB').innerText = ownerDOB;
      document.getElementById('petName').innerText = petName;
      document.getElementById('petSpecies').innerText = petSpecies;
      document.getElementById('petSex').innerText = petSex;
      document.getElementById('petBreed').innerText = petBreed;
      document.getElementById('petMarkings').innerText = petMarkings;
      document.getElementById('ownerAge').innerText = ownerAge;

      // Populate medical history table if exists
      const medicalHistoryTableBody = document.getElementById('medicalHistoryTableBody');
      medicalHistoryTableBody.innerHTML = ''; // Clear previous entries
      medicalHistory.forEach(entry => {
          const row = document.createElement('tr');
          row.innerHTML = `
              <td>${entry.date}</td>
              <td>${entry.weight}</td>
              <td>${entry.temperature}</td>
              <td>${entry.medical_history}</td>
              <td>${entry.treatment}</td>
              <td><button class="btn btn-danger" onclick="removeHistoryRow(this)">Remove</button></td>
          `;
          medicalHistoryTableBody.appendChild(row);
      });

      // Show the modal
      $('#patientHistoryModal').modal('show');
      $('#patientHistoryModal').modal('hide');

}






 
   
  



  </script>

</script>



      <!--CONTENT END-->


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
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>


    <!--SEARCH FILTERING DRAFTTT-->
    <script>
     


function handleFileUpload(event) {
    // You can add any additional handling here if needed
    const fileName = event.target.files[0].name;
    console.log(`Selected file: ${fileName}`);
}

  </script>

</body>
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>








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