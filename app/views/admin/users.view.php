<?php include __DIR__ . "/../partials/header.view.php" ?>



<main class="w-full h-max p-6 flex justify-center items-center">

    <div class="container min-h-screen flex flex-col gap-10 pt-10 ">
        <div>
            <h1 class="text-5xl text-blue-900 font-bold">Users</h1>
        </div>

        <div class="overflow-x-auto">
            <table class=" min-w-full ">

                <tbody class="whitespace-nowrap">



                    <?php foreach ($info as $user): ?>
                        <tr class="h-20">
                            <td class="p-4">
                                <div class="flex justify-start items-center gap-0.5">
                                    <div class="bg-red-500 h-10 w-10 border-0 rounded-full">
                                        <img src="/<?= $user['photo'] ?>" alt="-" class=" h-10 w-10 border-0 rounded-full">
                                    </div>
                                    <div>
                                        <p class="text-sm text-blue-600 font-bold"><?= $user['full_name'] ?></p>
                                        <p class="text-sm text-blue-500 "><?= $user['origin_city'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <div>
                                    <p class="text-sm text-blue-500 opacity-50">Compus</p>
                                    <p class="text-sm text-blue-600 font-bold"><?= $user['current_city'] ?></p>
                                </div>
                            </td>
                            <td class="p-4">
                                <div>
                                    <p class="text-sm text-blue-500 opacity-50">Year of study</p>
                                    <p class="text-sm text-blue-600 font-bold"><?= $user['year_of_study'] ?></p>
                                </div>
                            </td>
                            <td class="p-4">
                                <div>
                                    <p class="text-sm text-blue-500 opacity-50">Status</p>
                                    <form method="post" action="/admin/users/updatestatus">
                                        <input type="hidden" name="id_user" value="<?= $user['user_id'] ?>">
                                        <input type="hidden" name="status" value="<?= $user['status'] == 'active' ? 'desactive' : 'active'  ?>  ">
                                        <button name="updateStatusUser" type="submit"
                                            class="text-sm font-bold bg-opacity-50 py-1 px-1.5 border-0 rounded-full <?= $user['status'] == 'active' ? 'text-blue-600 bg-blue-200' : 'text-orange-600 bg-orange-200'  ?>  "><?= $user['status'] ?></button>
                                    </form>
                                </div>
                            </td>
                            <td class="p-4">
                                <div>
                                    <p class="text-sm text-blue-500 opacity-50">delete</p>
                                    <form method="post" action="/admin/users/deleteuser" class="text-sm text-blue-600 font-bold flex pt-1">
                                        <input type="hidden" name="id_user" value="<?= $user['user_id'] ?>">
                                        <button name="deleteUser">
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
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>





    </div>



</main>

<?php include __DIR__ . "/../partials/footer.view.php" ?>