document.addEventListener("DOMContentLoaded", function() {
    const passwordField = document.getElementById('password');
    const showHideButton = document.querySelector('.show-hide .show');

    showHideButton.addEventListener('click', function() {
        // Toggle between password and text field types
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            showHideButton.textContent = ''; // Update the button text to 'Hide'
        } else {
            passwordField.type = 'password';
            showHideButton.textContent = ''; // Update the button text to 'Show'
        }
    });
});
