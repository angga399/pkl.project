<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
</head>
<body>
    <div id="chat">
        <ul id="messages"></ul>
        <input id="message" autocomplete="off">
        <button onclick="sendMessage()">Send</button>
    </div>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        const echo = new Echo({
            broadcaster: 'pusher',
            key: 'your-pusher-app-key',
            cluster: 'your-pusher-app-cluster',
            forceTLS: true
        });

        echo.channel('chat')
            .listen('ChatMessageSent', (e) => {
                const messages = document.getElementById('messages');
                const li = document.createElement('li');
                li.appendChild(document.createTextNode(e.message));
                messages.appendChild(li);
            });

        function sendMessage() {
            const message = document.getElementById('message').value;
            fetch('/send-message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ message: message })
            });
        }
    </script>
</body>
</html>