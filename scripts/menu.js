// left menu display/hide

let menuList = document.getElementById('menu-list');
const menuBox = document.querySelector('.menu-box');

menuBox.addEventListener('click', function toggleMenu() {
    if(menuList.style.display === "none") {
        menuList.style.display = "block";
        menuList.style.transition = "0.6s";
        line1.style.transform= "translate(0, 10px) rotate(45deg)";
        line3.style.transform= "translate(0, -10px) rotate(-45deg)";
        line2.style.opacity = '0';
    }
    else {
        menuList.style.display = "none";
        menuList.style.transition = "0.6s";

        line1.style.transform= "translate(0, 0) rotate(0)";
        line3.style.transform= "translate(0, 0) rotate(0)";
        line2.style.opacity = '1';
    }
});

//changing color of menu icon

let menuLines = document.querySelectorAll('.line');
let line1 = document.querySelector('.line1');
let line2 = document.querySelector('.line2');
let line3 = document.querySelector('.line3');
menuBox.addEventListener('mouseover', () => {
    menuLines.style.backgroundColor = '#fff';
})

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

   