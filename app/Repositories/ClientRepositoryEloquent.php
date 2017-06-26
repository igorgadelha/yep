<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Models\Client;
use CodeDelivery\Validators\ClientValidator;

use Yajra\Datatables\Datatables;
use Carbon\Carbon;

/**
 * Class ClientRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
    }

    public function getDatatable()
    {
        $images = $this->model->select('*');
        return
          Datatables::of($images)
            ->addColumn('action', function ($p) {
                return '<a class="btn btn-xs btn-danger" onclick="return confirm(\'Delete this image ?\');" href="'.action('ClientsController@destroy', ['id'=>$p->id]).'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->editColumn('created_at', '{!! $created_at !!}');
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
