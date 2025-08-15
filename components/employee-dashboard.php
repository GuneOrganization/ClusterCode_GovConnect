<div id="employee-dashboard-content" class="content-section active p-3 sm:p-6">

    <!-- Dashboard Header -->
    <div class="mb-6 text-center">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-800">OFFICER DASHBOARD</h2>
        <div class="w-24 sm:w-32 h-0.5 bg-black mx-auto mt-2"></div>
        <p class="mt-2 text-xs sm:text-sm text-gray-600">Today's appointment overview</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 xs:grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-stone-200 rounded-xl shadow-sm border p-4 hover:shadow-md transition">
            <div class="flex items-center">
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i class="fas fa-calendar-alt text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-xs sm:text-sm font-medium text-gray-500">Total Appointments</h3>
                    <p class="text-lg sm:text-2xl font-semibold text-gray-900">24</p>
                </div>
            </div>
        </div>

        <div class="bg-stone-200 rounded-xl shadow-sm border p-4 hover:shadow-md transition">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-lg">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-xs sm:text-sm font-medium text-gray-500">Available</h3>
                    <p class="text-lg sm:text-2xl font-semibold text-gray-900">8</p>
                </div>
            </div>
        </div>

        <div class="bg-stone-200 rounded-xl shadow-sm border p-4 hover:shadow-md transition">
            <div class="flex items-center">
                <div class="bg-red-100 p-3 rounded-lg">
                    <i class="fas fa-times-circle text-red-600"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-xs sm:text-sm font-medium text-gray-500">Cancelled</h3>
                    <p class="text-lg sm:text-2xl font-semibold text-gray-900">3</p>
                </div>
            </div>
        </div>

        <div class="bg-stone-200 rounded-xl shadow-sm border p-4 hover:shadow-md transition">
            <div class="flex items-center">
                <div class="bg-teal-100 p-3 rounded-lg">
                    <i class="fas fa-check-double text-teal-600"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-xs sm:text-sm font-medium text-gray-500">Completed</h3>
                    <p class="text-lg sm:text-2xl font-semibold text-gray-900">13</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="flex flex-col sm:flex-row gap-2 mb-6 justify-center">
        <div class="w-full sm:w-80">
            <div class="relative">
                <input type="text" id="searchInput" placeholder="Search appointments..."
                    class="w-full pl-4 pr-12 py-2 sm:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 text-sm">
                <button class="absolute right-0 top-0 bottom-0 bg-green-600 text-white px-4 rounded-r-lg hover:bg-green-700">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div class="relative w-full sm:w-auto">
            <select id="statusFilter"
                class="w-full py-2 sm:py-3 px-4 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 text-sm bg-white appearance-none cursor-pointer">
                <option value="">All Status</option>
                <option value="confirmed">Confirmed</option>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <i class="fas fa-chevron-down text-gray-400"></i>
            </div>
        </div>
        <div class="relative w-full sm:w-auto">
            <select id="sortBy"
                class="w-full py-2 sm:py-3 px-4 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 text-sm bg-white appearance-none cursor-pointer">
                <option value="date-desc">Latest First</option>
                <option value="date-asc">Oldest First</option>
                <option value="name-asc">Name A-Z</option>
                <option value="name-desc">Name Z-A</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <i class="fas fa-chevron-down text-gray-400"></i>
            </div>
        </div>
    </div>

    <!-- Appointments Table (Mobile Cards on Small Screens) -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-4 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">Today's Appointments</h3>
            <span class="text-sm text-gray-500">Total: 24</span>
        </div>

        <!-- Desktop Table -->
        <div class="overflow-x-auto hidden md:block">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Appointment ID</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Civilian Name</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Mobile</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">NIC</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4 font-medium text-gray-900">APT001</td>
                        <td class="px-4 py-4 text-gray-900">Kasun Perera</td>
                        <td class="px-4 py-4 text-gray-900">0771234567</td>
                        <td class="px-4 py-4 text-gray-900">123456789V</td>
                        <td class="px-4 py-4 text-gray-900">2025-08-14 09:00</td>
                        <td class="px-4 py-4">
                            <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full bg-green-100 text-green-800">Confirmed</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Mobile Card View -->
        <div class="md:hidden divide-y mb-10">
            <div class="p-4">
                <p class="text-xs text-gray-500">Appointment ID</p>
                <p class="font-medium">APT001</p>
                <p class="text-xs text-gray-500 mt-2">Civilian Name</p>
                <p class="font-medium">Kasun Perera</p>
                <p class="text-xs text-gray-500 mt-2">Mobile</p>
                <p class="font-medium">0771234567</p>
                <p class="text-xs text-gray-500 mt-2">NIC</p>
                <p class="font-medium">123456789V</p>
                <p class="text-xs text-gray-500 mt-2">Date & Time</p>
                <p class="font-medium">2025-08-14 09:00</p>
                <p class="text-xs text-gray-500 mt-2">Status</p>
                <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full bg-green-100 text-green-800">Confirmed</span>
            </div>

            
        </div>
    </div>
</div>
