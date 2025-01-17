
const body = document.querySelector("body");
const sidebar = document.querySelector(".sidebar");
const toggle = document.querySelector(".toggle");
const modeSwitch = document.querySelector(".toggle-switch");
const modeText = document.querySelector(".mode-text");
const searchBtn = document.querySelector(".bx-search");

modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");
    if (body.classList.contains("dark")) {
        modeText.innerText = " Light Mode ";
    } else {
        modeText.innerText = " Dark Mode ";
    }
});

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});

// searchBtn.addEventListener("click", () => {
//     sidebar.classList.remove("close");
// });
