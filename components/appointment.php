<div id="appointments-content" class="content-section">
    <div class="mx-auto p-4 sm:p-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
            <div>
                <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">APPOINTMENTS</h2>
                <div class="w-16 sm:w-20 h-0.5 bg-black mt-2"></div>
            </div>
            <button id="newAppointmentBtn"
                class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded font-medium flex items-center justify-center gap-2 transition-colors w-full sm:w-auto">
                <span class="text-lg">+</span> NEW APPOINTMENT
            </button>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Side - Booking Cards -->
            <div class="lg:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Appointment Card Template -->
                    <div
                        class="bg-stone-200 rounded-lg shadow-sm border p-4 hover:shadow-md transition-shadow">
                        <div class="space-y-2 text-sm">
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
                        <div class="flex flex-col sm:flex-row gap-2 mt-4">
                            <button
                                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded text-sm font-medium transition-colors w-full sm:w-auto">CANCEL</button>
                            <button
                                class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded text-sm font-medium transition-colors w-full sm:w-auto">VIEW
                                BARCODE</button>
                            <button id="openFeedback" 
                                class="bg-black hover:bg-gray-900 text-white px-4 py-2 rounded text-sm font-medium transition-colors w-full sm:w-auto"><i class="fa-regular fa-thumbs-up"></i></button>
                        </div>
                    </div>

                    <!-- Duplicate this card block for other appointments -->
                </div>
            </div>

            <!-- Right Side - Calendar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm border p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Calendar</h3>
                    <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:gap-6 gap-2">
                        <div class="flex items-center gap-2 text-xs">
                            <div class="w-3 h-3 bg-teal-200 rounded"></div>
                            <span class="text-gray-600">Booking Days</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            <div class="w-3 h-3 bg-yellow-200 rounded"></div>
                            <span class="text-gray-600">Holidays</span>
                        </div>
                    </div>
                    <div id="calendar" class="overflow-x-auto"></div>
                </div>
            </div>
        </div>
    </div>
</div>
