/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for a single toolbar row.
	config.toolbarGroups = [
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'forms' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'styles' },
		{ name: 'tools' },
		{ name: 'links' },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'insert' },
		{ name: 'colors' },
		{ name: 'others' },
	];

	// The default plugins included in the basic setup define some buttons that
	// we don't want too have in a basic editor. We remove them here.
	config.removeButtons = 'Cut,Copy,Paste,Undo,Redo,Anchor,Subscript,Superscript';

	// Let's have it basic on dialogs as well.
	config.removeDialogTabs = 'link:advanced;link:target;image:info;image:advanced;';

	//config.uiColor = "#284E99"
	config.autoGrow_minHeight = 300;
	config.autoGrow_maxHeight = 800;

	config.font_names =
	'Asap/Asap, sans-serif;' +
    'Arial/Arial, Helvetica, sans-serif;' +
    'Georgia/Georgia, serif;' +
    'Helvetica/Helvetica, sans-serif;' +
    'Roboto/Roboto, Arial, sans-serif;' +
    'Times New Roman/Times New Roman, Times, serif;' +
    'Verdana';

};
