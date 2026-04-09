// Validate only letters for name
function validateText(event) {
    let char = String.fromCharCode(event.which);

    if (!/[a-zA-Z ]/.test(char)) {
        event.preventDefault();
    }
}

// Email validation function
function validateEmail() {
    let email = document.getElementById("email").value;
    let message = document.getElementById("message");

    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if (!pattern.test(email)) {
        message.innerText = "Invalid Email!";
        message.style.color = "red";
        return false;
    } else {
        message.innerText = "Valid Email!";
        message.style.color = "green";
        return true;
    }
}

// Feedback validation
function validateFeedback() {
    let feedback = document.getElementById("feedback").value;

    if (feedback.length < 10) {
        document.getElementById("message").innerText = "Feedback too short!";
        document.getElementById("message").style.color = "red";
        return false;
    } else {
        document.getElementById("message").innerText = "";
        return true;
    }
}

// Final submit (double click event)
function submitForm() {
    let name = document.getElementById("name").value;
    let emailValid = validateEmail();
    let feedbackValid = validateFeedback();

    if (name === "" || !emailValid || !feedbackValid) {
        document.getElementById("message").innerText = "Please fill all fields correctly!";
        document.getElementById("message").style.color = "red";
    } else {
        document.getElementById("message").innerText = "Form Submitted Successfully!";
        document.getElementById("message").style.color = "green";
    }
}
