/**
 * Created by a_atahujaev on 28.02.2018.
 */
function cashReceived(value = false) {
    value = parseInt(value);

    if (!value) {
        value = $('#cashReceivedId').find('input[type=radio]:checked').val();
        value = parseInt(value);
    }
    var box = $('.cashReceivedBox');

    if (value) {
        box.show();
    } else {
        box.hide();
    }
}

function insuranceReceived(value = "") {
    value = parseInt(value);

    if (!value) {
        value = $('#insuranceReceivedId').find('input[type=radio]:checked').val();
        value = parseInt(value);
    }
    var box = $('.insuranceReceivedBox');

    if (value) {
        box.show();
    } else {
        box.hide();
    }
}