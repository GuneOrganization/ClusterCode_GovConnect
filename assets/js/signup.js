function togglePassword(passField) {
  const passwordInput = document.getElementById("password-" + passField);
  const toggleBtn = document.querySelector(".password-toggle-" + passField);

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    toggleBtn.classList.add("fa-eye");
    toggleBtn.classList.remove("fa-eye-slash");
  } else {
    passwordInput.type = "password";
    toggleBtn.classList.remove("fa-eye");
    toggleBtn.classList.add("fa-eye-slash");
  }
}

async function signUp() {
  const firstName = document.getElementById("first-name");
  const lastName = document.getElementById("last-name");
  const email = document.getElementById("email");
  const nic = document.getElementById("nic");
  const mobile = document.getElementById("mobile");
  const password = document.getElementById("password-pass");
  const confirmPassword = document.getElementById("password-re");

  if (firstName.value == "" || firstName.value == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please enter your First Name!",
    });
  } else if (lastName.value == "" || lastName.value == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please enter your Last Name!",
    });
  } else if (email.value == "" || email.value == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please enter your Email!",
    });
  } else if (nic.value == "" || nic.value == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please enter your NIC!",
    });
  } else if (mobile.value == "" || mobile.value == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please enter your Mobile!",
    });
  } else if (password.value == "" || password.value == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please enter your Password!",
    });
  } else if (
    confirmPassword.value == "" ||
    confirmPassword.value == null ||
    password.value != confirmPassword.value
  ) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Passwords are not Matching! Please try again!",
    });
  } else {
    const data = {
      firstName: firstName.value,
      lastName: lastName.value,
      email: email.value,
      nic: nic.value,
      mobile: mobile.value,
      password: password.value,
      confirmPassword: confirmPassword.value,
    };

    const response = await fetch("backend/signupProcess.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    });

    if (response.ok) {
      const result = await response.json();

      console.log(result);

      if (result.status == "success") {
        Swal.fire({
          position: "center",
          icon: "success",
          title: result.message,
          showConfirmButton: true,
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "index.php";
          }
        });

        // setTimeout(() => {
        //   window.location = "UserVerificationPage.php";
        // }, 1500);
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: result.message,
        });
      }
    } else {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Something went wrong! Please try again later.",
      });
    }
  }
}
