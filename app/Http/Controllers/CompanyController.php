<?php

namespace App\Http\Controllers\panel\ControlUnit\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\ControlUnit\Company\CompanyStoreRequest;
use App\Http\Requests\ControlUnit\Company\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:company_index|company_show')->only('index');
        $this->middleware('permission:company_index')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $companies = Company::searchRecords($request->toArray())->addedQuery(function ($query) {
            return $query->with(['city.state' , 'type']);
        });
        return apiResponse(message: __("messages.index" , ["attribute" => "شرکت ها"]), data: $companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ControlUnit\Company\CompanyStoreRequest $request
     * @return JsonResponse
     */
    public function store(\App\Http\Requests\ControlUnit\Company\CompanyStoreRequest $request): JsonResponse
    {
        $request = $request->validated();
        $company = Company::query()->create($request);
        return apiResponse(message: __("messages.store" , ["attribute" => "شرکت"]), data: $company);
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return JsonResponse
     */
    public function show(Company $company): JsonResponse
    {
        return apiResponse(message: __("messages.show" , ["attribute" => "شرکت"]), data: $company->load('city.state' , 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ControlUnit\Company\CompanyUpdateRequest $request
     * @param Company $company
     * @return JsonResponse
     */
    public function update(CompanyUpdateRequest $request , Company $company): JsonResponse
    {
        $request = $request->validated();
        $company->update($request);
        return apiResponse(message: __("messages.update" , ["attribute" => "شرکت"]), data: $company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return JsonResponse
     */
    public function destroy(Company $company): JsonResponse
    {
        //delete
        $company->delete();
        return apiResponse(message: __("messages.delete" , ["attribute" => "شرکت" , 'number' => $company->id]));
    }
}
