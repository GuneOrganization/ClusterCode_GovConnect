<div id="appointments-content" class="content-section">
    <div class="mx-auto p-4 sm:p-6">

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


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <?php

                    $appoitmentResultSet = Database::search("SELECT * FROM appointment a
                    INNER JOIN appointment_status aps ON a.appointment_status_id = aps.id
                    INNER JOIN service s ON a.service_id = s.id
                    INNER JOIN branch b ON s.branch_id = b.id
                    INNER JOIN department d ON b.department_id = d.id
                    INNER JOIN time_slot t ON a.time_slot_id = t.id
                    WHERE a.added_user_nic = '" . $user["nic"] . "' 
                    ORDER BY a.appointment_date ASC, t.start_time ASC
                ");

                    while ($row = $appoitmentResultSet->fetch_assoc()) {

                    ?>

                        <!-- Appointment Card Template -->
                        <div class="bg-stone-200 rounded-lg shadow-sm border p-4 hover:shadow-md transition-shadow">
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between flex-wrap">
                                    <span class="font-medium text-gray-600">Appointment Id</span>
                                    <span class="text-gray-900"><?php echo $row["reference_number"] ?></span>
                                </div>
                                <div class="flex justify-between flex-wrap">
                                    <span class="font-medium text-gray-600">Status</span>
                                    <span class="<?php
                                                    if ($row["status"] == "Pending") {
                                                    ?>
                                                             text-blue-600
                                                        <?php
                                                    } else if ($row["status"] == "Accepted") {
                                                        ?>
                                                            text-green-700
                                                        <?php
                                                    } else if ($row["status"] == "Rejected") {
                                                        ?>
                                                            text-red-700
                                                        <?php
                                                    } else if ($row["status"] == "Completed") {
                                                        ?>
                                                            text-green-700
                                                        <?php
                                                    }
                                                        ?>"><?php echo $row["status"] ?></span>
                                </div>
                                <div class="flex justify-between flex-wrap">
                                    <span class="font-medium text-gray-600">Service</span>
                                    <span class="text-gray-900"><?php echo $row["title"] ?></span>
                                </div>
                                <div class="flex justify-between flex-wrap">
                                    <span class="font-medium text-gray-600">Department</span>
                                    <span class="text-gray-900"><?php echo $row["department"] ?></span>
                                </div>
                                <div class="flex justify-between flex-wrap">
                                    <span class="font-medium text-gray-600">Branch</span>
                                    <span class="text-gray-900"><?php echo $row["branch"] ?></span>
                                </div>
                                <div class="flex justify-between flex-wrap">
                                    <span class="font-medium text-gray-600">Date</span>
                                    <span class="text-gray-900 font-medium"><?php echo $row["appointment_date"] ?></span>
                                </div>
                                <div class="flex justify-between flex-wrap">
                                    <span class="font-medium text-gray-600">Time Slot</span>
                                    <span class="text-gray-900"><?php echo $row["start_time"] . " - " . $row["end_time"] ?></span>
                                </div>

                            </div>
                            <div class="flex flex-col justify-end sm:flex-row gap-2 mt-8">

                                <?php
                                if ($row["status"] == "Pending") {
                                ?>
                                    <button onclick="cancelAppointment('<?php echo $row['reference_number'] ?>');"
                                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded text-sm font-medium transition-colors w-full sm:w-auto">CANCEL</button>

                                <?php
                                }
                                ?>


                                <?php
                                if ($row["status"] == "Accepted") {
                                ?>
                                    <button onclick='loadBarcodeModelData(<?php echo htmlspecialchars(json_encode($row), ENT_QUOTES, "UTF-8"); ?>)'
                                        class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded text-sm font-medium transition-colors w-full sm:w-auto">
                                        VIEW BARCODE
                                    </button>
                                <?php
                                }
                                ?>

                                <?php
                                if ($row["status"] == "Rejected") {
                                ?>
                                    <button onclick='loadBarcodeModelData(<?php echo htmlspecialchars(json_encode($row), ENT_QUOTES, "UTF-8"); ?>)'
                                        class="bg-red-700 hover:bg-red-800 text-white px-4 py-2 rounded text-sm font-medium transition-colors w-full sm:w-auto">
                                        VIEW BARCODE
                                    </button>
                                <?php
                                }
                                ?>


                                <?php
                                if ($row["status"] == "Completed") {
                                ?>
                                    <button id="openFeedback"
                                        class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded text-sm font-medium transition-colors w-full sm:w-auto" onclick="openFeedback('<?php echo $row['reference_number'] ?>');">Feedback</button>
                                <?php
                                }
                                ?>


                            </div>
                        </div>

                    <?php

                    }

                    ?>

                </div>
            </div>

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


<div id="modalbarcode" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">

    <div class="bg-white rounded-lg shadow-lg p-6 w-96 relative" id="printSection">

        <button id="closeModalbarcode"
            class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">&times;</button>


        <h2 class="text-xl font-bold text-center mb-4 border-b pb-2">APPOINTMENT DETAILS</h2>

        <div class="text-center mb-6">
            <img id="bardoceImg" src="https://barcodeapi.org/api/128/2569470001" alt="barcode" class="mx-auto w-40">
            <!-- <p id="barcodeCode" class="text-sm font-semibold text-teal-800 mt-2">2569470001</p> -->
        </div>


        <div class="space-y-3">
            <div class="flex justify-between flex-wrap">
                <span class="font-medium text-gray-600">Appointment Id</span>
                <span id="bm-apid" class="text-gray-900">2569470001</span>
            </div>
            <div class="flex justify-between flex-wrap">
                <span class="font-medium text-gray-600">Service</span>
                <span id="bm-service" class="text-gray-900">National ID Renewal</span>
            </div>
            <div class="flex justify-between flex-wrap">
                <span class="font-medium text-gray-600">Department</span>
                <span id="bm-department" class="text-gray-900">Civil Registration Department</span>
            </div>
            <div class="flex justify-between flex-wrap">
                <span class="font-medium text-gray-600">Branch</span>
                <span id="bm-branch" class="text-gray-900">Central Government Office</span>
            </div>
            <div class="flex justify-between flex-wrap">
                <span class="font-medium text-gray-600">Date</span>
                <span id="bm-date" class="text-teal-600 font-medium">2025-08-12</span>
            </div>
            <div class="flex justify-between flex-wrap">
                <span class="font-medium text-gray-600">Time Slot</span>
                <span id="bm-timeslot" class="text-gray-900">09:00am - 10:00am</span>
            </div>
        </div>

        <!-- Print Button -->
        <!-- <div class="mt-6 text-center">
                    <button onclick="printAppointment();"
                        class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-md shadow">
                        <i class="fas fa-print mr-2"></i> Print
                    </button>
                </div> -->
    </div>
</div>

<!-- Modal Background -->
<div id="feedbackModal"
    class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">

    <!-- Modal Box -->
    <div id="modalContent"
        class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6 transform scale-95 opacity-0 transition-all duration-200">

        <!-- Header -->
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-1">Feedback Form</h2>
        <p class="text-gray-500 text-center mb-5">Help us improve government services</p>

        <!-- Star Rating -->
        <p class="text-gray-700 font-medium mb-2">Rate your experience</p>
        <div class="flex justify-center mb-4">
            <button class="star text-4xl text-gray-300 hover:text-yellow-400 transition" data-value="1">★</button>
            <button class="star text-4xl text-gray-300 hover:text-yellow-400 transition" data-value="2">★</button>
            <button class="star text-4xl text-gray-300 hover:text-yellow-400 transition" data-value="3">★</button>
            <button class="star text-4xl text-gray-300 hover:text-yellow-400 transition" data-value="4">★</button>
            <button class="star text-4xl text-gray-300 hover:text-yellow-400 transition" data-value="5">★</button>
        </div>

        <!-- Feedback Text -->
        <textarea id="feedbackText" placeholder="Please provide your feedback..."
            class="w-full border rounded-lg p-3 mb-5 resize-none h-28 focus:ring focus:ring-blue-300"></textarea>

        <!-- Buttons -->
        <div class="flex gap-3">
            <button id="submitFeedback"
                class="flex-1 bg-teal-700 text-white py-2 rounded-lg hover:bg-teal-800 transition">
                Submit
            </button>
            <button id="closeModal"
                class="flex-1 bg-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-400 transition">
                Cancel
            </button>
        </div>
    </div>
</div>

<!-- Success Message -->
<div id="successPopup"
    class="hidden fixed bottom-6 right-6 bg-green-600 text-white px-5 py-3 rounded-lg shadow-lg flex items-center space-x-2 animate-bounce">
    <span class="text-xl">✅</span>
    <span>Feedback Submitted!</span>
</div>

<script>
    const closeModal = document.getElementById("closeModal");
    const feedbackModal = document.getElementById("feedbackModal");
    const modalContent = document.getElementById("modalContent");
    const stars = document.querySelectorAll(".star");
    const successPopup = document.getElementById("successPopup");
    let selectedRating = 0;

    // Open Modal

    function openFeedback(appoitmentId) {
        feedbackModal.classList.remove("hidden");
        setTimeout(() => {
            modalContent.classList.remove("scale-95", "opacity-0");
            modalContent.classList.add("scale-100", "opacity-100");
        }, 50);

        //Submit Process
        document.getElementById("submitFeedback").addEventListener("click", async() => {
            const feedback = document.getElementById("feedbackText").value;

            if (!selectedRating) {
                alert("Please select a rating.");
                return;
            }
            if (!feedback.trim()) {
                alert("Please provide feedback.");
                return;
            }

            const data = {
                reference_number: appoitmentId,
                rating: selectedRating,
                feedback: feedback,
            };

            const response = await fetch("backend/submitFeedback.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            });

            if (response.ok) {
                const result = await response.json();

                console.log(result);

                if (result.status == "success") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: result.message,
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });

                    // setTimeout(() => {
                    //   window.location = "UserVerificationPage.php";
                    // }, 1500);
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: result.message,
                    });
                }
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong! Please try again later.",
                });
            }


            // Close modal
            closeModal.click();



            // Show success popup
            // successPopup.classList.remove("hidden");
            // setTimeout(() => {
            //     successPopup.classList.add("hidden");
            // }, 2000);
        });

    }

    // Close Modal
    closeModal.addEventListener("click", () => {
        modalContent.classList.add("scale-95", "opacity-0");
        setTimeout(() => {
            feedbackModal.classList.add("hidden");
        }, 200);
    });

    // Star Rating
    stars.forEach(star => {
        star.addEventListener("click", () => {
            selectedRating = star.dataset.value;
            stars.forEach(s => s.classList.remove("text-yellow-400"));
            for (let i = 0; i < selectedRating; i++) {
                stars[i].classList.add("text-yellow-400");
            }
        });
    });
</script>