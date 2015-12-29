glob = require('glob');

module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    browserify: {
      build: {
        src: [],
        dest: "./assets/js/application.js",
      },
      options: {
        alias:
          [
            './assets/js/main.js:./main'
          ]
          .concat(
            glob.sync('./assets/js/pages/**/*.js').map(function(file) {
              var expose = file.replace('.js', '').replace('./', '')
              return file + ":" + expose;
            })
          ),
        // ignore: Asset.BROWSERIFYOPTIONS.ignore
        // transform: Asset.BROWSERIFYOPTIONS.transform
        // browserifyOptions:
        //   extensions: Asset.BROWSERIFY_OPTIONS.extensions
        debug: true
      }
    }
  });

  grunt.loadNpmTasks('grunt-browserify');
  // Default task(s).
  grunt.registerTask('default', ['browserify']);
};
