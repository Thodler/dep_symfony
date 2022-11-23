<?php
namespace Deployer;

require 'recipe/symfony.php';
require 'contrib/yarn.php';
require 'contrib/webpack_encore.php';

// Config

set('repository', 'https://github.com/Thodler/dep_symfony.git');

set ('ssh_multiplexing', false);
set('git_tty', false);


add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('localhost')
    ->set('port', 2222)
    ->set('remote_user', 'root')
    ->set('deploy_path', '/var/www/html')
    ->setIdentityFile('~\.ssh\id_rsa');

// Hooks
task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'yarn:install',
    'webpack_encore:build',
    'deploy:cache:clear',
    'deploy:publish'
]);

after('deploy:failed', 'deploy:unlock');
