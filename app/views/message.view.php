<?php include __DIR__ . "/partials/header.view.php" ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let chatContainer = document.querySelector(".chat-container");
        if (chatContainer) {
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        let messageForm = document.querySelector(".message-form");
        let contentInput = document.getElementById("content");

        let myUserId = <?= json_encode($my_user_id) ?>;
        let toUserId = <?= json_encode($to_user_id) ?>;
        let roomId = myUserId < toUserId ? `${myUserId}_${toUserId}` : `${toUserId}_${myUserId}`;

        var conn = new WebSocket("ws://localhost:8080");

        conn.onopen = function() {
            conn.send(JSON.stringify({
                type: "join",
                room: roomId
            }));
        };

        conn.onmessage = function(e) {
            let message = JSON.parse(e.data);
            // console.log("Raw data received:", e);
            // console.log("Parsed message:", message);

            // console.log("Expected fields:", {
            //     to_user_id: message.to_user_id,
            //     user_id: message.user_id,
            //     content: message.content
            // });

            if (message.to_user_id === myUserId) {
                redefine(message.user_id, message.content);
            }
        };

        messageForm.addEventListener("submit", function(event) {
            event.preventDefault();

            if (!contentInput.value.trim()) return;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "/message/" + toUserId, true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onload = function() {
                if (xhr.status === 200) {
                    let message = {
                        type: "message",
                        room: roomId,
                        content: contentInput.value,
                        user_id: myUserId,
                        to_user_id: toUserId,
                    };

                    // console.log("Sending message:", message);
                    conn.send(JSON.stringify(message));

                    let messageElement = `
                    <div class="flex gap-2 items-start flex-col">
                        <div class="flex items-center">
                            <img src="<?= $my_photo ?>" alt="User" class="w-8 h-8 rounded-full mt-1">
                            <p class="font-bold text-l"><?= $my_full_name ?></p>
                        </div>
                        <div class="bg-gray-100 rounded-lg p-3 max-w-md">
                            <p>${message.content}</p>
                        </div>
                    </div>
                `;

                    chatContainer.innerHTML += messageElement;
                    chatContainer.scrollTop = chatContainer.scrollHeight;
                    contentInput.value = "";
                }
            };

            xhr.send(JSON.stringify({
                content: contentInput.value
            }));
        });

        function redefine(id, content) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "/message/redefine/" + myUserId, true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onload = function() {
                if (xhr.status === 200) {
                    let info = JSON.parse(xhr.responseText);

                    let messageElement = `
                    <div class="flex gap-2 items-start flex-col">
                        <div class="flex items-center">
                            <img src="${info.photo}" alt="User" class="w-8 h-8 rounded-full mt-1">
                            <p class="font-bold text-l">${info.full_name}</p>
                        </div>
                        <div class="bg-gray-100 rounded-lg p-3 max-w-md">
                            <p>${content}</p>
                        </div>
                    </div>
                `;

                    chatContainer.innerHTML += messageElement;
                    chatContainer.scrollTop = chatContainer.scrollHeight;
                }
            };

            xhr.send();
        }
    });
</script>
<div class="flex gap-6 mt-8">
    <div class="w-80 bg-white rounded-lg shadow-sm p-4">
        <h2 class="text-xl font-semibold mb-4">Messages</h2>
        <div class="relative mb-4">
            <input type="text" placeholder="Search..." class="w-full px-4 py-2 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="h-[600px] overflow-y-auto custom-scrollbar">
            <div class="space-y-4">
                <div class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                    <img src="/api/placeholder/48/48" alt="User" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Francis Jackson</h3>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                    <img src="/api/placeholder/48/48" alt="User" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Harry May</h3>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                    <img src="/api/placeholder/48/48" alt="User" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Carol Bennett</h3>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                    <img src="/api/placeholder/48/48" alt="User" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Christian Jones</h3>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                    <img src="/api/placeholder/48/48" alt="User" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Bryan Brooks</h3>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                    <img src="/api/placeholder/48/48" alt="User" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Freddie Spencer</h3>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                    <img src="/api/placeholder/48/48" alt="User" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Adam Campbell</h3>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                    <img src="/api/placeholder/48/48" alt="User" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Julia Lane</h3>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                    <img src="/api/placeholder/48/48" alt="User" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Kathy Griffin</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="min-h-[600px] flex-1 bg-white rounded-lg shadow-sm p-4 flex flex-col justify-between">
        <div class="flex items-center gap-3 pb-4 border-b">
            <img src="<?= $to_photo ?>" alt="User" class="w-12 h-12 rounded-full">
            <div>
                <h3 class="font-medium"><?= $to_full_name ?></h3>
            </div>
        </div>

        <div class="h-[500px] overflow-y-auto custom-scrollbar py-4 space-y-4 chat-container">
            <?php foreach ($messages as $message):
                extract($message) ?>
                <div class="flex gap-2 items-start flex-col">
                    <div class="flex items-center justify-center">
                        <img src="<?= $photo ?>" alt="User" class="w-8 h-8 rounded-full mt-1">
                        <p class="font-bold text-l"><?= $user_src_name ?></p>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-3 max-w-md">
                        <p><?= htmlspecialchars(utf8_encode($content)) ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <form class="flex gap-2 mt-4 message-form">
            <input name="content" id="content" type="text" placeholder="Type a message..." class="flex-1 px-4 py-2 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
            </button>
        </form>
    </div>
</div>

<footer class="mt-16 bg-indigo-900 text-white rounded-lg p-8">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Roommate</h2>
        <p class="text-gray-300 mb-8">Our mission is to help you find a student roommate easily</p>
        <div class="flex gap-8">
            <a href="#" class="hover:text-gray-300">Home</a>
            <a href="#" class="hover:text-gray-300">Contact us</a>
            <a href="#" class="hover:text-gray-300">Privacy Policy</a>
            <a href="#" class="hover:text-gray-300">Term of use</a>
        </div>
    </div>
</footer>
</div>
</body>

</html>