<?php

namespace App\Http\Controllers\products;

use App\Http\Resources\ProductResource;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\RestApi\Http\Controllers\V1\Shop\Catalog\CatalogController;

class HomeController extends CatalogController
{

    public function repository()
    {
        return ProductRepository::class;
    }

    public function index(){
      
        $result["featured"]= ProductResource::collection($this->getRepositoryInstance()->getFeaturedProducts());
        $result["sale"]= ProductResource::collection($this->getRepositoryInstance()->getSaleProducts());
       
        $result["new"]= ProductResource::collection($this->getRepositoryInstance()->getNewProducts());
       return $result;
    }

    
}
