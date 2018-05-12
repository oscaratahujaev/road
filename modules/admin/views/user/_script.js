// console.log(_opts);
$('i.glyphicon-refresh-animate').hide();
function updateRoutes(r) {
    _opts.routes.available = r.available;
    _opts.routes.assigned = r.assigned;
    search('available');
    search('assigned');
}

$('#btn-new').click(function () {
    var $this = $(this);
    var route = $('#inp-route').val().trim();
    if (route != '') {
        $this.children('i.glyphicon-refresh-animate').show();
        $.post($this.attr('href'), {route: route}, function (r) {
            $('#inp-route').val('').focus();
            updateRoutes(r);
        }).always(function () {
            $this.children('i.glyphicon-refresh-animate').hide();
        });
    }
    return false;
});

$('.btn-assign').click(function () {
    var $this = $(this);
    var target = $this.data('target');
    var routes = $('select.list[data-target="' + target + '"]').val();

    if (routes && routes.length) {
        $this.children('i.glyphicon-refresh-animate').show();
        $.post($this.attr('href'), {routes: routes, user_id: user_id}, function (r) {
            updateRoutes(r);
        }).always(function () {
            $this.children('i.glyphicon-refresh-animate').hide();
        });
    }
    return false;
});

$('.search[data-target]').keyup(function () {
    search($(this).data('target'));
});

function search(target) {
    var $list = $('select.list[data-target="' + target + '"]');
    $list.html('');
    var q = $('.search[data-target="' + target + '"]').val();
    $.each(_opts.routes[target], function () {
        var r = this;
        console.log(r);
        // if (r.indexOf(q) >= 0) {
        $('<option>').text(r.Name).val(r.id).appendTo($list);
        // }
    });
}

// initial
search('available');
search('assigned');
