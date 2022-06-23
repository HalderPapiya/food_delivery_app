<?php

namespace App\Repositories;

use App\Models\Agent;
use App\Traits\UploadAble;
use App\Contracts\AgentContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use InvalidArgumentException;

/**
 * Class AgentRepository
 *
 * @package \App\Repositories
 */
class AgentRepository extends BaseRepository implements AgentContract
{
    use UploadAble;

    /**
     * AgentRepository constructor.
     * @param Agent $model
     */
    public function __construct(Agent $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listAgents(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findAgentById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function createAgent(array $params)
    {
        try {
            $collection = collect($params);

            $data = new Agent;
            $data->first_name = $collection['first_name'];
            $data->last_name = $collection['last_name'];
            // $data->agent_no = $collection['agent_no'];
            // $data->license = $collection['license'];
            // $data->vehicle_no = $collection['vehicle_no'];
            $data->email = $collection['email'];
            $data->phone = $collection['phone'];
            $data->password = $collection['password'];
            $data->address = $collection['address'];
            $data->city = $collection['city'];
            $data->pin_code = $collection['pin_code'];
            // $data->land_mark = $collection['land_mark'];

            $data->save();

            return $data;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateAgent(array $params)
    {
        $collection = collect($params);

        $data = $this->findAgentById($params['id']);

        $data->first_name = $collection['first_name'];
        $data->last_name = $collection['last_name'];
        $data->agent_no = $collection['agent_no'];
        $data->license = $collection['license'];
        $data->vehicle_no = $collection['vehicle_no'];
        $data->email = $collection['email'];
        $data->phone = $collection['phone'];
        // $data->password = $collection['password'];
        $data->address = $collection['address'];
        $data->city = $collection['city'];
        $data->pin_code = $collection['pin_code'];

        $data->save();

        return $data;
    }




    // /**
    //  * @param array $params
    //  * @return mixed
    //  */
    // public function verify($id, $is_verified)
    // {
    //     $data = $this->findAgentById($id);
    //     $data->is_verified = $is_verified;
    //     $data->save();

    //     return $data;
    // }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAgentStatus(array $params)
    {
        $data = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $data->status = $collection['status'];
        $data->save();

        return $data;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteAgent($id)
    {
        $data = $this->findOneOrFail($id);
        $data->delete();
        return $data;
    }
}