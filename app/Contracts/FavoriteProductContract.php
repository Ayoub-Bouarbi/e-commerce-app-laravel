<?php

namespace App\Contracts;

/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface FavoriteProductContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listFavorites(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findFavoriteById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createFavorite(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateFavorite(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteFavorite($id);
}
