module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        files: {
          'build/css/build.css' : 'sass/main.scss',
        },
      },
    },
    concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: ['js_vendor/jquery-1.12.4.min.js', 'js/**/*.js'],
        dest: 'build/js/build.js',
      },
    },
    uglify : {
      build : {
        files: {
          'build/js/build.js' : ['build/js/build.js']
        }
      }
    },
    cssmin : {
      build: {
        files: [{
          expand: true,
          cwd: 'build/css',
          src: ['*.css', '!*.min.css'],
          dest: 'build/css',
          ext: '.css'
        }]
      }
    },
    copy: {
      main: {
        files : [
          {
            expand: true,
            src: 'node_modules/font-awesome/fonts/**',
            dest: 'library/fonts',
            filter: 'isFile',
            flatten: true
          }
        ]
      }
    },
    watch: {
      sass: {
        files: ['sass/**/*.scss'],
        tasks: ['sass'],
        options: {
          livereload : 35729
        },
      },
      js: {
        files: ['js/**/*.js'],
        tasks: ['concat'],
        options: {
          livereload : 35729
        },
      },
      php: {
        files: ['**/*.php'],
        options: {
          livereload : 35729
        },
      },
      options: {
        style: 'expanded',
        compass: true,
      },
    },
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-copy');

  grunt.registerTask('default', ['copy', 'sass', 'concat', 'watch']);
  grunt.registerTask('slim', ['sass', 'concat', 'cssmin', 'uglify']);


};