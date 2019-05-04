module.exports = function(grunt) {
    const sass = require('node-sass');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            options: {
                implementation: sass,
                outputStyle: 'compressed'
            },
            backend: {
                src: 'assets/src/scss/main.scss',
                dest: 'assets/dist/css/main.css'
            }
        },

        uglify: {
            options: {
                mangle: false
            },
            backend: {
                src: 'assets/src/js/**/*.js',
                dest: 'assets/dist/js/main.js'
            }
        },

        watch: {
            js: {
                files: ['assets/src/js/**/*.js'],
                tasks: ['uglify'],
                options: {
                    livereload: true
                }
            },
            sass: {
                files: ['assets/src/scss/**/*.scss'],
                tasks: ['sass'],
                options: {
                    livereload: true
                }
            }
        }
    });

    // Plugins
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Tasks
    grunt.registerTask('build', ['sass', 'uglify']);
    grunt.registerTask('default', ['build']);
};
