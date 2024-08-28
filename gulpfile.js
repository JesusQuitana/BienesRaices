import {src, dest, watch, series} from 'gulp'
import * as dartSass from 'sass'
import gulpSass from 'gulp-sass'
import terser from 'gulp-terser'
import {glob} from 'glob'
import fs from 'fs'
import path from 'path'
import sharp from 'sharp'


const sass = gulpSass(dartSass)

export function css(done) {
    src('src/scss/**/*.scss')
    .pipe(sass( {outputStyle: 'compressed'} ))
    .pipe(dest('build/css'))

    done()
}

export function js(done) {
    src('src/js/*.js')
    .pipe(terser())
    .pipe(dest('build/js'))

    done()
}

export function dev() {
    watch('src/scss/**/*.scss', css)
    watch('src/js/**/*.js', js)
}

export default series(css, js, dev)