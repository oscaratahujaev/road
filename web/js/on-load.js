/**
 * Created by a_atahujaev on 27.02.2018.
 */
function refresh() {
    var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function () {
                div.style.display = "none";
            }, 100);
        }
    }
}

var id = 0;

function addAlertBox(type, message) {
    id++;
    var box_id = 'box_id' + id;
    var myDiv = '<div class="alert ' + type + '" style="display:none" id="' + box_id + '">' +
        '<span class="closebtn">&times;</span>' +
        message + '!' +
        '</div>';

    $('.alert-box').append(myDiv);


    $('#' + box_id).fadeIn(500);
    setTimeout(function () {
        $('#' + box_id).fadeOut(function () {
            $(this).remove();
        });
    }, 5000);
    refresh();
};

$(document).ready(function () {
    $('.loader').fadeOut();
});

