glob = require('glob');

module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      scripts: {
        files: ['./assets/js/**/*.js', '!./assets/js/application.js'],
        tasks: ['browserify'],
        options: {
          debounceDelay: 250,
        }
      }
    },
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
              var expose = file.replace('.js', '').replace('./assets/js/', '')
              return file + ":" + expose;
            })
          ),
        browserifyOptions: {
          debug: true
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-browserify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  // Default task(s).
  grunt.registerTask('default', ['browserify']);
};
