function togglePassword() {
  const passwordInput = document.getElementById("password");
  const toggleBtn = document.querySelector(".password-toggle");

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

async function signIn() {
  console.log("Signin process started...");

  const nicOrEmail = document.getElementById("nic-email");
  const password = document.getElementById("password");

  if (nicOrEmail.value == "" || nicOrEmail.value == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please enter your NIC or Email!",
    });
  } else if (password.value == "" || password.value == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please enter your password!",
    });
  } else {
    const data = {
      nicOrEmail: nicOrEmail.value,
      password: password.value,
    };

    const response = await fetch("backend/loginProcess.php", {
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
            window.location = "UserVerificationPage.php";
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
