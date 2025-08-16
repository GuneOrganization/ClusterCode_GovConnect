let mySelectedDate = "";

// function togglePassword() {
//     const passwordInput = document.getElementById('password');
//     const toggleBtn = document.querySelector('.password-toggle');

//     if (passwordInput.type === 'password') {
//         passwordInput.type = 'text';
//         toggleBtn.textContent = '🙈';
//     } else {
//         passwordInput.type = 'password';
//         toggleBtn.textContent = '👁';
//     }
// }

//feedback script
// const openModal = document.getElementById("openFeedback");
// const closeModal = document.getElementById("closeFeedback");
// const feedbackModal = document.getElementById("feedbackModal");
// const modalContent = document.getElementById("modalContent");
// const stars = document.querySelectorAll(".star");
// const successPopup = document.getElementById("successPopup");
// let selectedRating = 0;

// // Open Modal
// openModal.addEventListener("click", () => {
//   feedbackModal.classList.remove("hidden");
//   setTimeout(() => {
//     modalContent.classList.remove("scale-95", "opacity-0");
//     modalContent.classList.add("scale-100", "opacity-100");
//   }, 50);
// });

// // Close Modal
// closeModal.addEventListener("click", () => {
//   modalContent.classList.add("scale-95", "opacity-0");
//   setTimeout(() => {
//     feedbackModal.classList.add("hidden");
//   }, 200);
// });

// // Star Rating
// stars.forEach((star) => {
//   star.addEventListener("click", () => {
//     selectedRating = star.dataset.value;
//     stars.forEach((s) => s.classList.remove("text-yellow-400"));
//     for (let i = 0; i < selectedRating; i++) {
//       stars[i].classList.add("text-yellow-400");
//     }
//   });
// });


document.getElementById("submitFeedback").addEventListener("click", () => {
  const feedback = document.getElementById("feedbackText").value;
  const department = document.getElementById("department").value;
  const branch = document.getElementById("branch").value;

  if (!selectedRating) {
    alert("Please select a rating.");
    return;
  }
  if (!feedback.trim()) {
    alert("Please provide feedback.");
    return;
  }


  closeModal.click();

  successPopup.classList.remove("hidden");
  setTimeout(() => {
    successPopup.classList.add("hidden");
  }, 2000);
});

function showNotifications() {
  document.getElementById("notificationsSection").classList.remove("hidden");
  document.body.style.overflow = "hidden"; // Prevent background scrolling
}

function hideNotifications() {
  document.getElementById("notificationsSection").classList.add("hidden");
  document.body.style.overflow = "auto"; // Restore scrolling
}

function dismissNotification(button) {
  const notification = button.closest(".bg-gray-100");
  notification.style.transition = "opacity 0.3s ease";
  notification.style.opacity = "0";
  setTimeout(() => {
    notification.remove();
  }, 300);
}

document.addEventListener("keydown", function (event) {
  if (event.key === "Escape") {
    hideNotifications();
  }
});

document.querySelectorAll(".menu-item").forEach((item) => {
  item.addEventListener("click", function () {
    const menu = this.getAttribute("data-menu");

    document.querySelectorAll(".menu-item").forEach((menuItem) => {
      menuItem.classList.remove("bg-white", "shadow-sm");
      menuItem.classList.add("hover:bg-gray-300");
    });

    
    this.classList.add("bg-white", "shadow-sm");
    this.classList.remove("hover:bg-gray-300");

    document.querySelectorAll(".content-section").forEach((section) => {
      section.classList.remove("active");
    });

    const targetSection = document.getElementById(menu + "-content");
    if (targetSection) {
      targetSection.classList.add("active");
    }
  });
});


const newAppointmentBtn = document.getElementById("newAppointmentBtn");
const appointmentModal = document.getElementById("appointmentModal");
// const closeModal = document.getElementById('closeModal');
const appointmentForm = document.getElementById("appointmentForm");

newAppointmentBtn.addEventListener("click", function () {
  appointmentModal.classList.remove("hidden");
});

appointmentModal.addEventListener("click", function (e) {
  if (e.target === appointmentModal) {
    appointmentModal.classList.add("hidden");
  }
});

appointmentForm.addEventListener("submit", function (e) {
  e.preventDefault();
  alert("Appointment created successfully!");
  appointmentModal.classList.add("hidden");
});

function togglePassword(fieldId) {
  const field = document.getElementById(fieldId);
  const type = field.getAttribute("type") === "password" ? "text" : "password";
  field.setAttribute("type", type);
}


const btn = document.getElementById("notificationBtn");
const popup = document.getElementById("notificationPopup");


btn.addEventListener("mouseenter", () => {
  popup.classList.remove("hidden");
});


popup.addEventListener("mouseenter", () => {
  popup.classList.remove("hidden");
});


btn.addEventListener("mouseleave", () => {
  setTimeout(() => {
    if (!popup.matches(":hover")) {
      popup.classList.add("hidden");
    }
  }, 100);
});

//notification section JS
// const viewAllBtn = document.getElementById("viewAllNotifications");
// const allSections = document.querySelectorAll(".content-section");
// const fullNotifications = document.getElementById("notifications-content");

// viewAllBtn.addEventListener("click", () => {
//     // Hide all sections
//     allSections.forEach(sec => sec.classList.add("hidden"));

//     // Show the notifications page
//     fullNotifications.classList.remove("hidden");

//     // Also hide the dropdown
//     document.getElementById("notificationPopup").classList.add("hidden");
// });

document.addEventListener("DOMContentLoaded", function () {
  const calendarEl = document.getElementById("calendar");
  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    height: "auto",
    headerToolbar: {
      left: "prev,next",
      center: "title",
      right: "today",
    },
    events: [
      // Booking Events
      {
        id: "booking1",
        title: "ID Renewal",
        date: "2025-08-12",
        className: "booking-event",
        textColor: "white",
      },
      {
        id: "booking2",
        title: "Passport App",
        date: "2025-08-15",
        className: "booking-event",
        textColor: "white",
      },
      {
        id: "booking3",
        title: "Birth Cert",
        date: "2025-08-18",
        className: "booking-event",
        textColor: "white",
      },
      {
        id: "booking4",
        title: "License Renewal",
        date: "2025-08-20",
        className: "booking-event",
        textColor: "white",
      },
      // Holiday Events
      {
        id: "holiday1",
        title: "Independence Day",
        date: "2025-02-04",
        className: "holiday-event",
        textColor: "white",
      },
      {
        id: "holiday2",
        title: "Vesak Day",
        date: "2025-05-12",
        className: "holiday-event",
        textColor: "white",
      },
    ],
    dayCellDidMount: function (info) {
      // Mark booking days
      const bookingDates = [
        "2025-08-12",
        "2025-08-15",
        "2025-08-18",
        "2025-08-20",
      ];
      const holidayDates = ["2025-02-04", "2025-05-12"];

      const dateStr = info.date.toISOString().split("T")[0];

      if (bookingDates.includes(dateStr)) {
        info.el.classList.add("booking-day");
      }

      if (holidayDates.includes(dateStr)) {
        info.el.classList.add("holiday");
      }
    },
    eventClick: function (info) {
      alert("Event: " + info.event.title + "\nDate: " + info.event.startStr);
    },
  });

  calendar.render();
});


document.addEventListener("DOMContentLoaded", function () {
  const menuItems = document.querySelectorAll(".menu-item");
  const contentSections = document.querySelectorAll(".content-section");

  menuItems.forEach((item) => {
    item.addEventListener("click", function () {
      const targetMenu = this.getAttribute("data-menu");

      
      menuItems.forEach((menuItem) => {
        menuItem.classList.remove("active");
      });

      
      this.classList.add("active");

      
      contentSections.forEach((section) => {
        section.classList.remove("active");
      });

      
      const targetSection = document.getElementById(targetMenu + "-content");
      if (targetSection) {
        targetSection.classList.add("active");
      }
    });
  });

  // function openNewAppointmentModal() {
  //     document.getElementById('newAppointmentModal').style.display = 'flex';
  //     updateQueueNumber();
  // }

  // function closeNewAppointmentModal() {
  //     document.getElementById('newAppointmentModal').style.display = 'none';
  //     document.getElementById('newAppointmentForm').reset();
  // }

  // function updateQueueNumber() {
  //     const queueNumber = Math.floor(Math.random() * 20) + 10;
  //     document.getElementById('queueNumber').textContent = queueNumber;
  // }

  // // Handle form submission
  // document.getElementById('newAppointmentForm').addEventListener('submit', function(e) {
  //     e.preventDefault();

  //     // Get form values
  //     const service = document.getElementById('service').value;
  //     const department = document.getElementById('department').value;
  //     const branch = document.getElementById('branch').value;
  //     const date = document.getElementById('date').value;
  //     const timeSlot = document.getElementById('timeSlot').value;

  //     if (service && department && branch && date && timeSlot) {
  //         alert('Appointment created successfully!');
  //         closeNewAppointmentModal();
  //     } else {
  //         alert('Please fill in all fields.');
  //     }
  // });

  // // Close modal when clicking outside
  // document.getElementById('newAppointmentModal').addEventListener('click', function(e) {
  //     if (e.target === this) {
  //         closeNewAppointmentModal();
  //     }
  // });
});

function openNewAppointmentModal() {
  document.getElementById("newAppointmentModal").style.display = "flex";
  updateQueueNumber();
}

function closeNewAppointmentModal() {
  document.getElementById("newAppointmentModal").style.display = "none";
  document.getElementById("newAppointmentForm").reset();
}

function updateQueueNumber() {
  const queueNumber = Math.floor(Math.random() * 20) + 10;
  document.getElementById("queueNumber").textContent = queueNumber;
}

(() => {
  
  const HOLIDAYS = new Set([
    "2025-01-14", 
    "2025-02-04", 
    "2025-04-13",
    "2025-04-14", 
    "2025-05-01", 
    "2025-05-12", 
    "2025-06-11", 
  ]);

  const BASE_SLOTS = [
    "09:00-10:00",
    "10:00-11:00",
    "11:00-12:00",
    "14:00-15:00",
    "15:00-16:00",
  ];

  const BOOKED_BY_DATE = {
    "2025-08-05": ["10:00-11:00", "15:00-16:00"],
  };

  let selectedDate = null; 
  let selectedSlot = null; 

  const modal = document.getElementById("appointmentModal");
  const openBtn = document.getElementById("openModal");
  const closeBtn = document.getElementById("closeModal");
  const timeSlotsEl = document.getElementById("timeSlots");
  const selectedDateText = document.getElementById("selectedDateText");
  const selectedTimeText = document.getElementById("selectedTimeText");
  //   const queueNumberEl = document.getElementById('queueNumber');
  const form = document.getElementById("appointmentForm");
  const submitBtn = document.getElementById("submitBtn");

  const pad = (n) => String(n).padStart(2, "0");
  const toYMD = (d) =>
    `${d.getFullYear()}-${pad(d.getMonth() + 1)}-${pad(d.getDate())}`;

  function isHoliday(ymd) {
    return HOLIDAYS.has(ymd);
  }

  function isPast(ymd) {
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    const d = new Date(ymd);
    d.setHours(0, 0, 0, 0);
    return d < today;
  }

  function hashStr(str) {
    let h = 2166136261 >>> 0;
    for (let i = 0; i < str.length; i++) {
      h ^= str.charCodeAt(i);
      h = Math.imul(h, 16777619);
    }
    return h >>> 0;
  }

  function estimateQueue(ymd, slot) {
    if (!ymd || !slot) return "-";
    const h = hashStr(ymd + "|" + slot);
    return (h % 25) + 1; // 1..26
  }

  function toast(icon, title) {
    Swal.fire({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 1800,
      timerProgressBar: true,
      icon,
      title,
    });
  }

  function alertWarn(text) {
    Swal.fire({
      icon: "warning",
      title: "Heads up",
      text,
    });
  }

  function alertError(text) {
    Swal.fire({
      icon: "error",
      title: "Missing details",
      text,
    });
  }

  function alertSuccess(text) {
    Swal.fire({
      icon: "success",
      title: "Appointment Created",
      text,
    });
  }

  // ---------- TIME SLOTS RENDER ----------
  // function renderTimeSlots(ymd) {
  //     timeSlotsEl.innerHTML = "";
  //     selectedSlot = null;
  //     selectedTimeText.textContent = "—";
  //     submitBtn.disabled = true;

  //     if (!ymd) return;

  //     if (isHoliday(ymd)) {
  //         timeSlotsEl.innerHTML = `<p class="text-sm text-red-600">No slots: holiday.</p>`;
  //         return;
  //     }
  //     if (isPast(ymd)) {
  //         timeSlotsEl.innerHTML = `<p class="text-sm text-gray-500">Past date.</p>`;
  //         return;
  //     }

  //     const booked = new Set(BOOKED_BY_DATE[ymd] || []);

  //     // Demo rule: random extra unavailability to mimic load
  //     const randomUnavailableIdx = hashStr(ymd) % BASE_SLOTS.length;

  //     BASE_SLOTS.forEach((slot, idx) => {
  //         const unavailable = booked.has(slot) || idx === randomUnavailableIdx;

  //         const btn = document.createElement('button');
  //         btn.type = "button";
  //         btn.dataset.time = slot;
  //         btn.className = [
  //             "px-3 py-2 rounded border text-sm transition",
  //             unavailable ?
  //                 "bg-red-100 text-gray-500 cursor-not-allowed border-red-200" :
  //                 "bg-green-100 hover:bg-green-200 border-green-200"
  //         ].join(" ");
  //         btn.textContent = slot.replace("-", " - ");

  //         if (!unavailable) {
  //             btn.addEventListener('click', () => {
  //                 // Unselect previous
  //                 [...timeSlotsEl.querySelectorAll('button')].forEach(b => {
  //                     b.classList.remove("ring-2", "ring-sky-400", "bg-sky-100");
  //                     if (!b.classList.contains("cursor-not-allowed")) {
  //                         b.classList.remove("bg-green-200");
  //                         b.classList.add("bg-green-100");
  //                     }
  //                 });
  //                 // Select this
  //                 btn.classList.add("ring-2", "ring-sky-400", "bg-sky-100");
  //                 selectedSlot = slot;
  //                 selectedTimeText.textContent = slot.replace("-", " - ");
  //                 // queueNumberEl.textContent = estimateQueue(ymd, slot);
  //                 submitBtn.disabled = false;
  //                 toast('info', `Time selected: ${slot}`);
  //             });
  //         } else {
  //             btn.disabled = true;
  //         }

  //         timeSlotsEl.appendChild(btn);
  //     });

  //     // If all unavailable
  //     const anyEnabled = !!timeSlotsEl.querySelector('button:not([disabled])');
  //     if (!anyEnabled) {
  //         timeSlotsEl.innerHTML = `<p class="text-sm text-red-600">No available slots for ${ymd}.</p>`;
  //         alertWarn("No available time slots for the selected date.");
  //     }
  // }

  let calendar = null;

  function buildCalendar() {
    const calendarEl = document.getElementById("calendar2");

    calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: "dayGridMonth",
      height: 520,
      selectable: true,
      weekends: true,
      stickyHeaderDates: true,
      headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "",
      },
      validRange: (nowDate) => ({
        start: toYMD(new Date()),
      }),
      dateClick: (info) => {
        const ymd = info.dateStr;

        if (isHoliday(ymd)) {
          alertWarn("This date is a holiday. Please choose another date.");
          selectedDate = null;
          selectedDateText.textContent = "—";
          //renderTimeSlots(null);
          return;
        }
        if (isPast(ymd)) return;

        selectedDate = ymd;
        selectedDateText.textContent = ymd;
        mySelectedDate = ymd;
        toast("success", `Date selected: ${ymd}`);
        loadTimeSlotsWithAvailability(ymd);
        // renderTimeSlots(ymd);
      },
      
      events: Array.from(HOLIDAYS).map((d) => ({
        start: d,
        end: d,
        display: "background",
        className: "is-holiday",
      })),
      
      dayCellDidMount: (arg) => {
        const ymd = toYMD(arg.date);
        if (isHoliday(ymd)) {
          arg.el.classList.add("is-holiday");
        }
      },
    });

    calendar.render();
  }

  
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const service = document.getElementById("service").value.trim();
    const department = document.getElementById("department").value.trim();
    const branch = document.getElementById("branch").value.trim();

    if (!service || !department || !branch || !selectedDate || !selectedSlot) {
      alertError("Please fill all fields and select date & time.");
      return;
    }

    // TODO: Replace with real API call
    // alertSuccess(`Your appointment is set for ${selectedDate} at ${selectedSlot}. Queue No: ${queueNumberEl.textContent}`);
    // Close modal after success (optional)
    setTimeout(() => hideModal(), 700);
  });

  
  function showModal() {
    modal.classList.add("show");
    modal.classList.remove("hidden");

    if (calendar) {
      setTimeout(() => {
        calendar.updateSize(); // force recalculation
        calendar.render(); // ensure layout refresh
      }, 50);
    }

    modal.addEventListener("transitionend", () => {
      if (calendar) calendar.updateSize();
    });
  }

  function hideModal() {
    modal.classList.remove("show");
    modal.classList.add("hidden");
  }

  if (openBtn) openBtn.addEventListener("click", showModal);
  if (closeBtn) closeBtn.addEventListener("click", hideModal);
  modal.addEventListener("click", (e) => {
    if (e.target === modal) hideModal();
  });

  
  document.addEventListener("DOMContentLoaded", () => {
    buildCalendar();
    // Preselect "today" (if not holiday)
    const today = toYMD(new Date());
    if (!isHoliday(today)) {
      selectedDate = today;
      selectedDateText.textContent = today;
      //renderTimeSlots(today);
    }
  });
})();


function loadBarcodeModelData(data) {
  const openBarcodemodelModal = document.getElementById("openModalbarcode");
  const closeBarcodeModal = document.getElementById("closeModalbarcode");
  const barcode = document.getElementById("modalbarcode");

  document.getElementById("bardoceImg").src =
    "https://barcodeapi.org/api/128/" + data["reference_number"];
  document.getElementById("bm-apid").innerText = data["reference_number"];
  document.getElementById("bm-service").innerText = data["title"];
  document.getElementById("bm-department").innerText = data["department"];
  document.getElementById("bm-branch").innerText = data["branch"];
  document.getElementById("bm-date").innerText = data["appointment_date"];
  document.getElementById("bm-timeslot").innerText =
    data["start_time"] + " - " + data["end_time"];

  //   openBarcodemodelModal.addEventListener("click", () => {
  barcode.classList.remove("hidden");
  barcode.classList.add("flex");
  //   });

  closeBarcodeModal.addEventListener("click", () => {
    barcode.classList.remove("flex");
    barcode.classList.add("hidden");
  });
}

async function cancelAppointment(reference) {
  if (confirm("Are you sure you want to cancel this appointment?")) {
    button.closest(".bg-white").style.opacity = "0.5";
    await fetch("backend/updateAppoinmentStatus.php?reference_number=" + reference + "&status=completed");
  }
}


document.addEventListener("DOMContentLoaded", function () {
  const menuItems = document.querySelectorAll(".menu-item");
  const contentSections = document.querySelectorAll(".content-section");

  menuItems.forEach((item) => {
    item.addEventListener("click", function () {
      const targetMenu = this.getAttribute("data-menu");

      
      menuItems.forEach((menuItem) => {
        menuItem.classList.remove("active");
      });

      
      this.classList.add("active");

      
      contentSections.forEach((section) => {
        section.classList.remove("active");
      });

      
      const targetSection = document.getElementById(targetMenu + "-content");
      if (targetSection) {
        targetSection.classList.add("active");
      }
    });
  });

  // const chatInput = document.getElementById('chatInput');
  // const sendButton = document.getElementById('sendButton');
  // const chatMessages = document.querySelector('.chat-messages');

  // function sendMessage() {
  //     const message = chatInput.value.trim();
  //     if (message === '') return;

  //     // Get current time
  //     const now = new Date();
  //     const timeString = now.getHours().toString().padStart(2, '0') + ':' +
  //         now.getMinutes().toString().padStart(2, '0');

  //     // Create user message element
  //     const userMessageHTML = `
  //                 <div class="message-wrapper d-flex justify-content-end mb-3">
  //                     <div class="user-message bg-light p-3 rounded" style="max-width: 70%;">
  //                         <p class="mb-1">${message}</p>
  //                         <small class="text-muted">${timeString}</small>
  //                     </div>
  //                 </div>
  //             `;

  //     // Add user message to chat
  //     chatMessages.insertAdjacentHTML('beforeend', userMessageHTML);

  //     // Clear input
  //     chatInput.value = '';

  //     // Scroll to bottom
  //     chatMessages.scrollTop = chatMessages.scrollHeight;

  //     // Simulate AI response after a short delay
  //     setTimeout(() => {
  //         const aiResponseHTML = `
  //                     <div class="message-wrapper d-flex justify-content-start mb-3">
  //                         <div class="ai-message bg-white p-3 rounded border" style="max-width: 70%;">
  //                             <p class="mb-1">Thank you for your message. I'm here to help you with government services. How can I assist you today?</p>
  //                             <small class="text-muted">${timeString}</small>
  //                         </div>
  //                     </div>
  //                 `;
  //         chatMessages.insertAdjacentHTML('beforeend', aiResponseHTML);
  //         chatMessages.scrollTop = chatMessages.scrollHeight;
  //     }, 1000);
  // }

  // // Send message on button click
  // sendButton.addEventListener('click', sendMessage);

  // // Send message on Enter key press
  // chatInput.addEventListener('keypress', function (e) {
  //     if (e.key === 'Enter') {
  //         sendMessage();
  //     }
  // });

  // function openNewAppointmentModal() {
  //     document.getElementById('newAppointmentModal').style.display = 'flex';
  //     updateQueueNumber();
  // }

  // function closeNewAppointmentModal() {
  //     document.getElementById('newAppointmentModal').style.display = 'none';
  //     document.getElementById('newAppointmentForm').reset();
  // }

  // function updateQueueNumber() {
  //     const queueNumber = Math.floor(Math.random() * 20) + 10;
  //     document.getElementById('queueNumber').textContent = queueNumber;
  // }

  // // Handle form submission
  // document.getElementById('newAppointmentForm').addEventListener('submit', function (e) {
  //     e.preventDefault();

  //     // Get form values
  //     const service = document.getElementById('service').value;
  //     const department = document.getElementById('department').value;
  //     const branch = document.getElementById('branch').value;
  //     const date = document.getElementById('date').value;
  //     const timeSlot = document.getElementById('timeSlot').value;

  //     if (service && department && branch && date && timeSlot) {
  //         alert('Appointment created successfully!');
  //         closeNewAppointmentModal();
  //     } else {
  //         alert('Please fill in all fields.');
  //     }
  // });

  // // Close modal when clicking outside
  // document.getElementById('newAppointmentModal').addEventListener('click', function (e) {
  //     if (e.target === this) {
  //         closeNewAppointmentModal();
  //     }
  // });
});

document.getElementById("department").addEventListener("change", function () {
  let depId = this.value;
  let branchSelect = document.getElementById("branch");
  let serviceSelect = document.getElementById("service");

  branchSelect.innerHTML = "<option value='0'>Select branch</option>";
  serviceSelect.innerHTML = "<option value='0'>Select service</option>";
  serviceSelect.disabled = true;

  if (depId != "0") {
    branchSelect.disabled = false;
    fetch("backend/getBranchesByDepartment.php?department_id=" + depId)
      .then((res) => res.json())
      .then((data) => {
        data.data.forEach((branch) => {
          let opt = document.createElement("option");
          opt.value = branch.id;
          opt.textContent = branch.branch;
          branchSelect.appendChild(opt);
        });
      });
  } else {
    branchSelect.disabled = true;
  }
});

document.getElementById("branch").addEventListener("change", function () {
  let branchId = this.value;
  let serviceSelect = document.getElementById("service");

  serviceSelect.innerHTML = "<option value='0'>Select service</option>";

  if (branchId != "0") {
    serviceSelect.disabled = false;
    fetch("backend/getServicesByBranch.php?branch_id=" + branchId)
      .then((res) => res.json())
      .then((data) => {
        data.data.forEach((service) => {
          let opt = document.createElement("option");
          opt.value = service.id;
          opt.textContent = service.title;
          serviceSelect.appendChild(opt);
        });
      });
  } else {
    serviceSelect.disabled = true;
  }
});

document.getElementById("service").addEventListener("change", function () {
  let serviceId = this.value;
  let container = document.getElementById("documentsContainer");
  let timeSlot = document.getElementById("timeslot");
  container.innerHTML = "";
  timeSlot.value = "0";

  if (serviceId != "0") {
    fetch("backend/getDocumentsByService.php?service_id=" + serviceId)
      .then((res) => res.json())
      .then((data) => {
        if (data.length === 0) {
          container.innerHTML =
            "<p class='text-sm text-gray-500'>No documents required for this service.</p>";
        } else {
          data.data.forEach((doc) => {
            let acceptAttr = "";

            if (doc.type == "pdf") {
              acceptAttr = `accept=".pdf"`;
            } else {
              acceptAttr = `accept=".jpg,.png,.jpeg"`;
            }

            let block = `
                        <div class="mb-4">
                            <label class="block text-xs text-gray-800 mb-1">
                                ${doc.document_name} (${doc.type}) 
                                <span class="text-gray-400"></span>
                            </label>
                            <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                                <input type="file" id="fileUpload_${doc.id}" name="documents[${doc.id}]" class="hidden" ${acceptAttr}>
                                <button type="button" 
                                    onclick="document.getElementById('fileUpload_${doc.id}').click();" 
                                    class="bg-teal-800 hover:bg-teal-700 text-white px-4 py-2 rounded font-semibold text-xs shadow">
                                    Choose File
                                </button>
                                <span id="fileName_${doc.id}" class="text-xs text-gray-600">No file selected</span>
                            </div>
                        </div>
                    `;
            container.insertAdjacentHTML("beforeend", block);

            // file change listener
            let fileInput = container.querySelector(`#fileUpload_${doc.id}`);
            let fileNameSpan = container.querySelector(`#fileName_${doc.id}`);
            fileInput.addEventListener("change", function () {
              fileNameSpan.textContent =
                this.files.length > 0 ? this.files[0].name : "No file selected";
            });
          });
        }
      });
  }
});

function logoutProcess() {
  window.location = "backend/logoutProcess.php";
}

async function loadTimeSlotsWithAvailability(ymd) {
  const select = document.getElementById("timeslot");
  select.disabled = true;
  select.innerHTML = "";
  select.innerHTML = '<option value="0">Select Time Slot</option>';

  let serviceId = document.getElementById("service").value;

  if (serviceId == 0) {
    alert("Select Service");
  } else if ((seletedDateTime = "")) {
    alert("Select a Date");
  } else {
    try {
      
      const allRes = await fetch(
        "http://localhost/ClusterCode_GovConnect/backend/getTimeSlots.php"
      );
      const allResult = await allRes.json();

      
      const availRes = await fetch(
        `http://localhost/ClusterCode_GovConnect/backend/getAvailableTimeSlotsByService.php?service_id=${serviceId}&appointment_date=${ymd}`
      );
      const availResult = await availRes.json();

      const select = document.getElementById("timeslot");
      select.disabled = false;

      if (allResult.status === "success" && Array.isArray(allResult.data)) {
        const allSlots = allResult.data;
        const availableSlots =
          availResult.status === "success" && Array.isArray(availResult.data)
            ? availResult.data.map((s) => s.id)
            : [];

        let i = 0;
        
        while (i < allSlots.length) {
          const slot = allSlots[i];
          const option = document.createElement("option");

          option.value = slot.id;
          option.textContent = `${slot.start_time} - ${slot.end_time}`;

          
          if (!availableSlots.includes(slot.id)) {
            option.disabled = true;
            option.textContent =
              `${slot.start_time} - ${slot.end_time}` + " (Already Received)";
          }

          select.appendChild(option);
          i++;
        }
      } else {
        const option = document.createElement("option");
        option.textContent = "No time slots found";
        option.disabled = true;
        option.selected = true;
        select.appendChild(option);
      }
    } catch (error) {
      console.error("Error loading time slots:", error);
    }
  }
}

async function createNewAppointment() {
  
  let department = document.getElementById("department").value;
  let branch = document.getElementById("branch").value;
  let service = document.getElementById("service").value;
  let timeSlot = document.getElementById("timeslot").value;

  if (department == 0) {
    alert("Please Select a Department");
  } else if (branch == 0) {
    alert("Please Select a branch");
  } else if (service == 0) {
    alert("Please Select a service");
  } else if (mySelectedDate === "") {
    alert("Please Select a date");
  } else if (timeSlot == 0) {
    alert("Please Select a timeslot");
  } else {
    let formData = new FormData();

    document.querySelectorAll("input[type='file']").forEach((input) => {
      if (input.files.length > 0) {
        
        formData.append(input.name, input.files[0]);
      }
    });

    formData.append("service_id", service);
    formData.append("appointment_date", mySelectedDate);
    formData.append("time_slot_id", timeSlot);

    try {
      let response = await fetch(
        "http://localhost/ClusterCode_GovConnect/backend/createAppointment.php",
        {
          method: "POST",

          body: formData,
        }
      );

      let result = await response.json();

      if (result.status === "success") {
        alert(result.message + "\nReference No: " + result.data.reference_no);
      } else {
        alert(result.message);
      }
    } catch (error) {
      console.error("Error:", error);
      alert("Something went wrong. Please try again.");
    }
  }
}
