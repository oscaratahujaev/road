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

    // $('.add-button').on('click', function () {
    //     var parent_div = $('.finance').first().clone();
    //
    //     $('#finance-table').append(parent_div);
    //     // $('.my-block').append(parent_div);
    //     console.log(parent_div[0]);
    // });

    // $(document).on('click', 'button', function () {
    //     console.log($(this));
    //     if ($(this).hasClass('btn-danger')) {
    //         $(this).parent().parent().remove();
    //     }
    // });
});

