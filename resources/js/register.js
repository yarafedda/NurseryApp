document.addEventListener('DOMContentLoaded', function () {
    // Handle form submission
    const form = document.getElementById('registration-form');
    form.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Collect form data
        const data = new FormData(form);

        // Send data to server via fetch or AJAX
        fetch('/api/register', {
            method: 'POST',
            body: data,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(result => {
            if (result.status) {
                // Successful registration
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').textContent = result.message;
            } else {
                // Show server-side validation errors
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').textContent = result.message || 'Registration failed.';
            }
        })
        .catch(error => {
            // Handle network or unexpected errors
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').textContent = 'An error occurred. Please try again.';
            console.error('Error:', error);
        });
    });
});
