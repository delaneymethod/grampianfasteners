;($ => {
	$.extend($.fn, {
		browse: function(options, callback) {
			if (!options) {
				let options = {};
			}
			
			if (options.root == undefined) {
				options.root = '/';
			}
			
			if (options.script == undefined) {
				options.script = '/cp/assets/browse';
			}
			
			if (options.folderEvent == undefined) {
				options.folderEvent = 'click';
			}
			
			if (options.multiFolder == undefined) {
				options.multiFolder = true;
			}
			
			if (options.loadMessage == undefined) {
				options.loadMessage = 'Loading...';
			}
	
			$(this).each(() => {
				function showAssets(element, directory) {
					$(element);
					
					$('.browse.start').remove();
					
					window.axios.post(options.script, { directory: directory }).then(response => {
						$(element).find('.start').html('');
					
						$(element).append(response.data);
					
						if (options.root == directory) {
							$(element).find('ul:hidden').show(); 
						} else {
							$(element).find('ul:hidden').slideDown();
						}
					
						bindAssets(element);
					})
					.catch(error => {
						console.error(error);
					});
				}
	
				function bindAssets(element) {
					$(element).find('li a').bind(options.folderEvent, function () {
						if ($(this).parent().hasClass('directory')) {
							if ($(this).parent().hasClass('collapsed')) {
								if (!options.multiFolder) {
									$(this).parent().parent().find('ul').slideUp();
									
									$(this).parent().parent().find('li.directory').removeClass('expanded').addClass('collapsed');
									
									$(this).parent().find('i').removeClass('fa-folder-open').addClass('fa-folder');
								}
								
								$(this).parent().find('ul').remove();
								
								showAssets($(this).parent(), escape($(this).attr('rel').match(/.*\//)));
								
								$(this).parent().removeClass('collapsed').addClass('expanded');
								
								$(this).parent().find('i').removeClass('fa-folder').addClass('fa-folder-open');
							} else {
								$(this).parent().find('ul').slideUp();
								
								$(this).parent().removeClass('expanded').addClass('collapsed');
								
								$(this).parent().find('i').removeClass('fa-folder-open').addClass('fa-folder');
							}
						} else {
							callback($(this).attr('rel'));
						}
						
						return false;
					});
					
					if (options.folderEvent.toLowerCase != 'click') {
						$(element).find('li a').bind('click', function () {
							return false; 
						});
					}
				}
				
				$(this).html('<ul class="browse start"><li>' + options.loadMessage + '<li></ul>');
				
				showAssets($(this), escape(options.root));
			});
		}
	});
})(jQuery);
