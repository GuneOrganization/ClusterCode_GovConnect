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

// Navigation functionality
document.addEventListener("DOMContentLoaded", function () {
  const menuItems = document.querySelectorAll(".menu-item");
  const contentSections = document.querySelectorAll(".content-section");

  menuItems.forEach((item) => {
    item.addEventListener("click", function () {
      const targetMenu = this.getAttribute("data-menu");

      // Remove active class from all menu items
      menuItems.forEach((menuItem) => {
        menuItem.classList.remove("active");
      });

      // Add active class to clicked item
      this.classList.add("active");

      // Hide all content sections
      contentSections.forEach((section) => {
        section.classList.remove("active");
      });

      // Show target content section
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

document.getElementById("department").addEventListener("change", function() {
    let depId = this.value;
    let branchSelect = document.getElementById("branch");
    let serviceSelect = document.getElementById("service");

    branchSelect.innerHTML = "<option value='0'>Select branch</option>";
    serviceSelect.innerHTML = "<option value='0'>Select service</option>";
    serviceSelect.disabled = true;

    if(depId != "0") {
        branchSelect.disabled = false;
        fetch("backend/getBranchesByDepartment.php?department_id=" + depId)
        .then(res => res.json())
        .then(data => {
            data.data.forEach(branch => {
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

document.getElementById("branch").addEventListener("change", function() {
    let branchId = this.value;
    let serviceSelect = document.getElementById("service");

    serviceSelect.innerHTML = "<option value='0'>Select service</option>";

    if(branchId != "0") {
        serviceSelect.disabled = false;
        fetch("backend/getServicesByBranch.php?branch_id=" + branchId)
        .then(res => res.json())
        .then(data => {
            data.data.forEach(service => {
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

document.getElementById("service").addEventListener("change", function() {
    let serviceId = this.value;
    let container = document.getElementById("documentsContainer");
    container.innerHTML = "";

    if (serviceId != "0") {
        fetch("backend/getDocumentsByService.php?service_id=" + serviceId)
        .then(res => res.json())
        .then(data => {
            if (data.length === 0) {
                container.innerHTML = "<p class='text-sm text-gray-500'>No documents required for this service.</p>";
            } else {
                data.data.forEach(doc => {

                    let acceptAttr = "";

                    if (doc.type == "pdf") {
                        acceptAttr = `accept=".pdf"`;
                    }else{
                        acceptAttr = `accept=".jpg,.png,.jpeg"`;
                    }

                    let block = `
                        <div class="mb-4">
                            <label class="block text-sm text-gray-500 mb-1">
                                ${doc.document_name} (${doc.type}) 
                                <span class="text-gray-400"></span>
                            </label>
                            <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                                <input type="file" id="fileUpload_${doc.id}" name="documents[${doc.id}]" class="hidden" ${acceptAttr}>
                                <button type="button" 
                                    onclick="document.getElementById('fileUpload_${doc.id}').click();" 
                                    class="bg-teal-800 hover:bg-teal-700 text-white px-4 py-2 rounded font-semibold text-sm shadow">
                                    📎 Choose File
                                </button>
                                <span id="fileName_${doc.id}" class="text-sm text-gray-600">No file selected</span>
                            </div>
                        </div>
                    `;
                    container.insertAdjacentHTML("beforeend", block);

                    // file change listener
                    let fileInput = container.querySelector(`#fileUpload_${doc.id}`);
                    let fileNameSpan = container.querySelector(`#fileName_${doc.id}`);
                    fileInput.addEventListener("change", function() {
                        fileNameSpan.textContent = this.files.length > 0 ? this.files[0].name : "No file selected";
                    });
                });
            }
        });
    }
});

function logoutProcess() {
  window.location = "backend/logoutProcess.php";
}
