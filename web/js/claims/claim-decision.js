/**
 * Created by a_atahujaev on 07.03.2018.
 */

var rejectBox = $('.paymentReject');
var payReasonBox = $('.paymentReason');
var payBox = $('.payBox');

rejectBox.hide();
payReasonBox.hide();
payBox.hide();

function decisionChange(value) {

    if (value == 4) {
        // if rejected
        payReasonBox.hide();
        rejectBox.show();
    } else if (value == 3) {
        // if decision to pay
        payReasonBox.show();
        rejectBox.hide();
    } else {
        payReasonBox.hide();
        rejectBox.hide();
    }
}

function payChange(value) {


    // console.log(value);
    
    if (value) {
        payBox.show();
    } else {
        payBox.hide();
    }
    // console.log(value.checked);

    // if (value == 4) {
    //     // if rejected
    //     payReasonBox.hide();
    //     rejectBox.show();
    // } else if (value == 3) {
    //     // if decision to pay
    //     payReasonBox.show();
    //     rejectBox.hide();
    // } else {
    //     payReasonBox.hide();
    //     rejectBox.hide();
    // }
}