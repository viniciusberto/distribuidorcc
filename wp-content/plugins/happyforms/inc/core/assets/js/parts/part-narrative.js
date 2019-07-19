( function( $, _, Backbone, api, settings ) {

	happyForms.classes.models.parts.narrative = happyForms.classes.models.Part.extend( {
		defaults: function() {
			return _.extend(
				{},
				settings.formParts.narrative.defaults,
				_.result( happyForms.classes.models.Part.prototype, 'defaults' ),
			);
		},
	} );

	happyForms.classes.views.parts.narrative = happyForms.classes.views.Part.extend( {
		template: '#customize-happyforms-narrative-template',

		ready: function() {
			happyForms.classes.views.Part.prototype.ready.apply( this, arguments );

			this.listenTo( this, 'refresh', this.onRefresh );
			this.initEditor();
		},

		initEditor: function() {
			var editorId = this.model.id + '_format';
			var editorSettings = {
				tinymce: {
					toolbar1: 'happyforms_narrative_input',
					setup: this.onEditorInit.bind( this ),
					content_style: 'body { font-family: sans-serif; }',
					forced_root_block: '',
				},
			};

			wp.editor.initialize( editorId, editorSettings );
		},

		removeEditor: function() {
			var editorId = this.model.id + '_format';
			wp.editor.remove( editorId );
		},

		onRefresh: function() {
			this.removeEditor();
			this.initEditor();
		},

		onEditorInit: function( editor ) {
			var self = this;
			var refreshPreview = _.debounce( this.refreshPreview.bind( this ), 500 );

			editor.on( 'keyup change', function() {
				self.model.set( 'format', editor.getContent() );
				refreshPreview();
			} );

			editor.addButton( 'happyforms_narrative_input', {
				title: 'Insert placeholder',

				onClick: function() {
					editor.insertContent( '[]' );
				},
			} );
		},

		refreshPreview: function() {
			var model = this.model;

			model.fetchHtml(function (response) {
				var data = {
					id: model.get('id'),
					html: response
				};

				happyForms.previewSend( 'happyforms-form-part-refresh', data );
			} );
		},

		remove: function() {
			var editorId = this.model.id + '_format';
			wp.editor.remove( editorId );

			happyForms.classes.views.Part.prototype.remove.apply( this, arguments );
		},
	} );

} ) ( jQuery, _, Backbone, wp.customize, _happyFormsSettings );
