document.addEventListener('DOMContentLoaded', function () {
    const acceptTermsCheckbox = document.getElementById('acceptTerms');
    const proceedButton = document.getElementById('proceedButton');

    // if hindi pa na nakakapg click sa checkbox hindi siya makakapag book
    acceptTermsCheckbox.addEventListener('change', function () {
        proceedButton.disabled = !this.checked;
    });

    // dito naman mag redirect na siya sa booking kase naka check na yung checkbox
    proceedButton.addEventListener('click', function () {
        if (acceptTermsCheckbox.checked) {
            window.location.href = "bookCar.php";  // way para makapag redirect ng file
        }
    });
});


