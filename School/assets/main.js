let menu = document.querySelector('.menu-icon');
menu.onclick = () =>{
    menu.classList.toggle("move");
}

function validform() {
    // Get form values
    var phone = document.getElementById('phone').value;
    var password = document.getElementById('password').value;
    var cpassword = document.getElementById('cpassword').value;

    // Validate phone number (must be 10 digits and numeric)
    var phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phone)) {
        alert("Phone number must be a 10-digit number.");
        return false;
    }

    // Validate password (must contain at least one uppercase letter, one lowercase letter, one special character, and be more than 8 characters long)
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
    if (!passwordRegex.test(password)) {
        alert("Password must contain at least one uppercase letter (A-Z), one lowercase letter (a-z), one special character, and must be more than 8 characters long.");
        return false;
    }

    // Validate that password and confirm password match
    if (password !== cpassword) {
        alert("Password and Confirm Password do not match.");
        return false;
    }

    // If all validations pass, allow the form to submit
    return true;
}