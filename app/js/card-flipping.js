// This function will change the button from disabled to enabled and collects the 
// options array for the database
function checkIfChecked() {
    var checkboxes = document.querySelectorAll('input[name="options[]"]');
    var submitButton = document.getElementById("submitButton");
    var atLeastOneChecked = false;
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            atLeastOneChecked = true;
        }
    });
    if (atLeastOneChecked) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}