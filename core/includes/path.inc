<?php

/**
 * @file
 * Functions to handle paths in Drupal.
 */

use Drupal\Core\ParamConverter\ParamNotConvertedException;
use Symfony\Cmf\Component\Routing\RouteObjectInterface;

/**
 * Check if the current page is the front page.
 *
 * @return
 *   Boolean value: TRUE if the current page is the front page; FALSE if otherwise.
 *
 * @deprecated as of Drupal 8.0. Use
 *   \Drupal\Core\Path\PathMatcherInterface::isFrontPage() instead.
 */
function drupal_is_front_page() {
  return \Drupal::service('path.matcher')->isFrontPage();
}

/**
 * Check if a path matches any pattern in a set of patterns.
 *
 * @param $path
 *   The path to match.
 * @param $patterns
 *   String containing a set of patterns separated by \n, \r or \r\n.
 *
 * @return
 *   Boolean value: TRUE if the path matches a pattern, FALSE otherwise.
 *
 * @deprecated as of Drupal 8.0. Use
 *   \Drupal\Core\Path\PathMatcherInterface::matchPath() instead.
 */
function drupal_match_path($path, $patterns) {
  return \Drupal::service('path.matcher')->matchPath($path, $patterns);
}

/**
 * Determines whether a path is in the administrative section of the site.
 *
 * By default, paths are considered to be non-administrative. If a path does
 * not match any of the patterns in path_get_admin_paths(), or if it matches
 * both administrative and non-administrative patterns, it is considered
 * non-administrative.
 *
 * @param $path
 *   A Drupal path.
 *
 * @return
 *   TRUE if the path is administrative, FALSE otherwise.
 *
 * @deprecated Use \Drupal::service('router.admin_context')->isAdminRoute()
 *   service instead.
 */
function path_is_admin($path) {
  try {
    $parameters = \Drupal::service('router')->match('/' . $path);
    $route = $parameters[RouteObjectInterface::ROUTE_OBJECT];
    return \Drupal::service('router.admin_context')->isAdminRoute($route);
  }
  catch (ParamNotConvertedException $e) {
    return FALSE;
  }
}