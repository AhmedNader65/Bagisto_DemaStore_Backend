<?php

namespace App\Http\Controllers\products;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Webkul\RestApi\Http\Controllers\V1\Shop\Catalog\ProductController;

class MyProductController extends ProductController
{

    public function resource()
    {
        return ProductResource::class;
    }
    /**
     * Returns a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function allResources(Request $request)
    {
        $results = $this->getRepositoryInstance()->getAll($request->input('category_id'));

        return $this->getResourceCollection($results);
    }


    
}
