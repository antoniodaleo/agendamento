<?php echo $this->extend('Back/Layout/main');   ?>

<!-- Sezione del Titolo -->
<?php echo $this->section('title');    ?>
<?php echo $title; ?>
<?php echo $this->endSection();    ?>

<!-- Sezione del Style -->
<?php echo $this->section('css');    ?>
<!-- Custom styles for this page -->


<?php echo $this->endSection();    ?>


<!-- #############Sezione del Contenuto####################### -->
<?php echo $this->section('content');    ?>

<!-- Begin Page Content -->
<div class="container-fluid">
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $title ;  ?></h6>
            <a href="<?php echo route_to('units');  ?>" class="btn btn-secondary btn-sm float-right" >Voltar</a>
        </div>
        <div class="card-body">
           
            <?php echo form_open(route_to('units.services.store', $unit->id) , hidden: ['_method' => 'PUT']); ?>
            
                <button type="submit" class="btn btn-sm btn-success">Salvar</button><br>

                <button type="button" id="btnToogleAll" class="btn btn-sm btn-primary badge-primary mt-2 mb-1">Marcar todos</button>

                <?php echo $servicesOptions; ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php echo $this->endSection();    ?>
<!-- ############/.container-fluid############################ -->



<!-- Sezione del js -->
<?php echo $this->section('js');    ?>

    <script>
        document.getElementById('btnToogleAll').addEventListener('click', () => {

            const services = document.getElementsByName('services[]'); 

            services.forEach(element => {
                element.checked = !element.checked;
            }); 
        }); 


    </script>

<?php echo $this->endSection();    ?>