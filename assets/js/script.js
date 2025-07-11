document.getElementById('userProfile').addEventListener('click', function (e) {
    e.stopPropagation();
    document.getElementById('profileDropdown').classList.toggle('d-block');
});

document.addEventListener('click', function () {
    document.getElementById('profileDropdown').classList.remove('d-block');
});
