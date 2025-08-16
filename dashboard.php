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
    </head>

    <body class="bg-white">
        <div class="flex min-h-screen">

            <?php include 'components/sidemenu.php'; ?>

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
                    <?php include 'components/user-dashboard.php'; ?>

                    <!-- appointment Section -->
                    <?php include 'components/appointment.php'; ?>

                    <!-- service-guide Section -->
                    <?php include 'components/service-guide.php'; ?>

                    <!-- AI Chatbot Section -->
                    <?php include 'components/ai-chat-bot.php'; ?>

                    <!-- My profile Section -->
                    <?php include 'components/my-profile.php'; ?>

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
                    <div id="appointmentForm" class="space-y-5">
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
                            <!-- <p class="text-xs text-gray-800 mt-3">Selected TimeSlot</p>
                            <p id="selectedTimeText" class="text-sm font-semibold text-gray-800">—</p> -->
                        </div>

                        <!-- Time Slot -->
                        <div>
                            <label class="block text-xs text-gray-800 mb-1">Time Slot</label>
                            <select id="timeslot" class="w-full px-3 py-2 rounded border border-gray-200 focus:border-teal-500 outline-none text-xs" disabled>
                                <option value="0">Select Time Slot</option>
                            </select>
                        </div>

                         <!-- File Upload -->
                          <div>
                            <label class="block text-sm text-gray-800 m2-2">Documents</label>
                        </div>
                        <div id="documentsContainer"></div>

                        <!-- Create Button -->
                        <button onclick="createNewAppointment();" id="submitBtn" class="w-full bg-teal-800 disabled:opacity-50 disabled:cursor-not-allowed hover:bg-teal-600 text-white py-3 sm:py-4 rounded-lg font-semibold tracking-wider transition-colors duration-200">
                            CREATE APPOINTMENT
                        </button>

                        <!-- Note -->
                        <p class="text-center text-xs text-red-600 leading-relaxed">
                            Please be aware that Poya Days, Public Holidays, Bank Holidays, and Mercantile Holidays are
                            excluded.
                        </p>
                    </div>

                    <!-- RIGHT: Calendar + Time Slots -->
                    <div class="space-y-4">
                        <!-- Calendar -->
                        <div id="calendar2" class="rounded-lg border border-gray-200 p-2 bg-white shadow-sm"></div>

                        <!-- Time Slots -->
                        <!-- <div>
                            <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
                                <h4 class="text-sm font-semibold text-gray-800">Available Time Slots</h4>
                                <div class="flex items-center gap-2 text-xs">
                                    <span class="px-2 py-1 rounded bg-green-100">Available</span>
                                    <span class="px-2 py-1 rounded bg-red-100">Unavailable</span>
                                    <span class="px-2 py-1 rounded bg-sky-100">Selected</span>
                                </div>
                            </div>
                            <div id="timeSlots" class="grid grid-cols-2 sm:grid-cols-3 gap-2"></div>
                        </div> -->
                    </div>

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

        <?php

        include "./components/notification.php";

        ?>
        
        <script src="./assets/js/script.js"></script>

    </body>

    </html>



    <?php

} else {
    header("Location:index.php");
}


?>