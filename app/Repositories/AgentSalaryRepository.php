<?php

namespace App\Repositories;

use App\Models\AgentSalary;
use App\Traits\UploadAble;
use App\Contracts\AgentSalaryContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use InvalidArgumentException;

/**
 * Class AgentSalaryRepository
 *
 * @package \App\Repositories
 */
class AgentSalaryRepository extends BaseRepository implements AgentSalaryContract
{
    use UploadAble;

    /**
     * AgentSalaryRepository constructor.
     * @param AgentSalary $model
     */
    public function __construct(AgentSalary $model)
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
    public function listAgentSalaries(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findAgentSalaryById(int $id)
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
    public function createAgentSalary(array $params)
    {
        try {
            $collection = collect($params);

            $data = new AgentSalary;
            $data->agent_id = $collection['agent_id'];
            $data->salary = $collection['salary'];
            $data->bonus = $collection['bonus'];
            $data->total_salary = $collection['total_salary'];
            

            $data->save();
            return $data;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }

    }

    public function updateAgentSalary(array $params)
    {
        $collection = collect($params);
        $data = $this->findAgentSalaryById($params['id']);
        $data->agent_id = $collection['agent_id'];
        $data->salary = $collection['salary'];
        $data->bonus = $collection['bonus'];
        $data->total_salary = $collection['total_salary'];


        $data->save();

        return $data;
    }


    

    // /**
    //  * @param array $params
    //  * @return mixed
    //  */
    // public function verify($id, $is_verified)
    // {
    //     $data = $this->findAgentSalaryById($id);
    //     $data->is_verified = $is_verified;
    //     $data->save();

    //     return $data;
    // }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAgentSalaryStatus(array $params)
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
    public function deleteAgentSalary($id)
    {
        $data = $this->findOneOrFail($id);
        $data->delete();
        return $data;
    }
}