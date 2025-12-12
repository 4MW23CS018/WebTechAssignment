$(document).ready(function() {
    // Form submission handler
    $('#registrationForm').on('submit', function(e) {
        // Clear previous errors
        $('.error-message').text('');
        
        let isValid = true;
        
        // Validate Full Name
        const fullName = $('#fullName').val().trim();
        if (fullName === '') {
            $('#fullNameError').text('Please enter your full name');
            isValid = false;
        } else if (fullName.length < 3) {
            $('#fullNameError').text('Name must be at least 3 characters');
            isValid = false;
        }
        
        // Validate Email
        const email = $('#email').val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '') {
            $('#emailError').text('Please enter your email address');
            isValid = false;
        } else if (!emailRegex.test(email)) {
            $('#emailError').text('Please enter a valid email address');
            isValid = false;
        }
        
        // Validate Phone
        const phone = $('#phone').val().trim();
        const phoneRegex = /^[0-9]{10,15}$/;
        if (phone === '') {
            $('#phoneError').text('Please enter your phone number');
            isValid = false;
        } else if (!phoneRegex.test(phone)) {
            $('#phoneError').text('Please enter a valid phone number (10-15 digits)');
            isValid = false;
        }
        
        // Validate Date of Birth
        const dob = $('#dob').val();
        if (dob === '') {
            $('#dobError').text('Please select your date of birth');
            isValid = false;
        }
        
        // Validate Gender
        const gender = $('input[name="gender"]:checked').val();
        if (!gender) {
            $('#genderError').text('Please select your gender');
            isValid = false;
        }
        
        // Validate Address
        const address = $('#address').val().trim();
        if (address === '') {
            $('#addressError').text('Please enter your address');
            isValid = false;
        }
        
        // Validate Course
        const course = $('#course').val();
        if (course === '') {
            $('#courseError').text('Please select a course');
            isValid = false;
        }
        
        // Validate Terms
        const terms = $('#terms').is(':checked');
        if (!terms) {
            $('#termsError').text('You must agree to the terms and conditions');
            isValid = false;
        }
        
        // Prevent form submission if validation fails
        if (!isValid) {
            e.preventDefault();
            // Scroll to first error
            $('html, body').animate({
                scrollTop: $('.error-message:not(:empty)').first().parent().offset().top - 100
            }, 500);
        }
    });
    
    // Real-time validation on input
    $('input, textarea, select').on('blur', function() {
        const field = $(this);
        const fieldId = field.attr('id');
        const errorElement = $('#' + fieldId + 'Error');
        
        // Clear error when user starts typing
        if (field.val().trim() !== '') {
            errorElement.text('');
        }
    });
    
    // Clear radio button error when selected
    $('input[type="radio"]').on('change', function() {
        $('#genderError').text('');
    });
    
    // Clear checkbox error when checked
    $('#terms').on('change', function() {
        if ($(this).is(':checked')) {
            $('#termsError').text('');
        }
    });
});

