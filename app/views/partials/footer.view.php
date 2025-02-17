<footer class="bg-[#08005B]">
    <div class="grid grid-cols-1 lg:grid-cols-2 px-6 lg:px-28 py-10 gap-2">
        <div class="w-full h-full ">
            <h1 class="text-2xl lg:text-4xl font-bold text-white">Roomate</h1>
            <p class="text-sm lg:text-base font-mono text-gray-300">Our mission is to help you find a student roommate easily </p>
        </div>
        <div class="w-full h-full flex justify-center lg:justify-end items-center text-white">
            <ul class="flex gap-2 lg:gap-6 text-sm lg:text-base justify-end">
                <li><a href="/home" class="hover:underline">Home</a></li>
                <li><a href="/home" class="hover:underline">Contact us</a></li>
                <li><a href="/home" class="hover:underline">Privacy Policy</a></li>
                <li><a href="/home" class="hover:underline">Term of use</a></li>
            </ul>
        </div>
    </div>
</footer>






<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleOpen = document.getElementById("toggleOpen");
        const toggleClose = document.getElementById("toggleClose");
        const collapseMenu = document.getElementById("collapseMenu");

        // Ouvrir le menu
        toggleOpen.addEventListener("click", function() {
            collapseMenu.classList.remove("max-lg:hidden");
            collapseMenu.classList.add("max-lg:block");
        });

        // Fermer le menu
        toggleClose.addEventListener("click", function() {
            collapseMenu.classList.remove("max-lg:block");
            collapseMenu.classList.add("max-lg:hidden");
        });

        // Fermer le menu si on clique en dehors de celui-ci
        document.addEventListener("click", function(event) {
            if (!collapseMenu.contains(event.target) && !toggleOpen.contains(event.target)) {
                collapseMenu.classList.remove("max-lg:block");
                collapseMenu.classList.add("max-lg:hidden");
            }
        });
    });
</script>



</body>

</html>