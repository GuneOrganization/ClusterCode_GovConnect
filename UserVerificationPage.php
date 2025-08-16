<?php

session_start();

if (!isset($_SESSION["vda"]) || isset($_SESSION["user"])) {
  header("Location: index.php");
} else {

  $vda = $_SESSION["vda"];

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gov-Connect - Verification Process</title>
    <link rel="icon" href="assets/images/logo.png" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./assets/js/user-verification.js"></script>

    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              teal: {
                500: "#14b8a6",
                600: "#0d9488",
                700: "#0f766e",
                800: "#038287",
                900: "#00494c",
              },
            },
          },
        },
      };
    </script>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet" />
    <style>
      body {
        font-family: "Inter", sans-serif;
      }
    </style>
  </head>

  <body class="min-h-screen flex flex-col lg:flex-row bg-gray-50">
    <!-- Left Welcome Panel -->
    <div
      class="w-full lg:w-1/2 bg-gradient-to-b from-teal-800 to-teal-900 flex flex-col justify-center items-center text-white text-center p-8 lg:p-12">
      <!-- Logo -->
      <img src="assets/images/logo.png" class="relative w-16 h-16 lg:w-20 lg:h-20 mb-8 lg:mb-12">

      </img>

      <h1
        class="text-2xl lg:text-4xl font-bold mb-4 lg:mb-6 uppercase tracking-wide">
        WELCOME TO GOV-CONNECT
      </h1>
      <p
        class="text-sm lg:text-base mb-6 lg:mb-8 opacity-90 max-w-md leading-relaxed px-4 lg:px-0">
        GovConnect is a one-stop digital platform that lets Sri Lankan citizens
        access, book, and track government services with a single NIC login –
        saving time, reducing queues, and cutting paperwork.
      </p>
      <button
        class="bg-white text-teal-600 px-6 py-2 lg:px-8 lg:py-3 rounded-full font-semibold uppercase hover:bg-gray-50 transition-colors">
        LEARN MORE
      </button>
    </div>

    <!-- Right Sign In Panel -->
    <div
      class="w-full lg:w-1/2 flex flex-col justify-center p-8 lg:p-12 bg-white">
      <div class="max-w-sm mx-auto w-full">
        <div class="mb-8">
          <h2
            class="text-2xl lg:text-3xl font-bold text-center text-gray-800 mb-2">
            User Verification
          </h2>
          <div class="w-16 h-0.5 bg-teal-600 mx-auto"></div>
        </div>

        <div class="space-y-6 mb-3">
          <div>
            <input
              type="text"
              class="w-full border-b-2 text-center border-gray-300 py-3 px-1 text-base text-gray-700 focus:border-teal-600 focus:outline-none"
              id="vcode"
              placeholder="Verification Code"
              required />
          </div>

          <button
            onclick="verify();"
            class="w-full bg-teal-800 text-white py-2 font-semibold uppercase rounded-2xl hover:bg-teal-700 transition-colors">
            Verify
          </button>
        </form>

        <!-- <div class="relative my-6">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-4 bg-white text-gray-500">or</span>
          </div>
        </div> -->

        <div class="text-center mb-3">
          <a onclick="resendVerificationCode();" class="text-teal-600 cursor-pointer font-sm text-sm hover:text-teal-700">
            Resend OTP
          </a>
        </div>

        <!-- <div class="text-center ">
          <a href="#" class="text-black-600 font-sm text-sm hover:text-teal-700">
            OTP will expire in 30 Seconds
          </a>
        </div> -->
      </div>
    </div>
  </body>

  </html>

<?php

}

?>