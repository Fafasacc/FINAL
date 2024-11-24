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


    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const auth = getAuth();
    const db = getFirestore();

    
    // Function to display messages
    function showMessage(message, divId) {
        const messageDiv = document.getElementById(divId);
        if (messageDiv) {
            messageDiv.style.display = "block";
            messageDiv.innerHTML = message;
            messageDiv.style.opacity = 1;
            setTimeout(() => {
                messageDiv.style.opacity = 0;
            }, 5000);
        } else {
            console.error(`Element with ID '${divId}' not found.`);
        }
    }

    // Handle sign-up
    document.addEventListener('DOMContentLoaded', () => {
        const signUp = document.getElementById('submitSignUp');
        if (signUp) {
            signUp.addEventListener('click', (event) => {
                event.preventDefault();
                const email = document.getElementById('email').value.trim();
                const password = document.getElementById('Pass').value.trim();
                const name = document.getElementById('Username').value.trim();
                const phone = document.getElementById('Number').value.trim();

                if (email && password && name && phone) {
                    createUserWithEmailAndPassword(auth, email, password)
                        .then((userCredential) => {
                            const user = userCredential.user;

                            // Send verification email
                            sendEmailVerification(user)
                                .then(() => {
                                    showMessage('Account created successfully. Please verify your email.', 'signUpMessage');
                                     window.location.href = 'verify.php';
                                    
                                })
                                .catch((error) => {
                                    console.error("Error sending email verification", error);
                                    showMessage('Error sending verification email.', 'signUpMessage');
                                });

                            const userData = {
                                email: email,
                                name: name,
                                phone: phone,
                                password: password
                            };

                            const docRef = doc(db, "users", user.uid);
                            setDoc(docRef, userData)
                                .then(() => {
                                    console.log("User data saved successfully.");
                                })
                                .catch((error) => {
                                    console.error("Error writing document", error);
                                    showMessage('Error saving user data.', 'signUpMessage');
                                });
                        })
                        .catch((error) => {
                            const errorCode = error.code;
                            const errorMessage = error.message;
                            console.error(`Error [${errorCode}]: ${errorMessage}`);
                            if (errorCode === 'auth/email-already-in-use') {
                                showMessage('Email address already exists!', 'signUpMessage');
                            } else if (errorCode === 'auth/invalid-email') {
                                showMessage('Invalid email address.', 'signUpMessage');
                            } else if (errorCode === 'auth/weak-password') {
                                showMessage('Password is too weak.', 'signUpMessage');
                            } else {
                                showMessage('Unable to create user. Please check the information and try again.', 'signUpMessage');
                            }
                        });
                } else {
                    showMessage('Please fill in all the fields.', 'signUpMessage');
                }
            });
        }
    });

    // Handle sign-in
    // Handle sign-in
document.addEventListener('DOMContentLoaded', () => {
    const signIn = document.getElementById('submitSignIn');
    if (signIn) {
        signIn.addEventListener('click', (event) => {
            event.preventDefault();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();

            signInWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
        const user = userCredential.user;

        if (user.emailVerified) {
            showMessage('Login successful.', 'signInMessage');
            // Store the logged-in user's ID in localStorage
            localStorage.setItem('loggedInUserId', user.uid);

            // Store the logged-in user's email in sessionStorage
            sessionStorage.setItem('loggedInUserEmail', user.email);
          


            // Redirect to another page
            window.location.href = 'index.php'; // Target URL after successful login
        } else {
            showMessage('Please verify your email before logging in.', 'signInMessage');
            // Optionally, resend the verification email
            sendEmailVerification(user).catch((error) => {
                console.error("Error resending email verification", error);
            });
        }
    })
    .catch((error) => {
        const errorCode = error.code;
        if (errorCode === 'auth/wrong-password' || errorCode === 'auth/user-not-found') {
            showMessage('Incorrect email or password.', 'signInMessage');
        } else {
            showMessage('Error logging in.', 'signInMessage');
        }
    });
        });
    }
});


    /// RESET
    const reset = document.getElementById("reset");
    reset.addEventListener("click", function(event) {
    event.preventDefault(); // Prevent default link behavior
    const email = document.getElementById("email").value.trim();

    if (email) {
        sendPasswordResetEmail(auth, email)
            .then(() => {
                // Password reset email sent!
                showMessage('Password reset email sent. Please check your inbox.', 'signInMessage');
            })
            .catch((error) => {
                const errorCode = error.code;
                let errorMessage = 'An error occurred. Please try again.';
                
                if (errorCode === 'auth/invalid-email') {
                    errorMessage = 'Invalid email address.';
                } else if (errorCode === 'auth/user-not-found') {
                    errorMessage = 'No user found with this email address.';
                } else if (errorCode === 'auth/missing-email') {
                    errorMessage = 'Email address is required.';
                }

                showMessage(errorMessage, 'signInMessage');
                console.error(`Error [${errorCode}]: ${error.message}`);
            });
    } else {
        showMessage('Please enter your email address.', 'signInMessage');
    }
});



