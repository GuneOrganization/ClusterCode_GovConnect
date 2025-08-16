<?php

session_start();
require 'backend/connection.php';

if (isset($_SESSION["user"])) {

    $user = $_SESSION["user"];

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gov-Connect - Dashboard</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.8/index.global.min.css" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.8/index.global.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet" />
        <link href="/assets/css/calander.css" />
        <link href="./assets/css/styles.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
        <script src="https://kit.fontawesome.com/4ba622a87c.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        teal: {
                            500: '#0d9488',
                            600: '#0f766e'
                        }
                    }
                }
            }
        }
        </script> -->
        <style>
            /* Custom styles for logo and specific components */
            .logo {
                width: 48px;
                height: 48px;
                position: relative;
            }

            .logo-shape-1 {
                position: absolute;
                width: 24px;
                height: 24px;
                background-color: #f97316;
                border-radius: 50% 50% 50% 10px;
                top: 6px;
                left: 6px;
                transform: rotate(-45deg);
            }

            .logo-shape-2 {
                position: absolute;
                width: 20px;
                height: 20px;
                background-color: #fb923c;
                border-radius: 50% 50% 10px 50%;
                bottom: 8px;
                right: 8px;
                transform: rotate(45deg);
            }

            .logo1 {
                width: 18px;
                height: 18px;
            }

            .content-section {
                display: none;
            }

            .content-section.active {
                display: block;
            }

            .fc-theme-standard .fc-scrollgrid {
                border: 1px solid #e5e7eb;
            }

            .fc-daygrid-day.booking-day {
                background-color: #dcfdf7 !important;
            }

            .fc-daygrid-day.holiday {
                background-color: #fef3c7 !important;
            }

            .fc-event.booking-event {
                background-color: #14b8a6;
                border-color: #14b8a6;
            }

            .fc-event.holiday-event {
                background-color: #f59e0b;
                border-color: #f59e0b;
            }
        </style>
    </head>

    <body class="bg-white">
        <div class="flex min-h-screen">

            <?php

            include 'components/sidemenu.php';

            ?>

            <div class="flex-1">
                <!-- Header -->
                <header class="bg-white shadow-sm border-b border-gray-200 py-6">
                    <div class="flex flex-wrap justify-between items-center gap-4">

                        <!-- Left side -->
                        <div class="hidden md:flex items-center gap-3 flex-shrink-0 pl-8">
                            <h5 class="text-sm sm:text-md font-medium truncate max-w-[150px] sm:max-w-none">
                                Welcome
                                <?php
                                echo $user["first_name"];
                                ?> !
                            </h5>
                        </div>


                        <!-- Right side -->
                        <div class="w-full md:w-auto px-8 flex items-center justify-between gap-3 flex-wrap sm:flex-nowrap">

                            <div class="flex items-center justify-between gap-2 flex-wrap sm:flex-nowrap">
                                <!-- Profile Icon -->
                                <div
                                    class="bg-gray-800 text-white rounded-full flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10">
                                    <img src="./assets/images/dashboard_icons/user.png" alt="User Profile image">
                                </div>

                                <!-- User Info -->
                                <div class="text-left text-xs leading-tight min-w-[100px] sm:min-w-[150px]">
                                    <div class="font-semibold truncate">
                                        <?php echo $user["first_name"] . " " . $user["last_name"]; ?>
                                    </div>
                                    <div class="text-gray-500 truncate text-[10px]"><?php echo $user["email"]; ?></div>
                                </div>
                            </div>

                            <!-- Notification Icon -->
                            <div class="flex">
                                <button id="notificationBtn"
                                    class="text-black rounded-full flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 hover:bg-gray-100">
                                    <img src="./assets/images/dashboard_icons/notificationicon.png" class="w-5 h-5" alt="">
                                </button>

                                <button onclick="logoutProcess();"
                                    class="text-black rounded-full flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 hover:bg-gray-100">
                                    <img src="./assets/images/dashboard_icons/logout.png" class="w-5 h-5" alt="">
                                </button>
                            </div>



                        </div>
                    </div>
                </header>

                <!-- Popup Dropdown -->
                <div id="notificationPopup"
                    class="hidden absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded shadow-lg z-50">
                    <div class="p-4 border-b border-gray-200 font-semibold text-sm">
                        Notifications
                    </div>
                    <ul class="max-h-64 overflow-y-auto">
                        <li class="p-3 hover:bg-gray-100 cursor-pointer text-xs">
                            New Notifications 01
                        </li>
                        <li class="p-3 hover:bg-gray-100 cursor-pointer text-xs">
                            New Notifications 02
                        </li>
                        <li class="p-3 hover:bg-gray-100 cursor-pointer text-xs">
                            New Notifications 03
                        </li>
                    </ul>
                    <div class="p-2 text-xs text-center text-gray-500 border-t border-gray-200 cursor-pointer hover:bg-gray-100"
                        onclick="showNotifications()">
                        <a>View All</a>
                    </div>
                </div>

                <!-- Main Dashboard Content -->
                <main class="p-4">

                    <!-- Dashboard Section -->
                    <?php

                    include 'components/user-dashboard.php';

                    ?>

                    <!-- appointment Section -->
                    <?php

                    include 'components/appointment.php';

                    ?>

                    <!-- service-guide Section -->
                    <?php

                    include 'components/service-guide.php';

                    ?>

                    <!-- AI Chatbot Section -->
                    <?php

                    include 'components/ai-chat-bot.php';

                    ?>

                    <!-- My profile Section -->
                    <?php

                    include 'components/my-profile.php';

                    ?>

                </main>
            </div>
        </div>

        <!-- Converted new appointment modal from Bootstrap to Tailwind -->
        <div id="appointmentModal"
            class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center px-2 sm:px-4">
            <div class="bg-white rounded-xl w-full max-w-6xl max-h-[90vh] flex flex-col shadow-xl overflow-hidden">

                <!-- Header -->
                <div class="p-4 sm:p-6 border-b-4 border-teal-800 relative flex items-center justify-center">
                    <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 text-center">New Appointment</h3>
                    <button id="closeModal"
                        class="absolute top-3 right-3 sm:top-4 sm:right-4 text-gray-500 hover:text-gray-700 text-2xl leading-none">
                        ×
                    </button>
                </div>

                <!-- Body -->
                <div class="flex-1 p-4 sm:p-6 grid grid-cols-1 lg:grid-cols-2 gap-6 overflow-y-auto">

                    <!-- LEFT: Form -->
                    <form id="appointmentForm" class="space-y-5">
                        <!-- Department -->
                        <div>
                            <label class="block text-xs text-gray-800 mb-1">Department</label>
                            <select id="department"
                                class="w-full px-3 py-2 rounded border border-gray-200 focus:border-teal-500 outline-none text-xs">
                                <option value="0">Select department</option>
                                <?php

                                $department_rs = Database::search("SELECT * FROM `department`");
                                while ($department_row = $department_rs->fetch_assoc()) {
                                    echo "<option value='" . $department_row['id'] . "'>" . $department_row['department'] . "</option>";
                                }

                                ?>
                            </select>
                        </div>

                        <!-- Branch -->
                        <div>
                            <label class="block text-xs text-gray-800 mb-1">Branch</label>
                            <select id="branch"
                                class="w-full px-3 py-2 rounded border border-gray-200 focus:border-teal-500 outline-none text-xs" disabled>
                                <option value="0">Select branch</option>
                            </select>
                        </div>

                        <!-- Service -->
                        <div>
                            <label class="block text-xs text-gray-800 mb-1">Service</label>
                            <select id="service"
                                class="w-full px-3 py-2 rounded border border-gray-200 focus:border-teal-500 outline-none text-xs" disabled>
                                <option value="0">Select service</option>
                                <?php

                                //$service_rs = Database::search("SELECT * FROM `service`");
                                //while ($service_row = $service_rs->fetch_assoc()) {
                                //    echo "<option value='" . $service_row['id'] . "'>" . $service_row['title'] . "</option>";
                                //}

                                ?>
                            </select>
                        </div>

                        <!-- File Upload -->
                        <div id="documentsContainer"></div>
                        <!-- <div id="attach-doc-main">
                            <div id="attach-doc-temp" class="hidden">
                                <label class="block text-sm text-gray-500 mb-1">Attach Documents (Optional)</label>
                                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                                    <input type="file" id="fileUpload" class="hidden" multiple>
                                    <button type="button" id="fileSelectBtn"
                                        class="bg-teal-800 hover:bg-teal-700 text-white px-4 py-2 rounded font-semibold text-sm shadow">
                                        📎 Choose Files
                                    </button>
                                    <span id="fileCount" class="text-sm text-gray-600">No files selected</span>
                                </div>
                                <ul id="fileList" class="mt-2 text-xs text-gray-700 list-disc list-inside"></ul>
                            </div>
                        </div> -->

                        <!-- Selected Date & Time -->
                        <div class="rounded-lg border border-gray-100 p-4 bg-gray-50">
                            <p class="text-xs text-gray-800">Selected Date:</p>
                            <p id="selectedDateText" class="text-sm font-semibold text-gray-800">—</p>
                            <p class="text-xs text-gray-800 mt-3">Selected TimeSlot</p>
                            <p id="selectedTimeText" class="text-sm font-semibold text-gray-800">—</p>
                        </div>

                        <!-- Create Button -->
                        <button type="submit" id="submitBtn" disabled
                            class="w-full bg-teal-800 disabled:opacity-50 disabled:cursor-not-allowed hover:bg-teal-600 text-white py-3 sm:py-4 rounded-lg font-semibold tracking-wider transition-colors duration-200">
                            CREATE APPOINTMENT
                        </button>

                        <!-- Note -->
                        <p class="text-center text-xs text-red-600 leading-relaxed">
                            Please be aware that Poya Days, Public Holidays, Bank Holidays, and Mercantile Holidays are
                            excluded.
                        </p>
                    </form>

                    <!-- RIGHT: Calendar + Time Slots -->
                    <div class="space-y-4">
                        <!-- Calendar -->
                        <div id="calendar2" class="rounded-lg border border-gray-200 p-2 bg-white shadow-sm"></div>

                        <!-- Time Slots -->
                        <div>
                            <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
                                <h4 class="text-sm font-semibold text-gray-800">Available Time Slots</h4>
                                <div class="flex items-center gap-2 text-xs">
                                    <span class="px-2 py-1 rounded bg-green-100">Available</span>
                                    <span class="px-2 py-1 rounded bg-red-100">Unavailable</span>
                                    <span class="px-2 py-1 rounded bg-sky-100">Selected</span>
                                </div>
                            </div>
                            <div id="timeSlots" class="grid grid-cols-2 sm:grid-cols-3 gap-2"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- view barcode model -->
        <!-- Modal Background -->
        <div id="modalbarcode" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
            <!-- Modal Box -->
            <div class="bg-white rounded-lg shadow-lg p-6 w-96 relative" id="printSection">
                <!-- Close Button -->
                <button id="closeModalbarcode"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">&times;</button>

                <!-- Title -->
                <h2 class="text-xl font-bold text-center mb-4 border-b pb-2">APPOINTMENT DETAILS</h2>

                <!-- Barcode -->
                <div class="text-center mb-6">
                    <img src="https://barcodeapi.org/api/128/2569470001" alt="barcode" class="mx-auto w-40">
                    <p class="text-sm font-semibold text-teal-800 mt-2">2569470001</p>
                </div>

                <!-- Appointment Details -->
                <div class="space-y-3">
                    <div class="flex justify-between flex-wrap">
                        <span class="font-medium text-gray-600">Appointment Id</span>
                        <span class="text-gray-900">2569470001</span>
                    </div>
                    <div class="flex justify-between flex-wrap">
                        <span class="font-medium text-gray-600">Service</span>
                        <span class="text-gray-900">National ID Renewal</span>
                    </div>
                    <div class="flex justify-between flex-wrap">
                        <span class="font-medium text-gray-600">Department</span>
                        <span class="text-gray-900">Civil Registration Department</span>
                    </div>
                    <div class="flex justify-between flex-wrap">
                        <span class="font-medium text-gray-600">Branch</span>
                        <span class="text-gray-900">Central Government Office</span>
                    </div>
                    <div class="flex justify-between flex-wrap">
                        <span class="font-medium text-gray-600">Date</span>
                        <span class="text-teal-600 font-medium">2025-08-12</span>
                    </div>
                    <div class="flex justify-between flex-wrap">
                        <span class="font-medium text-gray-600">Time Slot</span>
                        <span class="text-gray-900">09:00am - 10:00am</span>
                    </div>
                    <div class="flex justify-between flex-wrap">
                        <span class="font-medium text-gray-600">Queue Number</span>
                        <span class="text-teal-600 font-bold text-lg">#004</span>
                    </div>
                </div>

                <!-- Print Button -->
                <div class="mt-6 text-center">
                    <button onclick="printAppointment()"
                        class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-md shadow">
                        <i class="fas fa-print mr-2"></i> Print
                    </button>
                </div>
            </div>
        </div>

        <script>
            function printAppointment() {
                let printContents = document.getElementById("printSection").innerHTML;
                let originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                location.reload(); // reload back to normal after print
            }
        </script>



        <!-- feedback model -->
        <div id="feedbackModal"
            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">

            <!-- Modal Box -->
            <div id="modalContent"
                class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6 transform scale-95 opacity-0 transition-all duration-200">

                <!-- Header -->
                <h2 class="text-2xl font-bold text-gray-800 text-center mb-1">Feedback Form</h2>
                <p class="text-gray-500 text-center mb-5">Help us improve government services</p>


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
                    <button id="closeFeedback"
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


        <!-- <script>
            const fileInput = document.getElementById('fileUpload');
            const fileBtn = document.getElementById('fileSelectBtn');
            const fileCount = document.getElementById('fileCount');
            const fileList = document.getElementById('fileList');

            fileBtn.addEventListener('click', () => {
                fileInput.click();
            });

            fileInput.addEventListener('change', () => {
                const files = Array.from(fileInput.files);
                if (files.length === 0) {
                    fileCount.textContent = "No files selected";
                    fileList.innerHTML = "";
                } else {
                    fileCount.textContent = `${files.length} file(s) selected`;
                    fileList.innerHTML = files.map(file => `<li>${file.name}</li>`).join('');
                }
            });
        </script> -->

        <?php

        include "./components/notification.php";

        ?>


        <!-- feedback script -->
        <script>
            const openModal = document.getElementById("openFeedback");
            const closeModal = document.getElementById("closeFeedback");
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

        <script>
            function showNotifications() {
                document.getElementById('notificationsSection').classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Prevent background scrolling
            }

            function hideNotifications() {
                document.getElementById('notificationsSection').classList.add('hidden');
                document.body.style.overflow = 'auto'; // Restore scrolling
            }

            function dismissNotification(button) {
                const notification = button.closest('.bg-gray-100');
                notification.style.transition = 'opacity 0.3s ease';
                notification.style.opacity = '0';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }

            // Close notifications when pressing Escape key
            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    hideNotifications();
                }
            });
        </script>

        <script>
            // Menu navigation
            document.querySelectorAll('.menu-item').forEach(item => {
                item.addEventListener('click', function () {
                    const menu = this.getAttribute('data-menu');

                    // Remove active class from all menu items
                    document.querySelectorAll('.menu-item').forEach(menuItem => {
                        menuItem.classList.remove('bg-white', 'shadow-sm');
                        menuItem.classList.add('hover:bg-gray-300');
                    });

                    // Add active class to clicked item
                    this.classList.add('bg-white', 'shadow-sm');
                    this.classList.remove('hover:bg-gray-300');

                    // Hide all content sections
                    document.querySelectorAll('.content-section').forEach(section => {
                        section.classList.remove('active');
                    });

                    // Show selected content section
                    const targetSection = document.getElementById(menu + '-content');
                    if (targetSection) {
                        targetSection.classList.add('active');
                    }
                });
            });



            // Modal functionality
            const newAppointmentBtn = document.getElementById('newAppointmentBtn');
            const appointmentModal = document.getElementById('appointmentModal');
            // const closeModal = document.getElementById('closeModal');
            const appointmentForm = document.getElementById('appointmentForm');

            newAppointmentBtn.addEventListener('click', function () {
                appointmentModal.classList.remove('hidden');
            });



            appointmentModal.addEventListener('click', function (e) {
                if (e.target === appointmentModal) {
                    appointmentModal.classList.add('hidden');
                }
            });

            appointmentForm.addEventListener('submit', function (e) {
                e.preventDefault();
                alert('Appointment created successfully!');
                appointmentModal.classList.add('hidden');
            });

            // Password toggle functionality
            function togglePassword(fieldId) {
                const field = document.getElementById(fieldId);
                const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
                field.setAttribute('type', type);
            }
        </script>


        <!-- main clander -->
        <script>
            const btn = document.getElementById("notificationBtn");
            const popup = document.getElementById("notificationPopup");

            // Show popup on hover
            btn.addEventListener("mouseenter", () => {
                popup.classList.remove("hidden");
            });

            // Keep it open if hovering over popup
            popup.addEventListener("mouseenter", () => {
                popup.classList.remove("hidden");
            });

            // Hide popup when mouse leaves both button and popup
            btn.addEventListener("mouseleave", () => {
                setTimeout(() => {
                    if (!popup.matches(":hover")) {
                        popup.classList.add("hidden");
                    }
                }, 100);
            });

            //notification section JS
            // const viewAllBtn = document.getElementById("viewAllNotifications");
            // const allSections = document.querySelectorAll(".content-section");
            // const fullNotifications = document.getElementById("notifications-content");

            // viewAllBtn.addEventListener("click", () => {
            //     // Hide all sections
            //     allSections.forEach(sec => sec.classList.add("hidden"));

            //     // Show the notifications page
            //     fullNotifications.classList.remove("hidden");

            //     // Also hide the dropdown
            //     document.getElementById("notificationPopup").classList.add("hidden");
            // });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const calendarEl = document.getElementById('calendar');
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    height: 'auto',
                    headerToolbar: {
                        left: 'prev,next',
                        center: 'title',
                        right: 'today'
                    },
                    events: [
                        // Booking Events
                        {
                            id: 'booking1',
                            title: 'ID Renewal',
                            date: '2025-08-12',
                            className: 'booking-event',
                            textColor: 'white'
                        },
                        {
                            id: 'booking2',
                            title: 'Passport App',
                            date: '2025-08-15',
                            className: 'booking-event',
                            textColor: 'white'
                        },
                        {
                            id: 'booking3',
                            title: 'Birth Cert',
                            date: '2025-08-18',
                            className: 'booking-event',
                            textColor: 'white'
                        },
                        {
                            id: 'booking4',
                            title: 'License Renewal',
                            date: '2025-08-20',
                            className: 'booking-event',
                            textColor: 'white'
                        },
                        // Holiday Events
                        {
                            id: 'holiday1',
                            title: 'Independence Day',
                            date: '2025-02-04',
                            className: 'holiday-event',
                            textColor: 'white'
                        },
                        {
                            id: 'holiday2',
                            title: 'Vesak Day',
                            date: '2025-05-12',
                            className: 'holiday-event',
                            textColor: 'white'
                        }
                    ],
                    dayCellDidMount: function (info) {
                        // Mark booking days
                        const bookingDates = ['2025-08-12', '2025-08-15', '2025-08-18', '2025-08-20'];
                        const holidayDates = ['2025-02-04', '2025-05-12'];

                        const dateStr = info.date.toISOString().split('T')[0];

                        if (bookingDates.includes(dateStr)) {
                            info.el.classList.add('booking-day');
                        }

                        if (holidayDates.includes(dateStr)) {
                            info.el.classList.add('holiday');
                        }
                    },
                    eventClick: function (info) {
                        alert('Event: ' + info.event.title + '\nDate: ' + info.event.startStr);
                    }
                });

                calendar.render();

                // New Appointment Button Handler

                // Cancel and View Barcode button handlers
                document.querySelectorAll('button').forEach(button => {
                    if (button.textContent.includes('CANCEL')) {
                        button.addEventListener('click', function () {
                            if (confirm('Are you sure you want to cancel this appointment?')) {
                                button.closest('.bg-white').style.opacity = '0.5';
                                alert('Appointment cancelled successfully.');
                            }
                        });
                    } else if (button.textContent.includes('VIEW BARCODE')) {
                        button.addEventListener('click', function () {
                            alert('Barcode view functionality would be implemented here.');
                        });
                    }
                });
            });

            // Navigation functionality
            document.addEventListener('DOMContentLoaded', function () {
                const menuItems = document.querySelectorAll('.menu-item');
                const contentSections = document.querySelectorAll('.content-section');

                menuItems.forEach(item => {
                    item.addEventListener('click', function () {
                        const targetMenu = this.getAttribute('data-menu');

                        // Remove active class from all menu items
                        menuItems.forEach(menuItem => {
                            menuItem.classList.remove('active');
                        });

                        // Add active class to clicked item
                        this.classList.add('active');

                        // Hide all content sections
                        contentSections.forEach(section => {
                            section.classList.remove('active');
                        });

                        // Show target content section
                        const targetSection = document.getElementById(targetMenu + '-content');
                        if (targetSection) {
                            targetSection.classList.add('active');
                        }
                    });
                });

                // function openNewAppointmentModal() {
                //     document.getElementById('newAppointmentModal').style.display = 'flex';
                //     updateQueueNumber();
                // }

                // function closeNewAppointmentModal() {
                //     document.getElementById('newAppointmentModal').style.display = 'none';
                //     document.getElementById('newAppointmentForm').reset();
                // }

                // function updateQueueNumber() {
                //     const queueNumber = Math.floor(Math.random() * 20) + 10;
                //     document.getElementById('queueNumber').textContent = queueNumber;
                // }

                // // Handle form submission
                // document.getElementById('newAppointmentForm').addEventListener('submit', function(e) {
                //     e.preventDefault();

                //     // Get form values
                //     const service = document.getElementById('service').value;
                //     const department = document.getElementById('department').value;
                //     const branch = document.getElementById('branch').value;
                //     const date = document.getElementById('date').value;
                //     const timeSlot = document.getElementById('timeSlot').value;

                //     if (service && department && branch && date && timeSlot) {
                //         alert('Appointment created successfully!');
                //         closeNewAppointmentModal();
                //     } else {
                //         alert('Please fill in all fields.');
                //     }
                // });

                // // Close modal when clicking outside
                // document.getElementById('newAppointmentModal').addEventListener('click', function(e) {
                //     if (e.target === this) {
                //         closeNewAppointmentModal();
                //     }
                // });
            });



            function openNewAppointmentModal() {
                document.getElementById('newAppointmentModal').style.display = 'flex';
                updateQueueNumber();
            }

            function closeNewAppointmentModal() {
                document.getElementById('newAppointmentModal').style.display = 'none';
                document.getElementById('newAppointmentForm').reset();
            }

            function updateQueueNumber() {
                const queueNumber = Math.floor(Math.random() * 20) + 10;
                document.getElementById('queueNumber').textContent = queueNumber;
            }
        </script>



        <script>
            (() => {
                // ---------- CONFIG ----------
                // Add/modify holidays here (YYYY-MM-DD). Example includes common SL dates; extend as needed.
                const HOLIDAYS = new Set([
                    "2025-01-14", // Poya
                    "2025-02-04", // Independence Day
                    "2025-04-13", "2025-04-14", // Sinhala & Tamil New Year
                    "2025-05-01", // Labour Day
                    "2025-05-12", // Example Poya
                    "2025-06-11", // Example Poya
                ]);

                // Business hours (used for queue estimate & slot generation)
                const BASE_SLOTS = [
                    "09:00-10:00",
                    "10:00-11:00",
                    "11:00-12:00",
                    "14:00-15:00",
                    "15:00-16:00",
                ];

                // Simulate per-date booked slots (replace with your API)
                // Key: 'YYYY-MM-DD' -> array of fully booked slots
                const BOOKED_BY_DATE = {
                    "2025-08-05": ["10:00-11:00", "15:00-16:00"],
                };

                // ---------- STATE ----------
                let selectedDate = null; // "YYYY-MM-DD"
                let selectedSlot = null; // "HH:mm-HH:mm"

                // ---------- DOM ----------
                const modal = document.getElementById('appointmentModal');
                const openBtn = document.getElementById('openModal');
                const closeBtn = document.getElementById('closeModal');
                const timeSlotsEl = document.getElementById('timeSlots');
                const selectedDateText = document.getElementById('selectedDateText');
                const selectedTimeText = document.getElementById('selectedTimeText');
                //   const queueNumberEl = document.getElementById('queueNumber');
                const form = document.getElementById('appointmentForm');
                const submitBtn = document.getElementById('submitBtn');

                // ---------- UTIL ----------
                const pad = n => String(n).padStart(2, '0');
                const toYMD = (d) => `${d.getFullYear()}-${pad(d.getMonth() + 1)}-${pad(d.getDate())}`;

                function isHoliday(ymd) {
                    return HOLIDAYS.has(ymd);
                }

                function isPast(ymd) {
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);
                    const d = new Date(ymd);
                    d.setHours(0, 0, 0, 0);
                    return d < today;
                }

                // A stable pseudo-random hash for a string (for demo queue estimates)
                function hashStr(str) {
                    let h = 2166136261 >>> 0;
                    for (let i = 0; i < str.length; i++) {
                        h ^= str.charCodeAt(i);
                        h = Math.imul(h, 16777619);
                    }
                    return (h >>> 0);
                }

                function estimateQueue(ymd, slot) {
                    if (!ymd || !slot) return "-";
                    const h = hashStr(ymd + "|" + slot);
                    return (h % 25) + 1; // 1..26
                }

                function toast(icon, title) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1800,
                        timerProgressBar: true,
                        icon,
                        title
                    });
                }

                function alertWarn(text) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Heads up',
                        text
                    });
                }

                function alertError(text) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Missing details',
                        text
                    });
                }

                function alertSuccess(text) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Appointment Created',
                        text
                    });
                }

                // ---------- TIME SLOTS RENDER ----------
                function renderTimeSlots(ymd) {
                    timeSlotsEl.innerHTML = "";
                    selectedSlot = null;
                    selectedTimeText.textContent = "—";
                    submitBtn.disabled = true;

                    if (!ymd) return;

                    // if (isHoliday(ymd)) {
                    //     timeSlotsEl.innerHTML = `<p class="text-sm text-red-600">No slots: holiday.</p>`;
                    //     return;
                    // }
                    // if (isPast(ymd)) {
                    //     timeSlotsEl.innerHTML = `<p class="text-sm text-gray-500">Past date.</p>`;
                    //     return;
                    // }

                    //const booked = new Set(BOOKED_BY_DATE[ymd] || []);

                    // Demo rule: random extra unavailability to mimic load
                    const randomUnavailableIdx = hashStr(ymd) % BASE_SLOTS.length;

                    BASE_SLOTS.forEach((slot, idx) => {
                        const unavailable = booked.has(slot) || idx === randomUnavailableIdx;

                        const btn = document.createElement('button');
                        btn.type = "button";
                        btn.dataset.time = slot;
                        btn.className = [
                            "px-3 py-2 rounded border text-sm transition",
                            unavailable ?
                                "bg-red-100 text-gray-500 cursor-not-allowed border-red-200" :
                                "bg-green-100 hover:bg-green-200 border-green-200"
                        ].join(" ");
                        btn.textContent = slot.replace("-", " - ");

                        if (!unavailable) {
                            btn.addEventListener('click', () => {
                                // Unselect previous
                                [...timeSlotsEl.querySelectorAll('button')].forEach(b => {
                                    b.classList.remove("ring-2", "ring-sky-400", "bg-sky-100");
                                    if (!b.classList.contains("cursor-not-allowed")) {
                                        b.classList.remove("bg-green-200");
                                        b.classList.add("bg-green-100");
                                    }
                                });
                                // Select this
                                btn.classList.add("ring-2", "ring-sky-400", "bg-sky-100");
                                selectedSlot = slot;
                                selectedTimeText.textContent = slot.replace("-", " - ");
                                // queueNumberEl.textContent = estimateQueue(ymd, slot);
                                submitBtn.disabled = false;
                                toast('info', `Time selected: ${slot}`);
                            });
                        } else {
                            btn.disabled = true;
                        }

                        timeSlotsEl.appendChild(btn);
                    });

                    // If all unavailable
                    const anyEnabled = !!timeSlotsEl.querySelector('button:not([disabled])');
                    if (!anyEnabled) {
                        timeSlotsEl.innerHTML = `<p class="text-sm text-red-600">No available slots for ${ymd}.</p>`;
                        alertWarn("No available time slots for the selected date.");
                    }
                }

                // ---------- CALENDAR ----------
                let calendar = null;

                function buildCalendar() {
                    const calendarEl = document.getElementById('calendar2');

                    calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        height: 520,
                        selectable: true,
                        weekends: true,
                        stickyHeaderDates: true,
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: ''
                        },
                        validRange: (nowDate) => ({
                            start: toYMD(new Date())
                        }),
                        dateClick: (info) => {
                            const ymd = info.dateStr;
                            if (isHoliday(ymd)) {
                                alertWarn("This date is a holiday. Please choose another date.");
                                selectedDate = null;
                                selectedDateText.textContent = "—";
                                renderTimeSlots(null);
                                return;
                            }
                            if (isPast(ymd)) return;

                            selectedDate = ymd;
                            selectedDateText.textContent = ymd;
                            toast('success', `Date selected: ${ymd}`);
                            renderTimeSlots(ymd);
                        },
                        // Shade holidays using background events
                        events: Array.from(HOLIDAYS).map(d => ({
                            start: d,
                            end: d,
                            display: 'background',
                            className: 'is-holiday'
                        })),
                        // Add a CSS class to day cells that are holidays to block pointer events
                        dayCellDidMount: (arg) => {
                            const ymd = toYMD(arg.date);
                            if (isHoliday(ymd)) {
                                arg.el.classList.add('is-holiday');
                            }
                        }
                    });

                    calendar.render();
                }

                // ---------- SUBMIT ----------
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    const service = document.getElementById('service').value.trim();
                    const department = document.getElementById('department').value.trim();
                    const branch = document.getElementById('branch').value.trim();

                    if (!service || !department || !branch || !selectedDate || !selectedSlot) {
                        alertError("Please fill all fields and select date & time.");
                        return;
                    }

                    // TODO: Replace with real API call
                    // alertSuccess(`Your appointment is set for ${selectedDate} at ${selectedSlot}. Queue No: ${queueNumberEl.textContent}`);
                    // Close modal after success (optional)
                    setTimeout(() => hideModal(), 700);
                });

                // ---------- MODAL OPEN/CLOSE ----------
                function showModal() {
                    modal.classList.add('show');
                    modal.classList.remove('hidden');

                    if (calendar) {
                        setTimeout(() => {
                            calendar.updateSize(); // force recalculation
                            calendar.render(); // ensure layout refresh
                        }, 50);
                    }

                    modal.addEventListener('transitionend', () => {
                        if (calendar) calendar.updateSize();
                    });


                }

                function hideModal() {
                    modal.classList.remove('show');
                    modal.classList.add('hidden');
                }

                if (openBtn) openBtn.addEventListener('click', showModal);
                if (closeBtn) closeBtn.addEventListener('click', hideModal);
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) hideModal();
                });

                // ---------- INIT ----------
                // Build calendar after modal is in DOM to ensure width calc is correct
                document.addEventListener('DOMContentLoaded', () => {
                    buildCalendar();
                    // Preselect "today" (if not holiday)
                    const today = toYMD(new Date());
                    if (!isHoliday(today)) {
                        selectedDate = today;
                        selectedDateText.textContent = today;
                        renderTimeSlots(today);
                    }
                });

            })();
        </script>

        <!-- vew barcode js -->
        <script>
            const openBarcodemodelModal = document.getElementById('openModalbarcode');
            const closeBarcodeModal = document.getElementById('closeModalbarcode');
            const barcode = document.getElementById('modalbarcode');

            openBarcodemodelModal.addEventListener('click', () => {
                barcode.classList.remove('hidden');
                barcode.classList.add('flex');
            });

            closeBarcodeModal.addEventListener('click', () => {
                barcode.classList.remove('flex');
                barcode.classList.add('hidden');
            });

            // window.addEventListener('click', (e) => {
            //     if (e.target === modal) {
            //         barcode.classList.add('hidden');
            //         barcode.classList.remove('flex');
            //     }
            // });
        </script>

        <script src="./assets/js/script.js"></script>

    </body>

    </html>



    <?php

} else {
    header("Location:index.php");
}


?>