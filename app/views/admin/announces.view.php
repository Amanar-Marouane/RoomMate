


<!-- <?php include __DIR__ . "/../partials/header.view.php" ?> -->





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

                    <!-- annance offer :  -->
                    <tr class="h-20">
                        <td class="p-4">
                            <div class="flex justify-start items-center gap-0.5">
                                <div class="bg-red-500 h-10 w-10 border-0 rounded-full">
                                    <img src="" alt="-" class="">
                                </div>
                                <div>
                                    <p class="text-sm text-black font-bold">full name</p>
                                    <p class="text-sm text-gray-500 ">origin city</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div>
                                <p class="text-sm text-blue-500 opacity-50">City</p>
                                <p class="text-sm text-blue-600 font-bold">Nador</p>
                            </div>
                        </td>
                        <td class="p-4">
                            <div>
                                <p class="text-sm text-blue-500 opacity-50">Budget</p>
                                <p class="text-sm text-blue-600 font-bold">800 DH</p>
                            </div>
                        </td>
                        <td class="p-4">
                            <div>
                                <p class="text-sm text-blue-500 opacity-50">Availability</p>
                                <p class="text-sm text-blue-600 font-bold">05 novembre</p>

                            </div>
                        </td>
                        <td class="p-4">
                            <div>
                                <p class="text-sm text-blue-500 opacity-50">Status</p>
                                <button
                                    class="text-sm text-green-600 font-bold bg-green-200 bg-opacity-50 py-1 px-1.5 border-0 rounded-full">Valide</button>
                            </div>
                        </td>
                        <td class="p-4">
                            <div>
                                <p class="text-sm text-blue-500 opacity-50">Type</p>
                                <button class="text-sm text-blue-600 font-bold ">Offer</button>
                            </div>
                        </td>
                        <td class="p-4">
                            <div>
                                <p class="text-sm text-blue-500 opacity-50">delete</p>
                                <div class="text-sm text-blue-600 font-bold flex pt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                        <path
                                            d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                            data-original="#000000" />
                                        <path
                                            d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                            data-original="#000000" />
                                    </svg>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- announce demand :  -->
                    <tr class="h-20">
                        <td class="p-4">
                            <div class="flex justify-start items-center gap-0.5">
                                <div class="bg-red-500 h-10 w-10 border-0 rounded-full">
                                    <img src="" alt="-" class="">
                                </div>
                                <div>
                                    <p class="text-sm text-black font-bold">full name</p>
                                    <p class="text-sm text-gray-500 ">origin city</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div>
                                <p class="text-sm text-[#DF5317] opacity-50">City</p>
                                <p class="text-sm text-[#DF5317] font-bold">Nador</p>
                            </div>
                        </td>
                        <td class="p-4">
                            <div>
                                <p class="text-sm text-[#DF5317] opacity-50">Budget</p>
                                <p class="text-sm text-[#DF5317] font-bold">1000 DH</p>
                            </div>
                        </td>
                        <td class="p-4">
                            <div>
                                <p class="text-sm text-[#DF5317] opacity-50">Availability</p>
                                <p class="text-sm text-[#DF5317] font-bold">05 novembre</p>

                            </div>
                        </td>
                        <td class="p-4">
                            <div>
                                <p class="text-sm text-[#DF5317] opacity-50">Status</p>
                                <button
                                    class="text-sm text-red-600 font-bold bg-red-200 bg-opacity-50 py-1 px-1.5 border-0 rounded-full">Invalide</button>
                            </div>
                        </td>
                        <td class="p-4">
                            <div>
                                <p class="text-sm text-[#DF5317] opacity-50">Type</p>
                                <button class="text-sm text-[#DF5317] font-bold ">Demand</button>
                            </div>
                        </td>
                        <td class="p-4">
                            <div>
                                <p class="text-sm text-[#DF5317] opacity-50">delete</p>
                                <div class="text-sm text-[#DF5317] font-bold flex pt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                        <path
                                            d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                            data-original="#000000" />
                                        <path
                                            d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                            data-original="#000000" />
                                    </svg>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>





    </div>



</main>


<!-- <?php include __DIR__ . "/../partials/footer.view.php" ?> -->
