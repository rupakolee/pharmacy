// left menu display/hide

let menuList = document.getElementById('menu-list');
const menuBtn = document.getElementById('menu-btn');

menuBtn.addEventListener('click', toggleMenu(menuList));

// user-panel display/hide

let userBtn = document.getElementById('user-btn');
let userPanel = document.querySelector('.user-panel');

userBtn.addEventListener('click', toggleMenu(userPanel));

// function defn

function toggleMenu(menu) {
    if(menu.style.display === "none") {
        menu.style.display = "block";
    }
    else {
        menu.style.display = "none";
    }
}
   