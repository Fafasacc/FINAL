import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-app.js";
import { getFirestore, collection, getDocs, query, where, doc, getDoc, updateDoc } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-firestore.js";

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






// Fetch pending appointments
async function fetchPendingAppointments() {
    const appointmentsRef = collection(db, "appointments");
    const q = query(appointmentsRef, where("status", "==", "pending"));

    try {
        const querySnapshot = await getDocs(q);
        const appointmentList = document.getElementById('appointment-list');
        appointmentList.innerHTML = ""; // Clear existing appointments

        querySnapshot.forEach((doc) => {
            const appointment = doc.data();
            const listItem = document.createElement('tr');

            listItem.innerHTML = `
                <td>${appointment.ownerName || 'N/A'}</td>
                <td>${appointment.dateOfVisit || 'N/A'}</td>
                <td>${appointment.serviceType || 'N/A'}</td>
                <td>${appointment.status || 'N/A'}</td>
                <td>
                    <button class="btn btn-info" onclick="reviewAppointment('${doc.id}')">Review</button>
                    <button class="btn btn-success" onclick="approveAppointment('${doc.id}')">Approve</button>
                
                </td>
            `;
            appointmentList.appendChild(listItem);
        });
    } catch (error) {
        console.error("Error fetching appointments: ", error);
    }
}







// Approve the appointment
window.approveAppointment = async function (appointmentId) {
    const appointmentRef = doc(db, "appointments", appointmentId);

    try {
        // Update the appointment status to "approved"
        await updateDoc(appointmentRef, {
            status: "approved"
        });

        // Reload the page to reflect the changes
        location.reload();
    } catch (error) {
        console.error("Error approving appointment: ", error);
    }
};







// Decline appointment function
window.declineAppointment = async function (appointmentId) {
    const declineReason = document.getElementById("declineReason").value; // Assuming there's an input for decline reason

    if (!declineReason) {
        alert("Please provide a reason for declining the appointment.");
        return;
    }

    const appointmentRef = doc(db, "appointments", appointmentId);

    try {
        // Update the appointment status to "declined" and set the reason
        await updateDoc(appointmentRef, {
            status: "declined",
            reason: declineReason // Assuming you want to store the reason
        });

        alert("Appointment declined successfully.");
        
        fetchPendingAppointments(); 
        
        // Refresh the appointment list
    } catch (error) {
        console.error("Error declining appointment:", error);
        alert("Failed to decline appointment: " + error.message);
    }
};




// Function to parse the dateOfVisit string to a Date object
function parseDate(dateString) {
    // Convert "2024-10-30 9:30 AM" to a Date object
    const [datePart, timePart] = dateString.split(' ');
    const [year, month, day] = datePart.split('-').map(Number);
    const [time, modifier] = timePart.split(' ');
    let [hour, minute] = time.split(':').map(Number);

    // Convert hour to 24-hour format
    if (modifier === 'PM' && hour !== 12) {
        hour += 12;
    } else if (modifier === 'AM' && hour === 12) {
        hour = 0;
    }

    return new Date(year, month - 1, day, hour, minute);
}

// Fetch approved appointments for today and populate the table
async function fetchApprovedAppointments() {
    const appointmentsRef = collection(db, "appointments");

    // Get today's date and define start and end of the day
    const today = new Date();
    const startOfDay = new Date(today.getFullYear(), today.getMonth(), today.getDate());
    const endOfDay = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1); // Tomorrow's date

    console.log("Start of Day:", startOfDay);
    console.log("End of Day:", endOfDay);

    try {
        const querySnapshot = await getDocs(appointmentsRef);
        const scheduleList = document.getElementById('schedule-list');
        scheduleList.innerHTML = ""; // Clear existing schedules

        // Filter appointments for today
        querySnapshot.forEach((doc) => {
            const appointment = doc.data();
            const dateOfVisitDate = parseDate(appointment.dateOfVisit); // Convert to Date object

            // Check if the date of visit falls within today
            if (appointment.status === "approved" && dateOfVisitDate >= startOfDay && dateOfVisitDate < endOfDay) {
                const listItem = document.createElement('tr');
                
                // Display the time from the dateOfVisit instead of appointment.time
                const appointmentTime = appointment.dateOfVisit.split(' ')[1] + " " + appointment.dateOfVisit.split(' ')[2]; // Extracting "8:00 AM"
                const ownerName = appointment.ownerName || 'N/A'; // Owner's name
                const serviceType = appointment.serviceType || 'N/A'; // Service type

                listItem.innerHTML = `
                    <td>${appointmentTime || 'N/A'}</td>
                    <td>${ownerName}</td>
                    <td>${serviceType}</td>
                `;
                scheduleList.appendChild(listItem);
            }
        });
    } catch (error) {
        console.error("Error fetching approved appointments: ", error);
    }
}

// Call the function to fetch and display approved appointments









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

            // Set the appointment ID in the hidden input field
            document.getElementById("appointmentId").value = appointmentId;

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

// Call the fetch function on page load
window.onload = async function () {
    await fetchPendingAppointments();
    await fetchApprovedAppointments();
};
