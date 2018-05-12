/**
 * Created by a_atahujaev on 13.03.2018.
 */
$("#regressOptions input").click(function () {
    regressOptionChange(this.value);
});
function regressOptionChange(value) {
    console.log(value);
}


$('#claimDetails').hide();
function getClaimData(value) {
    if (value == null) {
        return;
    }
    $.ajax({
        'method': 'get',
        'url': '/ajax/get-claim',
        'data': {id: value},
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
                $('#claimDetails').show();
                var claimer = "",
                    injured = "",
                    responsible = "",
                    protocolNumber = ""
                    ;
                // protocolNumber = data;

                if (parseInt(data.PersonStatusID) === 1) {
                    // физическое лицо
                    claimer = data.SecondName + " " + data.FirstName;
                } else {
                    claimer = data.RepresentativeName;
                }
                $('#claimer').text(claimer);

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
                $('#district').val(data.DistrictID);
            }
        }
    });
}

//change form according to Situation Type
$(".field-docregress-situationtypeid input").click("on", function () {
    var situationType = $('.field-docregress-situationtypeid input[type=radio]:checked').val();
    var fieldOne = $("#voluntarily");
    var fieldTwo = $("#judicially");
    toggleForms(situationType, fieldOne, fieldTwo);
});

function toggleForms(situationType, fieldOne, fieldTwo) {
    // console.log(situationType);
    if (situationType == 1) {
        fieldOne.hide();
        fieldTwo.show();
    } else if (situationType == 2) {
        fieldOne.show();
        fieldTwo.hide();
    }
}
//toggle defendant persons
$("#defendant-entity").hide();
$(".field-docregressdefendants-personstatusid input").on('click',
    function () {
        var typeOfPerson = $('.field-docregressdefendants-personstatusid input[type=radio]:checked').val();
        var blockOne = $("#defendant-entity");
        var blockTwo = $("#defendant-individual");
        toggleForms(typeOfPerson, blockOne, blockTwo);
    });

var countrySelect = $("#docregressdefendants-countryid");

//get all regions
var childRegionDropdown = $("#docregressdefendants-regionid");
countrySelect.on("change", function () {
    getData(this.value, "/entity/ref-region/index", childRegionDropdown);
});

//get all districts
var childDistrictDropdown = $("#docregressdefendants-districtid");
childRegionDropdown.on('change', function () {
    getData(this.value, "/entity/ref-district/index", childDistrictDropdown);
});

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

$("#get-defendant-data-button").on('click', function () {
    getDefendantPassportData();
});
//get driver data
function getDefendantPassportData() {
    var pinfl = $("#docregressdefendants-pinfl").val();
    var passSeria = $("#docregressdefendants-passportseria").val();
    var passNumber = $("#docregressdefendants-passportnumber").val();
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
                $("#docregressdefendants-firstname").val(data.name_latin);
                $("#docregressdefendants-secondname").val(data.surname_latin);
                $("#docregressdefendants-patronymic").val(data.patronym_latin);
                $("#docregressdefendants-passissueddate").val(data.date_begin_document);
                $("#docregressdefendants-passvaliditydate").val(data.date_end_document);
                $("#docregressdefendants-passissuedby").val(data.doc_give_place);
                $("#docregressdefendants-genderid").val(data.sex);
                $("#docregressdefendants-birthdate").val(data.birth_date);
                addAlertBox('success', 'Данные успешно получены');
            } else {
                addAlertBox('danger', 'Произошла ошибка при получении данных. Попробуйте позже');
            }
        },
        error: function () {
            addAlertBox('danger', 'Произошла ошибка при получении данных. Попробуйте позже');
            $('.loader').fadeOut();
        }
    });
}

//get details of the organization of the defendant
$('#get-defendant-org-data-button').on('click', function () {
    getDefendantOrgDetails();
});
function getDefendantOrgDetails() {

    var inn = $("#docregressdefendants-inn").val();
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
                $("#docregressdefendants-orgname").val(data.name);
                $("#docregressdefendants-regcertificatenumb").val(data.reg_number);
                $("#docregressdefendants-regcertificateissuedate").val(data.reg_date);
                addAlertBox('success', 'Данные успешно получены');
            } else {
                addAlertBox('danger', 'Произошла ошибка при получении данных. Попробуйте позже');
            }
        },
        error: function () {
            $('.loader').fadeOut();
            addAlertBox('danger', 'Произошла ошибка при получении данных. Попробуйте позже');
        }
    });
}