<?php
class HappyForms extends HappyForms_Core {

	public $default_notice;
	public $action_archive = 'archive';

	public function initialize_plugin() {
		parent::initialize_plugin();

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'happyforms_do_setup_control', array( $this, 'do_control' ), 10, 3 );
		add_filter( 'happyforms_setup_controls', array( $this, 'add_dummy_setup_controls' ) );
		add_action( 'admin_print_footer_scripts', array( $this, 'print_upgrade_modals' ) );
		add_action( 'parse_request', array( $this, 'parse_archive_request' ) );

		$this->register_dummy_parts();
		$this->add_setup_logic_upgrade_links();
	}

	public function register_dummy_parts() {
		$part_library = happyforms_get_part_library();

		require_once( happyforms_get_include_folder() . '/classes/parts/class-part-attachment-dummy.php' );
		$part_library->register_part( 'HappyForms_Part_Attachment_Dummy', 6 );

		require_once( happyforms_get_include_folder() . '/classes/parts/class-part-poll-dummy.php' );
		$part_library->register_part( 'HappyForms_Part_Poll_Dummy', 10 );

		require_once( happyforms_get_include_folder() . '/classes/parts/class-part-page-break-dummy.php' );
		$part_library->register_part( 'HappyForms_Part_PageBreak_Dummy', 12 );
	}

	public function add_dummy_setup_controls( $controls ) {
		$controls[450] = array(
			'type' => 'checkbox_dummy',
			'dummy_id' => 'email_mark_and_reply',
			'label' => __( 'Include mark and reply link', 'happyforms' ),
			'tooltip' => __( 'Reply to your users and mark their submission as read in one click.', 'happyforms' ),
		);

		$controls[1310] = array(
			'type' => 'checkbox_dummy',
			'dummy_id' => 'track_goal_link',
			'label' => __( 'Track goal link', 'happyforms' ),
			'tooltip' => __( 'Track recipients landing on this internal page after successfully submitting this form.', 'happyforms' ),
		);

		$controls[1320] = array(
			'type' => 'checkbox_dummy',
			'dummy_id' => 'use_theme_styles',
			'label' => __( 'Use theme styles', 'happyforms' ),
			'tooltip' => __( 'Inherit theme default styles instead of using HappyForms styles.', 'happyforms' ),
		);

		$controls[1450] = array(
			'type' => 'checkbox_dummy',
			'dummy_id' => 'shuffle_parts',
			'label' => __( 'Shuffle parts', 'happyforms' ),
			'tooltip' => __( 'Shuffle the order of all form parts to avoid biases in your responses.', 'happyforms' ),
		);

		$controls[1550] = array(
			'type' => 'checkbox_dummy',
			'dummy_id' => 'require_password',
			'label' => __( 'Require password', 'happyforms' ),
			'tooltip' => __( 'Only users with password will be able to view and submit the form.', 'happyforms' ),
		);

		$controls[1590] = array(
			'type' => 'checkbox_dummy',
			'dummy_id' => 'open_in_overlay_window',
			'label' => __( 'Open in overlay window', 'happyforms' ),
			'tooltip' => __( 'Generate a link that can be clicked to open an overlay window for this form.', 'happyforms' ),
		);

		$controls[1600] = array(
			'type' => 'checkbox_dummy',
			'dummy_id' => 'save_responses',
			'label' => __( 'Save responses', 'happyforms' ),
			'tooltip' => __( 'Keep recipients responses stored in your WordPress database.', 'happyforms' ),
			'field' => 'save_entries',
		);

		$controls[1660] = array(
			'type' => 'checkbox_dummy',
			'dummy_id' => 'save_abandoned_responses',
			'label' => __( 'Save abandoned responses', 'happyforms' ),
			'tooltip' => __( 'Keep incomplete recipients responses stored in your WordPress database.', 'happyforms' ),
		);

		$controls[1690] = array(
			'type' => 'checkbox_dummy',
			'dummy_id' => 'unique_id',
			'label' => __( 'Give each response an ID number', 'happyforms' ),
			'tooltip' => __( 'Tag responses with a unique, incremental identifier.', 'happyforms' ),
		);

		$controls[2300] = array(
			'type' => 'checkbox_dummy',
			'dummy_id' => 'limit_responses',
			'label' => __( 'Limit responses', 'happyforms' ),
			'tooltip' => __( 'Set limit on number of allowed form submission in general or per user.', 'happyforms' ),
		);

		$controls[3000] = array(
			'type' => 'checkbox_dummy',
			'dummy_id' => 'schedule_visibility',
			'label' => __( 'Schedule visibility', 'happyforms' ),
			'tooltip' => __( 'Show or hide this form during a chosen time and day. Go to Settings > Timezone to set your city offset.', 'happyforms' ),
		);

		return $controls;
	}

	public function do_control( $control, $field, $index ) {
		$type = $control['type'];

		if ( 'checkbox_dummy' === $type ) {
			require( happyforms_get_include_folder() . '/templates/customize-controls/checkbox_dummy.php' );
		}
	}

	public function print_upgrade_modals() {
		require_once( happyforms_get_include_folder() . '/templates/admin/responses-upgrade-modal.php' );
		require_once( happyforms_get_include_folder() . '/templates/admin/export-upgrade-modal.php' );
	}

	public function admin_menu() {
		parent::admin_menu();

		$form_controller = happyforms_get_form_controller();

		add_submenu_page(
			'happyforms',
			__( 'HappyForms Upgrade', 'happyforms' ),
			__( 'Upgrade', 'happyforms' ),
			$form_controller->capability,
			'https://happyforms.me/upgrade'
		);
	}

	public function admin_enqueue_scripts() {
		parent::admin_enqueue_scripts();

		wp_enqueue_style(
			'happyforms-free-admin',
			happyforms_get_plugin_url() . 'inc/assets/css/admin.css',
			array( 'thickbox' ), HAPPYFORMS_VERSION
		);

		wp_register_script(
			'happyforms-free-admin',
			happyforms_get_plugin_url() . 'inc/assets/js/admin/dashboard.js',
			array( 'thickbox' ), HAPPYFORMS_VERSION, true
		);

		$has_responses = get_transient( '_happyforms_has_responses' );

		if ( false === $has_responses ) {
			$responses = get_posts(
				array(
					'post_type' => 'happyforms-message'
				)
			);

			if ( ! empty( $responses ) ) {
				$has_responses = 1;

				set_transient( '_happyforms_has_responses', 1 );
			}
		}

		$responses_modal_id = ( 1 === intval( $has_responses ) ) ? 'happyforms-responses-upgrade-existing' : 'happyforms-responses-upgrade-new';
		$export_modal_id = ( 1 === intval( $has_responses ) ) ? 'happyforms-export-upgrade-existing' : 'happyforms-export-upgrade-new';

		wp_localize_script(
			'happyforms-free-admin',
			'_happyFormsDashboardSettings',
			array(
				'responses_modal_id' => $responses_modal_id,
				'export_modal_id' => $export_modal_id
			)
		);

		wp_enqueue_script( 'happyforms-free-admin' );
	}

	public function parse_archive_request() {
		global $pagenow;

		if ( 'edit.php' !== $pagenow ) {
			return;
		}

		$form_post_type = happyforms_get_form_controller()->post_type;

		if ( ! isset( $_GET['post_type'] ) || $form_post_type !== $_GET['post_type'] ) {
			return;
		}

		if ( ! isset( $_GET[$this->action_archive] ) ) {
			return;
		}

		$form_id = $_GET[$this->action_archive];
		$form_controller = happyforms_get_form_controller();
		$message_controller = happyforms_get_message_controller();
		$form = $form_controller->get( $form_id );

		if ( ! $form ) {
			return;
		}

		$message_controller->export_archive( $form );
	}

	public function add_setup_logic_upgrade_links() {
		$control_slugs = array(
			'email_recipient',
			'email_bccs',
			'alert_email_subject',
			'redirect_url'
		);

		foreach ( $control_slugs as $slug ) {
			add_action( "happyforms_setup_control_{$slug}_after", array( $this, 'set_logic_link_template' ) );
		}
	}

	public function set_logic_link_template() {
		$html = '';

		ob_start();
			require( happyforms_get_include_folder() . '/core/templates/customize-form-setup-logic.php' );
		$html = ob_get_clean();

		echo $html;
	}
}
