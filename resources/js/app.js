import './bootstrap.js';
import '@coreui/coreui/dist/js/coreui.bundle.min.js';
import AutoNumeric from 'autonumeric';

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

window.AutoNumeric = AutoNumeric;

function initializeAutoNumeric(elementId, options = {}) {
    const element = document.getElementById(elementId);
    if (element) {
        new AutoNumeric(element, options);
    }
}

// Options for AutoNumeric (you can customize these as needed)
const autoNumericOptions = {
    currencySymbol: 'Rp ',
    decimalPlaces: 2,
    unformatOnSubmit: true,
    // Add more options as needed
};

// Initialize AutoNumeric on elements specified in a global array
window.addEventListener('DOMContentLoaded', () => {
    if (window.autoNumericElements) {
        window.autoNumericElements.forEach(id => initializeAutoNumeric(id, autoNumericOptions));
    }
});
