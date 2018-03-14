const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    // Compile SASS including foundation scss paths
    mix.sass('app.scss', null, null, {
        includePaths: [
            'node_modules/foundation-sites/scss',
            'node_modules/motion-ui/src'
        ]
    });
    // Compile Javascripts
    mix.scripts([
        // load jQuery first
        '../../../node_modules/jquery/dist/jquery.js',
        // Bellow are all the available foundation plugins.
        // Uncomment only the foundation plugins you need:
        '../../../node_modules/foundation-sites/js/foundation.core.js',
        // '../../../node_modules/foundation-sites/js/foundation.abide.js',
        // '../../../node_modules/foundation-sites/js/foundation.accordion.js',
        // '../../../node_modules/foundation-sites/js/foundation.accordionMenu.js',
        // '../../../node_modules/foundation-sites/js/foundation.drilldown.js',
        // '../../../node_modules/foundation-sites/js/foundation.dropdown.js',
        // '../../../node_modules/foundation-sites/js/foundation.dropdownMenu.js',
        // '../../../node_modules/foundation-sites/js/foundation.equalizer.js',
        // '../../../node_modules/foundation-sites/js/foundation.interchange.js',
        // '../../../node_modules/foundation-sites/js/foundation.magellan.js',
        // '../../../node_modules/foundation-sites/js/foundation.offcanvas.js',
        // '../../../node_modules/foundation-sites/js/foundation.orbit.js',
        // '../../../node_modules/foundation-sites/js/foundation.responsiveMenu.js',
        // '../../../node_modules/foundation-sites/js/foundation.responsiveToggle.js',
        // '../../../node_modules/foundation-sites/js/foundation.reveal.js',
        // '../../../node_modules/foundation-sites/js/foundation.slider.js',
        // '../../../node_modules/foundation-sites/js/foundation.sticky.js',
        // '../../../node_modules/foundation-sites/js/foundation.tabs.js',
        // '../../../node_modules/foundation-sites/js/foundation.toggler.js',
        // '../../../node_modules/foundation-sites/js/foundation.tooltip.js',
        // '../../../node_modules/foundation-sites/js/foundation.util.box.js',
        // '../../../node_modules/foundation-sites/js/foundation.util.keyboard.js',
        '../../../node_modules/foundation-sites/js/foundation.util.mediaQuery.js',
        // '../../../node_modules/foundation-sites/js/foundation.util.motion.js',
        // '../../../node_modules/foundation-sites/js/foundation.util.nest.js',
        // '../../../node_modules/foundation-sites/js/foundation.util.timerAndImageLoader.js',
        // '../../../node_modules/foundation-sites/js/foundation.util.touch.js',
        // '../../../node_modules/foundation-sites/js/foundation.util.triggers.js',
        // other JS files
        'app.js'
    ]);

});
