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
document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.menu-item');
    const contentSections = document.querySelectorAll('.content-section');

    menuItems.forEach(item => {
        item.addEventListener('click', function () {
            const targetMenu = this.getAttribute('data-menu');

            // Remove active class from all menu items
            menuItems.forEach(menuItem => {
                menuItem.classList.remove('active');
            });

            // Add active class to clicked item
            this.classList.add('active');

            // Hide all content sections
            contentSections.forEach(section => {
                section.classList.remove('active');
            });

            // Show target content section
            const targetSection = document.getElementById(targetMenu + '-content');
            if (targetSection) {
                targetSection.classList.add('active');
            }
        });
    });

    const chatInput = document.getElementById('chatInput');
    const sendButton = document.getElementById('sendButton');
    const chatMessages = document.querySelector('.chat-messages');

    function sendMessage() {
        const message = chatInput.value.trim();
        if (message === '') return;

        // Get current time
        const now = new Date();
        const timeString = now.getHours().toString().padStart(2, '0') + ':' +
            now.getMinutes().toString().padStart(2, '0');

        // Create user message element
        const userMessageHTML = `
                    <div class="message-wrapper d-flex justify-content-end mb-3">
                        <div class="user-message bg-light p-3 rounded" style="max-width: 70%;">
                            <p class="mb-1">${message}</p>
                            <small class="text-muted">${timeString}</small>
                        </div>
                    </div>
                `;

        // Add user message to chat
        chatMessages.insertAdjacentHTML('beforeend', userMessageHTML);

        // Clear input
        chatInput.value = '';

        // Scroll to bottom
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Simulate AI response after a short delay
        setTimeout(() => {
            const aiResponseHTML = `
                        <div class="message-wrapper d-flex justify-content-start mb-3">
                            <div class="ai-message bg-white p-3 rounded border" style="max-width: 70%;">
                                <p class="mb-1">Thank you for your message. I'm here to help you with government services. How can I assist you today?</p>
                                <small class="text-muted">${timeString}</small>
                            </div>
                        </div>
                    `;
            chatMessages.insertAdjacentHTML('beforeend', aiResponseHTML);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }, 1000);
    }

    // Send message on button click
    sendButton.addEventListener('click', sendMessage);

    // Send message on Enter key press
    chatInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });

    function openNewAppointmentModal() {
        document.getElementById('newAppointmentModal').style.display = 'flex';
        updateQueueNumber();
    }

    function closeNewAppointmentModal() {
        document.getElementById('newAppointmentModal').style.display = 'none';
        document.getElementById('newAppointmentForm').reset();
    }

    function updateQueueNumber() {
        const queueNumber = Math.floor(Math.random() * 20) + 10;
        document.getElementById('queueNumber').textContent = queueNumber;
    }

    // Handle form submission
    document.getElementById('newAppointmentForm').addEventListener('submit', function (e) {
        e.preventDefault();

        // Get form values
        const service = document.getElementById('service').value;
        const department = document.getElementById('department').value;
        const branch = document.getElementById('branch').value;
        const date = document.getElementById('date').value;
        const timeSlot = document.getElementById('timeSlot').value;

        if (service && department && branch && date && timeSlot) {
            alert('Appointment created successfully!');
            closeNewAppointmentModal();
        } else {
            alert('Please fill in all fields.');
        }
    });

    // Close modal when clicking outside
    document.getElementById('newAppointmentModal').addEventListener('click', function (e) {
        if (e.target === this) {
            closeNewAppointmentModal();
        }
    });
});