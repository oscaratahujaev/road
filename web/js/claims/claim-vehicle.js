/**
 * Created by a_atahujaev on 28.02.2018.
 */
function getClaimForVehicle(input, id) {
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

                    $('#PersonStatus input[value="' + data.PersonStatusID + '"]').click();
                    // $('#PersonStatus').val(data.PersonStatusID);
                    // console.log(data.PassportSeria);
                    // console.log($('#PassportSeria').val());
                    $('#PassportSeria').val(data.PassportSeria);
                    $('#PassportNumber').val(data.PassportNumber);
                    $('#PINFL').val(data.PINFL);
                    $('#PassIssuedBy').val(data.PassIssuedBy);
                    $('#PhoneNumber').val(data.PhoneNumber);
                    $('#docclaimvehicle-passissueddate').val(data.PassIssuedDate);
                    $('#docclaimvehicle-passvaliditydate').val(data.PassValidityDate);
                    $('#docclaimvehicle-birthdate').val(data.BirthDate);
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
        $('#PhoneNumber').val('');
        $('#docclaimvehicle-passissueddate').val('');
        $('#docclaimvehicle-passvaliditydate').val('');
        $('#docclaimvehicle-birthdate').val('');
        $('#SecondName').val('');
        $('#FirstName').val('');
        $('#Patronymic').val('');
        $('#region').val('');
        $('#Address').val('');
        $('#GenderID').val('');
        $('#district').val('');
    }
}