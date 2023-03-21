
var head = document.getElementsByTagName('HEAD')[0];

var link = document.createElement('link');
link.rel = 'stylesheet';
link.type = 'text/css';


const prefersDarkMode = window.matchMedia("(prefers-color-scheme:dark)").matches;

var data = sessionStorage.getItem('theme');

if (data == null) {
    if (prefersDarkMode == true) {
        sessionStorage.setItem('theme', 'dark');
        data = 'dark';
    } else {
        sessionStorage.setItem('theme', 'light');
        data = 'light';
    }
}
if (data == 'dark') {
    link.href = 'css/dark.css';
}
if (data == "light") {
    link.href = 'css/light.css';
}
head.appendChild(link);

//sessionStorage.setItem('theme', 'light');

function switchtheme(el) {
    if (sessionStorage.getItem('theme') == 'light') {
        sessionStorage.setItem('theme', 'dark');
        link.href = 'css/dark.css';
        if(typeof el !== 'undefined') {
            el.children[0].classList.remove('fa-moon');
            el.children[0].classList.add('fa-sun');
        }
    } else {
        sessionStorage.setItem('theme', 'light');
        link.href = 'css/light.css';
        if(typeof el !== 'undefined') {
            el.children[0].classList.remove('fa-sun');
            el.children[0].classList.add('fa-moon');
        }
    }
}

window.onload = function() {
    var el = document.getElementById('switchtheme');
    if(el) {
        el.addEventListener('click', function() {
            switchtheme(el);
        });
        if(sessionStorage.getItem('theme') == 'dark') {
            el.children[0].classList.add('fa-sun');
        } else {
            el.children[0].classList.add('fa-moon');
        }
    }
}