<div class="backListAnimal">
    <div class="containteForm col-md-6 col-md-offset-3">
        <h1>Modif type animal</h1>
        <form action="<?= $_SESSION['base_url'] ?>/admin/animals/types/update/<?= $type['id_type_animal'] ?>"
            method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Espece</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="espece"
                    value="<?= $type['espece'] ?>" placeholder="Nom de l'espece ...">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Poids minimal vente</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="poids_min_vente"
                    value="<?= $type['poids_min_vente'] ?>" placeholder="Poids minimal ...">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">prix de vente en kg</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="prix_kg"
                    value="<?= $type['prix_kg'] ?>" placeholder="Prix de vente ...">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Poids maximal</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="poids_max"
                    value="<?= $type['poids_max'] ?>" placeholder="Poids maximal ...">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre de jours sans manger avant de mourrir</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="nb_jour_sans_manger"
                    value="<?= $type['nb_jour_sans_manger'] ?>" placeholder="Nombre de jours ...">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Pourcentage de gain de poids</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="pourcentage_gain_poids"
                    value="<?= $type['pourcentage_gain_poids'] ?>" placeholder="Pourcentage ...">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Pourcentage de perte de poids</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="pourcentage_perte_poids"
                    value="<?= $type['pourcentage_perte_poids'] ?>" placeholder="Pourcentage ...">
            </div>
            <button class="btn btn-primary">Modif</button>
        </form>
    </div>
</div>