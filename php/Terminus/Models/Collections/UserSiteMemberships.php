<?php

namespace Terminus\Models\Collections;

class UserSiteMemberships extends TerminusCollection {
  /**
   * @var User
   */
  public $user;
  /**
   * @var boolean
   */
  protected $paged = true;

  /**
   * Instantiates the collection, sets param members as properties
   *
   * @param array $options To be set to $this->key
   */
  public function __construct(array $options = []) {
    parent::__construct($options);
    $this->user = $options['user'];
    $this->url  = "users/{$this->user->id}/memberships/sites";
  }

  /**
   * Adds a model to this collection
   *
   * @param object $model_data  Data to feed into attributes of new model
   * @param array  $arg_options Data to make properties of the new model
   * @return void
   */
  public function add($model_data, array $arg_options = []) {
    $default_options = [
      'id'         => $model_data->id,
      'collection' => $this,
    ];
    $options         = array_merge($default_options, $arg_options);
    parent::add($model_data, $options);
  }

  /**
   * Names the model-owner of this collection
   *
   * @return string
   */
  protected function getOwnerName() {
    $owner_name = 'user';
    return $owner_name;
  }

}