<?php include __DIR__ . "/partials/header.view.php" ?>

<main class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <div class="h-32 bg-gradient-to-r from-indigo-600 to-purple-600"></div>
        <div class="px-6 pb-6">
            <div class="flex items-end -mt-16 mb-6">
                <!-- <img src="https://i.pinimg.com/736x/98/5f/df/985fdfd9d673d91bd830d4ab3e380341.jpg" alt="Profile" class="w-32 h-32 rounded-xl object-cover ring-4 ring-white"> -->
                <img src="<?= $photo ?>" alt="Profile" class="w-32 h-32 rounded-xl object-cover ring-4 ring-white">
                <div class="ml-6 mb-2">
                    <h1 class="text-2xl font-bold text-gray-900"><?= $full_name ?></h1>
                    <p class="text-gray-500 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <?= $current_city  ?>, Morocco
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Personal Information</h2>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Year of Study</p>
                            <p class="text-gray-900"><?= utf8_decode($year_of_study) ?></p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Home City</p>
                            <p class="text-gray-900"><?= $origin_city ?>, Morocco</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Email</p>
                            <p class="text-gray-900"><?= $email ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="prose prose-sm text-gray-600">
                    <p class="mb-4">About me and what I'm looking for:</p>
                    <div class="space-y-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span><?= formatPreferences($preferences) ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 md:col-span-2">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">About Me</h2>
                <p class="text-gray-600"><?= utf8_decode($bio) ?></p>
            </div>
        </div>
    </div>
</main>
</body>

</html>