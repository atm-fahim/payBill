<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\CustomerMemberShipRepo;
use App\Interfaces\Repo\Backend\CustomerRepo;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class CustomerController extends BaseController
{
    private $cusRepo;
    use UserAccessTraits;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CustomerRepo $cusRepo)
    {
        $this->middleware('auth');
        $this->cusRepo = $cusRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData = $this->userAccessFunction();
        $orgId = auth()->user()->org_id;
        $branchId = auth()->user()->branch_id;
        $cusMemberShipData = $this->cusRepo->infoByOrgIdBranchId($orgId,$branchId);
        return view('backend.customer.customer')->with('customer', $cusMemberShipData)
                                                    ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {

        $data = array();
        $validation = $this->cusRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                             = $request->input('id');
            $code                           = $request->input('code');
            $data['org_id']                 = auth()->user()->org_id;
            $data['branch_id']              = auth()->user()->branch_id;
            $data['customer_name']   = $request->input('customer_name');
            $data['address']                = $request->input('address');
            $data['phone_number']           = $request->input('phone_number');
            $data['password']               = Hash::make('123456789');
            $data['slug']                   = Str::slug($data['customer_member_name']);
            $data['code']                   = (!empty($code))?$code:$this->generateRandomString($data['customer_name']);
            (!empty($id)) ? $this->cusRepo->update($id, $data) : $this->cusRepo->save($data);
            return Redirect::to('customer');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function edit($id)
    {
        $supplierData = $this->cusRepo->findById($id);
        echo json_encode($supplierData);
    }

    public function active($id)
    {
        $this->cusRepo->update($id, ['status' => 1]);
        return redirect('customer');
    }

    public function inActive($id)
    {
        $this->cusRepo->update($id, ['status' => 0]);
        return redirect('customer');
    }

    public function delete($id)
    {
        $this->cusRepo->update($id, ['status' => 9]);
        return redirect('customer');
    }
}
