window.addEventListener('load', function () {
    var overlay = document.getElementById('loader');
    this.setTimeout(() => overlay.style.display = 'none', 2000)
});

document.addEventListener('DOMContentLoaded', function () {
    var overlay = document.getElementById('loader');
    overlay.style.display = 'flex';
});

function goback() {
    window.history.back();
}