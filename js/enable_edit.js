function toggleReadonly() {
    var inputs = document.getElementsByClassName('editt');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = !inputs[i].disabled;

    }
}

// Add the event listener to the button after the function is defined
document.addEventListener('DOMContentLoaded', function () {
    var editButton = document.getElementById('editButton');
    editButton.addEventListener('click', toggleReadonly);
});
