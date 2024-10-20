document.addEventListener('DOMContentLoaded', function () { 
    const guardianForm = document.getElementById('guardian-form');
    const childForm = document.getElementById('child-form');
    const guardianMessage = document.getElementById('guardian-message');
    const childMessage = document.getElementById('child-message');
    const childRegistration = document.getElementById('child-registration');
    
    let guardianId = null; // Store guardian ID after registration

    // Guardian form submission
    guardianForm.addEventListener('submit', function (e) {
        e.preventDefault();
        
        const data = new FormData(guardianForm);
        
        fetch('/register-guardian', {
            method: 'POST',
            body: data,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(result => {
            guardianMessage.textContent = result.message;
            if (result.status) {
                guardianId = result.data.id; // Capture the guardian ID
                childRegistration.style.display = 'block'; // Show child registration form
            }
        })
        .catch(error => {
            guardianMessage.textContent = 'An error occurred.';
        });
    });

    // Child form submission
    childForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const data = new FormData(childForm);
        if (guardianId) {
            data.append('guardian_id', guardianId); // Include guardian_id in child registration
        }
        
        fetch('/register-child', {
            method: 'POST',
            body: data,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(result => {
            childMessage.textContent = result.message;
            if (result.status) {
                window.location.href = '/home'; 
            }
        })
        .catch(error => {
            childMessage.textContent = 'An error occurred.';
        });
    });
});
