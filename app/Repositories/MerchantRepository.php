<?php

namespace App\Repositories;

use App\Models\Merchant;
use App\Traits\UploadAble;
use App\Contracts\MerchantContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use InvalidArgumentException;

/**
 * Class MerchantRepository
 *
 * @package \App\Repositories
 */
class MerchantRepository extends BaseRepository implements MerchantContract
{
    use UploadAble;

    /**
     * MerchantRepository constructor.
     * @param Merchant $model
     */
    public function __construct(Merchant $model)
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
    public function listMerchants(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findMerchantById(int $id)
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
    public function createMerchant(array $params)
    {
        try {
            $collection = collect($params);

            $data = new Merchant;
            $data->first_name = $collection['first_name'];
            $data->last_name = $collection['last_name'];
            $data->email = $collection['email'];
            $data->phone = $collection['phone'];
            $data->password = $collection['password'];
            $data->address = $collection['address'];
            $data->city = $collection['city'];
            $data->pin_code = $collection['pin_code'];
            $data->shop_name = $collection['shop_name'];
            $data->landmark = $collection['landmark'];

            $data->save();

            return $data;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateMerchant(array $params)
    {
        $collection = collect($params);

        $data = $this->findMerchantById($params['id']);

        $data->first_name = $collection['first_name'];
        $data->last_name = $collection['last_name'];
        $data->shop_name = $collection['shop_name'];
        $data->email = $collection['email'];
        $data->phone = $collection['phone'];
        // $data->password = $collection['password'];
        $data->address = $collection['address'];
        $data->city = $collection['city'];
        $data->pin_code = $collection['pin_code'];
        $data->shop_name = $collection['shop_name'];
        $data->landmark = $collection['landmark'];

        $data->save();

        return $data;
    }




    // /**
    //  * @param array $params
    //  * @return mixed
    //  */
    // public function verify($id, $is_verified)
    // {
    //     $data = $this->findMerchantById($id);
    //     $data->is_verified = $is_verified;
    //     $data->save();

    //     return $data;
    // }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateMerchantStatus(array $params)
    {
        $data = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $data->status = $collection['status'];
        $data->save();

        return $data;
    }
    public function updateMerchantVerification(array $params)
    {
        $data = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $data->is_verified = $collection['is_verified'];
        $data->save();

        return $data;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteMerchant($id)
    {
        $data = $this->findOneOrFail($id);
        $data->delete();
        return $data;
    }
}