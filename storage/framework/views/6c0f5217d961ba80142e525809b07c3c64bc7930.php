<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Search Movie</div>                
                <div class="card-body ">
                    <form class="row" method="post" action="<?php echo e(route('checkmovie')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group col-md-5">
                            <label class="control-label" for="name">Title</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Search by Movie Name"/>
                        </div>
                        <div class="form-group col-md-5">
                            <label class="control-label" for="y">Year:</label>
                            <input id="year" name="year" class="form-control" type="text" placeholder="Search by Year">   
                        </div>
                        <div class="form-group col-md-5">
                            <label class="control-label" for="y">Ratings:</label>
                            <input id="rating" name="rating" class="form-control" type="text" placeholder="Search by Ratings">   
                        </div>
                        <div class="form-group col-md-5">
                            <label class="control-label" for="y">Genre:</label>
                            <input id="genre" name="genre" class="form-control" type="text" placeholder="Search by Genre">   
                        </div>
                        <div class="form-group col-md-2">                            
                            <label class="control-label"></label>
                            <input id="search-by-title-button" type="submit" class="form-control btn-sm btn-primary" value="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>