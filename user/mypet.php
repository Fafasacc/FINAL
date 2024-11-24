
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
  <script type="module" src="mypet.js" defer></script>
  <style>

  </style>

<!-- Include Firebase App SDK -->
<script src="https://www.gstatic.com/firebasejs/9.18.0/firebase-app.js"></script>

<!-- Include Firestore SDK -->
<script src="https://www.gstatic.com/firebasejs/9.18.0/firebase-firestore.js"></script>

<!-- Initialize Firebase in your script -->
<script>

</script>

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



  <!-- CONTENT -->
  <div class="page-body">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">

            <!-- SEARCH BAR -->
            <div class="card-body">
              <h3 class="card-title text-center mb-4">My Pet Records</h3>

              <div class="mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search Patient Records">
              </div>
              
              <!-- Table to display inventory format -->
              <div class="table-responsive theme-scrollbar">
                <table class="table table-hover table-striped">
                  <thead class="table-dark">
                    <tr>
                     
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


<!-- Patient History Modal -->
<div class="modal fade" id="patientHistoryModal" tabindex="-1" role="dialog" aria-labelledby="patientHistoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Use modal-lg for large size -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="patientHistoryModalLabel">Patient History</h5>
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
                                
                            </tr>
                        </thead>
                        <tbody id="medicalHistoryTableBody">
                            <!-- Dynamic rows will be populated here -->
                        </tbody>
                    </table>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetPatientHistoryModal()">Close</button>
              
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
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" onclick="resetPatientHistoryModal()">
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
                                <td><input type="text" class="form-control" id="ownerPhoneInput" name="owner_phone" required></td>
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
                                    <td><input type="number" class="form-control" name="history_weight[]" placeholder="Weight (KG)" required></td>
                                    <td><input type="number" class="form-control" name="history_temp[]" placeholder="Temperature (°C)" required></td>
                                    <td><input type="text" class="form-control" name="history_complaints[]" placeholder="Medical History" required></td>
                                    <td><input type="text" class="form-control" name="history_treatment[]" placeholder="Treatment / Prescription" required></td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                <h5 class="modal-title" id="patientHistoryModalLabel">Patient History</h5>
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
                            
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetPatientHistoryModal()">Close</button>
                <button type="button" class="btn btn-primary" id="modalActionBtn" onclick="toggleEditMode()">Modify</button>
                <!-- Hidden Form to Submit Data -->


            </div>
        </div>
    </div>
</div>



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
    // Get the userName from localStorage
    var userName = localStorage.getItem("userName");

    // Create a URL parameter string for the userName
    var urlParams = 'search=' + encodeURIComponent(query);

    // Check if userName exists in localStorage and append it to the URL parameters
    if (userName) {
        urlParams += '&userName=' + encodeURIComponent(userName);
    }

    // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_rrecord.php?' + urlParams, true);

    // Define the onload callback to handle the response
    xhr.onload = function () {
        if (this.status === 200) {
            // Update the table with the response from the backend
            document.getElementById('recordTableBody').innerHTML = this.responseText;
        }
    };

    // Send the request
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
             
          `;
          medicalHistoryTableBody.appendChild(row);
      });

      // Show the modal
      $('#patientHistoryModal').modal('show');
      $('#patientHistoryModal').modal('hide');

}










  </script>
<script src="https://www.gstatic.com/firebasejs/9.18.0/firebase-app.js"></script>

<!-- Include Firestore SDK -->
<script src="https://www.gstatic.com/firebasejs/9.18.0/firebase-firestore.js"></script>



<!-- Include Firebase App SDK (v8.x) -->
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>

<!-- Include Firestore SDK (v8.x) -->
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
<script>
  const firebaseConfig = {
    apiKey: "AIzaSyCr9Hpr7nYKiUCsmou8_L4moyx8KIJnopM",
    authDomain: "vetease-91e29.firebaseapp.com",
    projectId: "vetease-91e29",
    storageBucket: "vetease-91e29.appspot.com",
    messagingSenderId: "13605053466",
    appId: "1:13605053466:web:e487ab8b3618f9ba7d9da3"
  };

  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  const db = firebase.firestore();

  // Get logged-in user's UID from session storage
  const loggedInUserId = sessionStorage.getItem('loggedInUserId');

  if (loggedInUserId) {
      const userRef = db.collection('users').doc(loggedInUserId);
      userRef.get().then((doc) => {
          if (doc.exists) {
              const user = doc.data();
              const userName = user.name;
              const userPhone = user.phone;

              // Set session storage and local storage
              sessionStorage.setItem('userName', userName);
              sessionStorage.setItem('userPhone', userPhone);
              localStorage.setItem('userName', userName);
              localStorage.setItem('userPhone', userPhone);

              console.log("User details stored in session and local storage:", {
                  userName: userName,
                  userPhone: userPhone
              });
          } else {
              console.log("No such user found in Firebase");
          }
      }).catch((error) => {
          console.error("Error fetching user data: ", error);
      });
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


</html>