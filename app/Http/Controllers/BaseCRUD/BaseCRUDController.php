<?php

namespace App\Http\Controllers\BaseCRUD;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\BaseModel\BaseModel;
use App\Http\Requests\BaseRequest\BaseRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseCRUDController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $model;             // Model related to this controller
    protected $persianNameSingle; // persian name for one instance 
    protected $persianNamePlural; // persian name for plural instances
    protected $updateRequest;     // request form for validate input update request
    protected $createRequest;     // request form for validate input create request
    protected $apiResource;       // api resource 
    
    protected function __construct(
        BaseModel $model,
        string $createRequest ,
        string $updateRequest ,
        string $apiResource,
        string $persianNameSingle="آیتم",
        string $persianNamePlural= "آیتم ها")
        
    {

        $this->model = $model; 
        $this->persianNameSingle = $persianNameSingle;
        $this->persianNamePlural = $persianNamePlural;
        $this->createRequest = $createRequest;
        $this->updateRequest = $updateRequest;
        $this->apiResource = $apiResource;

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $items = $this->model::searchRecords($request->toArray())->addedQuery();
        $itemsResource = resolve($this->apiResource, ["resource"=>$items['data'] ?? $items]);//::collection($items['data'] ?? $items);
       
        return apiResponse(
            success:true,
            message:__("messages.index", ["attribute"=>$this->persianNamePlural]),
            data: $request->get('paginate') ? $itemsResource->resource : ["data" => $itemsResource->resource ],

            // data: $this->model::searchRecords($request->toArray())->addedQuery(function ($query){
            //     return $query->withTrashed();
            // }),
            statusCode:200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //validation
        $validatedData = app($this->createRequest)->validated();

        $instance = $this->model->create($validatedData);
        $instanceResource = resolve($this->apiResource, ["resource"=>$instance]);//::collection($items['data'] ?? $items);

        return apiResponse(
            message: __(
                "messages.store" ,
                ["attribute" => $this->persianNameSingle]),
            data: $instanceResource 
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse {
        $instance = $this->model::findOrFail($id);//->searchRecords($request->toArray())->addedQuery(),
        $instanceResource = resolve($this->apiResource, ["resource"=>$instance]);
        return apiResponse(
            success:true,
            message:__("messages.show", ["attribute"=>$this->persianNameSingle ]),
            data: $instanceResource
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(string $id) {
        //validation
        $validatedData = app($this->updateRequest)->validated();

        // get instance that we want to update
        $instance = $this->model::findOrFail($id);
        $instance->update($validatedData);
        $instanceResource = resolve($this->apiResource, ["resource"=>$instance]);
        return apiResponse(
            message: __(
                "messages.update",
                ["attribute"=>$this->persianNameSingle ]),
            data: $instanceResource
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse {
        // get instance that we want to delete
        $instance = $this->model::findOrFail($id);
        $instance->delete();
        return apiResponse(
            message: __(
                "messages.delete",
                ["attribute" => $this->persianNameSingle,
                'number' => $instance->id]
            ));
    }

    // public function forceDelete(string $id): JsonResponse {
    //     // get instance that we want to delete
    //     $instance = $this->model::withTrashed()->findOrFail($id);
    //     $instance->forceDelete();
    //     return apiResponse(
    //         message: __(
    //             "messages.delete",
    //             ["attribute" => $this->persianNameSingle,
    //             'number' => $instance->id]
    //         ));
    // }
}
