<?php

/**
 * @file
 * Definition of Drupal\file\Plugin\views\wizard\File.
 */

namespace Drupal\file\Plugin\views\wizard;

use Drupal\views\Plugin\views\wizard\WizardPluginBase;

/**
 * Tests creating managed files views with the wizard.
 *
 * @ViewsWizard(
 *   id = "file_managed",
 *   base_table = "file_managed",
 *   title = @Translation("Files")
 * )
 */
class File extends WizardPluginBase {

  /**
   * Set the created column.
   */
  protected $createdColumn = 'created';

  /**
   * Set default values for the path field options.
   */
  protected $pathField = array(
    'id' => 'uri',
    'table' => 'file_managed',
    'field' => 'uri',
    'exclude' => TRUE,
    'file_download_path' => TRUE,
    'plugin_id' => 'file_uri',
  );

  /**
   * Overrides Drupal\views\Plugin\views\wizard\WizardPluginBase::defaultDisplayOptions().
   */
  protected function defaultDisplayOptions() {
    $display_options = parent::defaultDisplayOptions();

    // Add permission-based access control.
    $display_options['access']['type'] = 'perm';

    // Remove the default fields, since we are customizing them here.
    unset($display_options['fields']);

    /* Field: File: Name */
    $display_options['fields']['filename']['id'] = 'filename';
    $display_options['fields']['filename']['table'] = 'file_managed';
    $display_options['fields']['filename']['field'] = 'filename';
    $display_options['fields']['filename']['label'] = '';
    $display_options['fields']['filename']['alter']['alter_text'] = 0;
    $display_options['fields']['filename']['alter']['make_link'] = 0;
    $display_options['fields']['filename']['alter']['absolute'] = 0;
    $display_options['fields']['filename']['alter']['trim'] = 0;
    $display_options['fields']['filename']['alter']['word_boundary'] = 0;
    $display_options['fields']['filename']['alter']['ellipsis'] = 0;
    $display_options['fields']['filename']['alter']['strip_tags'] = 0;
    $display_options['fields']['filename']['alter']['html'] = 0;
    $display_options['fields']['filename']['hide_empty'] = 0;
    $display_options['fields']['filename']['empty_zero'] = 0;
    $display_options['fields']['filename']['link_to_file'] = 1;
    $display_options['fields']['filename']['plugin_id'] = 'file';

    return $display_options;
  }

}