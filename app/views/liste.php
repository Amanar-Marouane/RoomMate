<?php include __DIR__ . "/partials/header.view.php" ?>





<main class="w-full h-max p-6 flex justify-center items-center">

    <div class="container min-h-screen flex flex-col gap-10 pt-10 ">
        <div>
            <h1 class="text-5xl text-blue-900 font-bold">All Announces</h1>
        </div>
        <div>
            <div class="flex justify-between">
                <form method="GET">
                    <div class="relative mx-4 lg:mx-0 border-b-2 border-blue-500">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <input type="text" name="suggToSearch" onchange="this.form.submit()"
                            class="w-32 pl-10 py-1 pr-4 rounded-md form-input sm:w-64 focus:border-blue-500 focus:outline-none"
                            placeholder="Search"
                            value="">
                    </div>
                </form>

                <!-- Filter select -->
                <form method="GET">
                    <select name="filter" class="px-2 py-1 focus:outline-none  border-b-2 border-blue-500"
                        onchange="this.form.submit()">
                        <option value="all">ALL</option>
                        <option value="Offre">Offer</option>
                        <option value="Demande">Demand</option>
                    </select>
                </form>
            </div>
            <div></div>
        </div>

        <div class="overflow-x-auto">
            <table class=" min-w-full ">
                <tbody class="whitespace-nowrap">

                    <!-- all announces  -->
                    <?php foreach ($announces as $announce): ?>

                        <?php if ($announce['announce_type'] === 'Offre') : ?>
                            <!-- annance offer :  -->
                            <tr class="h-20">
                                <td class="p-4">
                                    <div class="flex justify-start items-center gap-0.5">
                                        <div class="bg-red-500 h-10 w-10 border-0 rounded-full">
                                        <img src="/<?= $announce['photo'] ?>" alt="-" class=" h-10 w-10 border-0 rounded-full">
                                        </div>
                                        <div>
                                            <p class="text-sm text-black font-bold"><?php echo  $announce['full_name'] ?></p>
                                            <p class="text-sm text-gray-500 "><?php echo  $announce['origin_city'] ?> </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">City</p>
                                        <p class="text-sm text-blue-600 font-bold"><?php echo  $announce['localisation'] ?></p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">Budget</p>
                                        <p class="text-sm text-blue-600 font-bold"><?php echo $announce['budget'] ?>DH</p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">Availability</p>
                                        <p class="text-sm text-blue-600 font-bold"><?php echo  $announce['available_at'] ?></p>

                                    </div>
                                </td>
                               
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">Type</p>
                                        <button class="text-sm text-blue-600 font-bold "><?php echo $announce['announce_type'] ?></button>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">more</p>
                                        <div class="text-sm text-blue-600 font-bold flex pt-1">
                                        <a href="offer?offer_id=<?= $announce['announce_id']; ?>" class="text-sm text-[#DF5317] font-bold flex pt-1">
            <img src="/images/Group_6.png" alt="image">
        </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        <?php elseif ($announce['announce_type'] === 'Demande') : ?>

                            <!-- announce demand :  -->
                            <tr class="h-20">
                                <td class="p-4">
                                    <div class="flex justify-start items-center gap-0.5">
                                        <div class="bg-red-500 h-10 w-10 border-0 rounded-full">
                                        <img src="/<?= $announce['photo'] ?>" alt="-" class=" h-10 w-10 border-0 rounded-full">
                                        </div>
                                        <div>
                                            <p class="text-sm text-black font-bold"><?php echo  $announce['full_name'] ?></p>
                                            <p class="text-sm text-gray-500 "><?php echo  $announce['origin_city'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">City</p>
                                        <p class="text-sm text-[#DF5317] font-bold"><?php echo  $announce['localisation'] ?></p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">Budget</p>
                                        <p class="text-sm text-[#DF5317] font-bold"><?php echo  $announce['budget'] ?> DH</p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">Availability</p>
                                        <p class="text-sm text-[#DF5317] font-bold"><?php echo  $announce['available_at'] ?></p>

                                    </div>
                                </td>
                            
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">Type</p>
                                        <button class="text-sm text-[#DF5317] font-bold "><?php echo $announce['announce_type'] ?></button>
                                    </div>
                                </td>
                                <td class="p-4">
    <div>
        <p class="text-sm text-[#DF5317] opacity-50">more</p>
        <a href="demande?demand_id=<?= $announce['announce_id']; ?>" class="text-sm text-[#DF5317] font-bold flex pt-1">
            <img src="/images/Group_6.png" alt="image">
        </a>
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


<?php include __DIR__ . "/partials/footer.view.php" ?>