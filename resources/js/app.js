import './bootstrap.js';
import '@coreui/coreui/dist/js/coreui.bundle.min.js';
import AutoNumeric from 'autonumeric';

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

window.AutoNumeric = AutoNumeric;
