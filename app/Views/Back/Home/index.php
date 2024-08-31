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
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title?? 'Home';  ?></h1>
    <p><?php echo $user;  ?></p>
</div>
<?php echo $this->endSection();    ?>
<!-- ############/.container-fluid############################ -->



<!-- Sezione del js -->
<?php echo $this->section('js');    ?>

<?php echo $this->endSection();    ?>