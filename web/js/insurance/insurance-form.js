//first stem  toggle individual and entity

$(".field-docinsuranceform-personstatusid input").on('click',
    function () {
        var typeOfPerson = $('.field-docinsuranceform-personstatusid input[type=radio]:checked').val();
        var blockOne = $("#entity");
        var blockTwo = $("#individual");
        togglePersons(typeOfPerson, blockOne, blockTwo);
    });

// toggle driver types
$('.field-docinsuranceform-driverstatusid input').on('click',
    function () {
        var typeOfDriver = $('.field-docinsuranceform-driverstatusid input[type=radio]:checked').val();
        var blockOne = $("#driver-entity");
        var blockTwo = $("#driver-individual");
        togglePersons(typeOfDriver, blockOne, blockTwo);
    }
);

//toggle fizlitso and yur litso
function togglePersons(typeOfPerson, blockOne, blockTwo) {

    if (typeOfPerson == 2) {
        blockOne.addClass('block');
        blockOne.removeClass('hidden');
        blockTwo.addClass('hidden');
        blockTwo.removeClass('block');
    } else {
        blockOne.addClass('hidden');
        blockOne.removeClass('block');
        blockTwo.addClass('block');
        blockTwo.removeClass('hidden');
    }
}


var countrySelect = $("#docinsuranceform-countryid");

//get all regions
var childRegionDropdown = $("#docinsuranceform-regionid");
countrySelect.on("change", function () {
    getData(this.value, "/entity/ref-region/index", childRegionDropdown);
});


//get all districts
var childDistrictDropdown = $("#docinsuranceform-districtid");
childRegionDropdown.on('change', function () {
    getData(this.value, "/entity/ref-district/index", childDistrictDropdown);
});

//get drive districts
var driveRegionDropdown = $("#docinsuranceform-useterritoryregionid");
var driveDistrictDropdown = $("#docinsuranceform-useterritorydistrictid");
driveRegionDropdown.on('change', function () {
    getData(this.value, "/entity/ref-district/index", driveDistrictDropdown);
});
// get data works for regions, countries and districts
function getData(id, url, select, defaultValue=null) {
    var arraOfdata = [];
    select.find('option:not(:first)').remove();
    $.ajax({
        url: url,
        type: "GET",
        data: {id: id},
        success: function (data) {
            $('.loader').fadeOut();

            if (id != '') {
                arraOfdata = JSON.parse(data);
                arraOfdata.forEach(function (item) {
                    select.append('<option value=' + item.ID + '>' + item.Name + '</option>')
                });
            }
            if (defaultValue) {
                select.val(defaultValue);
            }
        },
        'beforeSend': function () {
            $('.loader').fadeIn();
        },
        'error': function () {
            $('.loader').fadeOut();
        }

    });
}

//get passport details of the person who giving claim
$("#get-data-button").on('click', function () {
    getPassportData();
});
function getPassportData() {

    var pinfl = $("#docinsuranceform-pinfl").val();
    var passSeria = $("#docinsuranceform-passportseria").val();
    var passNumber = $("#docinsuranceform-passportnumber").val();
    var passport = passSeria + passNumber;
    $.ajax({
        url: "/api/ajax/person",
        data: {
            "pinfl": pinfl,
            "passport": passport
        },
        dataType: "json",
        type: "GET",
        timeout: 5000,
        beforeSend: function (xhr) {
            // xhr.setRequestHeader('Authorization', 'Bearer ' + access_token);
            $('.loader').fadeIn();

        },
        success: function (data) {
            $('.loader').fadeOut();
            if (data != "") {
                $("#docinsuranceform-firstname").val(data.name_latin);
                $("#docinsuranceform-secondname").val(data.surname_latin);
                $("#docinsuranceform-patronymic").val(data.patronym_latin);
                $("#docinsuranceform-passissueddate").val(data.date_begin_document);
                $("#docinsuranceform-passvaliditydate").val(data.date_end_document);
                $("#docinsuranceform-passissuedby").val(data.doc_give_place);
                $("#docinsuranceform-genderid").val(data.sex);
                $("#docinsuranceform-birthdate").val(data.birth_date);
                addAlertBox('success', 'Данные успешно получены');
            } else {
                addAlertBox('danger', 'Произошла ошибка при получении данных. Проверьте данные!');
            }
        },
        error: function () {
            $('.loader').fadeOut();
            addAlertBox('danger', 'Произошла ошибка при получении данных. Проверьте данные!');
        }
    });
}

//get details of the organization of the claimer
$('#entityDataButton').click(function () {
    getOrgDetails();
});
function getOrgDetails() {

    var inn = $("#docinsuranceform-inn").val();
    $.ajax({
        url: "/api/ajax/origin",
        data: {
            "inn": inn,
        },
        dataType: "json",
        type: "GET",
        timeout: 6000,
        beforeSend: function (xhr) {
            // xhr.setRequestHeader('Authorization', 'Bearer ' + access_token);
            $('.loader').fadeIn();
        },
        success: function (data) {
            $('.loader').fadeOut();
            if (data != "") {
                $("#docinsuranceform-orgname").val(data.name);
                $("#docinsuranceform-regcertificatenumb").val(data.reg_number);
                $("#docinsuranceform-regcertificateissuedate").val(data.reg_date);
                $("#docinsuranceform-postaddress").val(data.email);
                addAlertBox('success', 'Данные успешно получены');
            } else {
                addAlertBox('danger', 'Произошла ошибка при получении данных. Проверьте данные!');
            }
        },
        error: function () {
            $('.loader').fadeOut();
            addAlertBox('danger', 'Произошла ошибка при получении данных. Проверьте данные!');
        }
    });
}

$("#get-driver-data-button").on('click', function () {
    getDriverPassportData();
});
//get driver data
function getDriverPassportData() {
    var pinfl = $("#docinsuranceform-driverpinfl").val();
    var passSeria = $("#docinsuranceform-driverpassportseria").val();
    var passNumber = $("#docinsuranceform-driverpassnumber").val();
    var passport = passSeria + passNumber;

    $.ajax({
        url: "/api/ajax/person",
        data: {
            "pinfl": pinfl,
            "passport": passport
        },
        dataType: "json",
        type: "GET",
        timeout: 5000,
        beforeSend: function (xhr) {
            // xhr.setRequestHeader('Authorization', 'Bearer ' + access_token);
            $('.loader').fadeIn();
        },
        success: function (data) {
            $('.loader').fadeOut();
            if (data != "") {
                $("#docinsuranceform-driverfirstname").val(data.name_latin);
                $("#docinsuranceform-driversecondname").val(data.surname_latin);
                $("#docinsuranceform-driverpatronymic").val(data.patronym_latin);
                $("#docinsuranceform-driverpassissueddate").val(data.date_begin_document);
                $("#docinsuranceform-driverpassvaliditydate").val(data.date_end_document);
                $("#docinsuranceform-driverpassissuedby").val(data.doc_give_place);
                // $("#docinsuranceform-genderid").val(data.sex);
                $("#docinsuranceform-driverbirthdate").val(data.birth_date);
                addAlertBox('success', 'Данные успешно получены');
            } else {
                addAlertBox('danger', 'Произошла ошибка при получении данных. Проверьте данные!');
            }
        },
        error: function () {
            addAlertBox('danger', 'Произошла ошибка при получении данных. Проверьте данные!');
            $('.loader').fadeOut();
        }
    });
}

$("#get-driver-org-details").on('click', function () {
    getDriverOrgDetails();
});

function getDriverOrgDetails() {
    var inn = $("#docinsuranceform-driverorginn").val();
    $.ajax({
        url: "/api/ajax/origin",
        data: {
            "inn": inn,
        },
        dataType: "json",
        type: "GET",
        timeout: 6000,
        beforeSend: function (xhr) {
            // xhr.setRequestHeader('Authorization', 'Bearer ' + access_token);
            $('.loader').fadeIn();
        },
        success: function (data) {
            $('.loader').fadeOut();
            if (data != null) {
                $("#docinsuranceform-driverorgname").val(data.name);
                $("#docinsuranceform-driverorgregcertificatenumb").val(data.reg_number);
                $("#docinsuranceform-driverorgregcertificateissuedate").val(data.reg_date);
                $("#docinsuranceform-driverorgpostaddress").val(data.email);
                addAlertBox('success', 'Данные успешно получены');
            } else {
                addAlertBox('danger', 'Произошла ошибка при получении данных. Проверьте данные!');
            }
        },
        error: function () {
            $('.loader').fadeOut();
            addAlertBox('danger', 'Произошла ошибка при получении данных. Проверьте данные!');
        }
    });

}


// fill automatically driver info if claimer is driver
$('#docinsuranceform-applicantisowner').click(function () {

    if ($(this).is(":checked")) {
        var radioButtons = $("#docinsuranceform-personstatusid input");
        for (var x = 0; x < radioButtons.length; x++) {
            if (radioButtons[x].checked) {
                $('#docinsuranceform-driverstatusid input[value=' + radioButtons[x].value + ']').click();
                $('#docinsuranceform-driverstatusid input[value=' + radioButtons[x].value + ']').click();
            }
        }
        $('#docinsuranceform-driverpinfl').val($('#docinsuranceform-pinfl').val());
        $('#docinsuranceform-driverpassportseria').val($('#docinsuranceform-passportseria').val());
        $('#docinsuranceform-driverpassnumber').val($('#docinsuranceform-passportnumber').val());
        $('#docinsuranceform-driverpassissuedby').val($('#docinsuranceform-passissuedby').val());
        $('#docinsuranceform-driverpassissueddate').val($('#docinsuranceform-passissueddate').val());
        $('#docinsuranceform-driverpassvaliditydate').val($('#docinsuranceform-passvaliditydate').val());
        $('#docinsuranceform-driversecondname').val($('#docinsuranceform-secondname').val());
        $('#docinsuranceform-driverfirstname').val($('#docinsuranceform-firstname').val());
        $('#docinsuranceform-driverpatronymic').val($('#docinsuranceform-patronymic').val());
        $('#docinsuranceform-driverbirthdate').val($('#docinsuranceform-birthdate').val());


        $('#docinsuranceform-driverorginn').val($('#docinsuranceform-inn').val());
        $('#docinsuranceform-driverorgname').val($('#docinsuranceform-orgname').val());
        $('#docinsuranceform-driverorgregcertificatenumb').val($('#docinsuranceform-regcertificatenumb').val());
        $('#docinsuranceform-driverorgregcertificateissuedate').val($('#docinsuranceform-regcertificateissuedate').val());
        $('#docinsuranceform-driverorgbankmfo').val($('#docinsuranceform-bankmfo').val());
        $('#docinsuranceform-driverorgcheckingaccount').val($('#docinsuranceform-checkingaccount').val());
        $('#docinsuranceform-driverorgpostaddress').val($('#docinsuranceform-postaddress').val());
        $('#docinsuranceform-driverorgphonenumber').val($('#docinsuranceform-orgphonenumber').val());
    } else {
        $('#docinsuranceform-driverpinfl').val("");
        $('#docinsuranceform-driverpassportseria').val("");
        $('#docinsuranceform-driverpassnumber').val('');
        $('#docinsuranceform-driverpassissuedby').val('');
        $('#docinsuranceform-driverpassissueddate').val('');
        $('#docinsuranceform-driverpassvaliditydate').val('');
        $('#docinsuranceform-driversecondname').val('');
        $('#docinsuranceform-driverfirstname').val('');
        $('#docinsuranceform-driverpatronymic').val('');
        $('#docinsuranceform-driverbirthdate').val('');


        $('#docinsuranceform-driverorginn').val('');
        $('#docinsuranceform-driverorgname').val('');
        $('#docinsuranceform-driverorgregcertificateissuedate').val('');
        $('#docinsuranceform-driverorgbankmfo').val('');
        $('#docinsuranceform-driverorgcheckingaccount').val('');
        $('#docinsuranceform-driverorgpostaddress').val('');
        $('#docinsuranceform-driverorgphonenumber').val('');

    }

});

$('#docinsuranceform-driversnumberrestriction').click(function () {
    var isLimited = $(this).find('input[type=radio]:checked').val();
    isLimited = parseInt(isLimited);

    var box = $('#allowedPeople');
    if (isLimited) {
        box.show();
    } else {
        box.hide();
    }
});

// Срок заключения договора
$('#seasonalPolis').hide();
$('#foreignerPolis').hide();
$('#docinsuranceform-contracttermconclusionid').on('change', function () {
    var value = $(this).val();

    if (value == 2) {
        $('#seasonalPolis').show();
        $('#foreignerPolis').hide();
    } else if (value == 3) {
        $('#seasonalPolis').hide();
        $('#foreignerPolis').show();
    } else {
        $('#seasonalPolis').hide();
        $('#foreignerPolis').hide();
    }

});

// Рассчитывание страховой премии

$('#calculateBtn').click(function () {
    var id = $('#form-id').text();
    id = parseInt(id);
    $(this).remove();
    $.ajax({
        url: '/ajax/calculate-insurance',
        type: "GET",
        data: {id: id},
        success: function (data) {
            $('.loader').fadeOut();

            var result = JSON.parse(data);
            if (result.response) {
                $('#insuranceValue').text(result.sum);
                addAlertBox('success', 'Сумма успешно рассчитана!');
            } else {
                addAlertBox('danger', 'Произошла ошибка!');
            }
            console.log(result);

        },
        'beforeSend': function () {
            $('.loader').fadeIn();
        },
        'error': function () {
            $('.loader').fadeOut();
            addAlertBox('danger', 'Произошла ошибка!');
        }
    });
});

$('#calculateBtnAddedValue').click(function () {
    var id = $('#form-id').text();
    id = parseInt(id);
    $(this).remove();
    $.ajax({
        url: '/ajax/calculate-added-insurance',
        type: "GET",
        data: {id: id},
        success: function (data) {
            $('.loader').fadeOut();

            var result = JSON.parse(data);
            if (result.response) {
                $('#insuranceValue').text(result.sum);
                addAlertBox('success', 'Сумма успешно рассчитана!');
            } else {
                addAlertBox('danger', 'Произошла ошибка!');
            }
            console.log(result);

        },
        'beforeSend': function () {
            $('.loader').fadeIn();
        },
        'error': function () {
            $('.loader').fadeOut();
            addAlertBox('danger', 'Произошла ошибка!');
        }
    });
});


// if applicant is driver, then he will be assigned as the first authorized driver
$('#docinsuranceform-applicantisdriver').click(function () {

    if ($(this).is(':checked')) {
        $('#docauthorizedpersons-pinfl').val($('#docinsuranceform-pinfl').val());
        $('#docauthorizedpersons-passportseria').val($('#docinsuranceform-passportseria').val());
        $('#docauthorizedpersons-passportnumber').val($('#docinsuranceform-passportnumber').val());
        $('#docauthorizedpersons-secondname').val($('#docinsuranceform-secondname').val());
        $('#docauthorizedpersons-firstname').val($('#docinsuranceform-firstname').val());

    } else {
        $('#docauthorizedpersons-pinfl').val('');
        $('#docauthorizedpersons-passportseria').val('');
        $('#docauthorizedpersons-passportnumber').val('');
        $('#docauthorizedpersons-secondname').val('');
        $('#docauthorizedpersons-firstname').val('');
    }
});


$('select').each(function () {
    var maxChar = 100;
    $(this).find('option').each(function (i, e) {
        $(e).attr('title', $(e).text());
        optionText = $(e).text();
        newString = '';
        if (optionText.length > maxChar) {
            array = optionText.split(' ');
            $.each(array, function (ind, ele) {
                newString += ele + ' ';
                if (ind > 0 && newString.length > maxChar) {
                    $(e).text(newString);
                    return false;
                }
            });

        }
    });
});

$('#docinsuranceform-brandid').on('change', function () {
    var id = $(this).val();
    getData(id, '/ajax/get-model', $('#docinsuranceform-modelid'));

});