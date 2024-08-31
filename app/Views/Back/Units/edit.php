<?php echo $this->extend('Back/Layout/main');   ?>

<!-- Sezione del Titolo -->
<?php echo $this->section('title');    ?>
<?php echo $title; ?>
<?php echo $this->endSection();    ?>

<!-- Sezione del Style -->
<?php echo $this->section('css');    ?>



<?php echo $this->endSection();    ?>


<!-- #############Sezione del Contenuto####################### -->
<?php echo $this->section('content');    ?>

<!-- Begin Page Content -->
<div class="container-fluid">
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $title ;  ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                

            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection();    ?>
<!-- ############/.container-fluid############################ -->


<!-- Sezione del js -->
<?php echo $this->section('js');    ?>



<?php echo $this->endSection();    ?>