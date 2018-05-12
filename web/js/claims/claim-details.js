/**
 * Created by a_atahujaev on 28.02.2018.
 */
function courtDecision(input) {
    var box = $('.hasCourtDecision');
    if (input.checked) {
        box.show();
    } else {
        box.hide();
    }
}
