<?php

namespace Drupal\client_urls\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface as StorageDefinition;

/**
 * Plugin implementation of the 'client_urls' field type.
 *
 * @FieldType(
 *   id = "ClientUrls",
 *   label = @Translation("Client Urls List"),
 *   description = @Translation("Displays the urls from the text file"),
 *   category = @Translation("Custom"),
 *   default_widget = "ClientUrlsDefaultWidget",
 *   default_formatter = "ClientUrlsDefaultFormatter"
 * )
 */
class ClientUrls extends FieldItemBase {

  /**
   * Field type properties definition.
   * 
   * Inside this method we defines all the fields (properties) that our 
   * custom field type will have.
   * 
   * Here there is a list of allowed property types: https://goo.gl/sIBBgO
   */
  public static function propertyDefinitions(StorageDefinition $storage) {
    $properties = [];
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Client Urls List'));
    return $properties;
  }

  /**
   * Field type schema definition.
   * 
   * Inside this method we defines the database schema used to store data for 
   * our field type.
   */
  public static function schema(StorageDefinition $storage) {
     $schema = [
        'columns' => [
          'value' => [
            'type' => 'varchar',
            'length' => 60,
            'not null' => FALSE,
          ],
        ],
    ];
    return $schema;
  }

  /**
   * Define when the field type is empty. 
   */
  public function isEmpty() {
    $isEmpty = empty($this->get('value')->getValue());
    return $isEmpty;
  }

}
