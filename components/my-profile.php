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