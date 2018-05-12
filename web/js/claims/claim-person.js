/**
 * Created by a_atahujaev on 28.02.2018.
 */
$('#knownId input').click(function(){
    knownChange(this.value);
});

$('#declaredId input').click(function(){
    declaredChange(this.value);
});
function knownChange(input) {
    input = parseInt(input);
    if (input) {
        $('.known').show();
        $('.unknown').hide();
    } else {
        $('.known').hide();
        $('.unknown').show();
    }
}

function declaredChange(input) {
    input = parseInt(input);
    if (input) {
        $('.declared').show();
        $('.undeclared').hide();
    } else {
        $('.declared').hide();
        $('.undeclared').show();
    }
}