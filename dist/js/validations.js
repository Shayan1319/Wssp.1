
$(document).ready(function (e) {
    $(".cnic").blur(function () {
        var data = $(this).val().trim();
        $(this).val(data);
        var regex = /^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/;

        if (data !== "") {
            if (!regex.test(data)) {
                var message = "Invalid CNIC number / format.";
                showCustomMessage("Warning", message, 'error');
            }
        }
    });

    $(".email").blur(function () {
        var data = $(this).val().trim();
        $(this).val(data);
        var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        if (data !== "") {
            if (!regex.test(data)) {
                var message = "Invalid email / format.";
                showCustomMessage("Warning", message, 'error');
            }
        }
    });

    $(".password").blur(function () {
        var password = $(this).val();
        var passwordLength = password.length;

        var isUpperCase = 0;
        var isInteger = 0;
        var isSpecial = 0;

        var isUpper = /[A-Z]/;
        if (isUpper.test(password)) {
            isUpperCase = 1;
        }

        var isNumberic = /[+-]?\d+(?:\.\d+)?/g;
        if (isNumberic.test(password)) {
            isInteger = 1;
        }

        var specialChars = /[-!$%^&*()_+|~=`{}[:;<>?,.@#\]]/g;
        if (specialChars.test(password)) {
            isSpecial = 1;
        }

        if (passwordLength < 8) {
            var message = "Password should be of 8 characters length atleast.";
            showCustomMessage("Warning", message, 'error');

        } else if (isUpperCase === 0) {
            var message = "password must contain atleast one upper case character";
            showCustomMessage("Warning", message, 'error');

        } else if (isInteger === 0) {
            var message = "password must contain atleast one integer value";
            showCustomMessage("Warning", message, 'error');

        } else if (isSpecial === 0) {
            var message = "password must contain atleast one special character";
            showCustomMessage("Warning", message, 'error');
        }
    });

    $(".alphaonly").bind("keyup blur", function () {
        var node = $(this);
        node.val(node.val().replace(/[^a-z A-Z ]/g, ""));
    });

    $(".integeronly").keypress(function (e) {
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    $(".decimalonly").keypress(function (e) {
        var data = $(this).val();
        var dotIndex = data.indexOf(".");

        if (dotIndex >= 0 && e.which === 46) {
            return false;
        }

        if (
            e.which !== 46 &&
            e.which !== 8 &&
            e.which !== 0 &&
            (e.which < 48 || e.which > 57)
        ) {
            return false;
        }
    });

    $(".datepicker").attr("autocomplete", "off");

    $(".isActiveCheckBox").click(function () {
        var isChecked = 0;
        var id = $(this).attr("id");
        var isChecked = $(this).is(":checked") ? 1 : 0;

        hiddenChkBoxId = "#chk_box_" + id;
        $(hiddenChkBoxId).val(isChecked);
    });


});

function showCustomMessage(title, message, type) {
    swal(title, message, type);
}

function getCurrentDate() {
    var date = new Date();
    var year = date.getFullYear();
    var month = date.getMonth() * 1 + 1;
    var day = date.getDate();

    if (month < 10) {
        month = "0" + month;
    }

    if (day < 10) {
        day = "0" + day;
    }

    var currentDate = day + "-" + month + "-" + year;

    return currentDate;
}

/**
 * the below function will hide and show
 * the password.
 * @param {type} textboxId
 * @returns {undefined}
 */

function showPassword(textboxId) {
    typeAttr = $(textboxId).attr("type");
    if (typeAttr === "password") {
        $(textboxId).attr("type", "text");
    } else {
        $(textboxId).attr("type", "password");
    }
}

