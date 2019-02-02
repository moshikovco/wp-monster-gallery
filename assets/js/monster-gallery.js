wp.hooks.addFilter(
    'blocks.getSaveElement',
    'wpse-298225',
    monsterGallery
);
function monsterGallery(element, blockType, attributes) {
  if ( blockType.name !== 'core/gallery' ) { // if not gallery
    return element;
  }
  if (attributes.columns == undefined) { attributes.columns = 3 }
  var cropped = "";
  if (attributes.imageCrop) {
    cropped = "is-cropped"
  }
  if (attributes.columns > 1) {
    var gallery = wp.element.createElement(
        'ul',
        {
            'className': 'wp-block-gallery columns-' + attributes.columns +' '+cropped,
        },
        attributes.images.map(
            function( image ) {
                return wp.element.createElement(
                    'li',
                    {
                        'className': 'blocks-gallery-item',
                    },
                    wp.element.createElement(
                        'a', {
                            'data-fancybox': 'monster-gallery',
                            'data-caption': image.caption,
                            'href': image.url
                        },
                        wp.element.createElement(
                            'img',
                            {
                                'alt': image.alt,
                                'src': image.url,
                            }
                        )
                    )
                )
            }
        )
    );
  } else {
    var gallery = wp.element.createElement(
        'ul',
        {
            'className': 'wp-block-gallery monster-slider columns-' + attributes.columns +' '+cropped,
        },
        attributes.images.map(
            function( image ) {
                return wp.element.createElement(
                    'li',
                    {
                        'className': 'blocks-gallery-item',
                        'data-caption': image.caption,
                        'data-flickity-bg-lazyload': image.url
                    },
                    wp.element.createElement(
                        'img',
                        {   
                            'alt': image.alt,
                            'src': image.url,
                        }
                    )
                )
            }
        )
    );
}
    return gallery
}
