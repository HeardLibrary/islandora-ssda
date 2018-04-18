<?php
/**
 * @file
 * The primary PHP file for this theme.
 */

/* Preprocess page.tpl.php to inject search forms w/o depending on blocks. */
function bootstrap_ssda_preprocess_page(&$variables){
  $search_form = drupal_get_form('search_form');
  $search_box = drupal_render($search_form);
  $variables['search_box'] = $search_box;

  $islandora_search_form = drupal_get_form('islandora_solr_simple_search_form');
  $islandora_search_box = drupal_render($islandora_search_form);
  $variables['islandora_search_box'] = $islandora_search_box;

  $islandora_search_form_2 = drupal_get_form('islandora_solr_simple_search_ssda_custom_form');
  $islandora_search_box_2 = drupal_render($islandora_search_form_2);
  $variables['islandora_search_box_2'] = $islandora_search_box_2;


  /* Only change #navbar's container class to fluid-container */
  $variables['navbar_classes_array'] = array('navbar');
  
  if (bootstrap_setting('navbar_position') !== '') {
    $variables['navbar_classes_array'][] = 'navbar-' . bootstrap_setting('navbar_position');
  }
  else {
    $variables['navbar_classes_array'][] = 'fluid-container';
  }
  if (bootstrap_setting('navbar_inverse')) {
    $variables['navbar_classes_array'][] = 'navbar-inverse';
  }
  else {
    $variables['navbar_classes_array'][] = 'navbar-default';
  }

  /* Tightens content region and allows widening of secondary region (in page.tpl.php) for improved readability. */
  if (drupal_is_front_page() && (!empty($variables['page']['sidebar_first']) || !empty($variables['page']['sidebar_second']))) {
     $variables['content_column_class'] = ' class="col-sm-8"';
  }
}

/* Form alter to add missing bootstrap classes and role to search form. */
function bootstrap_ssda_form_alter(&$form, &$form_state, $form_id) {
  #drupal_set_message($form_id);

  #dpm($form);

  if ($form_id == 'search_form') {
    $form['#attributes']['role'][] = 'search';
    $form['#attributes']['class'][] = 'hidden-xs';
    $form['basic']['keys']['#attributes']['placeholder'] = t('Site Search'); #found in all/themes/bootstrap/includes/alter.inc
  }

  if ($form_id == 'islandora_solr_simple_search_form') {
    $form['#attributes']['role'][] = 'search';
    $form['#attributes']['class'][] = 'search-form center-block';
    $form['simple']['islandora_simple_search_query']['#title'] = t('');
    $form['simple']['submit']['#value'] = t('');
    $form['simple']['submit']['#attributes']['class'][] = 'icon glyphicon glyphicon-search';
  }

  if ($form_id == 'islandora_solr_simple_search_ssda_custom_form') {
    $form['#attributes']['role'][] = 'search';
    $form['#attributes']['class'][] = 'hidden-xs search-form';
    $form['simple']['islandora_simple_search_query']['#title'] = t('');
    $form['simple']['islandora_simple_search_query']['#attributes']['placeholder'] = t('Search the SSDA Archive');
    $form['simple']['submit']['#value'] = t('');
    $form['simple']['submit']['#attributes']['class'][] = 'icon glyphicon glyphicon-search';
  }
}
