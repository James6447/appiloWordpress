(function($){

    BevroAdmin = {
        init: function(){
            this._bind();
        },

        _installNow: function( event ) {
             $document   = jQuery(document);
              var slug = $(this).data('slug'); 
            var $message = $( '.install-now.'+slug);

                if ( wp.updates.shouldRequestFilesystemCredentials && ! wp.updates.ajaxLocked ) {
                    wp.updates.requestFilesystemCredentials( event );
                    $document.on( 'credential-modal-cancel', function() {
                        var $message = $( '.install-now' );

                        $message.text( wp.updates.l10n.installNow );

                        wp.a11y.speak( wp.updates.l10n.updateCancel, 'polite' );
                    } );
                }
                 wp.updates.installPlugin( {
                    slug:  $message.data('slug'),
                    init:  $message.data('init'),
                } );
        },
        /*
         * Plugin Installation Error.
         */
        _installError: function( event, response ){
            var $card = jQuery( '.install-now');
            $card.removeClass( 'button-primary' )
                .addClass( 'disabled' )
                .html( wp.updates.l10n.installFailedShort );
                    console.log(response.errorMessage);
        },

        /**
         * Installing Plugin
         */
        _pluginInstalling: function(event, args){
            event.preventDefault();
            var $card = jQuery( '.'+args.slug);
            var $button = $card.find( '.button-primary' );
            $button.removeClass( 'install-now button-primary installed button-disabled updated-message' )

            $card.addClass('updating-message').html('Installing Plugin');
            $button.addClass('already-started');
        },

        /**
         * Plugin activation
         */
        _activetedPlugin: function(event, args){
                event.preventDefault();
                var $card = jQuery( '.'+args.slug);
                BevroAdmin._activePluginHomepage(args.slug,$card.data('init'));
        },
        /**
         * Plugin & Homepage Activation
         */
        _activePluginHomepage: function($slug,$init){
            var $message = jQuery( '.'+$slug);
               $message.removeClass( 'install-now button-primary installed button-disabled updated-message' )
                .addClass('updating-message')
                .html($message.data('msg'));

            $.ajax({
                url  : bevro.ajaxUrl,
                type : 'POST',
                data : {
                    action : 'bevro_activeplugin',
                    init   :  $init,
                    slug   :  $slug
                },
                beforeSend: function(){
                }
            })
            .fail(function( jqXHR ){
            })
            .done(function ( response ){
                $message.removeClass( 'button-primary install-now activate-now updating-message' )
                            .attr('disabled', 'disabled')
                            .addClass('disabled')
                            .text($message.data('activated'));
                            
            });
        },
        /**
         * Plugin activation
         */
        _activePlugin: function(event){
                var $button = jQuery( event.target ),
                $init   = $button.data( 'init' ),
                $slug   = $button.data( 'slug' );
                BevroAdmin._activePluginHomepage($slug,$init);
            },
        _bind: function(){               
            $( document ).on('click'                     , '.install-now', BevroAdmin._installNow);
            $( document ).on('click'                     , '.activate-now', BevroAdmin._activePlugin);
            $( document ).on('wp-plugin-install-error'   , BevroAdmin._installError);
            $( document ).on('wp-plugin-installing'      , BevroAdmin._pluginInstalling);
            $( document ).on('wp-plugin-install-success' , BevroAdmin._activetedPlugin);  
        },


};
BevroAdmin.init();
})(jQuery);

/**
 * Install Import Sites
 *
 *
 * @since 1.2.4
 */
(function($){

    BevrodemoThemeAdmin = {

        init: function()
        {
            this._bind();
        },


        /**
         * Binds events for the Bevro Theme.
         *
         * @since 1.0.0
         * @access private
         * @method _bind
         */
        _bind: function()
        {
            $( document ).on('click' , '.bvr-sites-notinstalled', BevrodemoThemeAdmin._installNow );
            $( document ).on('click' , '.bvr-sites-inactive', BevrodemoThemeAdmin._activatePlugin);
            $( document ).on('wp-plugin-install-success' , BevrodemoThemeAdmin._activatePlugin);
            $( document ).on('wp-plugin-installing'      , BevrodemoThemeAdmin._pluginInstalling);
            $( document ).on('wp-plugin-install-error'   , BevrodemoThemeAdmin._installError);
        },

        /**
         * Plugin Installation Error.
         */
        _installError: function( event, response ){

            var $card = jQuery( '.bvr-sites-notinstalled' );

            $card
                .removeClass( 'button-primary' )
                .addClass( 'disabled' )
                .html( wp.updates.l10n.installFailedShort );
        },

        /**
         * Installing Plugin
         */
        _pluginInstalling: function(event, args) {
            event.preventDefault();

            var $card = jQuery( '.bvr-sites-notinstalled' );

            $card.addClass('updating-message');

        },
        /**
         * Activate Success
         */
        _activatePlugin: function( event, response ) {

            event.preventDefault();

            var $message = $( '.bvr-sites-notinstalled' );
            if ( 0 === $message.length ) {
                $message = $( '.bvr-sites-inactive' );
            }

            // Transform the 'Install' button into an 'Activate' button.
            var $init = $message.data('init');
            var $init1 = $message.data('init1');
            $message.removeClass( 'install-now installed button-disabled updated-message' )
                .addClass('updating-message')
                .html( bevro.btnActivating );

            // WordPress adds "Activate" button after waiting for 1000ms. So we will run our activation after that.
            setTimeout( function() {

                $.ajax({
                    url: bevro.ajaxUrl,
                    type: 'POST',
                    data: {
                        'action'            : 'bevro-sites-plugin-activate',
                        'init'              : $init,
                        'init1'             : $init1
                    },
                })
                .done(function (result){

                    if( result.success ){
                        var output = '<a href="'+ bevro.bevroSitesLink +'" aria-label="'+ bevro.bevroSitesLinkTitle +'">' + bevro.bevroSitesLinkTitle +' </a>'
                        $message.removeClass( 'bvr-sites-inactive bvr-sites-notinstalled button button-primary install-now activate-now updating-message' )
                            .html( output );

                    } else {

                        $message.removeClass( 'updating-message' );

                    }

                });

            }, 1200 );

        },

        /**
         * Install Now
         */
        _installNow: function(event)
        {
            event.preventDefault();

            var $button     = jQuery( event.target ),
                $document   = jQuery(document);

            if ( $button.hasClass( 'updating-message' ) || $button.hasClass( 'button-disabled' ) ) {
                return;
            }

            if ( wp.updates.shouldRequestFilesystemCredentials && ! wp.updates.ajaxLocked ) {
                wp.updates.requestFilesystemCredentials( event );

                $document.on( 'credential-modal-cancel', function() {
                    var $message = $( '.bvr-sites-notinstalled.updating-message' );

                    $message
                        .addClass('bvr-sites-inactive')
                        .removeClass( 'updating-message bvr-sites-notinstalled' )
                        .text( wp.updates.l10n.installNow );

                    wp.a11y.speak( wp.updates.l10n.updateCancel, 'polite' );
                } );
            }

            wp.updates.installPlugin( {
                slug:    $button.data( 'slug' )
            } );
            wp.updates.installPlugin( {
                slug:    $button.data( 'slug1' )
            } );
        },
    };

    /**
     * Initialize BevrodemoThemeAdmin
     */
    $(function(){
        BevrodemoThemeAdmin.init();
    });

})(jQuery);