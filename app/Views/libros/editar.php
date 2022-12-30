<?= $cabecera ?>
<div class="card text-start">
    <div class="card-body">
        <h4 class="card-title">Ingresar datos del libro</h4>
        <p class="card-text">

        <form action="<?= site_url('/actualizar') ?>" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $libro['id'] ?>">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" value="<?= $libro['nombre'] ?>" name="nombre" id="nombre" class="form-control" placeholder="Ingresa el nombre del libro" aria-describedby="helpId">
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <br>
                <img class="img-thumbnail" src="<?= base_url('') ?>/uploads/<?= $libro['imagen']; ?>" width="100">
                <br>
                <br>
                <input type="file" class="form-control" name="imagen" id="imagen">
            </div>

            <button class="btn btn-success" type="submit">Actualizar</button>
            <a href="<?= base_url('listar'); ?>" class="btn btn-info">Cancelar</a>
        </form>
        </p>
    </div>
</div>
<?= $pie ?>