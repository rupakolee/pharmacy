// left menu display/hide

let menuList = document.getElementById('menu-list');
const menuBox = document.querySelector('.menu-box');

menuBox.addEventListener('click', function toggleMenu() {
    if(menuList.style.display === "none") {
        menuList.style.display = "block";
    }
    else {
        menuList.style.display = "none";
    }
});

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

   