<?php

namespace App\Repositories;

use App\Contracts\FavoriteProductContract;
use App\Models\Category;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Models\FavoriteProduct;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Date;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class FavoriteProductRepository extends BaseRepository implements FavoriteProductContract
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(FavoriteProduct $model)
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
    public function listFavorites(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }
    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findFavoriteById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }
    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createFavorite(array $params)
    {
        try {
            $collection = collect($params);
            $date = date('dd/MM/yyyy');

            $merge = $collection->merge(compact('date'));

            $Favorite = new FavoriteProduct($merge->all());

            $Favorite->save();

            return $Favorite;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    /**
     * @param array $params
     * @return mixed
     */
    public function updateFavorite(array $params)
    {
        $favorite = $this->findFavoriteById($params['id']);


        $favorite->update($params);

        return $favorite;
    }
    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteFavorite($id)
    {
        $favorite = $this->findFavoriteById($id);

        $favorite->delete();

        return $favorite;
    }
}
