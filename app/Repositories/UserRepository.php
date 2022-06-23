<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\UploadAble;
use App\Contracts\UserContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use InvalidArgumentException;

/**
 * Class UserRepository
 *
 * @package \App\Repositories
 */
class UserRepository extends BaseRepository implements UserContract
{
    use UploadAble;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
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
    public function listUsers(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findUserById(int $id)
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
    public function createUser(array $params)
    {
        try {
            $collection = collect($params);

            $user = new User;
            $user->first_name = $collection['first_name'];
            $user->last_name = $collection['last_name'];
            $user->email = $collection['email'];
            $user->phone = $collection['phone'];
            $user->password = $collection['password'];
            $user->address = $collection['address'];
            $user->city = $collection['city'];
            $user->pin_code = $collection['pin_code'];
            $user->land_mark = $collection['land_mark'];

            $user->save();
            return $user;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }

    }

    public function updateUser(array $params)
    {
        $collection = collect($params);
        $user = $this->findUserById($params['id']);
        $user->first_name = $collection['first_name'];
        $user->last_name = $collection['last_name'];
        $user->email = $collection['email'];
        $user->phone = $collection['phone'];
        // $user->password = $collection['password'];
        $user->address = $collection['address'];
        $user->city = $collection['city'];
        $user->pin_code = $collection['pin_code'];
        $user->land_mark = $collection['land_mark'];



        $user->save();

        return $user;
    }


    

    // /**
    //  * @param array $params
    //  * @return mixed
    //  */
    // public function verify($id, $is_verified)
    // {
    //     $user = $this->findUserById($id);
    //     $user->is_verified = $is_verified;
    //     $user->save();

    //     return $user;
    // }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateUserStatus(array $params)
    {
        $user = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $user->status = $collection['status'];
        $user->save();

        return $user;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteUser($id)
    {
        $user = $this->findOneOrFail($id);
        $user->delete();
        return $user;
    }
}