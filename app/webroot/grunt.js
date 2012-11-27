module.exports = function(grunt) {
  'use strict';

  grunt.config.init({
    csso: {
      screen: {
        src: "static/css/screen.css",
        dest: "static/css/screen.min.css"
      }
    },
    sass: {
      files: {
        'static/css/screen.css': 'static/scss/screen.scss'
      }
    }
  });

  grunt.loadNpmTasks('grunt-csso');
  grunt.loadNpmTasks('grunt-sass');

  grunt.registerTask('default', '');
  grunt.registerTask('test', 'test');
  grunt.registerTask('watch', 'sass');
}