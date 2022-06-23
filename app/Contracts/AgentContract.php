<?php

namespace App\Contracts;

/**
 * Interface AdsContract
 * @package App\Contracts
 */
interface AgentContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listAgents(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findAgentById(int $id);

     /**
     * @param array $params
     * @return mixed
     */
    public function createAgent(array $params);

    /**
     * @param int $id
     * @return mixed
     */
    public function updateAgent(array $params);
    
    // public function getAgentDetails(int $id);

    // public function blockAgent($id,$is_block);
    // public function verify($id,$is_verified);
    /**
     * @param array $params
     * @return mixed
     */
    public function updateAgentStatus(array $params);
    /**
     * @param $id
     * @return bool
     */
    public function deleteAgent($id);
}