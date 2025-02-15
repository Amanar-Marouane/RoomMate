<?php include __DIR__ . "/../partials/header.view.php" ?>





<main class="w-full h-max p-6 flex justify-center items-center min-h-screen">

    <div class="container min-h-screen flex flex-col gap-10 pt-10 ">
        <div>
            <h1 class="text-5xl text-blue-900 font-bold">Reports</h1>
        </div>

        <div class="overflow-x-auto">
            <table class=" min-w-full ">
                <tbody class="whitespace-nowrap">

                    <!-- all announces  -->
                    <?php foreach ($info as $announce): ?>
                        <?php if ($announce['announce_type'] == "Offre"): ?>
                            <!-- annance offer :  -->
                            <tr class="h-20 ">
                                <td class="p-4">
                                    <div class="flex justify-start items-center gap-0.5">
                                        <div class="bg-red-500 h-10 w-10 border-0 rounded-full">
                                            <img src="" alt="-" class="">
                                        </div>
                                        <div>
                                            <p class="text-sm text-black font-bold"><?= $announce['full_name'] ?></p>
                                            <p class="text-sm text-gray-500 "><?= $announce['current_city'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">City</p>
                                        <p class="text-sm text-blue-600 font-bold"><?= $announce['current_city'] ?></p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">Budget</p>
                                        <p class="text-sm text-blue-600 font-bold"><?= $announce['budget'] ?> DH</p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">Availability</p>
                                        <p class="text-sm text-blue-600 font-bold"><?= $announce['available_at'] ?></p>

                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">Type</p>
                                        <button class="text-sm text-blue-600 font-bold "><?= $announce['announce_type'] ?></button>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">Status</p>
                                        <form action="/admin/reports/ignorerreport" method="post">
                                            <input type="hidden" name="id_announce" value="<?= $announce['announce_id'] ?>">
                                            <input type="hidden" name="report" value="<?= $announce['is_reported'] == 1 ? 0 : 1; ?>">
                                            <button name="btn_report"
                                                class="text-sm font-bold  bg-opacity-50 py-1 px-1.5 border-0 rounded-full text-red-600 bg-red-200">Reported</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">delete</p>
                                        <form method="post" action="/admin/reports/delete">
                                            <input type="hidden" name="id_announce" value="<?= $announce['announce_id'] ?>">
                                            <button name="btn_delete_reports" class="text-sm text-[#DF5317] font-bold flex pt-1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                                    <path
                                                        d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                        data-original="#000000" />
                                                    <path
                                                        d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                        data-original="#000000" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                        <?php elseif ($announce['announce_type'] == "Demande"): ?>
                            <!-- announce demand :  -->
                            <tr class="h-20 ">
                                <td class="p-4">
                                    <div class="flex justify-start items-center gap-0.5">
                                        <div class="bg-red-500 h-10 w-10 border-0 rounded-full">
                                            <img src="" alt="-" class="">
                                        </div>
                                        <div>
                                            <p class="text-sm text-black font-bold"><?= $announce['full_name'] ?></p>
                                            <p class="text-sm text-gray-500 "><?= $announce['localisation'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">City</p>
                                        <p class="text-sm text-[#DF5317] font-bold"><?= $announce['localisation'] ?></p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">Budget</p>
                                        <p class="text-sm text-[#DF5317] font-bold"><?= $announce['budget'] ?> DH</p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">Availability</p>
                                        <p class="text-sm text-[#DF5317] font-bold"><?= $announce['available_at'] ?></p>

                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">Type</p>
                                        <button class="text-sm text-[#DF5317] font-bold "><?= $announce['announce_type'] ?></button>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">Status</p>
                                        <form action="/admin/reports/ignorerreport" method="post">
                                            <input type="hidden" name="id_announce" value="<?= $announce['announce_id'] ?>">
                                            <input type="hidden" name="report" value="<?= $announce['is_reported'] == 1 ? 0 : 1; ?>">
                                            <button name="btn_report"
                                                class="text-sm font-bold  bg-opacity-50 py-1 px-1.5 border-0 rounded-full text-red-600 bg-red-200">Reported</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">delete</p>
                                        <form method="post" action="/admin/reports/delete">
                                            <input type="hidden" name="id_announce" value="<?= $announce['announce_id'] ?>">
                                            <button name="btn_delete_announce" class="text-sm text-[#DF5317] font-bold flex pt-1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                                    <path
                                                        d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                        data-original="#000000" />
                                                    <path
                                                        d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                        data-original="#000000" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>





    </div>



</main>


<?php include __DIR__ . "/../partials/footer.view.php" ?>