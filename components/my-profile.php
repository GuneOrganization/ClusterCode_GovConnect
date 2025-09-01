<?php
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$user = $_SESSION['user'];

$result = Database::search("
    SELECT u.nic, u.first_name, u.last_name, u.email, u.mobile, ur.role, us.status
    FROM user u
    INNER JOIN user_status us ON u.user_status_id = us.id
    INNER JOIN user_role ur ON u.user_role_id = ur.id
    WHERE u.nic = '" . $user['nic'] . "'
");

if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();
  $_SESSION['user'] = $user;
} else {
  session_destroy();
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>My Profile - Gov-Connect</title>
  <script>
    function togglePassword(id) {
      const field = document.getElementById(id);
      field.type = field.type === "password" ? "text" : "password";
    }
  </script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

  <div id="my-profile-content" class="content-section px-4 py-6 sm:px-6 lg:px-8">
    <div class="mb-6">
      <h2 class="text-lg sm:text-xl font-bold text-center">MY PROFILE</h2>
      <div class="w-12 h-0.5 bg-black mx-auto mt-2"></div>
    </div>

    <div class="rounded-lg p-6 sm:p-8 bg-white shadow-md max-w-3xl mx-auto">
      <div class="text-center mb-4">
        <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full mx-auto mb-2 overflow-hidden border border-gray-300 bg-gray-200 flex items-center justify-center">
          <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="User Profile"
            class="w-16 h-16 object-cover">
        </div>
        <h3 class="text-lg sm:text-xl font-bold">
          <?= htmlspecialchars($user['first_name'] . " " . $user['last_name']) ?>
        </h3>
        <p class="text-sm text-gray-500"><?= htmlspecialchars($user['role']) ?></p>
      </div>

      <form id="updateProfileForm" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
          <input type="text" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>"
            class="border-b border-gray-400 py-2 px-1 focus:border-teal-600 outline-none w-full" required>
          <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>"
            class="border-b border-gray-400 py-2 px-1 focus:border-teal-600 outline-none w-full" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
          <input type="text" name="nic" value="<?php echo htmlspecialchars($user['nic']); ?>"
            class="border-b border-gray-400 py-2 px-1 focus:border-teal-600 outline-none w-full" readonly>
          <input type="text" name="mobile" value="<?php echo htmlspecialchars($user['mobile'] ?? ''); ?>"
            class="border-b border-gray-400 py-2 px-1 focus:border-teal-600 outline-none w-full">
        </div>

        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"
          class="border-b border-gray-400 py-2 px-1 w-full focus:border-teal-600 outline-none" required>

        <!-- 🔑 New password section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
          <input type="password" name="new_password" placeholder="New Password"
            class="border-b border-gray-400 py-2 px-1 focus:border-teal-600 outline-none w-full">
          <input type="password" name="retype_password" placeholder="Retype Password"
            class="border-b border-gray-400 py-2 px-1 focus:border-teal-600 outline-none w-full">
        </div>

        <div class="flex flex-col sm:flex-row gap-4 pt-4">
          <button type="reset" class="flex-1 bg-gray-800 hover:bg-gray-900 text-white py-3 rounded-md font-medium">
            RESET DETAILS
          </button>
          <button type="submit" class="flex-1 bg-teal-500 hover:bg-teal-600 text-white py-3 rounded-md font-medium">
            UPDATE DETAILS
          </button>
        </div>
      </form>
    </div>
  </div>

<script>
  document.getElementById("updateProfileForm").addEventListener("submit", async function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    const response = await fetch("backend/updateProfile.php", {
      method: "POST",
      body: formData
    });

    const result = await response.json();
    alert(result.message);

    if (result.status === "success") {
      location.reload();
    }
  });
</script>

</body>

</html>