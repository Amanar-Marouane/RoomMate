document.addEventListener("DOMContentLoaded", function() {
    const nextBtn = document.getElementById("next");
    const additionalContainer = document.getElementById("additional-section");
    const form = document.querySelector("form");
    
    // Store initial form children (excluding the additional container)
    const initialElements = Array.from(form.children).filter(child => child.id !== "additional-section");
    
    nextBtn.addEventListener("click", function(e) {
        e.preventDefault();
        // Hide initial fields
        initialElements.forEach(el => { el.style.display = "none"; });
        // Show additional container
        additionalContainer.style.display = "block";
    });
    
    document.getElementById("go_back").addEventListener("click", function(e) {
        e.preventDefault();
        // Hide the additional container
        additionalContainer.style.display = "none";
        // Show initial fields and next button
        initialElements.forEach(el => { el.style.display = ""; });
    });
});


// choices.js
const tagsSelect = new Choices("#preferences", {
   removeItemButton: true, // allow removing selected preferences
   placeholder: true,
   placeholderValue: "Select preferences",
   searchPlaceholderValue: "Search preferences..."
});