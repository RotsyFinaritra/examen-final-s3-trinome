<div class="containteForm col-md-6 col-md-offset-3">
    <h1>Ajout animal</h1>
    <form action="<?= $_SESSION['base_url'] ?>/admin/animals/insert" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Type d'animale</label>
            <select name="id_type_animal" id="">
                <?php foreach ($types as $type) { ?>
                    <option value="<?= $type['id_type_animal'] ?>"><?= $type['espece'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="number" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Nombre ...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Date</label>
            <input type="date" name="date_entree" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Poids total</label>
            <input type="number" name="poids_initial" name="prix_achat" class="form-control" id="exampleInputEmail1" placeholder="Prix total ...">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Prix</label>
            <input type="number" name="prix_achat" name="prix_achat" class="form-control" id="exampleInputEmail1" placeholder="Prix total ...">
        </div>
        <button class="btn btn-primary">Ajout</button>
    </form>
</div>