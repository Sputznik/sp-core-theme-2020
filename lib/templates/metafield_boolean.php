<p class="post-attributes-label-wrapper">
	<label class="post-attributes-label">
		<input type="checkbox" name="<?php _e( $slug );?>" <?php if( $value ) _e("checked='checked'");?> value="1" />
		<?php _e( $field['label'] );?>
	</label>
</p>
<p class="help"><?php _e( $field['desc'] );?></p>