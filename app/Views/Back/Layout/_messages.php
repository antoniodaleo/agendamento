 <div class="container-fluid">

     <?php if (session()->has('info')) :  ?>

         <div class="alert alert-info alert-dismissible fade show" role="alert">
             <?php echo session('info');   ?>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"> &times; </span>
             </button>
         </div>

     <?php endif;  ?>

 </div>