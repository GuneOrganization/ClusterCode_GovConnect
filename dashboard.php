<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gov-Connect Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.8/index.global.min.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.8/index.global.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet" />
    <link href="/assets/css/calander.css" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

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
            <header class="bg-white shadow-sm border-b border-gray-200 p-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <button class="text-gray-500 p-0 lg:hidden" type="button">
                            <span class="text-xl">☰</span>
                        </button>
                        <h5 class="text-lg font-medium">Welcome Sachintha !</h5>
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
    <div id="appointmentModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg w-full max-w-6xl mx-4 max-h-[90vh] overflow-hidden shadow-xl">
            <!-- Header -->
            <div class="p-6 border-b-4 border-teal-800 relative">
                <h3 class="text-2xl font-semibold text-gray-800 text-center">New Appointment</h3>
                <button id="closeModal"
                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl leading-none">×</button>
            </div>

            <!-- Body -->
            <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6 overflow-y-auto max-h-[calc(90vh-96px)]">
                <!-- LEFT: Data fillers -->
                <form id="appointmentForm" class="space-y-5">
                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Service</label>
                        <select id="service"
                            class="w-full px-4 py-3 rounded border border-gray-200 focus:border-teal-500 outline-none">
                            <option value="">Select service</option>
                            <option value="national-id">National ID Renewal</option>
                            <option value="passport">Passport Application</option>
                            <option value="driving-license">Driving License</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Department</label>
                        <select id="department"
                            class="w-full px-4 py-3 rounded border border-gray-200 focus:border-teal-500 outline-none">
                            <option value="">Select department</option>
                            <option value="civil-registration">Civil Registration Department</option>
                            <option value="immigration">Immigration Department</option>
                            <option value="motor-traffic">Department of Motor Traffic</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Branch</label>
                        <select id="branch"
                            class="w-full px-4 py-3 rounded border border-gray-200 focus:border-teal-500 outline-none">
                            <option value="">Select branch</option>
                            <option value="central">Central Government Office</option>
                            <option value="colombo">Colombo District Office</option>
                            <option value="kandy">Kandy District Office</option>
                        </select>
                    </div>

                    <div class="rounded-lg border border-gray-100 p-4 bg-gray-50">
                        <p class="text-sm text-gray-600">Selected Date:</p>
                        <p id="selectedDateText" class="text-lg font-semibold text-gray-800">—</p>
                        <p class="text-sm text-gray-600 mt-2">Selected Time:</p>
                        <p id="selectedTimeText" class="text-lg font-semibold text-gray-800">—</p>
                    </div>

                    <div class="text-center py-2">
                        <p class="text-lg text-gray-800">
                            Approx Queue Number: <span id="queueNumber" class="font-semibold">-</span>
                        </p>
                    </div>

                    <button type="submit" id="submitBtn" disabled
                        class="w-full bg-teal-800 disabled:opacity-50 disabled:cursor-not-allowed hover:bg-teal-600 text-white py-4 rounded font-semibold tracking-wider">
                        CREATE APPOINTMENT
                    </button>

                    <p class="text-center text-xs text-red-600 leading-relaxed">
                        Please Be Aware That Poya Days, Public Holidays, Bank Holidays, And Mercantile Holidays Are
                        Excluded.
                    </p>
                </form>

                <!-- RIGHT: Calendar + Time slots -->
                <div class="space-y-4">
                    <div id="calendar2" class="rounded-lg border border-gray-200 p-2 bg-white shadow-sm"></div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="text-lg font-semibold text-gray-800">Available Time Slots</h4>
                            <div class="flex items-center gap-3 text-xs">
                                <span class="px-2 py-1 rounded bg-green-100">Available</span>
                                <span class="px-2 py-1 rounded bg-red-100">Unavailable</span>
                                <span class="px-2 py-1 rounded bg-sky-100">Selected</span>
                            </div>
                        </div>
                        <div id="timeSlots" class="grid grid-cols-2 md:grid-cols-3 gap-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        // Menu navigation
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function () {
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

        newAppointmentBtn.addEventListener('click', function () {
            appointmentModal.classList.remove('hidden');
        });

        closeModal.addEventListener('click', function () {
            appointmentModal.classList.add('hidden');
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
            document.getElementById('newAppointmentBtn').addEventListener('click', function () {
                alert('New Appointment booking functionality would be implemented here.');
            });

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





        // function togglePassword() {
//     const passwordInput = document.getElementById('password');
//     const toggleBtn = document.querySelector('.password-toggle');

//     if (passwordInput.type === 'password') {
//         passwordInput.type = 'text';
//         toggleBtn.textContent = '🙈';
//     } else {
//         passwordInput.type = 'password';
//         toggleBtn.textContent = '👁';
//     }
// }

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

    const chatInput = document.getElementById('chatInput');
    const sendButton = document.getElementById('sendButton');
    const chatMessages = document.querySelector('.chat-messages');

    function sendMessage() {
        const message = chatInput.value.trim();
        if (message === '') return;

        // Get current time
        const now = new Date();
        const timeString = now.getHours().toString().padStart(2, '0') + ':' +
            now.getMinutes().toString().padStart(2, '0');

        // Create user message element
        const userMessageHTML = `
                    <div class="message-wrapper d-flex justify-content-end mb-3">
                        <div class="user-message bg-light p-3 rounded" style="max-width: 70%;">
                            <p class="mb-1">${message}</p>
                            <small class="text-muted">${timeString}</small>
                        </div>
                    </div>
                `;

        // Add user message to chat
        chatMessages.insertAdjacentHTML('beforeend', userMessageHTML);

        // Clear input
        chatInput.value = '';

        // Scroll to bottom
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Simulate AI response after a short delay
        setTimeout(() => {
            const aiResponseHTML = `
                        <div class="message-wrapper d-flex justify-content-start mb-3">
                            <div class="ai-message bg-white p-3 rounded border" style="max-width: 70%;">
                                <p class="mb-1">Thank you for your message. I'm here to help you with government services. How can I assist you today?</p>
                                <small class="text-muted">${timeString}</small>
                            </div>
                        </div>
                    `;
            chatMessages.insertAdjacentHTML('beforeend', aiResponseHTML);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }, 1000);
    }

    // Send message on button click
    sendButton.addEventListener('click', sendMessage);

    // Send message on Enter key press
    chatInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
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

    // Handle form submission
    document.getElementById('newAppointmentForm').addEventListener('submit', function (e) {
        e.preventDefault();

        // Get form values
        const service = document.getElementById('service').value;
        const department = document.getElementById('department').value;
        const branch = document.getElementById('branch').value;
        const date = document.getElementById('date').value;
        const timeSlot = document.getElementById('timeSlot').value;

        if (service && department && branch && date && timeSlot) {
            alert('Appointment created successfully!');
            closeNewAppointmentModal();
        } else {
            alert('Please fill in all fields.');
        }
    });

    // Close modal when clicking outside
    document.getElementById('newAppointmentModal').addEventListener('click', function (e) {
        if (e.target === this) {
            closeNewAppointmentModal();
        }
    });
});

    </script>
   
</body>

</html>