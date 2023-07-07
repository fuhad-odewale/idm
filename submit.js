 // Add an event listener to the form submission
 document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting

    // Get the form data
    var formData = new FormData(this);

    // Construct the email body
    var emailBody = "Name: " + formData.get("name") + "\n";
    emailBody += "Date of Birth: " + formData.get("dob") + "\n";
    emailBody += "Email Address: " + formData.get("email") + "\n";
    emailBody += "Phone Number: " + formData.get("phone") + "\n";

    // Send the email
    var link = "mailto:fuhaodewale@gmail.com"
      + "?subject=" + encodeURIComponent("Contact Form Submission")
      + "&body=" + encodeURIComponent(emailBody);

    window.location.href = link;
  });