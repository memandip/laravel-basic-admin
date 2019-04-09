<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'app_name');

// Project repository
set('repository', 'git repo url (ssh)');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', [
  'public/uploads'
]);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts

/**
 * Demo
 */
host('hostname or ip')
  ->user('root')
  ->stage('dev')
  ->set('branch', 'dev')
  ->set('deploy_path', '/var/www/html/..')
  ->set('env',[
    'APP_NAME' => 'APP_NAME',
    'APP_KEY'=> 'APP_KEY',
    'APP_URL'=> 'APP_URL',
    'DB_DATABASE' => 'DB_DATABASE',
    'DB_USERNAME' => 'DB_USERNAME',
    'DB_PASSWORD' => 'DB_PASSWORD',
    'APP_DEBUG' => false,
    'MAIL_FROM_NAME' => 'MAIL_FROM_NAME',
    'MAIL_DRIVER' => 'MAIL_DRIVER',
    'MAIL_HOST' => 'MAIL_HOST',
    'MAIL_PORT' => 'MAIL_PORT',
    'MAIL_USERNAME' => 'MAIL_USERNAME',
    'MAIL_PASSWORD' => 'MAIL_PASSWORD',
    'MAIL_ENCRYPTION' => 'tls',
    'MAILGUN_DOMAIN' => 'MAILGUN_DOMAIN',
    'MAILGUN_SECRET' => 'MAILGUN_SECRET'
  ]);

// Tasks
//task('build', function () {
//    run('cd {{release_path}} && build');
//});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
