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
            <h1>Eventos del <?= isset($this->datobusqueda) ? $this->datobusqueda : "mes" ?></h1>
            <div>
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#feedbackModalEventos">Agregar
                    eventos</button>
                <form style="float: right; width:25%; display:flex;" action="<?php echo constant("URL");?>Empresario/eventos"   method="POST">
                    <input type="datetime-local" name="fechabuscar" class="form-control" value="<?php echo $this->datobusqueda; ?>">
                    <button class="rounded-circle m-1 btn-secondary"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <br>
            <br>
            <div class="calendar" data-toggle="calendar">

                <div class="row">
                    <?php for($i=1;$i<=7;$i++){
                        $mes = $this->mes;
                        $anio=$this->anio; 
                        
                        ?>
                    <div class="col-xs-12 calendar-day">
                        <?php 
                        $fechahoy =$anio."-". $mes."-0". $i;
                        echo $i ." ". date('D', strtotime($fechahoy)); 
                        foreach($this->listaEventos as $lista ){
                        
                        if($fechahoy == $lista->getFechaInicio()){
                        ?>

                        <button class="btn btn-info" id="<?php echo $lista->getFechaInicio() ."T".$lista->getHoraInicio();?>" data-bs-toggle="modal" data-bs-target="#feedbackVerEvento" onclick="btnModalEvento('<?php echo $lista->getIdEvento(); ?>',
                        '<?php echo $lista->getTituloEvento();?>',
                        '<?php echo $lista->getDescripcionEvento();?>',
                        '<?php echo $lista->getFechaInicio();?>',
                        '<?php echo $lista->getFechaFin();?>',
                        '<?php echo $lista->getHoraInicio();?>',
                        '<?php echo $lista->getHoraFin();?>',
                        '<?php echo $lista->getIdCategoria();?>',
                        '<?php echo $lista->getCategoria();?>',
                        'ver')"><?php echo $lista->getTituloEvento(); ?></button>

                        <?php
                    }}
                        ?>
                    </div>
                    <?php 
                
                } ?>
                </div>


                <div class="row">
                    <?php
        $j=7;
        for($i=1;$i<=7;$i++){ 
             $j++;
             if($j<10){
                $fechahoy =$anio."-". $mes."-0". $j;
             }else{
                $fechahoy =$anio."-". $mes."-". $j;
             }
            
            ?>

                    <div class="col-xs-12 calendar-day">

                        <?php 
                        
                        echo $j ." ". date('D', strtotime($fechahoy));;
                        foreach($this->listaEventos as $lista ){
                        
                        if($fechahoy == $lista->getFechaInicio()){
                        ?>

                        <button class="btn btn-info" id="<?php echo $lista->getFechaInicio() ."T".$lista->getHoraInicio();?>" data-bs-toggle="modal" data-bs-target="#feedbackVerEvento" onclick="btnModalEvento('<?php echo $lista->getIdEvento(); ?>',
                        '<?php echo $lista->getTituloEvento();?>',
                        '<?php echo $lista->getDescripcionEvento();?>',
                        '<?php echo $lista->getFechaInicio();?>',
                        '<?php echo $lista->getFechaFin();?>',
                        '<?php echo $lista->getHoraInicio();?>',
                        '<?php echo $lista->getHoraFin();?>',
                        '<?php echo $lista->getIdCategoria();?>',
                        '<?php echo $lista->getCategoria();?>',
                        'ver')"><?php echo $lista->getTituloEvento(); ?></button>

                        <?php
                    }}
                        ?>

                    </div>
                    <?php  } ?>
                </div>




                <div class="row">
                    <?php
        $j=14;
        for($i=1;$i<=7;$i++){ 
            
             $j++;
            ?>

                    <div class="col-xs-12 calendar-day">
                        <?php 
                        $fechahoy =$anio."-". $mes."-". $j;
                        echo $j ." ". date('D', strtotime($fechahoy)); ;
                        foreach($this->listaEventos as $lista ){
                        
                        if($fechahoy == $lista->getFechaInicio()){
                        ?>

                        <button class="btn btn-info" data-bs-toggle="modal" id="<?php echo $lista->getFechaInicio() ."T".$lista->getHoraInicio();?>" data-bs-target="#feedbackVerEvento" onclick="btnModalEvento('<?php echo $lista->getIdEvento(); ?>',
                        '<?php echo $lista->getTituloEvento();?>',
                        '<?php echo $lista->getDescripcionEvento();?>',
                        '<?php echo $lista->getFechaInicio();?>',
                        '<?php echo $lista->getFechaFin();?>',
                        '<?php echo $lista->getHoraInicio();?>',
                        '<?php echo $lista->getHoraFin();?>',
                        '<?php echo $lista->getIdCategoria();?>',
                        '<?php echo $lista->getCategoria();?>',
                        'ver')"><?php echo $lista->getTituloEvento(); ?></button>

                        <?php
                    }}
                        ?>
                    </div>
                    <?php } ?>
                </div>


                <div class="row">
                    <?php
        $j=21;
        for($i=1;$i<=7;$i++){ 
            
             $j++;
            ?>

                    <div class="col-xs-12 calendar-day">
                        <?php 
                        $fechahoy =$anio."-". $mes."-". $j;
                        echo $j ." ". date('D', strtotime($fechahoy));;
                        foreach($this->listaEventos as $lista ){
                        
                        if($fechahoy == $lista->getFechaInicio()){
                        ?>

                        <button class="btn btn-info" data-bs-toggle="modal" id="<?php echo $lista->getFechaInicio() ."T".$lista->getHoraInicio();?>" data-bs-target="#feedbackVerEvento" onclick="btnModalEvento('<?php echo $lista->getIdEvento(); ?>',
                        '<?php echo $lista->getTituloEvento();?>',
                        '<?php echo $lista->getDescripcionEvento();?>',
                        '<?php echo $lista->getFechaInicio();?>',
                        '<?php echo $lista->getFechaFin();?>',
                        '<?php echo $lista->getHoraInicio();?>',
                        '<?php echo $lista->getHoraFin();?>',
                        '<?php echo $lista->getIdCategoria();?>',
                        '<?php echo $lista->getCategoria();?>',
                        'ver')"><?php echo $lista->getTituloEvento(); ?></button>

                        <?php
                    }}
                        ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <?php
        $j=28;
        	$k=0;
        $diasactual= $this->cantidadDias;
        for($i=1;$i<=7;$i++){ 
            
             $j++;
            ?>

                    <div class="col-xs-12 calendar-day">
                        <?php
                        if($j>$diasactual){
                            $k++;
                         echo $k;
                        }else{
                            ?>
                        <?php 
                        $fechahoy =$anio."-". $mes."-". $j;
                        echo $j." ". date('D', strtotime($fechahoy)); ;
                        foreach($this->listaEventos as $lista ){
                        
                        if($fechahoy == $lista->getFechaInicio()){
                        ?>

                        <button class="btn btn-info" data-bs-toggle="modal" id="<?php echo $lista->getFechaInicio() ."T".$lista->getHoraInicio();?>" data-bs-target="#feedbackVerEvento" onclick="btnModalEvento('<?php echo $lista->getIdEvento(); ?>',
                        '<?php echo $lista->getTituloEvento();?>',
                        '<?php echo $lista->getDescripcionEvento();?>',
                        '<?php echo $lista->getFechaInicio();?>',
                        '<?php echo $lista->getFechaFin();?>',
                        '<?php echo $lista->getHoraInicio();?>',
                        '<?php echo $lista->getHoraFin();?>',
                        '<?php echo $lista->getIdCategoria();?>',
                        '<?php echo $lista->getCategoria();?>',
                        'ver')"><?php echo $lista->getTituloEvento(); ?></button>

                        <?php
                    }}
                        ?>
                        <?php 
                        }
                         ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>

</body>
<?php require "templates/footer.php"; ?>



<?php require "templates/modaleventos.php"; ?>

<?php require "templates/modalverevento.php"; ?>
<script>
<?php if(isset($this->exito)){
               echo "alertify.success('$this->exito')";
            } ?>
<?php if(isset($this->fracaso)){
               echo "alertify.error('$this->fracaso')";
            } ?>


function eliminar(id) {
    alertify.confirm('Eliminar evento', 'Esta seguro de eliminar este evento?', function() {
        location.href = '<?php echo constant("URL") ?>Empresario/eliminarEvento/' + id;
    }, function() {
        alertify.error('Proceso cancelado')
    });
}

var testData = document.getElementById("<?php echo $this->busquedascript ?>");
if(testData){
 testData.style.backgroundColor = '#B4E197';
}else{
    alertify.error('Elemento no encontrado')
}

</script>
<script src="<?php echo constant("URL") ?>public/js/funcionesscript.js"></script>

</html>