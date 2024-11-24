// Import Firebase functions
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-app.js";
import { getFirestore, doc, getDoc, updateDoc } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-firestore.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-auth.js";

// Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyCr9Hpr7nYKiUCsmou8_L4moyx8KIJnopM",
  authDomain: "vetease-91e29.firebaseapp.com",
  databaseURL: "https://vetease-91e29-default-rtdb.asia-southeast1.firebasedatabase.app",
  projectId: "vetease-91e29",
  storageBucket: "vetease-91e29.appspot.com",
  messagingSenderId: "13605053466",
  appId: "1:13605053466:web:e487ab8b3618f9ba7d9da3"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);
const auth = getAuth(app);

// Function to fetch and display user data
async function fetchUserData() {
  try {
    const userId = sessionStorage.getItem('loggedInUserId') || localStorage.getItem('loggedInUserId');
    if (!userId) {
      console.error("No user ID found in session or local storage.");
      return;
    }

    const userDocRef = doc(db, "users", userId);
    const userDoc = await getDoc(userDocRef);

    if (userDoc.exists()) {
      const userData = userDoc.data();
      
      
      document.getElementById('name').value = userData.name || '';
      document.getElementById('contact').value = userData.phone || '';
      document.getElementById('address').value = userData.address || '';
      document.getElementById('email').value = userData.email || ''; // Display only, no update functionality
    } else {
      console.error("No user document found.");
    }
  } catch (error) {
    
  }
}

// Function to enable editing of the fields
function enableEdit() {
  document.getElementById('name').disabled = false;
  document.getElementById('contact').disabled = false;
  document.getElementById('address').disabled = false;

  document.getElementById('edit-btn').classList.add('d-none');
  document.getElementById('save-btn').classList.remove('d-none');
  document.getElementById('cancel-btn').classList.remove('d-none');
}

// Function to save changes made by the user
async function saveChanges() {
  try {
    const userId = sessionStorage.getItem('loggedInUserId') || localStorage.getItem('loggedInUserId');
    if (!userId) {
      console.error("No user ID found in session or local storage.");
      return;
    }

    const userDocRef = doc(db, "users", userId);
    const updatedUserData = {
      name: document.getElementById('name').value,
      phone: document.getElementById('contact').value,
      address: document.getElementById('address').value
    };

    await updateDoc(userDocRef, updatedUserData);
    console.log("User data updated successfully.");
    cancelEdit(); // Reset fields and buttons
  } catch (error) {
  
  }
}

// Function to cancel editing and reset the fields
function cancelEdit() {
  document.getElementById('name').disabled = true;
  document.getElementById('contact').disabled = true;
  document.getElementById('address').disabled = true;

  document.getElementById('edit-btn').classList.remove('d-none');
  document.getElementById('save-btn').classList.add('d-none');
  document.getElementById('cancel-btn').classList.add('d-none');

  // Refresh user data to show original values
  fetchUserData();
}

// Initialize the display of user data on page load
document.addEventListener('DOMContentLoaded', fetchUserData);

// Event listeners for buttons
document.getElementById('edit-btn').addEventListener('click', enableEdit);
document.getElementById('save-btn').addEventListener('click', saveChanges);
document.getElementById('cancel-btn').addEventListener('click', cancelEdit);
