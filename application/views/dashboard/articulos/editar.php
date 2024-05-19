<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo base_url('api/editar_articulos'); ?>"  method="post">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" required value="<?php echo $articuloId['title']; ?>">
                </div>
                <div class="mb-3">
                    <label for="contenido" class="form-label">Contenido</label>
                    <div id="contenido"><?php echo html_entity_decode($articuloId['content']); ?></div>
                </div>
                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Categoria</label>
                    <select class="form-select" id="categoria_id" name="categoria_id" required>
                        <?php if (is_array($categorias) && count($categorias) > 0) {  ?>
                            <?php foreach ($categorias as $categoria) { ?>
                                <option <?php echo $articuloId['category_id'] == $categoria['id'] ? 'selected' : '' ?> value="<?php echo $categoria['id'] ?>"><?php echo $categoria['name']; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="autor_id" class="form-label">Autor</label>
                    <select class="form-select" id="autor_id" name="autor_id" required>
                        <?php if (is_array($autores) && count($autores) > 0) {  ?>
                            <?php foreach ($autores as $autor) { ?>
                                <option <?php echo $articuloId['author_id'] == $autor['id'] ? 'selected' : '' ?> value="<?php echo $autor['id'] ?>"><?php echo $autor['name']; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <a href="<?php echo base_url('articulos') ?>" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary float-end">Actualizar</button>
                </div>
                <input type="hidden" name="contenido" id="contenidodiv">
                <input type="hidden" name="id" value="<?php echo $articuloId['id']; ?>">
            </form>
        </div>
    </div>
</div>