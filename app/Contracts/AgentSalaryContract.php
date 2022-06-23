<?php

namespace App\Contracts;

/**
 * Interface AdsContract
 * @package App\Contracts
 */
interface AgentSalaryContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listAgentSalaries(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findAgentSalaryById(int $id);

     /**
     * @param array $params
     * @return mixed
     */
    public function createAgentSalary(array $params);

    /**
     * @param int $id
     * @return mixed
     */
    public function updateAgentSalary(array $params);
    
    // public function getAgentSalaryDetails(int $id);

    // public function blockAgentSalary($id,$is_block);
    // public function verify($id,$is_verified);
    /**
     * @param array $params
     * @return mixed
     */
    public function updateAgentSalaryStatus(array $params);
    /**
     * @param $id
     * @return bool
     */
    public function deleteAgentSalary($id);
}