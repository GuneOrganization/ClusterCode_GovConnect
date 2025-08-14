<div id="employee-appointments-content" class="content-section p-6">

    <!-- Dashboard Header -->
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800">CIVILIAN APPOINTMENTS</h2>
        <div class="w-32 h-0.5 bg-black mx-auto mt-2"></div>
        <p class="mt-2 text-sm text-gray-600">View and manage all civilian appointments</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 hover:shadow-md transition">
            <div class="flex items-center">
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i class="fas fa-calendar-alt text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Total Appointments</h3>
                    <p class="text-2xl font-semibold text-gray-900">156</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 hover:shadow-md transition">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-lg">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Completed</h3>
                    <p class="text-2xl font-semibold text-gray-900">89</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 hover:shadow-md transition">
            <div class="flex items-center">
                <div class="bg-yellow-100 p-3 rounded-lg">
                    <i class="fas fa-hourglass-half text-yellow-600"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Pending</h3>
                    <p class="text-2xl font-semibold text-gray-900">42</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 hover:shadow-md transition">
            <div class="flex items-center">
                <div class="bg-red-100 p-3 rounded-lg">
                    <i class="fas fa-times-circle text-red-600"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Cancelled</h3>
                    <p class="text-2xl font-semibold text-gray-900">25</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 mb-6">
        <div class="flex flex-col md:flex-row gap-4">
            <!-- Reference Number Search -->
            <div class="flex-1">
                <label for="refSearch" class="block text-sm font-medium text-gray-700 mb-1">Reference Number</label>
                <div class="relative">
                    <input type="text" id="refSearch" placeholder="Search by reference..."
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    <div class="absolute right-3 top-2.5 text-gray-400">
                        <i class="fas fa-hashtag"></i>
                    </div>
                </div>
            </div>
            
            <!-- Service Type Filter -->
            <div class="flex-1">
                <label for="serviceFilter" class="block text-sm font-medium text-gray-700 mb-1">Service Type</label>
                <div class="relative">
                    <select id="serviceFilter"
                        class="w-full py-2 px-4 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm bg-white appearance-none cursor-pointer">
                        <option value="">All Services</option>
                        <option value="license">Driving License</option>
                        <option value="passport">Passport</option>
                        <option value="id">National ID</option>
                        <option value="certificate">Birth Certificate</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </div>
                </div>
            </div>
            
            <!-- Date Filter -->
            <div class="flex-1">
                <label for="dateFilter" class="block text-sm font-medium text-gray-700 mb-1">Appointment Date</label>
                <div class="relative">
                    <input type="date" id="dateFilter"
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    <div class="absolute right-3 top-2.5 text-gray-400">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                </div>
            </div>
            
            <!-- Time Slot Filter -->
            <div class="flex-1">
                <label for="timeFilter" class="block text-sm font-medium text-gray-700 mb-1">Time Slot</label>
                <div class="relative">
                    <select id="timeFilter"
                        class="w-full py-2 px-4 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm bg-white appearance-none cursor-pointer">
                        <option value="">All Time Slots</option>
                        <option value="morning">Morning (8AM-12PM)</option>
                        <option value="afternoon">Afternoon (1PM-5PM)</option>
                        <option value="evening">Evening (5PM-8PM)</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </div>
                </div>
            </div>
            
            <!-- Search Button -->
            <div class="flex items-end">
                <button id="searchButton" class="h-10 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <i class="fas fa-search mr-2"></i> Search
                </button>
            </div>
        </div>
    </div>

    <!-- Appointments Cards Section -->
    <div class="mb-4 flex justify-between items-center">
        <h3 class="text-lg font-medium text-gray-900">All Appointments</h3>
        <span class="text-sm text-gray-500">Showing 10 of 156 results</span>
    </div>

    <!-- Appointments Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Appointment Card 1 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition">
            <!-- Card Header -->
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                <div>
                    <span class="font-medium text-gray-900">REF-20230815-001</span>
                    <span class="ml-2 px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                </div>
                <button class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
            
            <!-- Card Body -->
            <div class="p-4">
                <div class="mb-4">
                    <h4 class="text-lg font-semibold text-gray-900">Nimal Silva</h4>
                    <p class="text-sm text-gray-500">987654321V</p>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Service Type</p>
                        <p class="text-sm text-gray-900">Driving License</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Date & Time</p>
                        <p class="text-sm text-gray-900">15 Aug 2023, 09:00 AM</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Accepted By</p>
                        <p class="text-sm text-gray-900">Officer Kamal</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Completed By</p>
                        <p class="text-sm text-gray-900">Officer Kamal</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Accepted On</p>
                        <p class="text-sm text-gray-900">14 Aug 2023, 10:30 AM</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Completed On</p>
                        <p class="text-sm text-gray-900">15 Aug 2023, 09:45 AM</p>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 pt-3">
                    <p class="text-xs font-medium text-gray-500 uppercase mb-1">Feedback & Rating</p>
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-900 truncate">Very helpful and efficient service. Thank you!</p>
                        <div class="flex items-center bg-yellow-50 px-2 py-1 rounded">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="text-sm font-medium">4.5</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Card Footer -->
            <div class="px-4 py-3 border-t border-gray-200 bg-gray-50 flex justify-end">
                <button class="px-3 py-1 bg-blue-50 text-blue-600 rounded-md text-sm hover:bg-blue-100 mr-2">
                    <i class="fas fa-print mr-1"></i> Print
                </button>
                <button class="px-3 py-1 bg-green-50 text-green-600 rounded-md text-sm hover:bg-green-100">
                    <i class="fas fa-eye mr-1"></i> View
                </button>
            </div>
        </div>

        <!-- Appointment Card 2 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition">
            <!-- Card Header -->
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                <div>
                    <span class="font-medium text-gray-900">REF-20230814-045</span>
                    <span class="ml-2 px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                </div>
                <button class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
            
            <!-- Card Body -->
            <div class="p-4">
                <div class="mb-4">
                    <h4 class="text-lg font-semibold text-gray-900">Sunil Perera</h4>
                    <p class="text-sm text-gray-500">876543219V</p>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Service Type</p>
                        <p class="text-sm text-gray-900">Passport Renewal</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Date & Time</p>
                        <p class="text-sm text-gray-900">18 Aug 2023, 02:30 PM</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Accepted By</p>
                        <p class="text-sm text-gray-900">-</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Completed By</p>
                        <p class="text-sm text-gray-900">-</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Accepted On</p>
                        <p class="text-sm text-gray-900">-</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Completed On</p>
                        <p class="text-sm text-gray-900">-</p>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 pt-3">
                    <p class="text-xs font-medium text-gray-500 uppercase mb-1">Feedback & Rating</p>
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-400 italic">No feedback yet</p>
                        <div class="flex items-center bg-gray-100 px-2 py-1 rounded">
                            <span class="text-sm font-medium text-gray-400">-</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Card Footer -->
            <div class="px-4 py-3 border-t border-gray-200 bg-gray-50 flex justify-end">
                <button class="px-3 py-1 bg-blue-50 text-blue-600 rounded-md text-sm hover:bg-blue-100 mr-2">
                    <i class="fas fa-print mr-1"></i> Print
                </button>
                <button class="px-3 py-1 bg-green-50 text-green-600 rounded-md text-sm hover:bg-green-100">
                    <i class="fas fa-eye mr-1"></i> View
                </button>
            </div>
        </div>

        <!-- Appointment Card 3 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition">
            <!-- Card Header -->
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                <div>
                    <span class="font-medium text-gray-900">REF-20230812-112</span>
                    <span class="ml-2 px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Cancelled</span>
                </div>
                <button class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
            
            <!-- Card Body -->
            <div class="p-4">
                <div class="mb-4">
                    <h4 class="text-lg font-semibold text-gray-900">Anoma Fernando</h4>
                    <p class="text-sm text-gray-500">765432198V</p>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Service Type</p>
                        <p class="text-sm text-gray-900">Birth Certificate</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Date & Time</p>
                        <p class="text-sm text-gray-900">14 Aug 2023, 10:00 AM</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Accepted By</p>
                        <p class="text-sm text-gray-900">Officer Nimali</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Completed By</p>
                        <p class="text-sm text-gray-900">-</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Accepted On</p>
                        <p class="text-sm text-gray-900">13 Aug 2023, 03:15 PM</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Completed On</p>
                        <p class="text-sm text-gray-900">-</p>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 pt-3">
                    <p class="text-xs font-medium text-gray-500 uppercase mb-1">Cancellation Reason</p>
                    <p class="text-sm text-gray-900">Civilian requested cancellation</p>
                </div>
            </div>
            
            <!-- Card Footer -->
            <div class="px-4 py-3 border-t border-gray-200 bg-gray-50 flex justify-end">
                <button class="px-3 py-1 bg-blue-50 text-blue-600 rounded-md text-sm hover:bg-blue-100 mr-2">
                    <i class="fas fa-print mr-1"></i> Print
                </button>
                <button class="px-3 py-1 bg-green-50 text-green-600 rounded-md text-sm hover:bg-green-100">
                    <i class="fas fa-eye mr-1"></i> View
                </button>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between border-t border-gray-200 pt-4">
        <div>
            <p class="text-sm text-gray-700">
                Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span class="font-medium">156</span> results
            </p>
        </div>
        <nav class="inline-flex -space-x-px">
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-sm text-gray-500 hover:bg-gray-50 rounded-l-lg">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a href="#" class="px-3 py-2 border border-blue-500 bg-blue-50 text-sm text-blue-600">1</a>
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-sm text-gray-500 hover:bg-gray-50">2</a>
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-sm text-gray-500 hover:bg-gray-50">3</a>
            <span class="px-3 py-2 border border-gray-300 bg-white text-sm text-gray-500">...</span>
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-sm text-gray-500 hover:bg-gray-50">12</a>
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-sm text-gray-500 hover:bg-gray-50 rounded-r-lg">
                <i class="fas fa-chevron-right"></i>
            </a>
        </nav>
    </div>
</div>