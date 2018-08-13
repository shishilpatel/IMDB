<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Search Movie</div>                
                <div class="card-body ">
                    <hgroup class="mb20">
                        <h1>Search Results</h1>
                        <h2 class="lead"><strong class="text-danger">3</strong> results were found for the search for <strong class="text-danger">Lorem</strong></h2>								
                    </hgroup>
                    <?php for($i = 0;$i< count($result);$i++): ?>
                    <section class="col-xs-12 col-sm-6 col-md-12">
                        <article class="search-result row">
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <a href="#" title="<?php echo e($result[$i]['title']); ?>" class="thumbnail"><img src="<?php echo e($result[$i]['URL']); ?>" alt="" height="100px" width="100px" /></a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <ul class="meta-search">
                                    <li><i class="glyphicon glyphicon-calendar"></i> <span><?php echo e($result[$i]['release_year']); ?></span></li>                                    
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7 excerpet">                                
                                <p><?php echo e($result[$i]['genre']); ?></p>						                                
                            </div>
                            <span class="clearfix borda"></span>
                        </article>
                    </section>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>