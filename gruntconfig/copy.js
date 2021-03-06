'use strict';

var config = require('./config');


var copy = {

  build: {
    expand: true,
    cwd: config.src,
    dest: config.build + '/' + config.src,
    src: [
      '**/*',
      '!**/*.js',
      '!**/*.scss',
      '!**/*.orig'
    ],
    filter: 'isFile',
    options: {
      mode: true
    }
  },

  test: {
    expand: true,
    cwd: config.test,
    dest: config.build + '/' + config.test,
    src: [
      '**/*',
      '!**/*.js'
    ],
    filter: 'isFile'
  },

  dist: {
    expand: true,
    cwd: config.build + '/' + config.src,
    dest: config.dist,
    src: [
      '**/*',
      '!**/*.js',
      '!**/*.css'
    ],
    filter: 'isFile',
    options: {
      mode: true
    }
  },

  jwplayer: {
    cwd: 'src/lib/jwplayer-7.9.3',
    dest: config.build + '/' + config.src + '/htdocs/lib/jwplayer',
    expand: true,
    src: [
      '**/*'
    ]
  }

};


module.exports = copy;
