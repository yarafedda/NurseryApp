
function toggleUserInfo() {
    var userInfo = document.getElementById('user-info');
    if (userInfo.style.display === 'block') {
        userInfo.style.display = 'none';
    } else {
        userInfo.style.display = 'block';
    }
};

document.addEventListener('DOMContentLoaded', function () {
    const profileIcon = document.querySelector('.fa-user-circle');
    profileIcon.addEventListener('click', toggleUserInfo);

    
    const menuBtn = document.getElementById('menu-btn');
    const navbar = document.querySelector('.navbar');
    if (menuBtn && navbar) {
                menuBtn.addEventListener('click', function () {
                    navbar.classList.toggle('active');
                });
            }
});


