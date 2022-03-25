let captcha = new Array();
    
  function createCapt() {
    const activeCaptcha = document.getElementById("captcha");
    for (q = 0; q < 6; q++) {
      if (q % 2 == 0) {
        captcha[q] = String.fromCharCode(Math.floor(Math.random() * 26 + 65));
      } else {
        captcha[q] = Math.floor(Math.random() * 10 + 0);
      }
    }
    theCaptcha = captcha.join("");
    activeCaptcha.innerHTML = `${theCaptcha}`;
  }

  function validate() {
    const errCaptcha = document.getElementById("errCaptcha");
    const reCaptcha = document.getElementById("reCaptcha");
    recaptcha = reCaptcha.value;
    let validateCaptcha = 0;
    for (var z = 0; z < 6; z++) {
      if (recaptcha.charAt(z) != captcha[z]) {
        validateCaptcha++;
      }
    }
    if (recaptcha == "") {
      errCaptcha.innerHTML = "Re-Captcha must be filled";
    } else if (validateCaptcha > 0 || recaptcha.length > 6) {
      errCaptcha.innerHTML = "Wrong captcha, failed to submit request!";
    } else {
      errCaptcha.innerHTML = " Captcha Correct! Your Request has been submitted for a review ";
      submitContactForm();
      
    }
  }

function submitContactForm() {

  const form = document.getElementById('contact_form');
  const formData = new FormData(form);
  const errCaptcha = document.getElementById("errCaptcha");

  fetch('contact-submit.php', {
    method: "POST",
    body: formData
  }).then(response => {
    response.text().then(txt => {
      //errCaptcha.innerHTML = "Your Request has been submitted for a review!";
      errCaptcha.innerHTML = txt;
    });
  });
}

function refreshPage(){
  window.location.reload();
} 
