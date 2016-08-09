/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
  
  
	config.toolbar = 'Full';
  // '-', 'Templates'
	config.toolbar_Full = [['Source', '-', 'Save', 'NewPage', 'Preview',],
                             ['Link', 'Unlink'],             
	                           ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'],
                             ['Maximize', 'ShowBlocks'], 
	                           ['Undo', 'Redo', '-', 'SelectAll', 'RemoveFormat'],
                             ['Cut','Copy','Paste'],
                             '/',
	                           [ 'Font', 'FontSize'],
	                           ['TextColor', 'BGColor'],
	                           
	                           ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'],
	                           ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv'],
	                           ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
	                           
	                           ['Code']]; 
                             
                             
    config.font_names ='Arial/Arial, Helvetica, sans-serif;Comic Sans MS/Comic Sans MS, cursive;Courier New/Courier New, Courier, monospace;Georgia/Georgia, serif;Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;Tahoma/Tahoma, Geneva, sans-serif;Times New Roman/Times New Roman, Times, serif;Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;Verdana/Verdana, Geneva, sans-serif;新細明體;標楷體;微軟正黑體' ;
           
    config.height = 400;
    config.language = 'zh';//語系指定
    
    config.maxheight = 200; //編輯區塊高度設定
    
	config.filebrowserBrowseUrl = 'ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = 'ckfinder/ckfinder.html?Type=Images';
    config.filebrowserFlashBrowseUrl = 'ckfinder/ckfinder.html?Type=Flash';
    config.filebrowserUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
    
};
