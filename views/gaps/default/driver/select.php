<span class="<?php echo Gaps::prefix('field'); ?>">
	<?php if ($input->label()): ?>
		<span class="<?php echo Gaps::prefix('label'); ?>">
			<label for="<?php echo $input->field(); ?>">
				<?php echo __($input->label()); ?>
			</label>
		</span>
	<?php endif; ?>
	<span class="<?php echo Gaps::prefix('input'); ?>">
		<select name="<?php echo $input->field(); ?>" <?php echo HTML::attributes($input->attributes()); ?>>
			<?php foreach ($input->options as $value => $option): ?>
				<option value="<?php echo $value; ?>"><?php echo $option; ?></option>
			<?php endforeach; ?>
		</select>
	</span>
</span>
