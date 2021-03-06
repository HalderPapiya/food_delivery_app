<?php

namespace App\Contracts;

/**
 * Interface SubCategoryContract
 * @package App\Contracts
 */
interface SubCategoryContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSubCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findSubCategoryById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createSubCategory(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSubCategory(array $params);

    /**
     * @param int $id
     * @return mixed
     */

    public function updateSubCategoryStatus(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteSubCategory($id);
}