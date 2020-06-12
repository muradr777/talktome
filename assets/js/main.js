'use strict';

document.addEventListener('DOMContentLoaded', function () {
    // on Form Submit
    var handleFormSubmit = function (e) {
        e.preventDefault();

        var request = "POST",
            url = "./ajax.php",
            xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var $res = this.responseText;

                document.querySelector('.wl-container').style.backgroundImage = "url(" + $res + ")";
            }
        }
        xhttp.open(request, url, true);
        xhttp.send();
    };

    document.getElementById('wl-create').addEventListener('submit', handleFormSubmit);
})