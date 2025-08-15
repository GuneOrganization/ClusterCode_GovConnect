<div id="sidebar" class="bg-stone-100 min-h-screen transition-all duration-300 hidden xl:block w-1/6">
    <!-- Desktop Sidebar -->
    <div class="p-8 border-b flex justify-between items-center">
        <div id="logoContainer" class="w-8 h-8">
            <img src="assets/images/logo.png" alt="Logo">
        </div>
        <button id="toggleSidebar" class="p-1">
            <img class="w-5 h-5" src="assets/images/dashboard_icons/more.png" alt="Toggle">
        </button>
    </div>

    <nav class="p-4">
        <button class="menu-item w-full flex items-center gap-3 p-3 mb-2 rounded-full text-sm font-medium text-gray-600 hover:bg-gray-200 bg-white shadow-sm" data-menu="dashboard">
            <img class="w-5 h-5" src="assets/images/dashboard_icons/dashboard.png" alt="Dashboard">
            <span class="menu-text">| DASHBOARD</span>
        </button>
        <button class="menu-item w-full flex items-center gap-3 p-3 mb-2 rounded-full text-sm font-medium text-gray-600 hover:bg-gray-300" data-menu="appointments">
            <img class="w-5 h-5" src="assets/images/dashboard_icons/appointments.png" alt="Appointments">
            <span class="menu-text">| APPOINTMENTS</span>
        </button>
        <button class="menu-item w-full flex items-center gap-3 p-3 mb-2 rounded-full text-sm font-medium text-gray-600 hover:bg-gray-300" data-menu="service-guide">
            <img class="w-5 h-5" src="assets/images/dashboard_icons/service_guide.png" alt="Service Guide">
            <span class="menu-text">| SERVICE GUIDE</span>
        </button>
        <button class="menu-item w-full flex items-center gap-3 p-3 mb-2 rounded-full text-sm font-medium text-gray-600 hover:bg-gray-300" data-menu="ai-chatbot">
            <img class="w-5 h-5" src="assets/images/dashboard_icons/ai_chatbot.png" alt="AI Chatbot">
            <span class="menu-text">| AI CHATBOT</span>
        </button>
        <button class="menu-item w-full flex items-center gap-3 p-3 mb-2 rounded-full text-sm font-medium text-gray-600 hover:bg-gray-300" data-menu="my-profile">
            <img class="w-5 h-5" src="assets/images/dashboard_icons/my_profile.png" alt="My Profile">
            <span class="menu-text">| MY PROFILE</span>
        </button>
        <button class="menu-item w-full flex items-center gap-3 p-3 mb-2 rounded-full text-sm font-medium text-gray-600 hover:bg-gray-300" data-menu="logout">
            <img class="w-5 h-5" src="assets/images/dashboard_icons/logout.png" alt="Logout">
            <span class="menu-text">| LOGOUT</span>
        </button>
    </nav>
</div>

<!-- Mobile Footer Navigation -->
<div id="mobileNav" class="bg-stone-100 lg:hidden fixed bottom-0 left-0 w-full border-t flex justify-around px-1 z-10">
    <button class="menu-item flex flex-col items-center justify-center text-xs p-3 w-24 h-20" data-menu="dashboard">
        <img class="w-5 h-5 mb-2" src="assets/images/dashboard_icons/dashboard.png" alt="Dashboard">
        <span>DASHBOARD</span>
    </button>
    <button class="menu-item flex flex-col items-center justify-center text-xs p-3 w-24 h-20" data-menu="appointments">
        <img class="w-5 h-5 mb-2" src="assets/images/dashboard_icons/appointments.png" alt="Appointments">
        <span>APPOINTMENTS</span>
    </button>
    <button class="menu-item flex flex-col items-center justify-center text-xs p-3 w-24 h-20" data-menu="service-guide">
        <img class="w-5 h-5 mb-2" src="assets/images/dashboard_icons/service_guide.png" alt="Service Guide">
        <span>SERVICE</span>
    </button>
    <button class="menu-item flex flex-col items-center justify-center text-xs p-3 w-24 h-20" data-menu="ai-chatbot">
        <img class="w-5 h-5 mb-2" src="assets/images/dashboard_icons/ai_chatbot.png" alt="AI Chatbot">
        <span>CHATBOT</span>
    </button>
    <button class="menu-item flex flex-col items-center justify-center text-xs p-3 w-24 h-20" data-menu="my-profile">
        <img class="w-5 h-5 mb-2" src="assets/images/dashboard_icons/my_profile.png" alt="My Profile">
        <span>PROFILE</span>
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
