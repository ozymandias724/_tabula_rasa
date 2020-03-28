// 
module.exports = function (grunt) {

  // grab all dependencies as tasks
  var tasks = {
    scope: ['devDependencies', 'dependencies']
  };

  // split up the gruntfile across these config files
  var options = {
    config: {
      src: "_precomp/config/*.js"
    }
  };

  // define configs
  var configs = require('load-grunt-configs')(grunt, options);

  // load all the tasks
  require('load-grunt-tasks')(grunt, tasks);

  // initialize the compiled config
  grunt.initConfig(configs);

  // register the default task
  grunt.registerTask('default', ['sass','concat','uglify', 'cssmin', 'watch']);
  
  // register any special tasks
  // grunt.registerTask('TASKNAME', ['TASK']);

}