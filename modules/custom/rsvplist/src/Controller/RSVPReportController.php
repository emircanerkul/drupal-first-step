<?php

namespace Drupal\rsvplist\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;

/**
 * As.
 */
class RSVPReportController extends ControllerBase {

  /**
   * Gets all RSVP.
   *
   * {@inheritDoc}
   *
   * RSVP List Database Result. @return array
   */
  protected function load() {
    $select = Database::getConnection()->select('rsvplist', 'r');
    $select->join("users_field_data", 'u', 'r.uid = u.uid');
    $select->join("node_field_data", 'n', 'r.id = n.nid');
    $select->addField('u', 'name', 'username');
    $select->addField('n', 'title');
    $select->addField('r', 'mail');
    $entries = $select->execute()->fetchAll(\PDO::FETCH_ASSOC);
    return $entries;
  }

  /**
   * {@inheritDoc}
   */
  public function report() {
    $headers = [$this->t("Name"), $this->t("Event"), $this->t("Email")];
    $rows = [];
    foreach ($this->load() as $entry) {
      $rows[] = array_map('Drupal\Component\Utility\SafeMarkup::checkPlain', $entry);
    }
    $content = [
      "table" => [
        '#type' => 'table',
        '#header' => $headers,
        '#rows' => $rows,
        '#empty' => $this->t("No entries available."),
      ],
      '#cache' => ['max-age' => 0],
    ];
    return $content;
  }

}
