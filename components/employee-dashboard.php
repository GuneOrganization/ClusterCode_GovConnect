<div id="employee-dashboard-content" class="content-section active p-3 sm:p-6">

    <div class="mb-6 text-center">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-800">OFFICER DASHBOARD</h2>
        <div class="w-24 sm:w-32 h-0.5 bg-black mx-auto mt-2"></div>
        <p class="mt-2 text-xs sm:text-sm text-gray-600">Today's appointment overview</p>
    </div>

    <div class="grid grid-cols-1 xs:grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <?php
        $user_nic = $_SESSION['user']['nic'];
        $result = Database::search("
                                    SELECT * FROM `appointment` 
                                    INNER JOIN `appointment_status` ON `appointment`.`appointment_status_id` = `appointment_status`.`id`
                                    INNER JOIN `service` ON `appointment`.`service_id` = `service`.`id`
                                    INNER JOIN `user_has_branch` ON `service`.`branch_id` = `user_has_branch`.`branch_id` 
                                    AND DATE(`appointment`.`appointment_date`) = CURDATE()
                                    ");
        $total_appointments = 0;
        $pending_appointments = 0;
        $accepted_appointments = 0;
        $rejected_appointments = 0;
        $completed_appointments = 0;
        $available_appointments = 0;

        if ($result && $result->num_rows > 0) {
            $total_appointments = $result->num_rows;

            
            while ($data = $result->fetch_assoc()) {
                if ($data['status'] === 'Pending') $pending_appointments++;
                if ($data['status'] === 'Accepted') $accepted_appointments++;
                if ($data['status'] === 'Rejected') $rejected_appointments++;
                if ($data['status'] === 'Completed') $completed_appointments++;
            }

            
            $available_appointments = $pending_appointments + $accepted_appointments;
        }
        ?>
        <div class="bg-stone-200 rounded-xl shadow-sm border p-4 hover:shadow-md transition">
            <div class="flex items-center">
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i class="fas fa-calendar-alt text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-xs sm:text-sm font-medium text-gray-500">Total Appointments</h3>
                    <p class="text-lg sm:text-2xl font-semibold text-gray-900"><?php echo $total_appointments ?></p>
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
                    <p class="text-lg sm:text-2xl font-semibold text-gray-900"><?php echo $available_appointments ?></p>
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
                    <p class="text-lg sm:text-2xl font-semibold text-gray-900"><?php echo $rejected_appointments ?></p>
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
                    <p class="text-lg sm:text-2xl font-semibold text-gray-900"><?php echo $completed_appointments ?></p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <?php
        $appoinment_result = Database::search("
                                    SELECT * FROM `appointment` 
                                    INNER JOIN `appointment_status` ON `appointment`.`appointment_status_id` = `appointment_status`.`id`
                                    INNER JOIN `service` ON `appointment`.`service_id` = `service`.`id`
                                    INNER JOIN `user` ON `appointment`.`added_user_nic` = `user`.`nic`
                                    WHERE DATE(`appointment`.`appointment_date`) = CURDATE()
                                 ");

        if ($appoinment_result && $appoinment_result->num_rows > 0) {
            $today_appointments = $appoinment_result->num_rows;
        } else {
            $today_appointments = 0;
        }
        ?>
        <div class="px-4 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">Today's Appointments</h3>
            <span class="text-sm text-gray-500">Total: <?php echo $today_appointments ?></span>
        </div>

        
        <div class="overflow-x-auto hidden md:block">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Appointment ID</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Civilian Name</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Mobile</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">NIC</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Service Name</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php while ($appointment = $appoinment_result->fetch_assoc()): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4 font-medium text-gray-900"><?php echo $appointment['reference_number']; ?></td>
                            <td class="px-4 py-4 text-gray-900"><?php echo $appointment['first_name'] . " " . $appointment['last_name']; ?></td>
                            <td class="px-4 py-4 text-gray-900"><?php echo $appointment['mobile']; ?></td>
                            <td class="px-4 py-4 text-gray-900"><?php echo $appointment['nic']; ?></td>
                            <td class="px-4 py-4 text-gray-900"><?php echo $appointment['added_datetime']; ?></td>
                            <td class="px-4 py-4 text-gray-900"><?php echo $appointment['title']; ?></td>
                            <td class="px-4 py-4">
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
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        
        <div class="md:hidden divide-y mb-10">
            <?php
            
            $appoinment_result->data_seek(0);
            while ($appointment = $appoinment_result->fetch_assoc()):
            ?>
                <div class="p-4">
                    <p class="text-xs text-gray-500">Appointment ID</p>
                    <p class="font-medium"><?php echo $appointment['reference_number']; ?></p>

                    <p class="text-xs text-gray-500 mt-2">Civilian Name</p>
                    <p class="font-medium"><?php echo $appointment['first_name'] . " " . $appointment['last_name']; ?></p>

                    <p class="text-xs text-gray-500 mt-2">Mobile</p>
                    <p class="font-medium"><?php echo $appointment['mobile']; ?></p>

                    <p class="text-xs text-gray-500 mt-2">NIC</p>
                    <p class="font-medium"><?php echo $appointment['nic']; ?></p>

                    <p class="text-xs text-gray-500 mt-2">Date & Time</p>
                    <p class="font-medium"><?php echo $appointment['added_datetime']; ?></p>

                    <p class="text-xs text-gray-500 mt-2">Service Name</p>
                    <p class="font-medium"><?php echo $appointment['title']; ?></p>

                    <p class="text-xs text-gray-500 mt-2">Status</p>
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
            <?php endwhile; ?>
        </div>
           
    </div>
</div>