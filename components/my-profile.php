    <!-- My Profile Section -->
    <div id="my-profile-content" class="content-section">
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 text-center">
                MY PROFILE
            </h2>
            <div class="w-20 h-0.5 bg-black mx-auto mt-2"></div>
        </div>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg p-8">

                <div class="text-center mb-6">
                    <div class="w-28 h-28 rounded-full mx-auto mb-4 overflow-hidden border border-gray-300">
                        <img
                            src="assets/images/dashboard_icons/my_profile.png"
                            alt="User Profile Picture"
                            class="w-full h-full object-cover" />
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-800 text-center">USER NAME</h3>



                <form class="space-y-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <input
                                type="text"
                                class="w-full border-b-2 border-gray-300 py-3 px-1 text-base text-gray-700 focus:border-teal-600 focus:outline-none"
                                placeholder="First Name"
                                required />
                        </div>
                        <div>
                            <input
                                type="text"
                                class="w-full border-b-2 border-gray-300 py-3 px-1 text-base text-gray-700 focus:border-teal-600 focus:outline-none"
                                placeholder="Last Name"
                                required />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <input
                                type="text"
                                class="w-full border-b-2 border-gray-300 py-3 px-1 text-base text-gray-700 focus:border-teal-600 focus:outline-none"
                                placeholder="NIC"
                                required />
                        </div>
                        <div>
                            <input
                                type="text"
                                class="w-full border-b-2 border-gray-300 py-3 px-1 text-base text-gray-700 focus:border-teal-600 focus:outline-none"
                                placeholder="Mobile Number"
                                required />
                        </div>
                    </div>

                    <div>
                        <input
                            type="email"
                            class="w-full border-b-2 border-gray-300 py-3 px-1 text-base text-gray-700 focus:border-teal-600 focus:outline-none"
                            placeholder="Email Address"
                            required />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="relative">
                            <input
                                type="password"
                                class="w-full border-b-2 border-gray-300 py-3 px-1 text-base text-gray-700 focus:border-teal-600 focus:outline-none"
                                placeholder="Password"
                                id="password"
                                required />
                            <button
                                type="button"
                                class="absolute right-0 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                                onclick="togglePassword()">
                                👁
                            </button>
                        </div>
                        <div class="relative">
                            <input
                                type="password"
                                class="w-full border-b-2 border-gray-300 py-3 px-1 text-base text-gray-700 focus:border-teal-600 focus:outline-none pr-10"
                                placeholder="Retype Password"
                                id="retypePassword"
                                required />
                            <button
                                type="button"
                                class="absolute right-0 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                                onclick="togglePassword()">
                                👁
                            </button>
                        </div>
                    </div>

                    <div class="flex gap-4 pt-6">
                        <button
                            type="button"
                            class="flex-1 bg-gray-800 hover:bg-gray-900 text-white py-3 rounded-md font-medium">
                            RESET DETAILS
                        </button>
                        <button
                            type="submit"
                            class="flex-1 bg-teal-500 hover:bg-teal-600 text-white py-3 rounded-md font-medium">
                            UPDATE DETAILS
                        </button>
                    </div>
                </form>
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