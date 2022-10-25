( function( api ) {
	// Extends our custom "modeling-lite" section.
	api.sectionConstructor['modeling-lite'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );