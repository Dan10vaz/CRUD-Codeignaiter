<?= $cabecera ?>


<div class="card text-start">
    <div class="card-body">
        <h4 class="card-title">Ingresar datos del librOO</h4>
        <p class="card-text">

        <form action="<?= site_url('/guardar') ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" value="<?= old('nombre') ?>" id="nombre" class="form-control" placeholder="Ingresa el nombre del libro" aria-describedby="helpId">
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Sube tu imagen:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="" aria-describedby="fileHelpId">
            </div>

            <button class="btn btn-success" type="submit">Guardar</button>
            <a href="<?= base_url('listar'); ?>" class="btn btn-info">Cancelar</a>
        </form>
        </p>
    </div>
</div>


<?= $pie ?>