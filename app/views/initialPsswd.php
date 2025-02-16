<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restart Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="min-h-screen bg-blue-200 flex justify-center items-center">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Restart password</h2>
            <form action="initialpsswd" method="post">
                <input type="hidden" name="token" value="<?php echo $_GET['token'] ?>">
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Password : </label>
                    <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button name="resetpsswd" class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700">Log in</button>
            </form>
        </div>
    </div>
</body>

</html>