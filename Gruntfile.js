module.exports = function(grunt) {
	grunt.initConfig({
		path: 'src/',
		files: '<%= path %>**/*.php',
		phpunit: {
			suite: {
				dir: 'test'
			},
			options: {
        		bin: 'vendor/bin/phpunit',
        		colors: true,
        		includePath: 'src'
        	}
		},
		shell: {
			phpcs: {
				command: 'vendor/bin/phpcs -n --encoding=utf-8 <%= files %>',
				options: {
					failOnError: true,
	                stdout: true
	            }
			},
			phpdoc: {
				command: 'vendor/bin/phpdoc.php -d <%= path %> -t docs',
				options: {
					failOnError: true,
					stdout: true
				}
			}
		},
		watch: {
			phpunit: {
				files: [
					'test/**/*.php',
					'<%= files %>'
				],
				options: {
					interrupt: true
				},
				tasks: 'phpunit'
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-phpunit');
	grunt.loadNpmTasks('grunt-shell');

	grunt.registerTask('docs', ['shell:phpdoc']);
	grunt.registerTask('doctor', ['shell:phpcs']);
	grunt.registerTask('default', ['phpunit']);
};