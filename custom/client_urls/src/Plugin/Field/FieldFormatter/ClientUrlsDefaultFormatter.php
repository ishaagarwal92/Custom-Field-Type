<?php

namespace Drupal\client_urls\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal;

/**
 * Plugin implementation of the 'ClientUrlsDefaultFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "ClientUrlsDefaultFormatter",
 *   label = @Translation("Client URLs select"),
 *   field_types = {
 *     "ClientUrls"
 *   }
 * )
 */
class ClientUrlsDefaultFormatter extends FormatterBase {

  /**
   * Define how the field type is showed.
   * 
   * Inside this method we can customize how the field is displayed inside 
   * pages.
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#type' => 'markup',
        '#markup' => $item->value
      ];
    }
    return $elements;
  }
  
}
