<table class="table">
	<thead>
		<tr>
			<th>
				Name
			</th>
			<th>
				Description
			</th>
			<th>
				Images
			</th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td>
				<?php echo e($service->name); ?>

			</td>
			<td>
				<?php echo e($service->description); ?>

			</td>
			<td>
				<div class="btn-group">
					<a class="btn btn-default" data-target="#services_update_<?php echo e($service->id); ?>" data-toggle="tab">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<button class="btn btn-default"
							data-disk-browser="true"
							data-disks="Services">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
					</button>
					<button class="btn btn-danger"
							data-modal="confirmation"
							data-message="Are you sure you want to delete <?php echo e($service->name); ?> theme?"
							data-form="<?php echo e($service->id); ?>_delete">
						<i class="fa fa-trash-o" aria-hidden="true"></i>
					</button>
				</div>

				<form method="POST" action="<?php echo e(url('/admin/service/destroy')); ?>" id="<?php echo e($service->id); ?>_delete">
					<?php echo e(csrf_field()); ?>

					<input type="hidden" name="id" value="<?php echo e($service->id); ?>">
				</form>

			</td>			
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	</tbody>
</table>