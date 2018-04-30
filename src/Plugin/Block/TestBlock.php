<?php
/**
 * @file
 * Contains \Drupal\deupaltest\Plugin\Block\TestBlock.
 */

namespace Drupal\drupaltest\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Test' Block
 *
 * @Block(
 *   id = "testblock",
 *   admin_label = @Translation("Test block"),
 * )
 */
     
class TestBlock extends BlockBase 
{
   /**
   * {@inheritdoc}
   */
  public function build() {

    $testform = \Drupal::formBuilder()->getForm('Drupal\drupaltest\Form\dataForm');

    return [
      '#theme' => 'testtemplate',
      '#test_var' => $this->t('User Request'),
      '#form' => $testform,
    ];
  }
}