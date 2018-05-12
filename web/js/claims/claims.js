/**
 * Created by a_atahujaev on 26.02.2018.
 */
$('.yur').hide();
$('.fiz').hide();
$('.not_resident').parent().hide();

$("#PersonStatus input").click(function () {
    personStatusChange(this.value);
});
function personStatusChange(id) {
    if (parseInt(id) == 1) {
        // Если физическое лицо
        $('.yur').hide();
        $('.fiz').show();
    } else if (parseInt(id) == 2) {
        // Если юридическое лицо
        $('.fiz').hide();
        $('.yur').show();
    }
}


$("#CitizenType input").click(function () {
    citizenType(this.value);
});
function citizenType(id) {

    if (parseInt(id)) {
        // Если резидент
        $('.not_resident').parent().hide();

    } else {
        // Если не резидент
        $('.not_resident').parent().show();

    }
}

function getDistricts(value, container) {
    $.ajax({
        'method': 'get',
        'url': '/ajax/get-districts',
        'data': {regionId: value},
        'beforeSend': function () {
            $('.loader').fadeIn();
        },
        'error': function () {
            $('.loader').fadeOut();
        },
        'success': function (data) {
            $('.loader').fadeOut();
            if (data === "") {
                return;
            }
            data = JSON.parse(data);

            html = "";
            if (data.length) {
                data.forEach(function (element, index, array) {
                    html += '<option value="' + element.ID + '">' + element.Name + '</option>';
                });
            }
            $(container).html(html);
        }
    });
}


function getPassportData(form) {
    var pinfl = $('#pinfl').val();
    var seria = $('#seria').val();
    var nomer = $('#nomer').val();

    $.ajax({
        'method': 'post',
        'url': '/ajax/get-passport-data',
        'data': {pinfl: pinfl, seria: seria, nomer: nomer},
        'beforeSend': function () {
            $('.loader').fadeIn();
        },
        'error': function () {
            $('.loader').fadeOut();
        },
        'success': function (data) {
            $('.loader').fadeOut();
            if (data === "") {
                return;
            }
            data = JSON.parse(data);

            html = "";
            if (data.length) {
                data.forEach(function (element, index, array) {
                    html += '<option value="' + element.ID + '">' + element.Name + '</option>';
                });
            }
            $('#district').html(html);
        }
    });
}

function medCertificate(checked) {
    var box = $('.hasMedCertificate');
    if (checked) {
        box.show();
    } else {
        box.hide();
    }
}

function docConf(input) {
    var box = $('.hasDocConf');
    if (input.checked) {
        box.show();
    } else {
        box.hide();
    }
}

function inheritanceOptions(value = false) {
    value = parseInt(value);

    if (!value) {
        value = $('#hasInheritance').find('input[type=radio]:checked').val();
        value = parseInt(value);
    }

    var box = $('.inheritance-block');

    if (value) {
        box.show();
    } else {
        box.hide();
    }
}

function victimOptions(value = false) {
    value = parseInt(value);

    if (!value) {
        value = $('#hasVictim').find('input[type=radio]:checked').val();
        value = parseInt(value);
    }

    var box = $('.victim-block');
    if (value) {
        box.show();
    } else {
        box.hide();
    }
}
