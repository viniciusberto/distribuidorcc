<script type="text/template" id="happyforms-customize-scale-template">
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
			<option value="tooltip"<%= (instance.description_mode == 'tooltip' || instance.tooltip_description ) ? ' selected' : '' %>><?php _e( 'Tooltip', 'happyforms' ); ?></option>
		</select>
	</p>

	<?php do_action( 'happyforms_part_customize_scale_before_options' ); ?>

	<div class="happyforms-customize-controls-wrap--side-by-side">
		<p>
			<label for="<%= instance.id %>_max_value"><?php _e( 'Minimum value', 'happyforms' ); ?></label>
			<input type="text" id="<%= instance.id %>_max_value" class="widefat title" value="<%= instance.min_value %>" data-bind="min_value" />
		</p>
		<p>
			<label for="<%= instance.id %>_max_value"><?php _e( 'Maximum value', 'happyforms' ); ?></label>
			<input type="text" id="<%= instance.id %>_max_value" class="widefat title" value="<%= instance.max_value %>" data-bind="max_value" />
		</p>
	</div>
	<p>
		<label>
			<input type="checkbox" class="checkbox" value="1" <% if ( instance.required ) { %>checked="checked"<% } %> data-bind="required" /> <?php _e( 'This is required', 'happyforms' ); ?>
		</label>
	</p>

	<?php do_action( 'happyforms_part_customize_scale_after_options' ); ?>

	<div class="happyforms-part-advanced-settings-wrap">
		<?php do_action( 'happyforms_part_customize_scale_before_advanced_options' ); ?>

		<p>
			<label>
				<input type="checkbox" class="checkbox" value="1" <% if ( instance.multiple ) { %>checked="checked"<% } %> data-bind="multiple" /> <?php _e( 'Allow range select', 'happyforms' ); ?>
			</label>
		</p>
		<div class="happyforms-customize-controls-wrap--side-by-side scale-multiple-options" style="display: <%= ( instance.multiple ) ? 'flex' : 'none' %>">
			<p>
				<label for="<%= instance.id %>_default_range_from"><?php _e( 'Default range from', 'happyforms' ); ?></label>
				<input type="text" id="<%= instance.id %>_default_range_from" class="widefat title" value="<%= instance.default_range_from %>" data-bind="default_range_from" />
			</p>
			<p>
				<label for="<%= instance.id %>_default_range_to"><?php _e( 'Default range to', 'happyforms' ); ?></label>
				<input type="text" id="<%= instance.id %>_default_range_to" class="widefat title" value="<%= instance.default_range_to %>" data-bind="default_range_to" />
			</p>
		</div>
		<p class="scale-single-options" style="display: <%= ( instance.multiple ) ? 'none' : 'block' %>">
			<label for="<%= instance.id %>_default_value"><?php _e( 'Default value', 'happyforms' ); ?></label>
			<input type="text" id="<%= instance.id %>_default_value" class="widefat title" value="<%= instance.default_value %>" data-bind="default_value" />
		</p>
		<div class="happyforms-customize-controls-wrap--side-by-side">
			<p>
				<label for="<%= instance.id %>_min_label"><?php _e( 'Min value label', 'happyforms' ); ?></label>
				<input type="text" id="<%= instance.id %>_min_label" class="widefat title" value="<%= instance.min_label %>" data-bind="min_label" />
			</p>
			<p>
				<label for="<%= instance.id %>_max_label"><?php _e( 'Max value label', 'happyforms' ); ?></label>
				<input type="text" id="<%= instance.id %>_max_label" class="widefat title" value="<%= instance.max_label %>" data-bind="max_label" />
			</p>
		</div>
		<p>
			<label for="<%= instance.id %>_step"><?php _e( 'Step', 'happyforms' ); ?></label>
			<select id="<%= instance.id %>_step" data-bind="step" class="widefat">
				<option value="1"<%= (instance.step == '1') ? ' selected' : '' %>>1</option>
				<option value="0.1"<%= (instance.width == '0.1') ? ' selected' : '' %>>0.1</option>
				<option value="10"<%= (instance.width == '10') ? ' selected' : '' %>>10</option>
			</select>
		</p>
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

		<?php do_action( 'happyforms_part_customize_scale_after_advanced_options' ); ?>

		<p>
			<label for="<%= instance.id %>_css_class"><?php _e( 'Custom CSS class', 'happyforms' ); ?></label>
			<input type="text" id="<%= instance.id %>_css_class" class="widefat title" value="<%= instance.css_class %>" data-bind="css_class" />
		</p>
	</div>

	<div class="happyforms-part-logic-wrap">
		<div class="happyforms-logic-view">
			<?php happyforms_customize_part_logic(); ?>
		</div>
	</div>

	<?php happyforms_customize_part_footer(); ?>
</script>
