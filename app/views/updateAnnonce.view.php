<?php include __DIR__ . "/partials/header.view.php" ?>

<main class="container mx-auto px-4 py-8">


    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Update the request</h2>
        <form action="/profile/updateannounce" method="POST">
            <!-- Hidden field for announcement ID -->
            <input type="hidden" name="announce_id" value="<?= $announce_id ?>">
            <input type="hidden" name="type" value="<?= $announce_type ?>">

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="titre" id="title" value="<?= $title ?>"
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full"><?= $description ?></textarea>
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="localisation" class="block text-sm font-medium text-gray-700">City</label>
                <input type="text" name="localisation" id="localisation" value="<?= $localisation ?>"
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" id="address" value="<?= $address ?>"
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Availability date -->
            <div class="mb-4">
                <label for="available_at" class="block text-sm font-medium text-gray-700">Available from</label>
                <input type="date" name="available_at" id="available_at" value="<?= $available_at ?>"
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Budget -->
            <div class="mb-4">
                <label for="budget" class="block text-sm font-medium text-gray-700">Budget (€)</label>
                <input type="number" name="budget" id="budget" min="0" value="<?= $budget ?>"
                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- ************************************************************************************** -->
            <div id="type_input" class="flex flex-col">
                <!-- type demande -->



                <!-- ************************************************************************************** -->
                <!-- type offer -->



            </div>
            <!-- ************************************************************************************** -->

            <!-- Submit button -->
            <div class="flex justify-end">
                <button type="submit" name="saveUpdate"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                    Update the request
                </button>
            </div>
        </form>
    </div>

</main>

<script>
    const container = document.getElementById("type_input");
    const announceType = "<?= $announce_type ?>";
    console.log(announceType);

    if (announceType == "Demande") {
        container.innerHTML = `
        <div class="mb-4">
            <label for="move_in_date" class="block text-sm font-medium text-gray-700">Move-in date</label>
            <input type="date" name="move_in_date" id="move_in_date" value="<?= $move_in_date ?>"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full">
        </div>
        <div class="mb-4">
            <label for="zones_souhaitees" class="block text-sm font-medium text-gray-700">Preferred areas</label>
            <textarea name="zones_souhaitees" id="zones_souhaitees" rows="2"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full"><?= $zones_souhaitees ?></textarea>
        </div>
        <div class="mb-4">
            <label for="demand_type" class="block text-sm font-medium text-gray-700">Request type</label>
            <select name="demand_type" id="demand_type" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                <option value="">Select</option>
                <option value="Solo" <?php if ($demand_type == 'Solo'): echo 'selected';
                                        endif; ?>>Solo</option>
                <option value="Together" <?php if ($demand_type == 'Together'): echo 'selected';
                                            endif; ?>>Together</option>
            </select>
        </div>
    `;
    } else if (announceType === "Offre") {
        container.innerHTML = `
        <div class="mb-4">
            <label for="criteres_colocataire" class="block text-sm font-medium text-gray-700">Roommate criteria</label>
            <textarea name="criteres_colocataire" id="criteres_colocataire" rows="2"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full"><?php echo $criteres_colocataire ?></textarea>
        </div>
        <div class="mb-4">
            <label for="regles_cohabitation" class="block text-sm font-medium text-gray-700">Co-living rules</label>
            <textarea name="regles_cohabitation" id="regles_cohabitation" rows="2"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full"><?= $regles_cohabitation ?></textarea>
        </div>
        <div class="mb-4">
            <label for="capacite_accueil" class="block text-sm font-medium text-gray-700">Accommodation capacity</label>
            <input type="number" name="capacite_accueil" id="capacite_accueil" min="1" value="<?= $capacite_accueil ?>"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full">
        </div>
        <div class="mb-4">
            <label for="equipements" class="block text-sm font-medium text-gray-700">equipements</label>
            <textarea name="equipements" id="equipements" rows="3"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full"><?= $equipements ?></textarea>
        </div>
    `;
    }
</script>




<?php include __DIR__ . "/partials/footer.view.php" ?>