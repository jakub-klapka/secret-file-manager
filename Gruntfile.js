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
		},
		concat: {
			options: {
				separator: ';'
			},
			lumi_secret_files_admin: {
				src: [
					'src/js/ZeroClipboard.js',
					'src/js/zero_clipboard_init.js'
				],
				dest: 'js/lumi_secret_files_admin.js'
			}
		},
		copy: {
			zero_clipboard: {
				src: 'src/js/ZeroClipboard.swf',
				dest: 'js/ZeroClipboard.swf'
			}
		},
		closureCompiler: {
			options: {
				compilerFile: 'c:\\Program Files (x86)\\Google Closure compiler\\compiler.jar'
			},
			lumi_secret_files_admin: {
				src: 'js/lumi_secret_files_admin.js',
				dest: 'js/lumi_secret_files_admin.js'
			}
		},
		compress: {
			options: {
				archive: 'secret-file-manager.zip'
			},
			build_plugin: {
				files: [{
					expand: true,
					cwd: '../',
					src: [
						'secret-file-manager/Helpers/**',
						'secret-file-manager/Models/**',
						'secret-file-manager/core/**',
						'secret-file-manager/css/**',
						'secret-file-manager/js/**',
						'secret-file-manager/templates/**',
						'secret-file-manager/secret-file-manager.php',
					],
				}]
			}
		}
	});

	// Load the plugins
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-closure-tools');
	grunt.loadNpmTasks('grunt-contrib-compress');


	grunt.registerTask('css', ['sass:all_files', 'autoprefixer:all_files']);
	grunt.registerTask('js_lumi_secret_files_admin', ['concat:lumi_secret_files_admin', 'closureCompiler:lumi_secret_files_admin', 'copy:zero_clipboard']);
	grunt.registerTask('js', ['js_lumi_secret_files_admin']);



	// Default task(s).
	grunt.registerTask('default', ['css', 'js']);
	grunt.registerTask('build_plugin', ['compress:build_plugin']);

};