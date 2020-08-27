<?php

namespace Drupal\particle\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'ParticleBlock' block.
 *
 * @Block(
 *  id = "particle_block",
 *  admin_label = @Translation("Particle block"),
 * )
 */
class ParticleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return ['#theme' => 'particle'];
  }

}
