/**
 * Created by a_atahujaev on 28.02.2018.
 */

function getClaimForHealth(input, id) {
    if (input.checked) {
        $.ajax({
            'method': 'get',
            'url': '/ajax/get-claim',
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
                console.log(data);
                if (data != null) {
                    $('#PassportSeria').val(data.PassportSeria);
                    $('#PassportNumber').val(data.PassportNumber);
                    $('#PINFL').val(data.PINFL);
                    $('#PassIssuedBy').val(data.PassIssuedBy);
                    $('#PhoneNumber').val(data.PhoneNumber);
                    $('#docclaimhealth-passissueddate').val(data.PassIssuedDate);
                    $('#docclaimhealth-passvaliditydate').val(data.PassValidityDate);
                    $('#SecondName').val(data.SecondName);
                    $('#FirstName').val(data.FirstName);
                    $('#Patronymic').val(data.Patronymic);
                    $('#region').val(data.RegionID);
                    $('#Address').val(data.Adress);
                    $('#GenderID').val(data.GenderID);
                    getDistricts(data.RegionID, '#district');
                    $('#district').val(data.DistrictID);
                }
            }
        });
    } else {
        $('#PassportSeria').val("");
        $('#PassportNumber').val("");
        $('#PINFL').val("");
        $('#PassIssuedBy').val("");
        $('#PhoneNumber').val("");
        $('#docclaimhealth-passissueddate').val("");
        $('#docclaimhealth-passvaliditydate').val("");
        $('#SecondName').val("");
        $('#FirstName').val("");
        $('#Patronymic').val("");
        $('#region').val("");
        $('#Address').val("");
        $('#GenderID').val("");
        $('#district').val("");
    }

}