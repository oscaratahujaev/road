/**
 * Created by a_atahujaev on 28.02.2018.
 */

function isOwner(input, id) {
    if (input.checked) {
        $.ajax({
            'method': 'get',
            'url': '/ajax/get-resp-person',
            'data': {id: id},
            'beforeSend': function () {
                $('.loader').fadeIn();
            },
            'error': function () {
                $('.loader').fadeOut();
            },
            'success': function (data) {
                $('.loader').fadeOut();

                data = JSON.parse(data);
                if (data != null) {
                    $('#PassportSeria').val(data.PassportSeria);
                    $('#PassportNumber').val(data.PassportNumber);
                    $('#PINFL').val(data.PINFL);
                    $('#PhoneNumber').val(data.PhoneNumber);
                    $('#SecondName').val(data.SecondName);
                    $('#FirstName').val(data.FirstName);
                    $('#Patronymic').val(data.Patronymic);
                    $('#Address').val(data.Adress);
                }
            }
        });
    } else {
        $('#PassportSeria').val("");
        $('#PassportNumber').val("");
        $('#PINFL').val("");
        $('#PhoneNumber').val('');
        $('#SecondName').val('');
        $('#FirstName').val('');
        $('#Patronymic').val('');
        $('#Address').val('');
    }
}