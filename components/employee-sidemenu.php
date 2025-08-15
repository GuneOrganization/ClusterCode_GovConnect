<div id="sidebar" class="bg-stone-200 min-h-screen transition-all duration-300 hidden sm:block w-1/6">
    <div class="p-4 border-b flex justify-between items-center">
        <div id="logoContainer" class="w-[45px] h-[45px]">
            <img src="assets/images/logo.png" alt="Logo">
        </div>
        <button id="toggleSidebar" class="p-1">
            <img class="w-[28px] h-[20px]" src="assets/images/dashboard_icons/more.png" alt="Toggle">
        </button>
    </div>

    <nav class="p-4">
        <button
            class="menu-item w-full flex items-center gap-3 p-3 mb-2 rounded-full text-sm font-medium text-gray-600 hover:bg-gray-200 bg-white shadow-sm"
            data-menu="employee-dashboard">
            <img class="w-5 h-5" src="assets/images/dashboard_icons/dashboard.png" alt="Dashboard">

            <span class="menu-text">| DASHBOARD</span>
        </button>
        <button
            class="menu-item w-full flex items-center gap-3 p-3 mb-2 rounded-full text-sm font-medium text-gray-600 hover:bg-gray-300"
            data-menu="employee-appointments">
            <img class="w-5 h-5" src="assets/images/dashboard_icons/appointments.png" alt="Appointments">

            <span class="menu-text">| APPOINTMENTS</span>
        </button>
        <button
            class="menu-item w-full flex items-center gap-3 p-3 mb-2 rounded-full text-sm font-medium text-gray-600 hover:bg-gray-300"
            data-menu="employee-analytics">
            <img class="w-5 h-5" src="assets/images/dashboard_icons/service_guide.png" alt="Service Guide">

            <span class="menu-text">| ANALYTICS</span>
        </button>
        <button
            class="menu-item w-full flex items-center gap-3 p-3 mb-2 rounded-full text-sm font-medium text-gray-600 hover:bg-gray-300"
            data-menu="employee-logout">
            <img class="w-5 h-5" src="assets/images/dashboard_icons/logout.png" alt="Logout">

            <span class="menu-text">| LOGOUT</span>
        </button>
    </nav>



</div>

<!-- mobile footer bar -->
<div id="mobileNav"
    class="sm:hidden fixed bottom-0 left-0 w-full bg-white border-t shadow-md flex justify-around items-center py-2 z-50">
    <button class="menu-item flex flex-col items-center text-xs text-gray-600 hover:text-blue-600 transition-colors"
        data-menu="employee-dashboard">
        <img class="w-6 h-6 mb-1" src="assets/images/dashboard_icons/dashboard.png" alt="Dashboard">
        <span class="text-[10px] sm:text-xs font-medium">DASHBOARD</span>
    </button>
    <button class="menu-item flex flex-col items-center text-xs text-gray-600 hover:text-blue-600 transition-colors"
        data-menu="employee-appointments">
        <img class="w-6 h-6 mb-1" src="assets/images/dashboard_icons/appointments.png" alt="Appointments">
        <span class="text-[10px] sm:text-xs font-medium">APPOINTMENTS</span>
    </button>
    <button class="menu-item flex flex-col items-center text-xs text-gray-600 hover:text-blue-600 transition-colors"
        data-menu="employee-analytics">
        <img class="w-6 h-6 mb-1" src="assets/images/dashboard_icons/service_guide.png" alt="Analytics">
        <span class="text-[10px] sm:text-xs font-medium">ANALYTICS</span>
    </button>
    <button class="menu-item flex flex-col items-center text-xs text-gray-600 hover:text-red-600 transition-colors"
        data-menu="employee-logout">
        <img class="w-6 h-6 mb-1" src="assets/images/dashboard_icons/logout.png" alt="Logout">
        <span class="text-[10px] sm:text-xs font-medium">LOGOUT</span>
    </button>
</div>


<script>
    const toggleBtn = document.getElementById("toggleSidebar");
    const sidebar = document.getElementById("sidebar");
    const menuTexts = document.querySelectorAll(".menu-text");
    const logoContainer = document.getElementById("logoContainer");

    let collapsed = false;

    toggleBtn.addEventListener("click", () => {
        collapsed = !collapsed;

        if (collapsed) {
            sidebar.classList.remove("w-1/6");
            sidebar.classList.add("w-[80px]");
            menuTexts.forEach(text => text.classList.add("hidden"));
            logoContainer.classList.add("hidden"); // Hide logo
        } else {
            sidebar.classList.remove("w-[80px]");
            sidebar.classList.add("w-1/6");
            menuTexts.forEach(text => text.classList.remove("hidden"));
            logoContainer.classList.remove("hidden"); // Show logo
        }
    });
</script>