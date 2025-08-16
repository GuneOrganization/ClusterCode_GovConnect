async function resendVerificationCode() {
  const response = await fetch("backend/resendVerificationCode.php");

  if (response.ok) {
    const result = await response.json();

    console.log(result);

    if (result.status == "success") {
      window.location.reload();
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

async function verify() {
  const vcode = document.getElementById("vcode");

  if (vcode.value == "" || vcode.value == null) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please enter your Verification Code!",
    });
  } else {
    const response = await fetch("backend/verifyVerificationCode.php?vcd="+vcode);

    if (response.ok) {
      const result = await response.json();

      console.log(result);

      if (result.status == "success") {
        window.location.reload();
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
