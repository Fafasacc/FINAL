<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>VET</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="appointment.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        .form-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 30px auto;
            max-width: 900px;
        }

        .form-header p {
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 20px;
            color: #004274;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #004274;
        }

        .form-footer {
            text-align: center;
            margin-top: 30px;
        }

        .form-footer button {
            background-color: #004274;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
        }

        .form-footer button:hover {
            background-color: #002d56;
        }

        .time-slot {
            cursor: pointer;
            padding: 5px;
            border: 1px solid #004274;
            border-radius: 5px;
            margin: 5px 0;
            text-align: center;
            transition: background-color 0.3s;
            color: black; /* Change text color to black */
        }

        .time-slot:hover {
            background-color: #e0e0e0;
        }

        body {
            background-image: url('images/bg.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="form-card">
        <div class="form-header">
            <br>
            <p>Veterinary Visit Form</p>
        </div>
        
        <form id="vetForm">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ownerEmail">Owner's Email</label>
                        <input type="email" class="form-control" id="ownerEmail" placeholder="Owner's Email" required>
                    </div>
                    <div class="form-group">
                        <label for="ContactNumber">Contact Number</label>
                        <input type="number" class="form-control" id="ContactNumber" placeholder="Contact Number" required>
                    </div>
                    <div class="form-group">
                        <label for="completeAdd">Complete Address</label>
                        <input type="text" class="form-control" id="completeAdd" placeholder="Owner's House">
                    </div>
                    <div class="form-group">
                        <label for="ownerName">Owner's Name</label>
                        <input type="text" class="form-control" id="ownerName" placeholder="Owner's Name" oninput="validateOwnerName(this)" required>
                    </div>
                    <div class="form-group">
                        <label for="petName">Pet's Name</label>
                        <input type="text" class="form-control" id="petName" placeholder="Pet's Name" required>
                    </div>
                    <div class="form-group">
                        <label for="petAge">Pet's Age</label>
                        <input type="number" class="form-control" id="petAge" placeholder="Pet's Age" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dateOfVisit">Select Date</label>
                        <input type="text" class="form-control" id="dateOfVisit" required readonly>
                    </div>
                    <div id="timeSlots" style="display: none;">
                        <label for="timeSlot" >Available Time Slots:</label>
                        <div id="timeSlotsContainer"></div>
                    </div>
                    <div class="form-group">
                        <label for="petBreed">Breed</label>
                        <input type="text" class="form-control" id="petBreed" placeholder="Breed" required>
                    </div>
                    <div class="form-group">
                        <label for="serviceType">Service</label>
                        <select class="form-control" id="serviceType" required>
                            <option value="">Select a Service</option>
                            <option value="vaccine">Vaccine</option>
                            <option value="groom">Consultation</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="chiefComplaint">Chief Complaint</label>
                        <textarea class="form-control" id="chiefComplaint" rows="3"  placeholder="Chief Complaint" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="medicalConcerns">Pertinent Information Related to Medical Concerns</label>
                        <textarea class="form-control" id="medicalConcerns" rows="4" required placeholder="All Pertinent Information Related to the Medical Concerns"></textarea>
                    </div>
                </div>
                <div class="additional-info">
                    <h3>Cancellation Policy:</h3>
                    <p>You can cancel or reschedule anytime before the appointment time.</p>
                
                    <h3>Additional Information:</h3>
                    <p>When booking with Kalb-Qitta Veterinary Clinic & Pet Salon, you may receive appointment-specific communication from a third party. This includes confirmations, receipts, and reminders via email and SMS.</p>
                </div>
            </div>
            <br>
            <div class="form-footer">
                <a href="/index.php">
                    <button type="button">Go home</button>
                </a>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    <footer>
        <br>
        <br>
        <br>
        
        <div style="text-align: center; padding: 40px 15px; background-color: #004274; color: white;">
            <p>&copy; 2024 Kalb-Qitta Veterinary Clinic and Pet Salon.  </p>
        </div>
    </footer>
    
    <script>
function validateOwnerName(input) {
  // Remove any numbers from the input value
  input.value = input.value.replace(/[0-9]/g, '');
}
</script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-app.js";
        import { getFirestore, collection, addDoc } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-firestore.js";
        import { getAuth } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-auth.js";
    
        const firebaseConfig = {
            apiKey: "AIzaSyCr9Hpr7nYKiUCsmou8_L4moyx8KIJnopM",
            authDomain: "vetease-91e29.firebaseapp.com",
            projectId: "vetease-91e29",
            storageBucket: "vetease-91e29.appspot.com",
            messagingSenderId: "13605053466",
            appId: "1:13605053466:web:e487ab8b3618f9ba7d9da3"
        };
    
        const app = initializeApp(firebaseConfig);
        const db = getFirestore(app);
        const auth = getAuth(app);
    
        document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('vetForm');

    // Initialize Flatpickr for date selection
    flatpickr("#dateOfVisit", {
        dateFormat: "Y-m-d",
        minDate: "today", // Disable past dates
        maxDate: new Date().fp_incr(6), // Allow selection of dates only within 7 days
            disableMobile: true, // Disable month/year browsing on mobile
        onChange: function(selectedDates) {
            if (selectedDates.length) {
                // Get the selected date and add 1 day to it
                const selectedDate = selectedDates[0];
                const adjustedDate = new Date(selectedDate);
                adjustedDate.setDate(adjustedDate.getDate() + 1); // Adjust the date by 1 day
                const formattedDate = adjustedDate.toISOString().split('T')[0]; // Format to YYYY-MM-DD
                document.getElementById("dateOfVisit").value = formattedDate; // Set adjusted date in input
                showAvailableTimeSlots(formattedDate); // Show available time slots for the adjusted date
            }
           
        }
        
    });

    

    // Show available time slots based on the selected date
    function showAvailableTimeSlots(date) {
        const timeSlotsContainer = document.getElementById("timeSlotsContainer");
        const timeSlots = [];

        // Generate time slots from 8 AM to 6 PM with 30-min intervals
        const startTime = new Date(date + "T08:00:00");
        const endTime = new Date(date + "T18:00:00");

        // Loop through time slots, skipping lunch from 12 PM to 1 PM
        for (let time = new Date(startTime); time <= endTime; time.setMinutes(time.getMinutes() + 30)) {
            // Skip the lunch break
            if (time.getHours() === 12) {
                continue;
            }
            const formattedTime = time.toLocaleTimeString([], { hour: 'numeric', minute: 'n umeric', hour12: true });
            timeSlots.push(formattedTime);
        }

        timeSlotsContainer.innerHTML = ""; // Clear previous slots
        timeSlots.forEach(slot => {
            const slotDiv = document.createElement("div");
            slotDiv.className = "time-slot";
            slotDiv.textContent = slot;

            // Add click event to each time slot
            slotDiv.addEventListener("click", function () {
                document.getElementById("dateOfVisit").value = date + " " + slot;
                document.getElementById("timeSlots").style.display = "none"; // Hide the time slots after selection
            });

            timeSlotsContainer.appendChild(slotDiv);
        });
        document.getElementById("timeSlots").style.display = "block"; // Show time slots
    }

    // Form submission handler
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        // Validate contact number (example: allowing only digits and length)
        const contactNumber = document.getElementById("ContactNumber").value;
        const contactNumberPattern = /^\d{11}$/; // Adjust the pattern as needed

        if (!contactNumberPattern.test(contactNumber)) {
            alert("Please enter a valid contact number (11 digits).");
            return;
        }

        // Gather form data and submit it
        const formData = {
            ownerEmail: document.getElementById("ownerEmail").value,
            ContactNumber: contactNumber,
            completeAdd: document.getElementById("completeAdd").value,
            ownerName: document.getElementById("ownerName").value,
            petName: document.getElementById("petName").value,
            petAge: document.getElementById("petAge").value,
            petBreed: document.getElementById("petBreed").value,
            dateOfVisit: document.getElementById("dateOfVisit").value,
            serviceType: document.getElementById("serviceType").value,
            chiefComplaint: document.getElementById("chiefComplaint").value,
            medicalConcerns: document.getElementById("medicalConcerns").value,
            status: "pending",  // Set status to "pending"
            reason: ""          // Set reason to an empty string
        };

        // Show loading message
        const loadingMessage = document.createElement('div');
        loadingMessage.textContent = "Booking your appointment...";
        loadingMessage.style.textAlign = "center";
        document.body.appendChild(loadingMessage);

        // Submit form data to Firestore
        try {
            const docRef = await addDoc(collection(db, "appointments"), formData);
            alert("Appointment booked successfully!");
            form.reset();
        } catch (error) {
            alert("Error booking appointment: " + error.message);
        } finally {
            document.body.removeChild(loadingMessage); // Remove loading message
        }
    });
});
  </script>    