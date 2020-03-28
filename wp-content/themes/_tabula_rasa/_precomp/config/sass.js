// SASS
const sass = require('node-sass');

module.exports = {
	options: {
		implementation: sass,
		sourceMap: true
	},
	dist: {
		files: {
			'_build/css/main.css': '_precomp/sass/main.scss',
			'_build/css/admin.css': '_precomp/sass/admin.scss',
		},
	},
};