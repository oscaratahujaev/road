/**
 * Created by a_atahujaev on 12.05.2018.
 */
$(document).ready(function () {
    $('#deadline-type').on('change', function () {
        var type = $(this).val();
        console.log(type);
        if (type == 5) {
            $('#deadline').removeClass('hidden');
            $('#deadline-text').addClass('hidden')
        } else if (type == 6) {
            $('#deadline').addClass('hidden');
            $('#deadline-text').removeClass('hidden')
        }
    });
});