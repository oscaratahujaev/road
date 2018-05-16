/**
 * Created by a_atahujaev on 12.05.2018.
 */
$(document).ready(function () {
    $('#event-deadline_type').on('change', function () {
        var type = $(this).val();
        console.log(type);
        if (type == 5) {
            $('#deadline').removeClass('hidden');
        } else {
            $('#deadline').addClass('hidden');
        }
    });
});