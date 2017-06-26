<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\RestaurantRepository;
use CodeDelivery\Models\Restaurant;
use CodeDelivery\Validators\RestaurantValidator;

/**
 * Class RestaurantRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class RestaurantRepositoryEloquent extends BaseRepository implements RestaurantRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Restaurant::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
