<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="CSS\annonce.css">
</head>

<body>

    <div class="container">


        <main style="margin-top:50px">
            <h2>Ajouter une nouvelle annonce</h2>
            <p class="subtitle">
                vous êtes à quelques pas de trouver un nouveau logement 😊
            </p>

            <form action="annonce" method="POST" enctype="multipart/form-data">


                <div class="toggle-buttons">
                    <label class="radio-label">
                        <input type="radio" name="type" value="Demande" />
                        <span class="radio-btn">Demand</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="type" value="Offre" checked />
                        <span class="radio-btn active">Offer</span>
                    </label>
                </div>

                <label for="title">Titre *</label>
                <input type="text" id="title" name="titre" placeholder="Votre titre" required />

                <label for="description">Description *</label>
                <textarea
                    id="description"
                    placeholder="Une petite description" name="description" required></textarea>

                <label for="city">Ville *</label>
                <select id="city" name="city">
                    <option>Choisissez une ville</option>
                    <option value="nador">nador</option>
                    <option value="safy">safi</option>
                    <option value="youssefia">youssefia</option>
                </select>

                <label for="address">Adresse (quartier)</label>
                <input
                    type="text"
                    id="address" name="address"
                    placeholder="Vous pouvez laisser vide" required />

                <div class="budget-places">
                    <div>
                        <label for="budget">Budget *</label>
                        <input
                            type="number"
                            id="budget" name="budget"
                            placeholder="Prix par personne (en Dirham)" required />
                    </div>
                    <div>
                        <label for="places">Disponibilité *</label>
                        <input type="date" name="disponsibilite" required />
                    </div>
                </div>
                <div id="extraInputContainer">



                </div>

                <button type="submit" name="ajouter" class="submit-btn">Soumettre</button>
            </form>
        </main>
    </div>
    <!-- <form action="" method="POST" enctype="multipart/form-data">
    <label for="file">Choisir un fichier :</label>
    <input type="file" name="image_file" id="file" required>
    <button type="submit" name="add">Uploader</button>
</form> -->

    <script src="/js/annonce.js"></script>
</body>

</html>