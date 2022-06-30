<?php

namespace App\Contracts;

/**
 * Interface AdsContract
 * @package App\Contracts
 */
interface MerchantContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listMerchants(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findMerchantById(int $id);

     /**
     * @param array $params
     * @return mixed
     */
    public function createMerchant(array $params);

    /**
     * @param int $id
     * @return mixed
     */
    public function updateMerchant(array $params);
    
    // public function getMerchantDetails(int $id);

    // public function blockMerchant($id,$is_block);
    // public function verify($id,$is_verified);
    /**
     * @param array $params
     * @return mixed
     */
    public function updateMerchantStatus(array $params);
    public function updateMerchantVerification(array $params);
    
    /**
     * @param $id
     * @return bool
     */
    public function deleteMerchant($id);
}