// Minify JS
module.exports = {
  main : {
    files: {
      '_build/js/main.js' : ['_precomp/js/main.js'],
    }
  },
  admin : {
    files: {
      '_build/js/admin.js' : ['_precomp/js/admin.js'],
    }
  }
};