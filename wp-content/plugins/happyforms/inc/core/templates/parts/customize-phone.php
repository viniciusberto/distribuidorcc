<script type="text/template" id="happyforms-customize-phone-template">
	<?php include( happyforms_get_include_folder() . '/core/templates/customize-form-part-header.php' ); ?>
	<p>
		<label for="<%= instance.id %>_title"><?php _e( 'Title', 'happyforms' ); ?></label>
		<input type="text" id="<%= instance.id %>_title" class="widefat title" value="<%= instance.label %>" data-bind="label" />
	</p>
	<p>
		<label for="<%= instance.id %>_label_placement"><?php _e( 'Title placement', 'happyforms' ); ?></label>
		<select id="<%= instance.id %>_label_placement" data-bind="label_placement">
			<option value="above"<%= (instance.label_placement == 'above') ? ' selected' : '' %>><?php _e( 'Above', 'happyforms' ); ?></option>
			<option value="left"<%= (instance.label_placement == 'left') ? ' selected' : '' %>><?php _e( 'Left', 'happyforms' ); ?></option>
			<option value="below"<%= (instance.label_placement == 'below') ? ' selected' : '' %>><?php _e( 'Below', 'happyforms' ); ?></option>
			<option value="inside"<%= (instance.label_placement == 'inside') ? ' selected' : '' %>><?php _e( 'Inside input', 'happyforms' ); ?></option>
			<option value="as_placeholder"<%= (instance.label_placement == 'as_placeholder') ? ' selected' : '' %>><?php _e( 'Display as placeholder', 'happyforms' ); ?></option>
			<option value="hidden"<%= (instance.label_placement == 'hidden') ? ' selected' : '' %>><?php _e( 'Hidden', 'happyforms' ); ?></option>
		</select>
	</p>
	<p class="label_placement-options" style="display: none">
		<label>
			<input type="checkbox" class="checkbox apply-all-check" value="" data-apply-to="label_placement" /> <?php _e( 'Apply to all parts', 'happyforms' ); ?>
		</label>
	</p>
	<p>
		<label for="<%= instance.id %>_description"><?php _e( 'Description', 'happyforms' ); ?></label>
		<textarea id="<%= instance.id %>_description" data-bind="description"><%= instance.description %></textarea>
	</p>
	<p class="happyforms-description-options" style="display: <%= (instance.description != '') ? 'block' : 'none' %>">
		<label for="<%= instance.id %>_description_mode"><?php _e( 'Description appearance', 'happyforms' ); ?></label>
		<select id="<%= instance.id %>_description_mode" data-bind="description_mode">
			<option value=""><?php _e( 'Standard', 'happyforms' ); ?></option>
			<option value="focus-reveal"<%= (instance.description_mode == 'focus-reveal') ? ' selected' : '' %>><?php _e( 'Reveal on focus', 'happyforms' ); ?></option>
			<option value="tooltip"<%= (instance.description_mode == 'tooltip' || instance.tooltip_description ) ? ' selected' : '' %>><?php _e( 'Tooltip', 'happyforms' ); ?></option>
		</select>
	</p>
	<p class="happyforms-placeholder-option" style="display: <%= ( 'as_placeholder' !== instance.label_placement ) ? 'block' : 'none' %>">
		<label for="<%= instance.id %>_placeholder"><?php _e( 'Placeholder', 'happyforms' ); ?></label>
		<input type="text" id="<%= instance.id %>_placeholder" class="widefat title" value="<%= instance.placeholder %>" data-bind="placeholder" />
	</p>

	<?php do_action( 'happyforms_part_customize_phone_before_options' ); ?>

	<p>
		<label>
			<input type="checkbox" class="checkbox" value="1" <% if ( instance.required ) { %>checked="checked"<% } %> data-bind="required" /> <?php _e( 'This is required', 'happyforms' ); ?>
		</label>
	</p>

	<?php do_action( 'happyforms_part_customize_phone_after_options' ); ?>

	<div class="happyforms-part-advanced-settings-wrap">
		<?php do_action( 'happyforms_part_customize_phone_before_advanced_options' ); ?>

		<p>
			<label>
				<input type="checkbox" name="masked" class="checkbox" value="1" <% if ( instance.masked ) { %>checked="checked"<% } %> data-bind="masked" /> <?php _e( 'International format', 'happyforms' ); ?>
			</label>
		</p>
		<div class="number-options number-options--phone" style="display: <%= (instance.masked != 0) ? 'block' : 'none' %>">
			<p>
				<label for="<%= instance.id %>_mask_phone_country"><?php _e( 'Default phone number region', 'happyforms' ); ?></label>
				<select id="<%= instance.id %>_mask_phone_country" class="widefat title" data-bind="mask_phone_country">
				<?php
				$phone_countries = happyforms_get_phone_countries();

				foreach ( $phone_countries as $country_code => $country ) : ?>
					<option value="<?php echo esc_attr( $country_code ); ?>"<% if (instance.mask_phone_country == <?php echo $country['code']; ?> || instance.mask_phone_country == '<?php echo $country_code; ?>') { %> selected<% } %>><?php echo ucwords( strtolower( $country['name'] ) ); ?></option>
				<?php endforeach; ?>
				</select>
			</p>
			<p>
				<label>
					<input type="checkbox" name="mask_allow_all_countries" class="checkbox" value="1" <% if ( instance.mask_allow_all_countries ) { %>checked="checked"<% } %> data-bind="mask_allow_all_countries" /> <?php _e( 'Allow other regions to be selected', 'happyforms' ); ?>
				</label>
			</p>
		</div>
		<p>
			<label for="<%= instance.id %>_width"><?php _e( 'Width', 'happyforms' ); ?></label>
			<select id="<%= instance.id %>_width" name="width" data-bind="width" class="widefat">
				<option value="full"<%= (instance.width == 'full') ? ' selected' : '' %>><?php _e( 'Full', 'happyforms' ); ?></option>
				<option value="half"<%= (instance.width == 'half') ? ' selected' : '' %>><?php _e( 'Half', 'happyforms' ); ?></option>
				<option value="third"<%= (instance.width == 'third') ? ' selected' : '' %>><?php _e( 'Third', 'happyforms' ); ?></option>
				<option value="auto"<%= (instance.width == 'auto') ? ' selected' : '' %>><?php _e( 'Auto', 'happyforms' ); ?></option>
			</select>
		</p>
		<p class="width-options" style="display: none">
			<label>
				<input type="checkbox" class="checkbox apply-all-check" value="" data-apply-to="width" /> <?php _e( 'Apply to all parts', 'happyforms' ); ?>
			</label>
		</p>
		<p>
			<label for="<%= instance.id %>_css_class"><?php _e( 'Custom CSS class', 'happyforms' ); ?></label>
			<input type="text" id="<%= instance.id %>_css_class" class="widefat title" value="<%= instance.css_class %>" data-bind="css_class" />
		</p>
		<p>
			<label>
				<input type="checkbox" class="checkbox confirmation-checkbox" value="1" <% if ( instance.confirmation_field ) { %>checked="checked"<% } %> data-bind="confirmation_field" /> <?php _e( 'Require confirmation of the value', 'happyforms' ); ?>
			</label>
		</p>
		<p class="confirmation-field-setting" style="display: <%= (instance.confirmation_field == 1) ? 'block' : 'none' %>">
			<label for="<%= instance.id %>_confirmation_field_label"><?php _e( 'Confirmation field title', 'happyforms' ); ?></label>
			<input type="text" id="<%= instance.id %>_confirmation_field_label" class="widefat title" value="<%= instance.confirmation_field_label %>" data-bind="confirmation_field_label" />
		</p>

		<?php do_action( 'happyforms_part_customize_phone_after_advanced_options' ); ?>
	</div>

	<div class="happyforms-part-logic-wrap">
		<div class="happyforms-logic-view">
			<?php happyforms_customize_part_logic(); ?>
		</div>
	</div>

	<?php happyforms_customize_part_footer(); ?>
</script>
