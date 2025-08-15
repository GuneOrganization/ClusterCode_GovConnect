<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Government Service Feedback</title>
  <link rel="icon" href="assets/images/logo.png" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <!-- Add Feedback Button -->
  <button id="openModal" 
    class="px-6 py-3 bg-blue-700 text-white font-semibold rounded-lg shadow-md hover:bg-blue-800 transition">
    Add Feedback
  </button>

  <!-- Modal Background -->
  <div id="feedbackModal" 
    class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    
    <!-- Modal Box -->
    <div id="modalContent"
      class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6 transform scale-95 opacity-0 transition-all duration-200">
      
      <!-- Header -->
      <h2 class="text-2xl font-bold text-gray-800 text-center mb-1">Feedback Form</h2>
      <p class="text-gray-500 text-center mb-5">Help us improve government services</p>

      <!-- Department Select -->
      <label class="block text-sm font-medium text-gray-700 mb-1">Service Department</label>
      <select id="department" 
        class="w-full border rounded-lg p-2 mb-4 focus:ring focus:ring-blue-300">
        <option value="">Select department...</option>
        <option>Citizen Services</option>
        <option>Tax & Revenue</option>
        <option>Transport</option>
        <option>Healthcare</option>
        <option>Other</option>
      </select>

      <!-- Branch Select -->
      <label class="block text-sm font-medium text-gray-700 mb-1">Branch</label>
      <select id="branch" 
        class="w-full border rounded-lg p-2 mb-4 focus:ring focus:ring-blue-300">
        <option value="">Select branch...</option>
        <option>Main Office</option>
        <option>North Branch</option>
        <option>South Branch</option>
        <option>East Branch</option>
        <option>West Branch</option>
      </select>

      <!-- Star Rating -->
      <p class="text-gray-700 font-medium mb-2">Rate your experience</p>
      <div class="flex justify-center mb-4">
        <button class="star text-4xl text-gray-300 hover:text-yellow-400 transition" data-value="1">★</button>
        <button class="star text-4xl text-gray-300 hover:text-yellow-400 transition" data-value="2">★</button>
        <button class="star text-4xl text-gray-300 hover:text-yellow-400 transition" data-value="3">★</button>
        <button class="star text-4xl text-gray-300 hover:text-yellow-400 transition" data-value="4">★</button>
        <button class="star text-4xl text-gray-300 hover:text-yellow-400 transition" data-value="5">★</button>
      </div>

      <!-- Feedback Text -->
      <textarea id="feedbackText" placeholder="Please provide your feedback..." 
        class="w-full border rounded-lg p-3 mb-5 resize-none h-28 focus:ring focus:ring-blue-300"></textarea>

      <!-- Buttons -->
      <div class="flex gap-3">
        <button id="submitFeedback" 
          class="flex-1 bg-teal-700 text-white py-2 rounded-lg hover:bg-teal-800 transition">
          Submit
        </button>
        <button id="closeModal" 
          class="flex-1 bg-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-400 transition">
          Cancel
        </button>
      </div>
    </div>
  </div>

  <!-- Success Message -->
  <div id="successPopup" 
    class="hidden fixed bottom-6 right-6 bg-green-600 text-white px-5 py-3 rounded-lg shadow-lg flex items-center space-x-2 animate-bounce">
    <span class="text-xl">✅</span>
    <span>Feedback Submitted!</span>
  </div>

<script>
  const openModal = document.getElementById("openModal");
  const closeModal = document.getElementById("closeModal");
  const feedbackModal = document.getElementById("feedbackModal");
  const modalContent = document.getElementById("modalContent");
  const stars = document.querySelectorAll(".star");
  const successPopup = document.getElementById("successPopup");
  let selectedRating = 0;

  // Open Modal
  openModal.addEventListener("click", () => {
    feedbackModal.classList.remove("hidden");
    setTimeout(() => {
      modalContent.classList.remove("scale-95", "opacity-0");
      modalContent.classList.add("scale-100", "opacity-100");
    }, 50);
  });

  // Close Modal
  closeModal.addEventListener("click", () => {
    modalContent.classList.add("scale-95", "opacity-0");
    setTimeout(() => {
      feedbackModal.classList.add("hidden");
    }, 200);
  });

  // Star Rating
  stars.forEach(star => {
    star.addEventListener("click", () => {
      selectedRating = star.dataset.value;
      stars.forEach(s => s.classList.remove("text-yellow-400"));
      for (let i = 0; i < selectedRating; i++) {
        stars[i].classList.add("text-yellow-400");
      }
    });
  });

  // Submit Feedback
  document.getElementById("submitFeedback").addEventListener("click", () => {
    const feedback = document.getElementById("feedbackText").value;
    const department = document.getElementById("department").value;
    const branch = document.getElementById("branch").value;

    if (!department) {
      alert("Please select a department.");
      return;
    }
    if (!branch) {
      alert("Please select a branch.");
      return;
    }
    if (!selectedRating) {
      alert("Please select a rating.");
      return;
    }
    if (!feedback.trim()) {
      alert("Please provide feedback.");
      return;
    }

    // Close modal
    closeModal.click();

    // Show success popup
    successPopup.classList.remove("hidden");
    setTimeout(() => {
      successPopup.classList.add("hidden");
    }, 2000);
  });
</script>

</body>
</html>
