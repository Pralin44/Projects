function validateEmail() {
    // Get the email input element
    var emailInput = document.getElementById("email");

    // Regular expression for email validation
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    // Test if the input value matches the email pattern
    if (!emailPattern.test(emailInput.value)) {
        alert("Invalid email address. Please enter a valid email.");
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}