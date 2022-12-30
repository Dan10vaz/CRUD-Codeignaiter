<!-- <?= $cabecera ?> -->
<a class="btn btn-success" href="<?= base_url('crear') ?>">Crear un libro</a>
<br />
<br />
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($libros as $libro) : ?>
                <tr class="">
                    <td> <?= $libro['id'] ?> </td>
                    <td>
                        <img class="img-thumbnail" src="<?= base_url('') ?>/uploads/<?= $libro['imagen']; ?>" width="100">
                    </td>
                    <td><?= $libro['nombre'] ?></td>
                    <td>
                        <a href="<?= base_url('editar/' . $libro['id']); ?>" class="btn btn-info" type="button">Editar</a>
                        <a href="<?= base_url('borrar/' . $libro['id']); ?>" class="btn btn-danger" type="button">Borrar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $pie ?>