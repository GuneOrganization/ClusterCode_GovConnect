<div id="employee-analytics-content" class="content-section">

    <!-- Dashboard Header -->
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800">OFFICER DASHBOARD</h2>
        <div class="w-32 h-0.5 bg-black mx-auto mt-2"></div>
        <p class="mt-2 text-sm text-gray-600">Today's appointment overview</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <!-- Your existing stats cards here -->
    </div>

    <!-- Appointment Distribution Bar Graph -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 mb-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Appointment Distribution by Time Slot</h3>

        <!-- Bar Graph Container -->
        <div class="h-64 flex flex-col">
            <!-- Y-axis labels and bars container -->
            <div class="flex flex-1 gap-1 sm:gap-2">
                <!-- Y-axis labels -->
                <div class="flex flex-col justify-between text-xs text-gray-500 pr-2">
                    <span>20</span>
                    <span>15</span>
                    <span>10</span>
                    <span>5</span>
                    <span>0</span>
                </div>

                <!-- Bars -->
                <div class="flex-1 flex items-end gap-1 sm:gap-2">
                    <!-- Bar 1 -->
                    <div class="flex-1 flex flex-col items-center">
                        <div
                            class="w-full bg-blue-500 hover:bg-blue-600 transition-all rounded-t-sm"
                            style="height: 70%;"
                            title="8:00-9:00 - 14 appointments"></div>
                        <span class="text-xs mt-1 text-gray-500">8-9</span>
                    </div>

                    <!-- Bar 2 -->
                    <div class="flex-1 flex flex-col items-center">
                        <div
                            class="w-full bg-blue-500 hover:bg-blue-600 transition-all rounded-t-sm"
                            style="height: 85%;"
                            title="9:00-10:00 - 17 appointments"></div>
                        <span class="text-xs mt-1 text-gray-500">9-10</span>
                    </div>

                    <!-- Bar 3 -->
                    <div class="flex-1 flex flex-col items-center">
                        <div
                            class="w-full bg-blue-500 hover:bg-blue-600 transition-all rounded-t-sm"
                            style="height: 65%;"
                            title="10:00-11:00 - 13 appointments"></div>
                        <span class="text-xs mt-1 text-gray-500">10-11</span>
                    </div>

                    <!-- Bar 4 -->
                    <div class="flex-1 flex flex-col items-center">
                        <div
                            class="w-full bg-blue-500 hover:bg-blue-600 transition-all rounded-t-sm"
                            style="height: 45%;"
                            title="11:00-12:00 - 9 appointments"></div>
                        <span class="text-xs mt-1 text-gray-500">11-12</span>
                    </div>

                    <!-- Bar 5 -->
                    <div class="flex-1 flex flex-col items-center">
                        <div
                            class="w-full bg-blue-500 hover:bg-blue-600 transition-all rounded-t-sm"
                            style="height: 30%;"
                            title="12:00-13:00 - 6 appointments"></div>
                        <span class="text-xs mt-1 text-gray-500">12-13</span>
                    </div>

                    <!-- Bar 6 -->
                    <div class="flex-1 flex flex-col items-center">
                        <div
                            class="w-full bg-blue-500 hover:bg-blue-600 transition-all rounded-t-sm"
                            style="height: 55%;"
                            title="13:00-14:00 - 11 appointments"></div>
                        <span class="text-xs mt-1 text-gray-500">13-14</span>
                    </div>

                    <!-- Bar 7 -->
                    <div class="flex-1 flex flex-col items-center">
                        <div
                            class="w-full bg-blue-500 hover:bg-blue-600 transition-all rounded-t-sm"
                            style="height: 40%;"
                            title="14:00-15:00 - 8 appointments"></div>
                        <span class="text-xs mt-1 text-gray-500">14-15</span>
                    </div>

                    <!-- Bar 8 -->
                    <div class="flex-1 flex flex-col items-center">
                        <div
                            class="w-full bg-blue-500 hover:bg-blue-600 transition-all rounded-t-sm"
                            style="height: 25%;"
                            title="15:00-16:00 - 5 appointments"></div>
                        <span class="text-xs mt-1 text-gray-500">15-16</span>
                    </div>

                    <!-- Bar 9 -->
                    <div class="flex-1 flex flex-col items-center">
                        <div
                            class="w-full bg-blue-500 hover:bg-blue-600 transition-all rounded-t-sm"
                            style="height: 15%;"
                            title="16:00-17:00 - 3 appointments"></div>
                        <span class="text-xs mt-1 text-gray-500">16-17</span>
                    </div>
                </div>
            </div>

            <!-- X-axis label -->
            <div class="text-center text-xs text-gray-500 mt-2">Time Slots (Hours)</div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="flex flex-col md:flex-row gap-2 mb-6 justify-center">
        <!-- Your existing search and filter section here -->
    </div>

    <!-- Appointments Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <!-- Your existing table content here -->
    </div>
</div>