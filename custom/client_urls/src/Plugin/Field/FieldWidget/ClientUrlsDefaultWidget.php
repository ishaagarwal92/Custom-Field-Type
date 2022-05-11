<?php

namespace Drupal\client_urls\Plugin\Field\FieldWidget;

use Drupal;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'ClientUrlsDefaultWidget' widget.
 *
 * @FieldWidget(
 *   id = "ClientUrlsDefaultWidget",
 *   label = @Translation("Client URLs select"),
 *   field_types = {
 *     "ClientUrls"
 *   }
 * )
 */
class ClientUrlsDefaultWidget extends WidgetBase {

  /**
   * Define the form for the field type.
   * 
   * Inside this method we can define the form used to edit the field type.
   */
  public function formElement(FieldItemListInterface $items, $delta, Array $element, Array &$form,       FormStateInterface $formState) {
    $file = explode("\n",file_get_contents('modules/custom/client_urls/src/documents/urls.txt'));
    $element['value'] = [
      '#type' => 'select',
      '#title' => t('Client URLs'),
      '#options' => $file,
      //'#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : null,
      '#emptyValue' => '',
    ];
    return $element;
  }

}
