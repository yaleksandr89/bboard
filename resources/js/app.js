window.$ = window.jQuery = require('jquery');
import 'bootstrap';

$(document).ready(function () {
    $('#lkTabs a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        console.log(e.target)
        $('#lkTabs a').addClass('text-black-50');
        $(e.target).removeClass('text-black-50');
    });

    let tab = localStorage.getItem('activeTab');
    if (tab === 'deleted-bbs') {
        $('#deleted-bbs-tab').addClass('active');
        $('#list-bbs-tab').removeClass('active');
        $('#deleted-bbs').addClass('show active');
        $('#list-bbs').removeClass('show active');
    }

    // Обрабатываем событие клика по пагинатору.
    $('#lkTabsContent').on('click', '.page-link', function() {
        if ($('#deleted-bbs-tab').hasClass('active')) {
            localStorage.setItem('activeTab', 'deleted-bbs');
        } else {
            localStorage.setItem('activeTab', 'list-bbs');
        }
    });
});
