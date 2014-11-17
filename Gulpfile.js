var exec = require("child_process").exec;
var gulp = require('gulp');
var less = require('gulp-less');

gulp.task('restart-nginx', function(cb) {
  exec("/sbin/service nginx restart", function(err, stdout, stderr) {
    console.log(stdout);
    console.error(stderr);
    cb(err);
  });
});

var bootstrap_plugin_dir = "ihome/plugin/bootstrap/";

gulp.task('less-base', function() {
  gulp.src(bootstrap_plugin_dir + "ihome/bootstrap.ihome.less")
    .pipe(less({
      paths: [
        "bower_components/bootstrap/less",
        bootstrap_plugin_dir + "ihome"
      ]
    }))
    .pipe(gulp.dest(bootstrap_plugin_dir + "dist/css"));
});

gulp.task('less-popupmenu', function() {
  gulp.src(bootstrap_plugin_dir + "ihome/popupmenu.less")
    .pipe(less({
      paths: [
        "bower_components/bootstrap/less",
        bootstrap_plugin_dir + "ihome"
      ]
    }))
    .pipe(gulp.dest(bootstrap_plugin_dir + "dist/css"));
});

gulp.task('less', ['less-base', 'less-popupmenu'])

gulp.task('clear-tpl-cache', function(cb) {
  exec("rm -rf ihome/data/tpl_cache/*", function(err, stdout, stderr) {
    console.log(stdout);
    console.error(stderr);
    cb(err);
  });
});

gulp.task('watch-clear-tpl-cache', function() {
  gulp.watch("ihome/data/**/*", ['clear-tpl-cache']);
});

gulp.task('watch-restart-nginx', function() {
  var files = [
    "ihome/template/default/style.css",
    "ihome/plugin/bootstrap/dist/css/*.css",
  ];
  gulp.watch(files, ['restart-nginx']);
});

gulp.task('watch-less', function() {
  gulp.watch(bootstrap_plugin_dir + "ihome/*.less", ['less']);
});
