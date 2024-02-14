// left menu display/hide

let menuList = document.getElementById('menu-list');
const menuBtn = document.getElementById('menu-btn');

menuBtn.addEventListener('click', () => {
    if(menuList.style.display === "none") {
        menuList.style.display = "block";
    } else {
        menuList.style.display = "none"
    }
    console.log('clicked');
});

// user-panel display/hide

let userBtn = document.getElementById('user-btn');
let userPanel = document.querySelector('.user-panel');

userBtn.addEventListener('click', () => {
    if(userPanel.style.display === "none") {
        userPanel.style.display = "block";
    }
    else {
        userPanel.style.display = "none";
    }
    console.log('clicked');
});
   