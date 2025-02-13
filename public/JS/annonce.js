document.addEventListener("DOMContentLoaded", function () {
  let radios = document.querySelectorAll('input[name="type"]');
  let container = document.getElementById("extraInputContainer");

  radios.forEach((radio) => {
    radio.addEventListener("change", function () {
      if (this.value === "Offre") {
        container.innerHTML = `

 <label for="">Capacité d'accueil * *</label>
    <input type="numbre" class="title"  
          name="capacite_accueil"
         placeholder="Capacité d'accueil" 
           required" />
    <label for="">equipements *</label>
    <input type="text" class="title"  name="equipement" placeholder="Votre equpement"required />
    <label for="">regle de cohabitation *</label>
    <input type="text" class="title"  name="regle_cohabitation" placeholder="entrez vous regles " />
    <label for="">criteres colocataire *</label>
    <input type="text" class="title"  name="criteres_colocataires" placeholder="entrez votre  criteres"required />

    <!-- <div class="availability">
      <label>Date d'emménagement *</label>
      <div>
        <input type="date" name="move_in_date"  required/>
      </div>
    </div> -->

    <div class="upload-section">
      <label for="images">Photos *</label>
<input
type="file"
id="images" accept="image/*"
name="images[]"
class="upload-box"

multiple

required
/>
    </div>
 
`;
      } else {
        container.innerHTML = `<div class="rooms">
      <div>
        <label for="room-count">zones souhaitees * </label>
        <input
          type="text"
          id="room-count" name="zones_souhaitees"
          placeholder=" qui votre zone preferé"
          required
        />
      </div>
      <div>
        <label>Date d'emménagement *</label>
      <div>
        <input type="date" name="move_in_date" required/>
      </div>
      </div>
    </div>
    <label for="title"> type demande *</label>
    <select id="demand_type" name="demand_type">
      <option>Choisissez une type</option>
      <option value="Solo">solo</option>
      <option value="Together">togother </option>
    
    </select>`;
      }
    });
  });
});