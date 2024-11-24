import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-app.js";
import { getFirestore, collection, getDocs, query, where, doc, getDoc } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-firestore.js";

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

// Review appointment function
// Review appointment function
async function reviewAppointment(appointmentId) {
    try {
        // Correct usage of Firestore document reference
        const docRef = doc(db, "appointments", appointmentId);
        const docSnapshot = await getDoc(docRef);

        if (docSnapshot.exists()) {
            const appointment = docSnapshot.data();

            // Populate modal fields with appointment data
            document.getElementById("ownerEmail").value = appointment.ownerEmail || '';
            document.getElementById("ContactNumber").value = appointment.contactNumber || '';
            document.getElementById("completeAdd").value = appointment.completeAdd || '';
            document.getElementById("ownerName").value = appointment.ownerName || '';
            document.getElementById("petName").value = appointment.petName || '';
            document.getElementById("petAge").value = appointment.petAge || '';
            document.getElementById("dateOfVisit").value = appointment.dateOfVisit || '';
            document.getElementById("petBreed").value = appointment.petBreed || '';
            document.getElementById("serviceType").value = appointment.serviceType || '';
            document.getElementById("chiefComplaint").value = appointment.chiefComplaint || '';
            document.getElementById("medicalConcerns").value = appointment.medicalConcerns || '';

            // Show the modal
            const reviewModal = new bootstrap.Modal(document.getElementById("reviewModal"));
            reviewModal.show();
        } else {
            console.log("No such document!");
        }
    } catch (error) {
        console.error("Error fetching appointment details: ", error);
    }
}

// Call the fetch function on page load
window.onload = fetchPendingAppointments;
