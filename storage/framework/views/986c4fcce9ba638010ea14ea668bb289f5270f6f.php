<?php $__env->startSection('content'); ?>
<h1>Books</h1>
<?php if(!Auth::guest()): ?>
    <a class="btn btn-primary" href="/Products/create">Add Book</a>
<?php endif; ?>

    <?php if(count($products)>0): ?>

    <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">DETAILS</th>
                <th scope="col">QUANTItY</th>
                <th scope="col">PRICE</th>
                <th scope="col">ENTRY</th>
                <th scope="col">Image</th>
                <th scope="col">ACTION</th>

              </tr>
            </thead>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <tbody>
              <a  href="/product/<?php echo e($product->id); ?>">
                <td scope="row"><?php echo e($product->id); ?></td>
                <td><?php echo e($product->productName); ?></td>
                <td><?php echo e($product->details); ?></td>
                <td><?php echo e($product->quantity); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td><?php echo e($product->created_at); ?></td>
                
                <td><a href="<?php echo e(route('Products.show', $product->id)); ?>">SHOW</a></td>
                

                
              
              </tbody>
              
            </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
    
       

        
                
                
            
        
            
    <?php else: ?>
    <h2>Empty Enventory</h2>
        
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Atp 3\Laravel\All\PocketProject\PocketProject-Laravel\PocketProject-laravel\pocketproject\resources\views/products/index.blade.php ENDPATH**/ ?>