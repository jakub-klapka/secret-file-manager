/* global jQuery, ZeroClipboard, LumiSecertFilesConfig */
(function($){

	$(document).ready(function(){

		ZeroClipboard.config({
			swfPath: LumiSecertFilesConfig.swf_path,
			forceHandCursor: true
		});

		var client = new ZeroClipboard($(".copy_to_clipboard"));

		client.on('aftercopy', function(event){
			if( event.success ) {
				$('.copied').removeClass('copied');
				$(event.target).addClass('copied');
			} else {
				alert('Nepodařilo se zkopírovat data do schránky, použijte prosím textové pole.');
			}
		});

	});

})(jQuery);