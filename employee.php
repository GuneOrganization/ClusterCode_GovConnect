<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gov-Connect Employee Dashboard</title>
    <link rel="icon" href="assets/images/logo.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.8/index.global.min.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.8/index.global.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet" />
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        body {
           
            /* max-width: 600px; */
            /* margin: 40px auto; */
        }

        canvas {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-white">
    <div class="flex min-h-screen">

        <?php

        include 'components/employee-sidemenu.php';

        ?>

        <div class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200 p-4">
                <div class="flex justify-between items-center">
                     <!-- Left side -->
                    <div class="hidden md:flex items-center gap-3 flex-shrink-0">
                        <!-- Menu button (mobile only) -->
                        <button class="text-gray-500 p-0 block lg:hidden" type="button">
                            <span class="text-2xl">☰</span>
                        </button>
                        <h5 class="text-sm sm:text-md font-medium truncate max-w-[150px] sm:max-w-none">
                            Welcome Sachintha !
                        </h5>
                    </div>


                    <div class="flex items-center gap-3">
                        <div class="bg-gray-800 text-white rounded-full flex items-center justify-center w-10 h-10">
                            <span class="font-semibold text-sm">😁</span>
                        </div>
                        <div class="text-left">
                            <div class="font-semibold text-sm">SACHINTHA PERERA</div>
                            <div class="text-gray-500 text-xs">sachinthaperera@gmail.com</div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Dashboard Content -->
            <main class="p-4">

                <!-- Employee Dashboard Section -->
                <?php

                include 'components/employee-dashboard.php';

                ?>

                <!-- Employee appointment Section -->
                <?php

                include 'components/employee-appointment.php';

                ?>

                <!-- Employee analytics Section -->
                <?php

                include 'components/employee-analytics.php';

                ?>

            </main>
        </div>
    </div>

    <!-- Converted new appointment modal from Bootstrap to Tailwind -->
<div id="appointmentModal1" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-6xl h-[95vh] p-4 sm:p-6 overflow-y-auto">
        
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 sticky  z-10">
            <div class="px-2 sm:px-4 py-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <button id="closeModalBtn" 
                            class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 mr-2">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <div>
                            <h1 class="text-lg font-bold text-gray-900">Appointment Details</h1>
                            <p class="text-xs text-gray-600">Government of Sri Lanka</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="p-2 rounded-full bg-gray-100 hover:bg-gray-200">
                            <i class="fas fa-user text-gray-600"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main -->
        <main class="container mx-auto px-2 sm:px-4 py-4 sm:py-6">
            <!-- Responsive Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- LEFT COLUMN -->
                <div class="flex flex-col space-y-6">
                    <!-- Appointment Details Card -->
                    <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200 flex-1">
                        <div class="px-4 py-4 sm:px-6 border-b border-gray-200">
                            <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900">Appointment Information</h3>
                        </div>
                        <div class="px-4 py-4 sm:p-6">
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Appointment ID</label>
                                    <p class="mt-1 text-sm text-gray-900 font-medium">APT-2023-00145</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Civilian Name</label>
                                    <p class="mt-1 text-sm text-gray-900 font-medium">Kasun Perera</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Civilian NIC Number</label>
                                    <p class="mt-1 text-sm text-gray-900 font-medium">200209487592</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Civilian Mobile</label>
                                    <p class="mt-1 text-sm text-gray-900 font-medium">0761257362</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Appointment Purpose</label>
                                    <p class="mt-1 text-sm text-gray-900">Passport Application</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Date & Time</label>
                                    <p class="mt-1 text-sm text-gray-900">2025-08-15 at 10:30 AM</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">Venue</label>
                                    <p class="mt-1 text-sm text-gray-900">Department of Immigration, Colombo 01</p>
                                </div>
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-500">Status</label>
                                    <select id="status"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md border">
                                        <option value="pending">Pending</option>
                                        <option value="confirmed" selected>Confirmed</option>
                                        <option value="completed">Completed</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="block text-sm font-medium text-gray-500">Rejected Reason</label>
                                    <textarea placeholder="Enter reason if rejected..."
                                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 placeholder-gray-400"
                                        rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <button
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Update Appointment
                    </button>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="flex flex-col space-y-6">
                    <!-- Uploaded Documents -->
                    <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200 flex-1">
                        <div class="px-4 py-4 sm:px-6 border-b border-gray-200">
                            <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900">Uploaded Documents</h3>
                            <p class="mt-1 text-xs sm:text-sm text-gray-500">Documents submitted by the civilian</p>
                        </div>
                        <div class="px-4 py-4 sm:p-6 space-y-4">
                            <!-- Document Item -->
                            <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="p-2 rounded-lg bg-blue-100 text-blue-600 mr-3">
                                        <i class="fas fa-file-pdf text-lg"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Passport Application Form</p>
                                        <p class="text-xs text-gray-500">PDF • 245 KB</p>
                                    </div>
                                </div>
                                <button class="text-green-600 hover:text-green-800 px-3 py-1 rounded-md text-sm font-medium">
                                    <i class="fas fa-eye mr-1"></i> View
                                </button>
                            </div>

                            <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="p-2 rounded-lg bg-green-100 text-green-600 mr-3">
                                        <i class="fas fa-file-image text-lg"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">NIC Copy</p>
                                        <p class="text-xs text-gray-500">JPG • 1.2 MB</p>
                                    </div>
                                </div>
                                <button class="text-green-600 hover:text-green-800 px-3 py-1 rounded-md text-sm font-medium">
                                    <i class="fas fa-eye mr-1"></i> View
                                </button>
                            </div>

                            <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="p-2 rounded-lg bg-purple-100 text-purple-600 mr-3">
                                        <i class="fas fa-file-word text-lg"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Supporting Letter</p>
                                        <p class="text-xs text-gray-500">DOCX • 512 KB</p>
                                    </div>
                                </div>
                                <button class="text-green-600 hover:text-green-800 px-3 py-1 rounded-md text-sm font-medium">
                                    <i class="fas fa-eye mr-1"></i> View
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Communication -->
                    <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200">
                        <div class="px-4 py-4 sm:px-6 border-b border-gray-200">
                            <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900">Send Message to Civilian</h3>
                            <p class="mt-1 text-xs sm:text-sm text-gray-500">Special notes or requests</p>
                        </div>
                        <div class="px-4 py-4 sm:p-6">
                            <!-- Message History -->
                            <div class="mb-4 space-y-4 max-h-40 overflow-y-auto p-2">
                                <div class="flex justify-end">
                                    <div class="max-w-xs md:max-w-md bg-green-100 rounded-lg p-3">
                                        <p class="text-sm text-gray-800">Please bring the original documents for verification.</p>
                                        <p class="text-xs text-gray-500 text-right mt-1">Today, 10:15 AM</p>
                                    </div>
                                </div>
                                <div class="flex justify-start">
                                    <div class="max-w-xs md:max-w-md bg-gray-100 rounded-lg p-3">
                                        <p class="text-sm text-gray-800">Understood. I will bring all originals.</p>
                                        <p class="text-xs text-gray-500 text-right mt-1">Today, 10:30 AM</p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <span class="inline-block bg-gray-100 rounded-full px-3 py-1 text-xs text-gray-500">
                                        Appointment confirmed on 2025-08-10
                                    </span>
                                </div>
                            </div>

                            <!-- Message Input -->
                            <div class="mt-4">
                                <div class="flex">
                                    <input type="text"
                                        class="flex-1 border border-gray-300 rounded-l-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                        placeholder="Type your message...">
                                    <button class="bg-green-600 hover:bg-green-700 text-white px-4 rounded-r-md">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                                <div class="mt-2 flex space-x-2">
                                    <button class="text-gray-500 hover:text-gray-700">
                                        <i class="fas fa-paperclip"></i>
                                    </button>
                                    <button class="text-gray-500 hover:text-gray-700">
                                        <i class="far fa-smile"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>



    <script>
        // Menu navigation
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function() {
                const menu = this.getAttribute('data-menu');

                if (menu === 'logout') {
                    window.location = '/clustercode_govconnect';
                    return;
                }

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

        // Chat functionality
        // const chatInput = document.getElementById('chatInput');
        // const sendBtn = document.getElementById('sendBtn');
        // const chatMessages = document.getElementById('chatMessages');

        // function sendMessage() {
        //     const message = chatInput.value.trim();
        //     if (message) {
        //         // Add user message
        //         const userMessageDiv = document.createElement('div');
        //         userMessageDiv.className = 'flex justify-end';
        //         userMessageDiv.innerHTML = `
        //             <div class="max-w-xs lg:max-w-md">
        //                 <div class="bg-gray-200 text-gray-800 rounded-lg px-4 py-2">
        //                     <p class="text-sm">${message}</p>
        //                 </div>
        //                 <div class="text-xs text-gray-500 text-right mt-1">${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</div>
        //             </div>
        //         `;
        //         chatMessages.appendChild(userMessageDiv);

        //         // Clear input
        //         chatInput.value = '';

        //         // Scroll to bottom
        //         chatMessages.scrollTop = chatMessages.scrollHeight;

        //         // Simulate AI response after a delay
        //         setTimeout(() => {
        //             const aiMessageDiv = document.createElement('div');
        //             aiMessageDiv.className = 'flex justify-start';
        //             aiMessageDiv.innerHTML = `
        //                 <div class="max-w-xs lg:max-w-md">
        //                     <div class="bg-white border border-gray-200 rounded-lg px-4 py-2">
        //                         <p class="text-sm text-black">Thank you for your message. How can I assist you further?</p>
        //                     </div>
        //                     <div class="text-xs text-gray-500 mt-1">${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</div>
        //                 </div>
        //             `;
        //             chatMessages.appendChild(aiMessageDiv);
        //             chatMessages.scrollTop = chatMessages.scrollHeight;
        //         }, 1000);
        //     }
        // }

        // sendBtn.addEventListener('click', sendMessage);
        // chatInput.addEventListener('keypress', function (e) {
        //     if (e.key === 'Enter') {
        //         sendMessage();
        //     }
        // });

        // Modal functionality
        const newAppointmentBtn = document.getElementById('newAppointmentBtn');
        const appointmentModal = document.getElementById('appointmentModal');
        const closeModal = document.getElementById('closeModal');
        const appointmentForm = document.getElementById('appointmentForm');

        newAppointmentBtn.addEventListener('click', function() {
            appointmentModal.classList.remove('hidden');
        });

        closeModal.addEventListener('click', function() {
            appointmentModal.classList.add('hidden');
        });

        appointmentModal.addEventListener('click', function(e) {
            if (e.target === appointmentModal) {
                appointmentModal.classList.add('hidden');
            }
        });

        appointmentForm.addEventListener('submit', function(e) {
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                dayCellDidMount: function(info) {
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
                eventClick: function(info) {
                    alert('Event: ' + info.event.title + '\nDate: ' + info.event.startStr);
                }
            });

            calendar.render();

            // New Appointment Button Handler
            document.getElementById('newAppointmentBtn').addEventListener('click', function() {
                alert('New Appointment booking functionality would be implemented here.');
            });

            // Cancel and View Barcode button handlers
            document.querySelectorAll('button').forEach(button => {
                if (button.textContent.includes('CANCEL')) {
                    button.addEventListener('click', function() {
                        if (confirm('Are you sure you want to cancel this appointment?')) {
                            button.closest('.bg-white').style.opacity = '0.5';
                            alert('Appointment cancelled successfully.');
                        }
                    });
                } else if (button.textContent.includes('VIEW BARCODE')) {
                    button.addEventListener('click', function() {
                        alert('Barcode view functionality would be implemented here.');
                    });
                }
            });
        });
    </script>
    <script src="/assets/js/calnder.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fix for null element errors
            const someElement = document.getElementById('some-element-id');
            if (someElement) {
                someElement.addEventListener('click', function() {
                    // Your event handler
                });
            }

            // Bar graph initialization with null check
            const barsContainer = document.getElementById('bars-container');
            if (barsContainer) {
                // Initialize your bar graph here
            }
        });
    </script>

    <script>
        const ctx = document.getElementById('myBarChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['7-8', '8-9', '9-10', '10-11', '11-12', '12-1', '2-3', '3-4', '4-5'],
                datasets: [{
                    label: 'Appointments Count',
                    data: [10, 35, 50, 25, 55, 40, 20, 60, 15],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    // barThickness: 40 // width in pixels
                    categoryPercentage: 0.6, // space taken by each category (0–1)
                    barPercentage: 0.8 // space taken by each bar within the category
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value;
                            }
                        }
                    }
                }
            }
        });
    </script>

    <!-- appointment modal -->
     <script>
        const modal = document.getElementById('appointmentModal1');
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const confirmUpdateBtn = document.getElementById('confirmUpdateBtn');

        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });

        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        confirmUpdateBtn.addEventListener('click', () => {
            const status = document.getElementById('status').value;
            alert(`Appointment status updated to: ${status}`);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        // Optional: Close modal if background is clicked
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        });
    </script>
</body>

</html>