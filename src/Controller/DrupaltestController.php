<?php

/**
 * @file
 * Contains \Drupal\drupaltest\Controller\DrupaltestController.
 */

namespace Drupal\drupaltest\Controller;

use Drupal\Core\Controller\ControllerBase;

class DrupaltestController extends ControllerBase{

  /*
   * Display module content
   */
  public function content()
  {
    $testform = \Drupal::formBuilder()->getForm('Drupal\drupaltest\Form\dataForm');

    return [
      '#theme' => 'testtemplate',
      '#test_var' => $this->t('User Request'),
      '#form' => $testform,
    ];
  }

}