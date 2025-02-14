<?php include __DIR__ . "/partials/header.view.php" ?>

<main class="w-full h-max p-6 flex justify-center items-center">

    <div class="container min-h-screen flex flex-col gap-10 pt-10 ">
        <div>
            <h1 class="text-5xl text-blue-900 font-bold">All Announces</h1>
        </div>
        <div>
            <div class="flex justify-between flex-wrap gap-2">
                <div class="relative mx-4 lg:mx-0 border-b-2 border-blue-500">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    <input type="text" name="title" id="title"
                        class="w-32 pl-10 py-1 pr-4 rounded-md form-input sm:w-64 focus:border-blue-500 focus:outline-none"
                        placeholder="Search title">
                </div>

                <div class="border-b-2 border-blue-500">
                    <input type="text" name="city" id="city"
                        class="w-24 py-1 px-2 focus:outline-none"
                        placeholder="City">
                </div>

                <div class="border-b-2 border-blue-500 flex items-center">
                    <span class="text-gray-600 text-sm mr-1">DH</span>
                    <input type="number" name="min_budget" id="min_budget"
                        class="w-16 py-1 px-1 focus:outline-none"
                        placeholder="Min">
                    <span class="mx-1">-</span>
                    <input type="number" name="max_budget" id="max_budget"
                        class="w-16 py-1 px-1 focus:outline-none"
                        placeholder="Max">
                </div>

                <div class="border-b-2 border-blue-500">
                    <input type="date" name="available_at" id="available_at"
                        class="py-1 px-2 focus:outline-none">
                </div>

                <select name="filter" id="type" class="px-2 py-1 focus:outline-none border-b-2 border-blue-500">
                    <option value="" selected>ALL</option>
                    <option value="Offre">Offer</option>
                    <option value="Demande">Demand</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class=" min-w-full ">
                <tbody class="whitespace-nowrap announces-container">
                    <?php foreach ($announces as $announce):
                        extract($announce) ?>
                        <?php if ($announce_type === 'Offre') : ?>
                            <tr class="h-20">
                                <td class="p-4">
                                    <div class="flex justify-start items-center gap-0.5">
                                        <div class="bg-red-500 h-10 w-10 border-0 rounded-full">
                                            <img src="<?= $photo ?>" alt="<?= $full_name ?>" class="">
                                        </div>
                                        <div>
                                            <p class="text-sm text-black font-bold"><?= $full_name ?></p>
                                            <p class="text-sm text-gray-500 "><?= $origin_city ?> </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">Title</p>
                                        <p class="text-sm text-blue-600 font-bold"><?= $title ?></p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">City</p>
                                        <p class="text-sm text-blue-600 font-bold"><?= $localisation ?></p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">Budget</p>
                                        <p class="text-sm text-blue-600 font-bold"><?= $budget ?>DH</p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">Availability</p>
                                        <p class="text-sm text-blue-600 font-bold"><?= $available_at ?></p>

                                    </div>
                                </td>

                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">Type</p>
                                        <button class="text-sm text-blue-600 font-bold "><?= $announce_type ?></button>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">more</p>
                                        <div class="text-sm text-blue-600 font-bold flex pt-1">
                                            <a href="annonce?id=<?= $announce_id ?>" class="text-sm text-[#DF5317] font-bold flex pt-1">
                                                <img src="/images/Group_6.png" alt="image">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        <?php elseif ($announce_type === 'Demande') : ?>
                            <tr class="h-20">
                                <td class="p-4">
                                    <div class="flex justify-start items-center gap-0.5">
                                        <div class="bg-red-500 h-10 w-10 border-0 rounded-full">
                                            <img src="<?= $photo ?>" alt="<?= $full_name ?>" class="">
                                        </div>
                                        <div>
                                            <p class="text-sm text-black font-bold"><?= $full_name ?></p>
                                            <p class="text-sm text-gray-500 "><?= $origin_city ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-blue-500 opacity-50">Title</p>
                                        <p class="text-sm text-blue-600 font-bold"><?= $title ?></p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">City</p>
                                        <p class="text-sm text-[#DF5317] font-bold"><?= $localisation ?></p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">Budget</p>
                                        <p class="text-sm text-[#DF5317] font-bold"><?= $budget ?> DH</p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">Availability</p>
                                        <p class="text-sm text-[#DF5317] font-bold"><?= $available_at ?></p>

                                    </div>
                                </td>

                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">Type</p>
                                        <button class="text-sm text-[#DF5317] font-bold "><?= $announce_type ?></button>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div>
                                        <p class="text-sm text-[#DF5317] opacity-50">more</p>
                                        <a href="annonce?id=<?= $announce_id ?>" class="text-sm text-[#DF5317] font-bold flex pt-1">
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let data = {
            "title": "",
            "budget": [],
            "city": "",
            "available_at": "",
            "type": ""
        };
        let title = document.getElementById("title");
        title.addEventListener("input", () => {
            data.title = title.value;
            getAnnounces(data);
        })

        let city = document.getElementById("city");
        city.addEventListener("input", () => {
            data.city = city.value;
            getAnnounces(data);
        })

        let max_budget = document.getElementById("max_budget");
        max_budget.addEventListener("input", () => {
            data.budget[1] = Number(max_budget.value);
            getAnnounces(data);
        })

        let min_budget = document.getElementById("min_budget");
        min_budget.addEventListener("input", () => {
            data.budget[0] = Number(min_budget.value);
            getAnnounces(data);

        })

        let available_at = document.getElementById("available_at");
        available_at.addEventListener("input", () => {
            let date = new Date(available_at.value);
            let formattedDate = date.getFullYear() + '/' +
                String(date.getMonth() + 1).padStart(2, '0') + '/' +
                String(date.getDate()).padStart(2, '0');

            data.available_at = formattedDate;

            getAnnounces(data);

        })

        let type = document.getElementById("type");
        type.addEventListener("input", () => {
            data.type = type.value;
            getAnnounces(data);

        })

        function getAnnounces(data) {
            var xhr = new XMLHttpRequest();

            xhr.open("POST", "announces/search", true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        const response = JSON.parse(xhr.response);
                        // console.log(response);
                        filAnnouncesContainer(response);
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                        console.log("Raw response:", xhr.response);
                    }
                } else {
                    console.error("Error:", xhr.status);
                }
            };

            xhr.onerror = function() {
                console.error("Request failed");
            };

            xhr.send(JSON.stringify(data));
        }

        function filAnnouncesContainer(data) {
            data = data.data.filter(item => item.user_id != <?= json_encode($_SESSION["user_id"]) ?>);
            let announcesContainer = document.querySelector(".announces-container");
            announcesContainer.innerHTML = "";
            console.log(data);

            data.forEach(e => {
                let template = `<tr class='h-20'>
                        <td class='p-4'>
                            <div class='flex justify-start items-center gap-0.5'>
                                <div class='bg-red-500 h-10 w-10 border-0 rounded-full'>
                                    <img src='${e.photo}' alt='${e.full_name}' class='h-10 w-10 rounded-full object-cover'>
                                </div>
                                <div>
                                    <p class='text-sm text-black font-bold'>${e.full_name}</p>
                                    <p class='text-sm text-gray-500'>${e.origin_city}</p>
                                </div>
                            </div>
                        </td>
                        <td class='p-4'>
                            <div>
                                <p class='text-sm text-blue-500 opacity-50'>Title</p>
                                <p class='text-sm text-blue-600 font-bold'>${e.title}</p>
                            </div>
                        </td>
                        <td class='p-4'>
                            <div>
                                <p class='text-sm text-[#DF5317] opacity-50'>City</p>
                                <p class='text-sm text-[#DF5317] font-bold'>${e.localisation}</p>
                            </div>
                        </td>
                        <td class='p-4'>
                            <div>
                                <p class='text-sm text-[#DF5317] opacity-50'>Budget</p>
                                <p class='text-sm text-[#DF5317] font-bold'>${e.budget} DH</p>
                            </div>
                        </td>
                        <td class='p-4'>
                            <div>
                                <p class='text-sm text-[#DF5317] opacity-50'>Availability</p>
                                <p class='text-sm text-[#DF5317] font-bold'>${e.available_at}</p>
                            </div>
                        </td>
                        <td class='p-4'>
                            <div>
                                <p class='text-sm text-[#DF5317] opacity-50'>Type</p>
                                <button class='text-sm text-[#DF5317] font-bold'>${e.announce_type}</button>
                            </div>
                        </td>
                        <td class='p-4'>
                            <div>
                                <p class='text-sm text-[#DF5317] opacity-50'>More</p>
                                <a href='annonce?id=${e.announce_id}' class='text-sm text-[#DF5317] font-bold flex pt-1'>
                                    <img src='/images/Group_6.png' alt='More'>
                                </a>
                            </div>
                        </td>
                    </tr>`;
                announcesContainer.innerHTML += template;
            });

        }
    });
</script>

<?php include __DIR__ . "/partials/footer.view.php" ?>