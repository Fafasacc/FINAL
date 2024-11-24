import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-app.js";
import { getFirestore, collection, query, where, orderBy, onSnapshot, doc, updateDoc, getDoc } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-firestore.js";

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
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

// Fetch appointments based on logged-in user's email
function fetchUserAppointments() {
    const loggedInUserEmail = sessionStorage.getItem("loggedInUserEmail");
    console.log("Logged In User Email:", loggedInUserEmail);

    if (!loggedInUserEmail) {
        console.error("User email not found in session storage.");
        alert("You need to log in first.");
        return;
    }

    const appointmentsRef = collection(db, "appointments");
    const q = query(
        appointmentsRef,
        where("ownerEmail", "==", loggedInUserEmail), // Query by email
        orderBy("dateOfVisit", "desc") // Order by dateOfVisit in descending order
    );

    // Set up real-time listener
    onSnapshot(q, (querySnapshot) => {
        console.log("Query Snapshot:", querySnapshot);

        const tableBody = document.getElementById('appointmentsBody');
        if (!tableBody) {
            console.error("Table body with ID 'appointmentsBody' not found.");
            return;
        }

        tableBody.innerHTML = ""; // Clear existing rows

        if (querySnapshot.empty) {
            console.log("No appointments found for the logged-in user.");
            return;
        }

        querySnapshot.forEach((doc) => {
            const appointment = doc.data();
            console.log("Fetched Appointment Data:", appointment);

            const dateOfVisit = appointment.dateOfVisit || 'N/A';
            const [date, time] = dateOfVisit.split(" "); // Split into date and time

            // Format date properly
            const formattedDate = date || 'N/A';
            const formattedTime = time ? time.trim() : 'N/A'; // Get the time part

            const row = document.createElement('tr');

            // Update status display with color coding
            row.innerHTML = `
                <td>${formattedDate}</td>
                <td>${formattedTime}</td>
                <td>${appointment.petName || 'N/A'}</td>
                <td>${appointment.serviceType || 'N/A'}</td>
                <td style="color: ${appointment.status === 'approved' ? 'green' : appointment.status === 'pending' ? 'orange' : appointment.status === 'declined' ? 'red' : 'black'};">
                    <strong>${appointment.status || 'N/A'}</strong>
                </td>
                <td>
                    ${appointment.status === 'pending' ? 
                        `<button class="btn btn-danger btn-sm" onclick="cancelAppointment('${doc.id}')">Cancel</button>
                        <button class="btn btn-warning btn-sm" onclick="rescheduleAppointment('${doc.id}')">Reschedule</button>` : '' }
                    ${appointment.status === 'declined' ? 
                        `<button class="btn btn-info btn-sm" onclick="viewDeclineReason('${appointment.reason || "No reason provided"}')">View Reason</button>` : '' }
                </td>
            `;

            tableBody.appendChild(row);
        });
    }, (error) => {
        console.error("Error fetching appointments: ", error);
    });
}

// Reschedule appointment function (Improved version with Flatpickr and time slots)
window.rescheduleAppointment = function(appointmentId) {
    const modal = document.getElementById("rescheduleModal");
    const rescheduleForm = document.getElementById("rescheduleForm");
    const dateOfVisitInput = document.getElementById("dateOfVisit");
    const timeSlotsContainer = document.getElementById("timeSlotsContainer");
    const timeSlotsDiv = document.getElementById("timeSlots");

    // Open the modal
    modal.style.display = "block";

    // Initialize Flatpickr for date selection
    flatpickr("#dateOfVisit", {
        dateFormat: "Y-m-d",
        minDate: "today", // Disable past dates
        maxDate: new Date().fp_incr(6), // Allow selection of dates only within 7 days
        disableMobile: true, // Disable month/year browsing on mobile
        onChange: function(selectedDates) {
            if (selectedDates.length) {
                const selectedDate = selectedDates[0];
                const adjustedDate = new Date(selectedDate);
                adjustedDate.setDate(adjustedDate.getDate() + 1); // Adjust the date by 1 day
                const formattedDate = adjustedDate.toISOString().split('T')[0]; // Format to YYYY-MM-DD
                dateOfVisitInput.value = formattedDate; // Set adjusted date in input
                showAvailableTimeSlots(formattedDate); // Show available time slots for the adjusted date
            }
        }
    });

    // Function to show available time slots based on the selected date
    function showAvailableTimeSlots(date) {
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
            const formattedTime = time.toLocaleTimeString([], { hour: 'numeric', minute: 'numeric', hour12: true });
            timeSlots.push(formattedTime);
        }

        // Clear previous slots and create new ones
        timeSlotsContainer.innerHTML = "";
        timeSlots.forEach(slot => {
            const slotDiv = document.createElement("div");
            slotDiv.className = "time-slot";
            slotDiv.textContent = slot;

            // Add click event to each time slot
            slotDiv.addEventListener("click", function () {
                dateOfVisitInput.value = date + " " + slot;
                timeSlotsDiv.style.display = "none"; // Hide time slots after selection
            });

            timeSlotsContainer.appendChild(slotDiv);
        });
        timeSlotsDiv.style.display = "block"; // Show time slots
    }

    // Handle form submission
    rescheduleForm.onsubmit = function(event) {
        event.preventDefault();

        const newDateTime = dateOfVisitInput.value;

        if (!newDateTime) {
            alert("Please select both a date and a time.");
            return;
        }

        const appointmentRef = doc(db, "appointments", appointmentId);

        // Check if the appointment is still pending before rescheduling
        getDoc(appointmentRef).then((docSnap) => {
            if (docSnap.exists()) {
                const appointment = docSnap.data();
                if (appointment.status === 'pending') {
                    // Update appointment date and set status back to pending if it's a valid reschedule
                    updateDoc(appointmentRef, {
                        dateOfVisit: newDateTime, // Update the appointment date
                        status: 'pending'        // Reset status back to pending
                    }).then(() => {
                        alert("Appointment rescheduled successfully!");
                        closeModal(); // Close modal after success
                    }).catch((error) => {
                        console.error("Error rescheduling appointment: ", error);
                        alert("There was an error rescheduling your appointment.");
                    });
                } else {
                    alert("This appointment cannot be rescheduled as it is no longer pending.");
                }
            }
        }).catch((error) => {
            console.error("Error fetching appointment data: ", error);
            alert("There was an error fetching the appointment data.");
        });
    };
}

window.cancelAppointment = function(appointmentId) {
    const appointmentRef = doc(db, "appointments", appointmentId);

    getDoc(appointmentRef).then((docSnap) => {
        if (docSnap.exists()) {
            const appointment = docSnap.data();
            if (appointment.status === 'pending') {
                updateDoc(appointmentRef, {
                    status: 'canceled' // Mark status as canceled
                }).then(() => {
                    alert("Appointment canceled successfully!");
                }).catch((error) => {
                    console.error("Error canceling appointment: ", error);
                });
            } else {
                alert("This appointment cannot be canceled as it is not pending.");
            }
        }
    }).catch((error) => {
        console.error("Error fetching appointment data: ", error);
    });
};



// View decline reason function
function viewDeclineReason(reason) {
    alert(`Reason for Decline: ${reason}`);
}

// Call the fetch function on page load
window.onload = function () {
    if (sessionStorage.getItem("loggedInUserEmail")) {
        fetchUserAppointments();
    } else {
        console.log("User not logged in.");
    }
};
