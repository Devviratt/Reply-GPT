document.getElementById('chat-form').addEventListener('submit', function(e) {
    e.preventDefault();
    var userInput = document.getElementById('user-input').value;
    if (userInput.trim() !== '') {
        sendMessage(userInput);
        document.getElementById('user-input').value = '';
    }
});

function sendMessage(message) {
    var chatBox = document.getElementById('chat-box');
    var userMessage = `<div class="message user-message">${message}</div>`;
    var botReply = `<div class="message bot-reply">Hello! You said: ${message}</div>`;
    chatBox.innerHTML += userMessage + botReply;
    chatBox.scrollTop = chatBox.scrollHeight;
}
