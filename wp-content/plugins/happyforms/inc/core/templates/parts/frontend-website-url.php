<div class="<?php happyforms_the_part_class( $part, $form ); ?>" id="<?php happyforms_the_part_id( $part, $form ); ?>-part" <?php happyforms_the_part_data_attributes( $part, $form ); ?>>
	<div class="happyforms-part-wrap">
		<?php if ( 'as_placeholder' !== $part['label_placement'] ) : ?>
			<?php happyforms_the_part_label( $part, $form ); ?>
		<?php endif; ?>

		<div class="happyforms-part__el">
			<?php do_action( 'happyforms_part_input_before', $part, $form ); ?>

			<input id="<?php happyforms_the_part_id( $part, $form ); ?>" type="text" value="<?php happyforms_the_part_value( $part, $form ); ?>" name="<?php happyforms_the_part_name( $part, $form ); ?>" placeholder="<?php echo esc_attr( $part['placeholder'] ); ?>" <?php happyforms_the_part_attributes( $part, $form ); ?> />

			<?php do_action( 'happyforms_part_input_after', $part, $form ); ?>

			<?php if ( 'as_placeholder' === $part['label_placement'] ) : ?>
				<?php happyforms_the_part_label( $part, $form ); ?>
			<?php endif; ?>

			<?php happyforms_print_part_description( $part ); ?>
			<?php happyforms_message_notices( happyforms_get_part_name( $part, $form ) ); ?>
		</div>
	</div>
</div>