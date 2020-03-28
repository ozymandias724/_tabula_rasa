// Watch
module.exports = {
  options: {
    livereload : 35729
  },
	sass: {
    files: ['_precomp/sass/**/*.scss'],
    tasks: ['sass'],
  },
  js: {
    files: ['_precomp/js/**/*.js'],
    tasks: ['concat'],
  },
  php: {
    files: ['**/*.php'],
  },
};