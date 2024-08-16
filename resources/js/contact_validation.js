document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('SpectrumStudioContactForm');

    form.addEventListener('submit', function (e) {
        let valid = true;

        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(function (el) {
            el.textContent = '';
        });

        // Name validation
        const name = document.getElementById('name');
        if (name.value.trim() === '') {
            valid = false;
            document.getElementById('nameError').textContent = 'Please enter your name.';
        }

        // Email validation
        const email = document.getElementById('email');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email.value.trim())) {
            valid = false;
            document.getElementById('emailError').textContent = 'Please enter a valid email address.';
        }

        // Message validation
        const message = document.getElementById('message');
        if (message.value.trim() === '') {
            valid = false;
            document.getElementById('messageError').textContent = 'Please enter your message.';
        }

        // Terms and conditions validation
        const terms = document.getElementById('terms');
        if (!terms.checked) {
            valid = false;
            document.getElementById('termsError').textContent = 'You must agree to the terms and conditions.';
        }

        // If any validation fails, prevent form submission
        if (!valid) {
            e.preventDefault();
        }
    });
});