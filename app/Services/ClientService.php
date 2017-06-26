<?php

namespace CodeDelivery\Services;

use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;
/**
 *
 */
class ClientService
{

  protected $user;
  protected $client;

  function __construct( ClientRepository $client, UserRepository $user)
  {
    # code...
    $this->client = $client;
    $this->user = $user;
  }

  public function update( array $data, $id )
  {
    $client =  $this->client->update( $data, $id );
    $user = $this->client->find( $id );

    $this->user->update( $data['user'], $user->user_id );
    return true;
  }

  public function create( array $data )
  {
    $data['user']['password'] = bcrypt('paragourmet');

    $user = $this->user->create( $data['user'] );

    $data['user_id'] = $user->id;

    $client = $this->client->create( $data );

  }
}
