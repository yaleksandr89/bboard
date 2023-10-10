window.$ = window.jQuery = require('jquery');
import 'bootstrap';

$(document).ready(function () {
    $('#lkTabs a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        console.log(e.target)
        $('#lkTabs a').addClass('text-black-50');
        $(e.target).removeClass('text-black-50');
    });
});
