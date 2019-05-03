module.exports = function(grunt) {
    const sass = require('node-sass');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            options: {
                implementation: sass,
                outputStyle: 'compressed'
            },
            dist: {
                src: 'assets/app/src/scss/main.scss',
                dest: 'assets/app/dist/css/main.css'
            }
        },

        uglify: {
            options: {
                mangle: false
            },
            all: {
                src: 'assets/app/src/js/**/*.js',
                dest: 'assets/app/dist/js/main.js'
            }
        },

        watch: {
            js: {
                files: ['assets/app/src/js/**/*.js'],
                tasks: ['uglify'],
                options: {
                    livereload: true
                }
            },
            sass: {
                files: ['assets/app/src/scss/**/*.scss'],
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
