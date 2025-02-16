<?php include __DIR__ . "/partials/header.view.php" ?>

<main class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <div class="h-32 bg-gradient-to-r from-indigo-600 to-purple-600"></div>
        <div class="px-6 pb-6">
            <div class="flex items-end -mt-16 mb-6">
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
        <!-- *************************** -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <section>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-900">Your Demands</h2>
                    <a href="/annonce" class="flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        New Demand
                    </a>
                </div>
                <div class="space-y-4">
                    <?php foreach ($demands as $demand):
                        extract($demand) ?>
                        <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-medium text-gray-900"><?= "$localisation, $address" ?></h3>
                                    <p class="text-gray-500 text-sm">Available from <?= $available_at ?></p>
                                </div>
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded-full"><?= $budget ?> DH</span>
                            </div>
                            <div class="flex gap-2 mt-4">
                                <button class="text-gray-400 hover:text-red-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <form action="/profile/deleteannonce" method="post">
                                    <input type="hidden" name="id_announce" value="<?= $announce_id ?>">
                                    <button name="btn_delete_announce" class="text-gray-400 hover:text-indigo-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </section>

            <section>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-900">Your Offers</h2>
                    <a href="/annonce" class="flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        New Offer
                    </a>
                </div>
                <div class="space-y-4">
                    <?php foreach ($offers as $offer):
                        extract($offer) ?>
                        <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-medium text-gray-900"><?= "$localisation, $address" ?></h3>
                                    <p class="text-gray-500 text-sm">Available from <?= $available_at ?></p>
                                </div>
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded-full"><?= $budget ?> DH</span>
                            </div>
                            <div class="flex gap-2 mt-4">
                                <button class="text-gray-400 hover:text-indigo-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <form action="/profile/deleteannonce" method="post">
                                    <input type="hidden" name="id_announce" value="<?= $announce_id ?>">
                                    <button name="btn_delete_announce" class="text-gray-400 hover:text-indigo-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </section>
        </div>
        <!-- *************************** -->

    </div>
</main>
</body>

</html>