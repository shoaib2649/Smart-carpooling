var totalSum = 0;

document.querySelectorAll('.ticket-container').forEach(function(container) {
    var inputField = container.querySelector('.input-height');
    var ticketPrice = parseInt(container.querySelector('span').innerText.replace('Rs:', ''));

    var incrementBtn = container.querySelector('.increment');
    var decrementBtn = container.querySelector('.decrement');

    incrementBtn.addEventListener('click', function() {
        var currentValue = parseInt(inputField.value, 10);
        var maxAllowedValue = parseInt(inputField.getAttribute('max'), 10);

        // Increase the value and ensure it doesn't exceed the maximum allowed value
        if (currentValue < maxAllowedValue) {
            inputField.value = currentValue + 1;
            calculateTotal();
        }
    });

    decrementBtn.addEventListener('click', function() {
        var currentValue = parseInt(inputField.value, 10);
        var minAllowedValue = 0;

        // Decrease the value and ensure it doesn't go below the minimum allowed value
        if (currentValue > minAllowedValue) {
            inputField.value = currentValue - 1;
            calculateTotal();
        }
    });
});

function calculateTotal() {
    totalSum = 0; // Reset total sum before recalculating

    document.querySelectorAll('.ticket-container').forEach(function(container) {
        var inputField = container.querySelector('.input-height');
        var ticketPrice = parseInt(container.querySelector('span').innerText.replace('Rs:', ''));
        var quantity = parseInt(inputField.value, 10);

        totalSum += ticketPrice * quantity;
    });

    var total = document.getElementById('total_hidden');
    var totalInput = document.getElementById('total');
    total.value = totalSum;
    totalInput.textContent = 'Total: Rs ' + totalSum;
}

var standardSeatsInput = document.getElementById('standardSeatsInput');
var premiumSeatsInput = document.getElementById('premiumSeatsInput');
var businessSeatsInput = document.getElementById('businessSeatsInput');

function updateCategoryInputs() {
    standardSeatsInput.value = document.getElementById('standardInput').value;
    premiumSeatsInput.value = document.getElementById('premiumInput').value;
    businessSeatsInput.value = document.getElementById('businessInput').value;
}

document.querySelectorAll('.increment, .decrement').forEach(function(button) {
    button.addEventListener('click', updateCategoryInputs);
});

document.getElementById('form-submit').addEventListener('submit', function(event) {
    var standardSeats = parseInt(standardSeatsInput.value);
    var premiumSeats = parseInt(premiumSeatsInput.value);
    var businessSeats = parseInt(businessSeatsInput.value);

    if (standardSeats === 0 && premiumSeats === 0 && businessSeats === 0) {
        event.preventDefault();
        alert('Please select at least one ticket type.');
    } else {
        updateCategoryInputs();
        this.submit();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    var disabledButtons = document.getElementsByClassName('disable');

    for (var i = 0; i < disabledButtons.length; i++) {
        disabledButtons[i].addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default click behavior
            event.stopPropagation(); // Stop the click event from propagating
        });
    }
});
