<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\MerchantContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class MerchantController extends BaseController
{

    protected $MerchantRepository;

    /**
     * MerchantManagementController constructor.
     * @param MerchantRepository $MerchantRepository
     */

    public function __construct(MerchantContract $merchantRepository)
    {
        $this->merchantRepository = $merchantRepository;
    }

    /**
     * List all the Merchants
     */
    public function index()
    {
        $data = $this->merchantRepository->listMerchants();
        // dd($data);
        $this->setPageTitle('Merchants', 'List of all Merchants');
        return view('admin.merchant.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Merchant', 'Create Merchant');
        return view('admin.merchant.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'first_name' =>  'required',
            'last_name' =>  'required',
            'email' =>  'required',
            'pin_code' =>  'required',
            'phone' =>  'required|integer|digits:10',
            // 'password' =>  'required',
            'address' =>  'required',
            'city' =>  'required',
            // 'shop_name' =>  'required',
            // 'video' =>  'max:50000',
        ]);
        // $this->Validate($request,[
        //     'file'=>'max:50000', //50MB
        //     'syllabus'=>'max:50000'
        // ]);
        
        $params = $request->except('_token');

        $data = $this->merchantRepository->createMerchant($params);
// dd($data);
        if (!$data) {
            return $this->responseRedirectBack('Error occurred while creating merchant.', 'error', true, true);
        }
        return $this->responseRedirect('admin.merchant.index', 'Merchant has been added successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = $this->merchantRepository->findMerchantById($id);

        $this->setPageTitle('Merchant', 'Edit Merchant : ' . $data->title);
        return view('admin.merchant.edit', compact('data'));
    }
   
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
           'first_name' =>  'required',
            'last_name' =>  'required',
            'email' =>  'required',
            'phone' =>  'required|integer|digits:10',
            'pin_code' =>  'required',
            'address' =>  'required',
            'city' =>  'required',
        ]);

        $params = $request->except('_token');

        //dd($params);

        $data = $this->merchantRepository->updateMerchant($params);

        if (!$data) {
            return $this->responseRedirectBack('Error occurred while updating merchant.', 'error', true, true);
        }
        return $this->responseRedirectBack('Merchant updated successfully', 'success', false, false);
    }

     /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request)
    {

        $params = $request->except('_token');

        $data = $this->merchantRepository->updateMerchantStatus($params);

        if ($data) {
            return response()->json(array('message' => 'Merchant status successfully updated'));
        }
    }
    

    public function updateVerification(Request $request)
    {

        $params = $request->except('_token');

        $data = $this->merchantRepository->updateMerchantVerification($params);

        if ($data) {
            return response()->json(array('message' => 'Verified successfully'));
        }
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = $this->merchantRepository->deleteMerchant($id);

        if (!$data) {
            return $this->responseRedirectBack('Error occurred while deleting merchant.', 'error', true, true);
        }
        return $this->responseRedirect('admin.merchant.index', 'Merchant deleted successfully', 'success', false, false);
    }
}