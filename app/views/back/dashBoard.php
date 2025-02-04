<div class="col-md-12">
    <div class="containteList">
        <div class="search">
            <form id="form-date" action="<?= $_SESSION['base_url'] ?>/admin/dashboard/search" method="get">
                <div class="inputContaine">
                    <p>Date</p>
                    <input type="date" name="date" id="date-input" placeholder="Quand?" required>
                </div>
                <button type="submit" class="btn btn-danger">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </button>
            </form>
        </div>

        <div style="background-color: #fff; margin: auto; ">
            <?php foreach ($types as $type) { ?>
                <h2>Liste des <?= htmlspecialchars($type['espece']) ?></h2>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-inverse ">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Poids</th>
                                <th>État</th>
                                <th>Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($date)) {
                                $animalsByType = $animauxByType[$type['id_type_animal']];
                                foreach ($animalsByType as $animal) { ?>
                                    <tr>
                                        <td><img src="<?= $_SESSION['base_url'] ?>/image/<?= $animal['image'] ?>" alt=""></td>
                                        <td><?= $animal['poids_variable'] ?></td>
                                        <td><?= $animal['poids_variable'] ?></td>
                                        <td><?= $animal['prix_achat'] ?></td>
                                    </tr>
                                <?php } ?>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    document.getElementById('form-date').addEventListener('submit', function (event) {
        event.preventDefault(); // Empêcher la soumission normale du formulaire

        let date = document.getElementById('date-input').value; // Récupérer la date insérée
        if (date) {
            let url = "<?= $_SESSION['base_url'] ?>/admin/dashboard/" + date; // Construire l'URL
            changerContenuDepuisPHP('containte', url);
        } else {
            alert("Veuillez entrer une date !");
        }
    });
</script>