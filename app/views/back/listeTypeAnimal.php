<div class="col-md-12">
    <div class="containteList">
        <?php foreach ($types as $type) { ?>
            <div class="col-md-6">
                <div class="itemList">
                    <div class="imageList col-md-4">
                        <img src="<?= $_SESSION['base_url'] ?>/image/<?= $type['image'] ?>" alt="">
                    </div>
                    <div class="descriptList col-md-8">
                        <div>
                            <p>Espece :</p>
                            <h2><?= $type['espece'] ?></h2>
                        </div>
                        <div>
                            <p>Poids minimal de vente :</p>
                            <h2><?= $type['poids_min_vente'] ?> kg</h2>
                        </div>
                        <div>
                            <p>Poids de vente par kg :</p>
                            <h2><?= $type['prix_kg'] ?> Ar</h2>
                        </div>
                        <div>
                            <p>Poids maximal</p>
                            <h2><?= $type['poids_max'] ?> kg</h2>
                        </div>
                        <div>
                            <p>Jours sans manger</p>
                            <h2><?= $type['nb_jour_sans_manger'] ?> jours</h2>
                        </div>
                        <div>
                            <p>Gain de poids</p>
                            <h2><?= $type['pourcentage_perte_poids'] ?> %</h2>
                        </div>
                        <div>
                            <p>Perte de poids</p>
                            <h2><?= $type['pourcentage_gain_poids'] ?> %</h2>
                        </div>
                        <div></div>
                        <button class="btn btn-default"
                            onclick="modifierType(<?= $type['id_type_animal'] ?>, this)">Modifier</button>
                        <button class="btn btn-success">Vendre</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    function modifierType(id) {
        let url = "<?= $_SESSION['base_url'] ?>/admin/animals/types/update/" + id; // Construire l'URL avec l'ID
        chargerContenuDepuisPHP('containte', url); // Charger le formulaire
    }
</script>