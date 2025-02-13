<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codemate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c5c5c5;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="max-w-6xl mx-auto p-4">
        <header class="flex justify-between items-center py-4">
            <h1 class="text-2xl font-bold text-indigo-600">codemate</h1>
            <div class="flex items-center gap-4">
                <button class="text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
                <button class="text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
                <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full">
            </div>
        </header>

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
                    <img src="/api/placeholder/48/48" alt="User" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Francis Jackson</h3>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let chatContainer = document.querySelector(".chat-container");
        chatContainer.scrollTop = chatContainer.scrollHeight;

        let messageForm = document.querySelector(".message-form");

        var conn = new WebSocket('ws://localhost:8080');

        conn.onopen = function(e) {
            console.log("WebSocket Connected!");
        };

        conn.onmessage = function(e) {
            console.log("Message from server: ", e.data);
            let message = JSON.parse(e.data);
            redefine(message.user_id, message.content);
        };

        messageForm.addEventListener('submit', function(event) {
            event.preventDefault();

            let content = document.getElementById("content");

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/message/0<?= $user_id ?>', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    let message = {
                        content: content.value,
                        user_id: <?= $user_id ?>,
                    };

                    conn.send(JSON.stringify(message));
                    let messageElement = `
                                    <div class="flex gap-2 items-start flex-col">
                                        <div class="flex items-center justify-center">
                                            <img src="<?= $photo ?>" alt="User" class="w-8 h-8 rounded-full mt-1">
                                            <p class="font-bold text-l"><?= $user_src_name ?></p>
                                        </div>
                                        <div class="bg-gray-100 rounded-lg p-3 max-w-md">
                                            <p>${content.value}</p>
                                        </div>
                                    </div>
                                `;
                    chatContainer.innerHTML += messageElement;
                    content.value = "";
                    chatContainer.scrollTop = chatContainer.scrollHeight;
                }
            };

            xhr.send(JSON.stringify({
                "content": content.value
            }));
        });

        function redefine(id, content) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/message/redefine/<?= $user_id ?>', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    info = JSON.parse(xhr.response);
                    let messageElement = `
                                    <div class="flex gap-2 items-start flex-col">
                                        <div class="flex items-center justify-center">
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