    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-app.js";
    import { getAuth,sendPasswordResetEmail, createUserWithEmailAndPassword, signInWithEmailAndPassword, sendEmailVerification } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-auth.js";
    import { getFirestore, setDoc, doc } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-firestore.js";
    
    // Your Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyCr9Hpr7nYKiUCsmou8_L4moyx8KIJnopM",
    authDomain: "vetease-91e29.firebaseapp.com",
    projectId: "vetease-91e29",
    storageBucket: "vetease-91e29.appspot.com",
    messagingSenderId: "13605053466",
    appId: "1:13605053466:web:e487ab8b3618f9ba7d9da3"
};

// Get logged-in user's UID from localStorage (since you're using localStorage now)
const loggedInUserId = localStorage.getItem('loggedInUserId');

// Check if the logged-in user ID exists
if (loggedInUserId) {
    // Fetch user details from Firebase based on the logged-in user's UID
    const userRef = firebase.firestore().collection('users').doc(loggedInUserId);

    userRef.get()
        .then((doc) => {
            if (doc.exists) {
                // Retrieve user data from Firestore document
                const user = doc.data();
                const userName = user.name;
                const userPhone = user.phone;

                // Store user details in localStorage for later use
                localStorage.setItem('userName', userName);
                localStorage.setItem('userPhone', userPhone);

                // Log the data to the console before sending it to the server
                console.log("Sending user details to server:", {
                    loggedInUserId: loggedInUserId,
                    name: userName,
                    phone: userPhone
                });

                // Create a new XMLHttpRequest object
                const xhr = new XMLHttpRequest();

                // Configure the request (POST method, URL to send data to)
                xhr.open('POST', 'fetch_rrecord.php', true);
                xhr.setRequestHeader('Content-Type', 'application/json');

                // Define what happens when the request is completed
                xhr.onload = function () {
                    // Check if the status code is between 200 and 299 (successful)
                    if (xhr.status >= 200 && xhr.status < 300) {
                        // Parse the response if the status is OK (200-299)
                        const response = JSON.parse(xhr.responseText);
                        console.log("Server Response:", response);

                        // Show confirmation message if the request was successful
                        alert("User details successfully sent to the server.");
                    } else {
                        // If the response status is not OK, log an error
                        console.error("Error: Failed to send data to the backend. Status:", xhr.status);
                        
                        // Show error message
                        alert("Failed to send user details. Please try again.");
                    }
                };

                // Define what happens in case of an error
                xhr.onerror = function () {
                    console.error("Error: Request failed.");

                    // Show error message in case of network failure
                    alert("An error occurred while sending the request. Please check your connection.");
                };

                // Send the data as a JSON object
                const requestData = {
                    name: userName,
                    phone: userPhone
                };

                xhr.send(JSON.stringify(requestData));

            } else {
                // Handle case where document doesn't exist
                console.error("Error: User data not found in Firebase.");
                alert("User data not found in Firebase.");
            }
        })
        .catch((error) => {
            // Handle errors from Firebase document retrieval
            console.error("Error getting user data from Firebase:", error);
            alert("An error occurred while retrieving user data from Firebase.");
        });
} else {
    // Handle case where logged-in user ID is not found in localStorage
    console.error("Error: Logged-in user ID not found in localStorage.");
    alert("Logged-in user ID not found in localStorage.");
}
