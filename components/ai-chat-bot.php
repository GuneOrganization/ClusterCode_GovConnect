<div id="ai-chatbot-content" class="content-section">

      
  <header class="bg-teal-600 text-white px-4 py-3 flex items-center justify-between shadow">
    <h1 class="text-lg font-bold">🤖 AI ChatBot</h1>
    <button class="bg-teal-500 hover:bg-teal-700 px-3 py-1 rounded-md text-sm">Clear Chat</button>
  </header>

  <main id="chat-container" class="flex-1 overflow-y-auto p-4 space-y-4">
    <!-- User Message -->
    <div class="flex justify-end">
      <div class="bg-teal-500 text-white px-4 py-2 rounded-2xl max-w-xs md:max-w-md">
        Hello, AI! How are you today?
      </div>
    </div>

    <div class="flex items-start space-x-2">
      <img src="https://cdn-icons-png.flaticon.com/512/4712/4712100.png" alt="Bot" class="w-8 h-8 rounded-full">
      <div class="bg-white px-4 py-2 rounded-2xl shadow max-w-xs md:max-w-md">
        Hi there! I’m doing great. How can I help you today?
      </div>
    </div>
  </main>


  <footer class="bg-white border-t border-gray-200 p-4">
    <form id="chat-form" class="flex gap-2">
      <input id="user-input" type="text" placeholder="Type your message..." class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400" required>
      <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-lg font-medium">Send</button>
    </form>
  </footer>

  
  <script>
    const chatForm = document.getElementById("chat-form");
    const chatContainer = document.getElementById("chat-container");
    const userInput = document.getElementById("user-input");

    chatForm.addEventListener("submit", function(e) {
      e.preventDefault();
      const message = userInput.value.trim();
      if (!message) return;

    
      chatContainer.innerHTML += `
        <div class="flex justify-end">
          <div class="bg-teal-500 text-white px-4 py-2 rounded-2xl max-w-xs md:max-w-md">
            ${message}
          </div>
        </div>
      `;

      
      chatContainer.scrollTop = chatContainer.scrollHeight;

      userInput.value = "";

      
      setTimeout(() => {
        chatContainer.innerHTML += `
          <div class="flex items-start space-x-2">
            <img src="https://cdn-icons-png.flaticon.com/512/4712/4712100.png" alt="Bot" class="w-8 h-8 rounded-full">
            <div class="bg-white px-4 py-2 rounded-2xl shadow max-w-xs md:max-w-md">
              This is a simulated AI response. Connect your backend here.
            </div>
          </div>
        `;
        chatContainer.scrollTop = chatContainer.scrollHeight;
      }, 800);
    });
  </script>


</div>