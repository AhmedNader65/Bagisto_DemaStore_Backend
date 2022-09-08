<?php

namespace App\Http\Controllers\products;

use Webkul\Product\Repositories\ProductRepository;
use Webkul\RestApi\Http\Controllers\V1\Shop\Catalog\CatalogController;
use Webkul\RestApi\Http\Resources\V1\Shop\Catalog\ProductResource;

class HomeController extends CatalogController
{

    public function repository()
    {
        return ProductRepository::class;
    }


    public function index2(){
        $data['featured']= "1";
        $data['new']= "1";

        request()->merge($data);
        $result["xx"]= ProductResource::collection($this->getRepositoryInstance()->getHome("new",request()->input('category_id')));
      
        request()->merge($data);
        $result["xx"]= ProductResource::collection($this->getRepositoryInstance()->getHome("",request()->input('category_id')));
       return $result;
    }
    public function index(){
      
        $result["featured"]= ProductResource::collection($this->getRepositoryInstance()->getFeaturedProducts());
        $result["sale"]= ProductResource::collection($this->getRepositoryInstance()->getSaleProducts());
       
        $result["new"]= ProductResource::collection($this->getRepositoryInstance()->getNewProducts());
       return $result;
    }

    
}
