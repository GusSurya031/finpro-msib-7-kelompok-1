const nav = document.querySelector('nav');
const btnNav = document.querySelector('.btn-nav');
const navItems = document.querySelector('.nav-items');
const navLinks = document.querySelectorAll('.nav-links');

window.addEventListener('scroll', function () {
    const scrollHeight = window.scrollY;
    if (scrollHeight > 50) {
        nav.classList.add('bg-black');
        navItems.classList.add('bg-black');
    } else {
        nav.classList.remove('bg-black');
        navItems.classList.remove('bg-black');
    }
});

navLinks.forEach(link => {
    link.addEventListener('click', function (e) {
            navLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        }
    )
});

btnNav.addEventListener('click', function () {
        if (navItems.classList.contains('hidden')) {
            navItems.classList.remove('hidden');
            navItems.classList.add('absolute', 'top-full', 'left-0', 'w-full', 'text-center', 'p-3', 'text-lg', 'gap-2');
        } else {
            navItems.classList.add('hidden');
            navItems.classList.remove('absolute', 'top-full', 'left-0', 'w-full', 'text-center', 'p-3', 'text-lg', 'gap-2');
        }
    }
);

function setDarkMode() {
    document.documentElement.classList.add('dark');
    document.getElementById('home').classList.remove('light-bg');
    document.getElementById('home').classList.add('dark-bg');
    localStorage.setItem('theme', 'dark');
    document.getElementById('light-btn').style.display = 'flex';
    document.getElementById('dark-btn').style.display = 'none';
}

function setLightMode() {
    document.documentElement.classList.remove('dark');
    document.getElementById('home').classList.remove('dark-bg');
    document.getElementById('home').classList.add('light-bg');
    localStorage.setItem('theme', 'light');
    document.getElementById('dark-btn').style.display = 'flex';
    document.getElementById('light-btn').style.display = 'none';
}

window.onload = function () {
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
        document.getElementById('home').classList.remove('light-bg');
        document.getElementById('home').classList.add('dark-bg');
        document.getElementById('light-btn').style.display = 'flex';
        document.getElementById('dark-btn').style.display = 'none';
    } else {
        document.documentElement.classList.remove('dark');
        document.getElementById('home').classList.remove('dark-bg');
        document.getElementById('home').classList.add('light-bg');
        document.getElementById('dark-btn').style.display = 'flex';
        document.getElementById('light-btn').style.display = 'none';
    }
};