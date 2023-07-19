// Get the form element
const contactForm = document.getElementById("contactForm");

// Add an event listener to the form submission
contactForm.addEventListener("submit", function (event) {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Get the form data
  const formData = new FormData(contactForm);

  // Convert the form data to a JSON object
  const data = {};
  formData.forEach((value, key) => {
    data[key] = value;
  });

  // Call the function to submit the form data using PHP
  submitFormToPHP(data);
});

// Function to submit the form data to PHP using fetch
function submitFormToPHP(formData) {
  fetch("submit_form.php", {
    method: "POST",
    body: JSON.stringify(formData),
    headers: {
      "Content-Type": "application/json",
    },
  })
  .then((response) => response.json())
  .then((data) => {
    // Handle the response from PHP if needed
    console.log(data);
  })
  .catch((error) => {
    // Handle any errors that occurred during the request
    console.error("Error:", error);
  });
}
