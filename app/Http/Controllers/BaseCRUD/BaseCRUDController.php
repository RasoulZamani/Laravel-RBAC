<?php

namespace App\Http\Controllers\BaseCRUD;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\BaseModel\BaseModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BaseRequest\BaseRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseCRUDController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $model;             // Model related to this controller
    protected $service;
    protected $persianNameSingle; // persian name for one instance 
    protected $persianNamePlural; // persian name for plural instances
    protected $updateRequest;     // request form for validate input update request
    protected $createRequest;     // request form for validate input create request
    protected $apiResource;       // api resource 
    
    protected function __construct(
        BaseModel $model,
        string $service,
        string $createRequest ,
        string $updateRequest ,
        string $apiResource,
        string $persianNameSingle="آیتم",
        string $persianNamePlural= "آیتم ها")
    {
        $this->model = $model; 
        $this->service = $service; 
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
        
        // check permissions by policy
        //$this->model->authorize('viewAny',Auth::user());
        // if (!Auth::user()->can('viewAny',$this->model::class)) {
        //     return apiResponse(message:__("messages.non_authorized"), statusCode:403);
        // }

        $items = app($this->service)->findAll();
        //$items = $this->model::searchRecords($request->toArray())->addedQuery();
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
        // permissions
        // if (!Auth::user()->can('create',$this->model::class)) {
        //     return apiResponse(message:__("messages.non_authorized"), statusCode:403);
        // }
        
        //validation
        $validatedData = app($this->createRequest)->validated();

        $instance = app($this->service)->create($validatedData);
        
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
        
        $instance = app($this->service)->find($id);//->searchRecords($request->toArray())->addedQuery(),
        //permissions
        // if (!Auth::user()->can('view', $instance)) {
        //     return apiResponse(message:__("messages.non_authorized"), statusCode:403);
        // }
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
        $instance =app($this->service)->find($id);
        
        //permissions
        // if (!Auth::user()->can('update',$instance)) {
        //     return apiResponse(message:__("messages.non_authorized"), statusCode:403);
        // }
        
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
        $instance = app($this->service)->find($id);
        
        //permissions
        // if (!Auth::user()->can('delete',$instance)) {
        //     return apiResponse(message:__("messages.non_authorized"), statusCode:403);
        // }
        $instance->delete();
        return apiResponse(
            message: __(
                "messages.delete",
                ["attribute" => $this->persianNameSingle,
                'number' => $instance->id]
            ));
    }

}
