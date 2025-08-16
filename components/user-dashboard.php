<div id="dashboard-content" class="content-section active">
    <div class="mb-4 mt-4">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 text-center">USER DASHBOARD</h2>
        <div class="w-16 sm:w-20 h-0.5 bg-black mx-auto mt-2"></div>
    </div>

    <?php
    $today = date("Y-m-d");

    $todayAppoitmentsResult = Database::search("SELECT COUNT(*) AS count FROM appointment WHERE added_user_nic='" . $user["nic"] . "' AND appointment_status_id='2' AND appointment_date='{$today}' ");
    $ongoingAppoitmentsResult = Database::search("SELECT COUNT(*) AS count FROM appointment WHERE added_user_nic='" . $user["nic"] . "' AND appointment_status_id='2'");
    $rejectedAppoitmentsResult = Database::search("SELECT COUNT(*) AS count FROM appointment WHERE added_user_nic='" . $user["nic"] . "' AND appointment_status_id='3'");
    $totalAppoitmentsResult = Database::search("SELECT COUNT(*) AS count FROM appointment WHERE added_user_nic='" . $user["nic"] . "'");

    $todayAppoitments = $todayAppoitmentsResult->fetch_assoc();
    $ongoingAppoitments = $ongoingAppoitmentsResult->fetch_assoc();
    $rejectedAppoitments = $rejectedAppoitmentsResult->fetch_assoc();
    $totalAppoitments = $totalAppoitmentsResult->fetch_assoc();


    ?>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6 p-3">
        <div class="bg-stone-100 rounded-lg shadow p-4">
            <div class="text-center sm:text-end">
                <h6 class="text-sm sm:text-md font-medium text-gray-600 mb-2">TODAY APPOINTMENTS</h6>
                <h2 class="text-2xl font-bold text-gray-800"><?php echo $todayAppoitments["count"] ?></h2>
            </div>
        </div>
        <div class="bg-stone-100 rounded-lg shadow p-4">
            <div class="text-center sm:text-end">
                <h6 class="text-sm sm:text-md font-medium text-gray-600 mb-2">ONGOING APPOINTMENTS</h6>
                <h2 class="text-2xl font-bold text-gray-800"><?php echo $ongoingAppoitments["count"] ?></h2>
            </div>
        </div>
        <div class="bg-stone-100 rounded-lg shadow p-4">
            <div class="text-center sm:text-end">
                <h6 class="text-sm sm:text-md font-medium text-gray-600 mb-2">REJECTED APPOINTMENTS</h6>
                <h2 class="text-2xl font-bold text-gray-800"><?php echo $rejectedAppoitments["count"] ?></h2>
            </div>
        </div>
        <div class="bg-stone-100 rounded-lg shadow p-4">
            <div class="text-center sm:text-end">
                <h6 class="text-sm sm:text-md font-medium text-gray-600 mb-2">TOTAL APPOINTMENTS</h6>
                <h2 class="text-2xl font-bold text-gray-800"><?php echo $totalAppoitments["count"] ?></h2>
            </div>
        </div>
    </div>

    <!-- Upcoming Appointments -->
    <div class="mt-5 mb-6 p-3">
        <h4 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4">Upcoming Appointments</h4>
        <div class="space-y-4">


            <?php

            $currentTime = date("H:i:s");

            $appoitmentResultSet = Database::search("SELECT * FROM appointment a
                    INNER JOIN service s ON a.service_id = s.id
                    INNER JOIN branch b ON s.branch_id = b.id
                    INNER JOIN department d ON b.department_id = d.id
                    INNER JOIN time_slot t ON a.time_slot_id = t.id
                    WHERE a.added_user_nic = '" . $user["nic"] . "' AND
                    a.appointment_date > '{$today}' AND
                    t.start_time > '{$currentTime}'
                    ORDER BY a.appointment_date ASC, t.start_time ASC
                ");

            while ($row = $appoitmentResultSet->fetch_assoc()) {

            ?>


                <!-- Appointment Card -->
                <div class="bg-stone-100 rounded-lg shadow p-5">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                        <div class="flex-1">
                            <h5 class="font-semibold text-gray-800 mb-2 text-sm"><?php echo $row["title"] ?></h5>
                            <p class="text-gray-600 text-xs mb-3">
                                <?php echo $row["description"] ?>
                            </p>
                            <div class="flex flex-col sm:flex-row gap-1 sm:gap-4 text-xs text-gray-600">
                                <span><strong>Department:</strong> <?php echo $row["department"] ?></span>
                                <span><strong>Branch :</strong> <?php echo $row["branch"] ?></span>
                                <span><strong>Time Slot :</strong> <?php echo $row["start_time"]." - ". $row["end_time"] ?></span>

                              
                            </div>
                        </div>
                        <button class="bg-teal-700 hover:bg-teal-800 text-white px-4 py-2 rounded w-full sm:w-auto text-xs mt-3 lg:mt-10">
                            View Details
                        </button>
                    </div>
                </div>



            <?php



            }


            ?>

        </div>
    </div>
</div>