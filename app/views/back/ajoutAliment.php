<div class="containteForm col-md-6 col-md-offset-3">
    <h1>Ajout Aliment</h1>
    <form action="<?= $_SESSION['base_url'] ?>/admin/aliments/insert" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Type d'animale</label>
            <select name="id_type_animal" id="">
                <?php foreach ($types as $type) { ?>
                    <option value="<?= $type['id_type_animal'] ?>"><?= $type['espece'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Quantite</label>
            <input type="number" name="quantite" class="form-control" id="exampleInputEmail1" placeholder="Quantite ...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Prix par unite</label>
            <input type="number" name="prix_unitaire" class="form-control" id="exampleInputEmail1" placeholder="Prix unitaire ...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Date</label>
            <input type="date" name="date_ajout" class="form-control" id="exampleInputEmail1">
        </div>
        <button class="btn btn-primary">Ajout</button>
    </form>
</div>