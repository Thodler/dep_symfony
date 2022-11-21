<?php
namespace Deployer;

require 'recipe/symfony.php';

// Config

set('repository', 'https://github.com/Thodler/dep_symfony.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts


// Hooks

after('deploy:failed', 'deploy:unlock');
