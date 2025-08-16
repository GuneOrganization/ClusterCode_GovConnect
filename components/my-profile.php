<div id="my-profile-content" class="content-section px-4 py-6 sm:px-6 lg:px-8">
  <div class="mb-6">
    <h2 class="text-lg sm:text-xl font-bold text-center">MY PROFILE</h2>
    <div class="w-12 h-0.5 bg-black mx-auto mt-2"></div>
  </div>

  <div class=" rounded-lg p-6 sm:p-8  max-w-3xl mx-auto">
    
    <div class="text-center mb-4">
      <div
        class="w-24 h-24 sm:w-28 sm:h-28 rounded-full mx-auto mb-2 overflow-hidden border border-gray-300 bg-gray-200 flex items-center justify-center">
        <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="User Profile"
          class="w-16 h-16 object-cover">
      </div>
      <h3 class="text-lg sm:text-xl font-bold">SAHAN PERERA</h3>
    </div>

  
    <form class="space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
        <input type="text" placeholder="First Name"
          class="border-b border-gray-400 py-2 px-1 focus:border-teal-600 outline-none w-full" required>
        <input type="text" placeholder="Last Name"
          class="border-b border-gray-400 py-2 px-1 focus:border-teal-600 outline-none w-full" required>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
        <input type="text" placeholder="NIC"
          class="border-b border-gray-400 py-2 px-1 focus:border-teal-600 outline-none w-full" required>
        <input type="text" placeholder="Mobile Number"
          class="border-b border-gray-400 py-2 px-1 focus:border-teal-600 outline-none w-full" required>
      </div>

      <input type="email" placeholder="Email Address"
        class="border-b border-gray-400 py-2 px-1 w-full focus:border-teal-600 outline-none" required>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
        <div class="relative">
          <input type="password" placeholder="Password" id="password"
            class="border-b border-gray-400 py-2 px-1 w-full focus:border-teal-600 outline-none" required>
          <button type="button" onclick="togglePassword('password')"
            class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500">👁</button>
        </div>
        <div class="relative">
          <input type="password" placeholder="Retype Password" id="retypePassword"
            class="border-b border-gray-400 py-2 px-1 w-full focus:border-teal-600 outline-none" required>
          <button type="button" onclick="togglePassword('retypePassword')"
            class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500">👁</button>
        </div>
      </div>

      <div class="flex flex-col sm:flex-row gap-4 pt-4">
        <button type="reset" class="flex-1 bg-gray-800 hover:bg-gray-900 text-white py-3 rounded-md font-medium">RESET
          DETAILS</button>
        <button type="submit" class="flex-1 bg-teal-500 hover:bg-teal-600 text-white py-3 rounded-md font-medium">UPDATE
          DETAILS</button>
      </div>
    </form>
  </div>
</div>

<script>
  function togglePassword(id) {
    const field = document.getElementById(id);
    field.type = field.type === "password" ? "text" : "password";
  }
</script>