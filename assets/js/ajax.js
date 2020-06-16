'use strict';

document.addEventListener('DOMContentLoaded', function () {
    // Make action after response
    var changeBackground = function (imgUrl) {
        document.querySelector('.wl-container').style.backgroundImage = "url(" + imgUrl + ")";
    }

    // Send Ajax request
    var getImageUrl = function (e) {
        e.preventDefault();
        var request = "POST",
            url = "./ajax/getUrl.php",
            xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                changeBackground(this.responseText);
            }
        }

        xhttp.open(request, url, true);
        xhttp.send();

        return;
    };

    var addUrlToDatabase = function (e) {
        e.preventDefault();

        var request = "POST",
            url = "./ajax/uploadImage.php",
            xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            console.log('READY!');
        };

        xhttp.open(request, url, true);
        xhttp.send();
    };

    // Handle form submit
    var changeBgForm = document.getElementById('wl-create');
    var uploadImageForm = document.getElementById('updImgForm');

    if (changeBgForm != undefined)
        changeBgForm.addEventListener('submit', getImageUrl);
    if (uploadImageForm != undefined)
        // uploadImageForm.addEventListener('submit', addUrlToDatabase);
})