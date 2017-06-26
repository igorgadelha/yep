<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\AddressesRepository;
use CodeDelivery\Models\Addresses;
use CodeDelivery\Validators\AddressesValidator;

/**
 * Class AddressesRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class AddressesRepositoryEloquent extends BaseRepository implements AddressesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Addresses::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
