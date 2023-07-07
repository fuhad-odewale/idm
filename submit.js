document.getElementById('userForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    var nameInput = document.getElementById('name');
    var dobInput = document.getElementById('dob');
    var emailInput = document.getElementById('email');
    var phoneInput = document.getElementById('phone');

    var isValid = true;

    // Basic validation
    if (nameInput.value.trim() === '') {
      displayError(nameInput, 'Name is required');
      isValid = false;
    } else {
      removeError(nameInput);
    }

    if (dobInput.value === '') {
      displayError(dobInput, 'Date of Birth is required');
      isValid = false;
    } else {
      removeError(dobInput);
    }

    if (emailInput.value.trim() === '') {
      displayError(emailInput, 'Email Address is required');
      isValid = false;
    } else if (!isValidEmail(emailInput.value.trim())) {
      displayError(emailInput, 'Invalid Email Address');
      isValid = false;
    } else {
      removeError(emailInput);
    }

    if (phoneInput.value.trim() === '') {
      displayError(phoneInput, 'Phone Number is required');
      isValid = false;
    } else if (!isValidPhone(phoneInput.value.trim())) {
      displayError(phoneInput, 'Invalid Phone Number');
      isValid = false;
    } else {
      removeError(phoneInput);
    }

    if (isValid) {
      // Form is valid, submit the data or perform any desired action
      console.log('Name:', nameInput.value);
      console.log('Date of Birth:', dobInput.value);
      console.log('Email:', emailInput.value);
      console.log('Phone Number:', phoneInput.value);

      // Clear form fields
      document.getElementById('userForm').reset();
    }
  });

  function displayError(input, message) {
    var formGroup = input.parentElement;
    var errorMessage = formGroup.querySelector('.error-message');
    if (!errorMessage) {
      errorMessage = document.createElement('div');
      errorMessage.classList.add('error-message');
      formGroup.appendChild(errorMessage);
    }
    errorMessage.innerText = message;
    input.classList.add('invalid');
  }

  function removeError(input) {
    var formGroup = input.parentElement;
    var errorMessage = formGroup.querySelector('.error-message');
    if (errorMessage) {
      formGroup.removeChild(errorMessage);
    }
    input.classList.remove('invalid');
  }

  function isValidEmail(email) {
    // Basic email validation using regular expression
    var emailPattern = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    return emailPattern.test(email);
  }

  function isValidPhone(phone) {
    // Basic phone number validation using regular expression
    var phonePattern = /^\d{10}$/;
    return phonePattern.test(phone);
  }