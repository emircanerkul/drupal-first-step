<?php

namespace Drupal\particle\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ParticleBlockController.
 */
class ParticleBlockController extends ControllerBase {

  /**
   * Content.
   */
  public function content() {
    return ['#theme' => 'particle'];
  }

  /**
   * Return random title.
   */
  public function randomTitle() {
    $randomTitles = [
      "Dolor amet porro aut et tempora.",
      "Dolor rerum quam amet veritatis laborum rerum aut hic.",
      "Quam sed magni praesentium velit eveniet fugiat.",
      "Iure velit veniam tenetur veniam.",
      "Eum officia in.",
    ];
    return $randomTitles[rand(0, 4)];
  }

}
