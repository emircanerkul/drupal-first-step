<?php

namespace Drupal\greeting\Plugin\Block;

use Drupal;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'GreetingBlock' block.
 *
 * @Block(
 *  id = "greeting_block",
 *  admin_label = @Translation("Greeting block"),
 * )
 */
class GreetingBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    if (!Drupal::currentUser()->isAnonymous()) {
      $user = Drupal::entityTypeManager()->getStorage('user')->load(Drupal::currentUser()->id());
      $build = [];
      $build["#cache"]["max-age"] = 0;
      $build['greeting_block']['#markup'] = 'Hi, ' . $user->field_user_name_surname->value;

      return $build;
    }
  }

}
