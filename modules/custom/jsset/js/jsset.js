/**
 * @file
 * Jsset behaviors.
 */

(function ($, Drupal, drupalSettings) {

  'use strict';

  /**
   * Behavior description.
   */
  Drupal.behaviors.jsset = {
    attach: function (context, settings) {
      $(".js-var").once('jsDrupalupTest').append('<button>' + drupalSettings.js_example.test + '</button>');

      console.log('It works!');
    }
  };

}(jQuery, Drupal, drupalSettings));
