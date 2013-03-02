/**
 * @tableofcontents
 *
 * 1. maps
 * 2. startup
 */

(function ($)
{
	'use strict';

	/* @section 1. maps */

	$.fn.maps = function (options)
	{
		/* extend options */

		if (r.module.maps.options !== options)
		{
			options = $.extend({}, r.module.maps.options, options || {});
		}

		/* return this */

		return this.each(function ()
		{
			/* generate each map */

			$(this).each(function ()
			{
				var map = $(this),
					mapZoom = Number(map.data('zoom')),
					mapLat = Number(map.data('lat')),
					mapLng = Number(map.data('lng')),
					mapMeta, mapInstance;

				/* overwrite zoom */

				if (mapZoom)
				{
					options.general.zoom = mapZoom;
				}

				/* overwrite center */

				if (mapLat && mapLng)
				{
					options.general.center = new google.maps.LatLng(mapLat, mapLng);
				}

				/* create map instance */

				if (map.length)
				{
					mapInstance = new google.maps.Map(map[0], options.general);

					/* replace branding */

					if (options.replaceBranding)
					{
						/* remove orignal branding */

						google.maps.event.addListenerOnce(mapInstance, 'tilesloaded', function ()
						{
							map.children('div').children('div').filter('div:eq(1), div:eq(2), div:eq(3), div:eq(4), div:eq(5)').remove();
						});

						/* append custom branding */

						if (options.mapLogo || options.mapTerms)
						{
							mapMeta = $('<div>').addClass(options.classString.mapMeta).appendTo(map);

							/* append custom logo */

							if (options.mapLogo)
							{
								$(options.mapLogo).addClass(options.classString.mapLogo).appendTo(mapMeta);
							}

							/* append custom terms */

							if (options.mapTerms)
							{
								$(options.mapTerms).addClass(options.classString.mapTerms).appendTo(mapMeta);
							}
						}
					}

					/* set custom styles */

					if (options.styles)
					{
						mapInstance.setOptions(
						{
							styles: options.styles
						});
					}
				}
			});
		});
	};

	/* @section 2. startup */

	$(function ()
	{
		if (r.module.maps.startup && r.constant.ADMIN_PARAMETER === '' && typeof google === 'object' && typeof google.maps === 'object')
		{
			$(r.module.maps.selector).maps(r.module.maps.options);
		}
	});
})(jQuery);