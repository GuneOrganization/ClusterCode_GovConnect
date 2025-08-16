<div id="employee-appointments-content" class="content-section p-4 sm:p-6">

    <!-- Dashboard Header -->
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800">CIVILIAN APPOINTMENTS</h2>
        <div class="w-32 h-0.5 bg-black mx-auto mt-2"></div>
        <p class="mt-2 text-sm text-gray-600">View and manage all civilian appointments</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <?php
        $user_nic = $_SESSION['user']['nic'];
        $all_result = Database::search("
                                    SELECT * FROM `appointment` 
                                    INNER JOIN `appointment_status` ON `appointment`.`appointment_status_id` = `appointment_status`.`id`
                                    INNER JOIN `service` ON `appointment`.`service_id` = `service`.`id`
                                    INNER JOIN `user_has_branch` ON `service`.`branch_id` = `user_has_branch`.`branch_id`
                                    WHERE `service_id` = (
                                    SELECT `id` FROM `service` 
                                    WHERE `branch_id` = (
                                    SELECT `branch_id` FROM `user_has_branch` 
                                    WHERE `user_nic` = '" . $user_nic . "'
                                         )
                                       )
                                    ");

        $total_appointments = 0;
        $pending_appointments = 0;
        $accepted_appointments = 0;
        $rejected_appointments = 0;
        $completed_appointments = 0;

        if ($all_result && $all_result->num_rows > 0) {
            $total_appointments = $all_result->num_rows;

            while ($data = $all_result->fetch_assoc()) {
                $status = $data['status'];
                switch ($status) {
                    case 'Pending':
                        $pending_appointments++;
                        break;
                    case 'Accepted':
                        $accepted_appointments++;
                        break;
                    case 'Rejected':
                        $rejected_appointments++;
                        break;
                    case 'Completed':
                        $completed_appointments++;
                        break;
                }
            }
        }
        ?>
        <div class="bg-stone-200 rounded-xl shadow-sm  p-4 hover:shadow-md transition">
            <div class="flex items-center">
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i class="fas fa-calendar-alt text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Total Appointments</h3>
                    <p class="text-2xl font-semibold text-gray-900"><?php echo $total_appointments ?> </p>
                </div>
            </div>
        </div>
        <div class="bg-stone-200 rounded-xl shadow-sm  p-4 hover:shadow-md transition">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-lg">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Completed</h3>
                    <p class="text-2xl font-semibold text-gray-900"><?php echo $completed_appointments ?></p>
                </div>
            </div>
        </div>
        <div class="bg-stone-200 rounded-xl shadow-sm  p-4 hover:shadow-md transition">
            <div class="flex items-center">
                <div class="bg-yellow-100 p-3 rounded-lg">
                    <i class="fas fa-hourglass-half text-yellow-600"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Pending</h3>
                    <p class="text-2xl font-semibold text-gray-900"><?php echo $pending_appointments ?></p>
                </div>
            </div>
        </div>
        <div class="bg-stone-200 rounded-xl shadow-sm  p-4 hover:shadow-md transition">
            <div class="flex items-center">
                <div class="bg-red-100 p-3 rounded-lg">
                    <i class="fas fa-times-circle text-red-600"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Cancelled</h3>
                    <p class="text-2xl font-semibold text-gray-900"><?php echo $rejected_appointments ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 mb-6">
        <div class="flex flex-col sm:flex-row flex-wrap gap-4">
            <!-- Reference Number Search -->
            <div class="flex-1 min-w-[200px]">
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
            <div class="flex-1 min-w-[200px]">
                <label for="serviceFilter" class="block text-sm font-medium text-gray-700 mb-1">Service Type</label>
                <div class="relative">
                    <select id="serviceFilter"
                        class="w-full py-2 px-4 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm bg-white appearance-none cursor-pointer">
                        <option value="">All Services</option>
                        <?php
                        $result = Database::search("SELECT * FROM `service`");

                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['title']) . '</option>';
                            }
                        } else {
                            echo '<option disabled>No services available</option>';
                        }

                        ?>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Date Filter -->
            <div class="flex-1 min-w-[200px]">
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
            <div class="flex-1 min-w-[200px]">
                <label for="timeFilter" class="block text-sm font-medium text-gray-700 mb-1">Time Slot</label>
                <div class="relative">
                    <select id="timeFilter"
                        class="w-full py-2 px-4 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm bg-white appearance-none cursor-pointer">
                        <option value="">All Time Slots</option>
                        <?php
                        $result = Database::search("SELECT * FROM `time_slot`");

                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['start_time']) . "-" . htmlspecialchars($row['end_time']) . '</option>';
                            }
                        } else {
                            echo '<option disabled>No slots available</option>';
                        }

                        ?>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Search Button -->
            <div class="flex items-end min-w-[120px]">
                <button id="searchButton" class="h-10 w-full sm:w-auto px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <i class="fas fa-search mr-2"></i> Search
                </button>
            </div>
        </div>
    </div>

    <!-- Appointments Cards Grid -->
    <div class="grid grid-cols-1 gap-6 mb-8 overflow-y-auto max-h-[420px]">
        <!-- Example Appointment Card -->
        <?php
        $appoinment_result = Database::search("
                                    SELECT * FROM `appointment` 
                                    INNER JOIN `appointment_status` ON `appointment`.`appointment_status_id` = `appointment_status`.`id`
                                    INNER JOIN `service` ON `appointment`.`service_id` = `service`.`id`
                                    INNER JOIN `user` ON `appointment`.`added_user_nic` = `user`.`nic`
                                 ");

        if ($appoinment_result && $appoinment_result->num_rows > 0) {
            $today_appointments = $appoinment_result->num_rows;
        } else {
            $today_appointments = 0;
        }
        ?>
        <?php while ($appointment = $appoinment_result->fetch_assoc()): ?>
            <div class="bg-stone-200 rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition">

                <div class="px-4 py-3 border-b border-gray-200 bg-gray-50 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                        <span class="font-medium text-gray-900"><?php echo $appointment['reference_number']; ?></span>
                        <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full
                              <?php
                                $status = strtolower($appointment['status']);
                                if ($status == "accepted") echo "bg-green-100 text-green-800";
                                elseif ($status == "pending") echo "bg-yellow-100 text-yellow-800";
                                elseif ($status == "rejected") echo "bg-red-100 text-red-800";
                                elseif ($status == "completed") echo "bg-blue-100 text-blue-800";
                                else echo "bg-gray-100 text-gray-800";
                                ?>
                        ">
                            <?php echo ucfirst($status); ?>
                        </span>
                    </div>
                    <button class="text-gray-400 hover:text-gray-600 self-start sm:self-auto" onclick="loadAppointments()">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>

                <div class="p-4">
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold text-gray-900"><?php echo $appointment['first_name'] . " " . $appointment['last_name']; ?></h4>
                        <p class="text-sm text-gray-500"><b><?php echo $appointment['nic']; ?></b></p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                        <div>
                            <p class="text-xs font-medium text-gray-500 uppercase"><b>Service Type</b></p>
                            <p class="text-sm text-gray-900"><?php echo $appointment['title']; ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 uppercase"><b>Date & Time</b></p>
                            <p class="text-sm text-gray-900"><?php echo $appointment['added_datetime']; ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 uppercase"><b>Accepted By</b></p>
                            <p class="text-sm text-gray-900">
                                <?php
                                $appoinment_user_result = Database::search("SELECT `first_name`, `last_name` FROM `user` WHERE `nic` = '" . $appointment['accepted_user_nic'] . "'");
                                $appoinment_user_data = $appoinment_user_result->fetch_assoc();
                                echo ($appointment['status'] == "Accepted" || $appointment['status'] == "Completed") ? $appoinment_user_data['first_name'] . " " . $appoinment_user_data['last_name'] : "-";
                                ?>
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 uppercase"><b>Completed By</b></p>
                            <p class="text-sm text-gray-900">
                                <?php
                                $appoinment_user_result = Database::search("SELECT `first_name`, `last_name` FROM `user` WHERE `nic` = '" . $appointment['completed_user_nic'] . "'");
                                $appoinment_user_data = $appoinment_user_result->fetch_assoc();
                                echo ($appointment['status'] == "Completed") ? $appoinment_user_data['first_name'] . " " . $appoinment_user_data['last_name']  : "-";
                                ?>
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 uppercase"><b>Accepted On</b></p>
                            <p class="text-sm text-gray-900">
                                <?php
                                echo ($appointment['status'] == "Accepted" || $appointment['status'] == "Completed") ? date("d M Y, h:i A", strtotime($appointment['accepted_datetime'])) : "-";
                                ?>
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 uppercase"><b>Completed On</b></p>
                            <p class="text-sm text-gray-900">
                                <?php
                                echo ($appointment['status'] == "Completed") ? date("d M Y, h:i A", strtotime($appointment['completed_datetime'])) : "-";
                                ?>
                            </p>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-3">
                        <p class="text-xs font-medium text-gray-500 uppercase mb-1"><b>Feedback & Rating</b></p>
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2">
                            <p class="text-sm text-gray-900 truncate"><?php echo $appointment['feedback']; ?></p>
                            <div class="flex items-center bg-yellow-50 px-2 py-1 rounded">
                                <i class="fas fa-star text-yellow-400 mr-1"></i>
                                <span class="text-sm font-medium"><?php echo $appointment['rating']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 border-t border-gray-200 bg-gray-50 flex flex-col sm:flex-row justify-end gap-2">
                    <button class="px-3 py-1 bg-blue-50 text-blue-600 rounded-md text-sm hover:bg-blue-100 flex items-center justify-center sm:justify-start">
                        <i class="fas fa-print mr-1"></i> Print
                    </button>
                    <button onclick="openModal('<?php echo $appointment['reference_number']; ?>');" class="px-3 py-1 bg-green-50 text-green-600 rounded-md text-sm hover:bg-green-100 flex items-center justify-center sm:justify-start">
                        <i class="fas fa-eye mr-1"></i> View
                    </button>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
