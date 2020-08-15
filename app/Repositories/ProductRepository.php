<?php

namespace App\Repositories;

use App\Models\Product;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ProductContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class ProductRepository extends BaseRepository implements ProductContract
{
    use UploadAble;

    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
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
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort,8);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
     public function findProductById(int $id)
     {
         try {
             return $this->findOneOrFail($id);

         } catch (ModelNotFoundException $e) {

             throw new ModelNotFoundException($e);
         }

     }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
     public function findProductByIdWithImages(int $id)
     {
         try {
             $product = Product::where('id', $id)
                        ->with('images')
                        ->with('category')
                        ->with('brand')->first();

            return $product;

         } catch (ModelNotFoundException $e) {

             throw new ModelNotFoundException($e);
         }

     }

    /**
     * @param array $params
     * @return Product|mixed
     */
    public function createProduct(array $params)
    {
        try {
            $collection = collect($params);

            $featured = $collection->has('featured') ? 1 : 0;
            $status = $collection->has('status') ? 1 : 0;

            $merge = $collection->merge(compact('status', 'featured'));

            $product = new Product($merge->all());

            $product->save();

            return $product;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProduct(array $params)
    {
        $product = $this->findProductById($params['product_id']);

        $collection = collect($params)->except('_token');

        $featured = $collection->has('featured') ? 1 : 0;
        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status', 'featured'));

        $product->update($merge->all());

        return $product;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteProduct($id)
    {
        $product = $this->findProductById($id);

        $product->delete();

        return $product;
    }
    /**
     * @param $slug
     * @return mixed
     */
    public function findProductBySlug($slug)
    {
        $product = Product::where('slug', $slug)
                            ->with('category')
                            ->with('brand')->first();

        return $product;
    }

    public function findBySearchItem($search)
    {
        return Product::whereHas('category', function (Builder $builder) use ($search) {
            $builder->where('name','like','%' . $search . '%');
        })->get();
    }
}
