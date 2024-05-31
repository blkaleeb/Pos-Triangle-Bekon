import './bootstrap.js';
import '@coreui/coreui/dist/js/coreui.bundle.min.js';
import AutoNumeric from 'autonumeric';

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

window.AutoNumeric = AutoNumeric;

function initializeAutoNumeric(elementId, options = {}, value) {
    const element = document.getElementById(elementId);
    if (element) {
       return new AutoNumeric(element, value, options);
    }
    return null
}

// Options for AutoNumeric (you can customize these as needed)
const autoNumericOptions = {
    currencySymbol: 'Rp ',
    decimalPlaces: 2,
    unformatOnSubmit: true,
    minValue: 0,
    // Add more options as needed
};

// Initialize AutoNumeric on elements specified in a global array
window.addEventListener('DOMContentLoaded', () => {
    if (window.autoNumericElements) {
        window.autoNumericElements.forEach(({id,value}) =>{
            const initialValue = (value == null) ? 0 : value;
            const anElement = initializeAutoNumeric(id, autoNumericOptions, initialValue);
         });
    }
});
