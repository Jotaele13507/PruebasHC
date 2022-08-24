const firstnameEl = document.querySelector('#firstname');
const lastnameEl = document.querySelector('#lastname');
const statusEl = document.querySelector('#status');
const gradoEl = document.querySelector('#grado');
const cedulaEl = document.querySelector('#cedula');
const interesEl = document.querySelector('#interes');
const telefonoEl = document.querySelector('#telefono');
const emailEl = document.querySelector('#email');
const passwordEl = document.querySelector('#password');
const confirmPasswordEl = document.querySelector('#confirm-password');

const form = document.querySelector('#signup');

const checkfirstname = () => {

    let valid = false;

    const min = 2,
        max = 25;

    const firstname = firstnameEl.value.trim();

    if (!isRequired(firstname)) {
        showError(firstnameEl, 'El Nombre no puede quedar en blanco.');
    } else if (!isfirstnameValid(firstname)) {
        showError(firstnameEl, 'El Nombre debe contener solo letras.');
    } else if (!isBetween(firstname.length, min, max)) {
        showError(firstnameEl, `El Nombre debe contener entre ${min} y ${max} caracteres.`)
    } else {
        showSuccess(firstnameEl);
        valid = true;
    }
    return valid;
};

const checklastname = () => {

    let valid = false;

    const min = 2,
        max = 25;

    const lastname = lastnameEl.value.trim();

    if (!isRequired(lastname)) {
        showError(lastnameEl, 'El Apellido no puede quedar en blanco.');
    } else if (!islastnameValid(lastname)) {
        showError(lastnameEl, 'El Apellido debe contener solo letras.');
    } else if (!isBetween(lastname.length, min, max)) {
        showError(lastnameEl, `El Apellido debe contener entre ${min} y ${max} caracteres.`)
    } else {
        showSuccess(lastnameEl);
        valid = true;
    }
    return valid;
};

const checkStatus = () => {

    let valid = false;

    const status = statusEl.value.trim();

    if (!isRequired(status)) {
        showError(statusEl, 'Debe elegir un Estatus.');
    } else {
        showSuccess(statusEl);
        valid = true;
    }
    return valid;
};

const checkGrado = () => {

    let valid = false;

    const grado = gradoEl.value.trim();

    if (!isRequired(grado)) {
        showError(gradoEl, 'Debe elegir un Grado Académico.');
    } else {
        showSuccess(gradoEl);
        valid = true;
    }
    return valid;
};

const checkCedula = () => {

    let valid = false;

    const cedula = cedulaEl.value.trim();

    if (!isRequired(cedula)) {
        showError(cedulaEl, 'La Cédula no puede quedar en blanco.');
    } else {
        showSuccess(cedulaEl);
        valid = true;
    }
    return valid;
};

const checkInteres = () => {

    let valid = false;

    const interes = interesEl.value.trim();

    if (!isRequired(interes)) {
        showError(interesEl, 'El Área de Interés no puede quedar en blanco.');
    } else {
        showSuccess(interesEl);
        valid = true;
    }
    return valid;
}

const checkTelefono = () => {

    let valid = false;

    const telefono = telefonoEl.value.trim();

    if (!isRequired(telefono)) {
        showSuccess(telefonoEl, 'El Área de Interés puede quedar en blanco.');
    } else {
        showSuccess(telefonoEl, 'El Área de Interés puede contener guiones');
        valid = true;
    }
    return valid;
}

const checkEmail = () => {
    let valid = false;
    const email = emailEl.value.trim();
    if (!isRequired(email)) {
        showError(emailEl, 'El Email no puede estar en blanco.');
    } else if (!isEmailValid(email)) {
        showError(emailEl, 'Email invalido.')
    } else {
        showSuccess(emailEl);
        valid = true;
    }
    return valid;
};

const checkPassword = () => {
    let valid = false;

    const password = passwordEl.value.trim();

    if (!isRequired(password)) {
        showError(passwordEl, 'Password cannot be blank.');
    } else if (!isPasswordSecure(password)) {
        showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
    } else {
        showSuccess(passwordEl);
        valid = true;
    }

    return valid;
};

const checkConfirmPassword = () => {
    let valid = false;
    // check confirm password
    const confirmPassword = confirmPasswordEl.value.trim();
    const password = passwordEl.value.trim();

    if (!isRequired(confirmPassword)) {
        showError(confirmPasswordEl, 'Please enter the password again');
    } else if (password !== confirmPassword) {
        showError(confirmPasswordEl, 'The password does not match');
    } else {
        showSuccess(confirmPasswordEl);
        valid = true;
    }

    return valid;
};

const isfirstnameValid = (firstname) => {
    const re = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g; //Regex para nombre que admita acentos, espacios y caracteres especiales
    return re.test(firstname);
}

const islastnameValid = (lastname) => {
    const re = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g; //Regex para apellido que admita acentos, espacios y caracteres especiales
    return re.test(lastname);
}

const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return re.test(password);
};

const isRequired = value => value === '' ? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;

const showError = (input, message) => {
    // get the form-field element
    const formField = input.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

const showSuccess = (input) => {
    // get the form-field element
    const formField = input.parentElement;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    // hide the error message
    const error = formField.querySelector('small');
    error.textContent = '';
}

form.addEventListener('submit', function (e) {
    // prevent the form from submitting
    e.preventDefault();

    // validate fields
    let isfirstnameValid = checkfirstname(),
        islastnameValid = checklastname(),
        isStatusValid = checkStatus(),
        isGradoValid = checkGrado(),
        isCedulaValid = checkCedula(),
        isInteresValid = checkInteres(),
        isTelefonoValid = checkTelefono(),
        isEmailValid = checkEmail(),
        isPasswordValid = checkPassword(),
        isConfirmPasswordValid = checkConfirmPassword();

    let isFormValid = isfirstnameValid &&
        islastnameValid &&
        isStatusValid &&
        isGradoValid &&
        isCedulaValid &&
        isInteresValid &&
        isTelefonoValid &&
        isEmailValid &&
        isPasswordValid &&
        isConfirmPasswordValid;

    // submit to the server if the form is valid
    if (isFormValid) {

    }
});

const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'firstname':
            checkfirstname();
            break;
        case 'lastname':
            checklastname();
            break;
        case 'status':
            checkStatus();
            break;
        case 'grado':
            checkGrado();
            break;
        case 'cedula':
            checkCedula();
            break;
        case 'interes':
            checkInteres();
            break;
        case 'telefono':
            checkTelefono();
            break;
        case 'email':
            checkEmail();
            break;
        case 'password':
            checkPassword();
            break;
        case 'confirm-password':
            checkConfirmPassword();
            break;
    }
}));