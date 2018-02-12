<?php

/**
 * @file
 * Local development override configuration feature.
 *
 * This file is automatically included at the end of settings.php when using
 * the TEN7 Dockstack environment.
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$config['system.logging']['error_level'] = 'verbose';
#$settings['rebuild_access'] = TRUE;
$settings['skip_permissions_hardening'] = TRUE;

/**
 * Enable local development services.
 */
#$settings['container_yamls'][] = __DIR__ . '/includes/services.twig.auto_reload.yml';
#$settings['container_yamls'][] = __DIR__ . '/includes/services.twig.debug.yml';
$settings['container_yamls'][] = __DIR__ . '/includes/services.cache.backend.null.yml';
$settings['container_yamls'][] = __DIR__ . '/includes/services.cache.debug_cacheability_headers.yml';
$settings['container_yamls'][] = __DIR__ . '/includes/services.session.storage.options.yml';

/**
 * Disable the render cache (this includes the page cache). Requires the
 * 'services.cache.backend.null.yml' container_yamls include above.
 */
$settings['cache']['bins']['render'] = 'cache.backend.null';
$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';

/**
 * Disable CSS and JS aggregation.
 */
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;

/**
 * Trusted host patterns.
 */
$settings['trusted_host_patterns'] = array(
  'docker.dev',
  'docker.test',
);

/**
 * Assertions.
 *
 * If you are using PHP 7.0 it is strongly recommended that you set
 * zend.assertions=1 in the PHP.ini file (It cannot be changed from .htaccess
 * or runtime) on development machines and to 0 in production.
 */
assert_options(ASSERT_ACTIVE, TRUE);
\Drupal\Component\Assertion\Handle::register();


/**
 * Allow test modules and themes to be installed.
 *
 * Drupal ignores test modules and themes by default for performance reasons.
 * During development it can be useful to install test extensions for debugging
 * purposes.
 */
#$settings['extension_discovery_scan_tests'] = TRUE;

/**
 * Database credentials.
 */
$databases['default']['default'] = array(
  'database' => getenv('MYSQL_DATABASE'),
  'username' => getenv('MYSQL_USER'),
  'password' => getenv('MYSQL_PASSWORD'),
  'host' => 'db',
  'port' => '',
  'driver' => 'mysql',
  'prefix' => '',
);

/**
 * Solr overrides.
 */
//$config['search_api.server.solr']['name'] = 'Solr (Docker)';
//$config['search_api.server.solr']['backend_config']['connector_config']['host'] = 'solr';
//$config['search_api.server.solr']['backend_config']['connector_config']['path'] = '/solr';
//$config['search_api.server.solr']['backend_config']['connector_config']['core'] = getenv('SOLR_CORE_NAME');

/**
 * Memcache settings.
 */
//$settings['memcache']['servers'] = ['memcached:11211' => 'default'];
//$settings['memcache']['bins'] = ['default' => 'default'];
//$settings['memcache']['key_prefix'] = '';
//$settings['cache']['default'] = 'cache.backend.memcache';

