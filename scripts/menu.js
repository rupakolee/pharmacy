// user-panel display/hide

let userBtn = document.getElementById('user-btn');
let userPanel = document.querySelector('.user-panel');

userBtn.addEventListener('click', function toggleMenu() {
    if(userPanel.style.display === "none") {
        userPanel.style.display = "block";
    }
    else {
        userPanel.style.display = "none";
    }
});

   