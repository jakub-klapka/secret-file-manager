module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		sass: {
			options: {
				style: 'compressed'
			},
			all_files: {
				files: [{
					expand: true,
					cwd: 'src/css',
					src: '**/*.scss',
					dest: 'css',
					ext: '.css'
				}]
			}
		},
		autoprefixer: {
			all_files: {
				files: [{
					expand: true,
					cwd: 'css',
					dest: 'css',
					src: '**/*.css'
				}]
			}
		}
	});

	// Load the plugins
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');

	grunt.registerTask('css', ['sass:all_files', 'autoprefixer:all_files']);

	// Default task(s).
	grunt.registerTask('default', ['css']);

};