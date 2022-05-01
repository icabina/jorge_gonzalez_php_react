/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
CKEDITOR.editorConfig = function( config ) {
	config.language = 'es';
	config.entities_latin = false;
	config.uiColor = '#CCCCCC';
	config.height = 400;
	config.toolbarCanCollapse = true;
	config.allowedContent = true;
	config.forcePasteAsPlainText = true;
	config.toolbar = [
		{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
		{ name: 'document', items: [ 'Source'] },
		{ name: 'styles', items: [ 'Format'] },
		{ name: 'paragraph', items: [ 'BulletedList'] },
		{ name: 'links', items: [ 'Link', 'Unlink'] },
		//{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord'] },
		//{ name: 'clipboard', items: ['Paste', 'PasteText', 'PasteFromWord'] },
		{ name: 'insert', items: [ 'Table', 'HorizontalRule'] },
	];
};
