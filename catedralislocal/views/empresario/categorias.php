<!DOCTYPE html>

<?php require "templates/head.php"; ?>


<body>
    <?php require "templates/nav.php"; ?>

    <section class="bg-light">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                <div class="col-12 col-lg-5">
                    <h2 class="display-4 lh-1 mb-4"><?php echo $this->empresa->getEmpresa(); ?></h2>
                    <p class="lead fw-normal text-muted mb-5 mb-lg-0"><?php echo $this->empresa->getDescripcion(); ?>
                    </p>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle"
                            src="<?php echo constant("URL") . $this->empresa->getImagen(); ?>" alt="..." /></div>
                </div>
            </div>
        </div>
    </section>

    <header class="masthead">

        <div class="container px-5">
            <hr>
            <h1>Lista de categorias</h1>
            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#feedbackModalCat">Agregar categorias</button>
            
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Id categoria</th>
                        <th>Titulo categoria</th>
                        <th>Descripcion categoria</th>
                       

                        <th colspan="2">Operaciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                        foreach($this->listaCategorias as $lista ){
                        ?>
                    <tr>
                        <th><?php echo $lista->getIdCategoria(); ?></th>
                        <th><?php echo $lista->getCategoria(); ?></th>
                        <th><?php echo $lista->getDescripcionCategoria(); ?></th>
                        

                        <th>
                        <button onclick="eliminar('<?php echo $lista->getIdCategoria() ?>')" 
                        class="btn btn-danger" >Eliminar</button></th>
                        <th><button onclick="btnModificarCategoria('<?php echo $lista->getIdCategoria() ?>','<?php echo $lista->getCategoria() ?>','<?php echo $lista->getDescripcionCategoria() ?>')" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#feedbackModalCatmodi">Modificar</button></th>

                    </tr>
                    <?php

                       
                        }

                        ?>
                </tbody>
            </table>
        </div>
    </header>
   
</body>
<?php require "templates/footer.php"; ?>


<?php require "templates/modalcategoria.php"; ?>

<?php require "templates/modalcategoriamodi.php"; ?>
<script>
<?php if(isset($this->exito)){
               echo "alertify.success('$this->exito')";
            } ?>
<?php if(isset($this->fracaso)){
               echo "alertify.error('$this->fracaso')";
            } ?>


function eliminar(id) {
    alertify.confirm('Eliminar categoria', 'Esta seguro de eliminar esta categoria?', function() {
        location.href = '<?php echo constant("URL") ?>Empresario/eliminarCategoria/'+id;
    }, function() {
        alertify.error('Proceso cancelado')
    });
}
</script>
<script src="<?php echo constant("URL") ?>public/js/funcionesscript.js"></script>

</html>