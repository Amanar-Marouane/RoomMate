<?php include __DIR__ . "/partials/header.view.php" ?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Code Verification</title>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen"> -->

    <main class="w-full flex justify-center items-center min-h-[550px] ">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Code Verification</h2>

            <form action="" method="post" class="space-y-4">
                <input type="hidden" name="email_verify" value="<?= $_GET['email'] ?>">
                <!-- <input type="hidden" name="id_verify"> -->

                <div>
                    <label for="code_verify" class="block text-gray-600 font-medium">Enter your code:</label>
                    <input type="number" name="code_verify" id="code_verify"
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Verification code" required>
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-600 transition duration-300">
                    Verify
                </button>
            </form>
        </div>
    </main>




<?php include __DIR__ . "/partials/footer.view.php" ?>