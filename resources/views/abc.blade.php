<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WhatsApp Messenger</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
    }

    .whatsapp-logo {
      display: block;
      margin: auto;
      width: 100px; /* Adjust size as needed */
      height: auto;
    }

    .navbar {
      background-color: #075e54;
      overflow: hidden;
      padding: 10px 0;
      text-align: center;
    }

    .navbar img {
      width: 30px; /* Adjust size as needed */
      height: auto;
      vertical-align: middle;
    }

    .navbar a {
      display: inline-block;
      color: #fff;
      text-align: center;
      padding: 14px 20px;
      text-decoration: none;
    }

    .navbar a:hover {
      background-color: #128c7e;
    }

    .chat-container {
      max-width: 600px;
      margin: 20px auto;
      border: 1px solid #ccc;
      border-radius: 10px;
      overflow: hidden;
      background-color: #fff;
    }

    .chat-header {
      background-color: #128c7e; /* Change color */
      color: #fff;
      padding: 15px 0;
      text-align: center;
    }

    .chat-body {
      padding: 10px;
      min-height: 300px;
      max-height: 300px;
      overflow-y: auto;
    }

    .message {
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 10px;
    }

    .sent-message {
      background-color: #dcf8c6;
      text-align: right;
    }

    .received-message {
      background-color: #ece5dd; /* Change color */
      text-align: left;
    }

    .message-time {
      font-size: 0.8rem;
      color: #666;
      margin-top: 5px;
      display: block;
    }

    .chat-footer {
      padding: 10px;
      display: flex;
      align-items: center;
      background-color: #f5f5f5; /* Change color */
    }

    #messageInput {
      flex: 1;
      padding: 10px;
      border-radius: 20px; /* Adjust */
      border: 1px solid #ccc;
      margin-right: 10px;
    }

    #sendButton {
      padding: 10px 20px; /* Adjust */
      border: none;
      background-color: #128c7e;
      color: #fff;
      border-radius: 20px; /* Adjust */
      cursor: pointer;
    }

    #sendButton:hover {
      background-color: #075e54; /* Change color on hover */
    }

    .skeleton-message {
      height: 60px; /* Adjust */
      background-color: #eee; /* Lighter color */
      margin-bottom: 20px; /* Adjust */
      border-radius: 20px; /* Adjust */
    }
  </style>
</head>
<div class="chat-container">
    <div class="chat-header">
      <img src="https://tse1.mm.bing.net/th?id=OIP.GIonhimHJQgSPnvyWk5K6QHaHa&pid=Api&rs=1&c=1&qlt=95&h=180" alt="WhatsApp Logo" class="whatsapp-logo">
      <h3>WhatsApp Messenger</h3>
    </div>
    <div class="navbar">
      <a href="#calls" onclick="showSection('calls')">Calls</a>
      <a href="#status" onclick="showSection('status')">Status</a>
      <a href="#chats" onclick="showSection('chats')">Chats</a>
    </div>
    <div id="calls" class="section" style="display: none;">
      <div class="chat-body">
        <h2>Calls Section</h2>
        <p>This section will display call history.</p>
        <!-- Example call history -->
        <div class="message sent-message">Outgoing call - March 28, 2024 - 10:30 AM</div>
        <div class="message received-message">Incoming call - March 27, 2024 - 3:45 PM</div>
      </div>
    </div>
    <div id="status" class="section" style="display: none;">
      <div class="chat-body">
        <h2>Status Section</h2>
        <p>This section will display status updates.</p>
        <!-- Example status updates -->
        <div class="message sent-message">You updated your status - "Feeling happy" - 2 hours ago</div>
        <div class="message received-message">John updated his status - "Traveling to Paris" - 1 day ago</div>
      </div>
    </div>
    <div id="chats" class="section">
      <div class="chat-body" id="chatBody">
        <!-- Skeleton loader example -->
        <div class="skeleton-message"></div>
        <div class="skeleton-message"></div>
        <div class="skeleton-message"></div>
        <div class="skeleton-message"></div>
      </div>
      <div class="chat-footer">
        <input type="text" id="messageInput" placeholder="Type your message here...">
        <button id="sendButton">Send</button>
      </div>
    </div>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
  <script>

    // Function to show the selected section
    function showSection(sectionId) {
      $('.section').hide(); // Hide all sections
      $('#' + sectionId).show(); // Show the selected section
    }
    
    $(document).ready(function() {
      // Simulate receiving a message when the page loads
      var receivedMessage = $("<div class='message received-message'>").text("Hello! This is a received message.");
      var currentTime = new Date().toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});
      var timeElement = $("<span class='message-time'>").text(currentTime);
      receivedMessage.append("<br>", timeElement);
      $("#chatBody").append(receivedMessage);
    
      // Simulate loading delay
    setTimeout(function() {
        // Remove skeleton loader and show received message
        $(".skeleton-message").remove();
        $("#chatBody").append(receivedMessage);
      }, 2000); // Adjust the delay time as needed
    });
    
    $("#sendButton").click(function() {
      sendMessage();
    });
    
    $("#messageInput").keypress(function(event) {
      if (event.which == 13) {
        sendMessage();
      }
    });
    
    $(document).ready(function() {
      // Simulate loading delay
      setTimeout(function() {
        $(".skeleton").remove(); // Remove skeleton loaders after loading is complete
      }, 2000); // Adjust the delay time as needed
    });
    
    function sendMessage() {
      var message = $("#messageInput").val();
      if (message.trim() !== "") {
        var currentTime = new Date().toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});
        var messageElement = $("<div class='message sent-message'>").text(message);
        var timeElement = $("<span class='message-time'>").text(currentTime);
        messageElement.append("<br>", timeElement);
        $("#chatBody").append(messageElement);
        $("#messageInput").val("");
      }
    }
  </script>
</body>
</html>