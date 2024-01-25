<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Stroage;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Company;

class CompanyController extends Controller
{
    public function __construct(
        public Company $company,
    ) {

    }

    public function index()
    {
        $companies = $this->company->all();

        return view(
            'ojt-coordinator.ojt-coordinator-companies',
            [
                'companies' => $companies
            ]
        );
    }

    public function createCompany(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'companyName' => 'required',
            'address' => 'required',
            'companyContact' => 'required',
            'contactEmail' => 'required',
            'contactNumber' => 'required',
            'validityPeriod' => 'nullable',
            'moaFile' => 'required',
            // 'signedDate' => 'nullable',
            // 'assignedStudents' => 'nullable'

        ]);

        if($validator->fails())
        {
            $data = [
                'status' => 422,
                'message' => $validator->messages()
            ];

            return response()->json($data, 422);
        } else
        {

            $file = $request->moaFile;

            $fileName = time().'.'.$file->getClientOriginalName();

            $request->moaFile->move('assets', $fileName);

            $this->company->create([

                'companyName' => $request->companyName,
                'address' => $request->address,
                'companyContact' => $request->companyContact,
                'contactEmail' => $request->contactEmail,
                'contactNumber' => $request->contactNumber,
                'validityPeriod' => $request->validityPeriod,
                'moaFile' => $fileName
                // 'signedDate' => $request->signedDate,
                // 'assignedStudents' => $request->assignedStudents

            ]);

            Alert::success('Company added successfully', 'Company added');

        }

        return redirect()->route('ojt-coordinator-companies');
    }

    public function showSpecific($companyId)
    {
        $specificCompany = $this->company->where('companyId',$companyId)->first();

        return view(
            'ojt-coordinator.view-company',
            [
                'specificCompany' => $specificCompany
            ]
        );
    }

    public function showSpecificForEdit($companyId)
    {
        $specificCompany = $this->company->where('companyId',$companyId)->first();

        return view(
            'ojt-coordinator.edit-company',
            [
                'specificCompany' => $specificCompany
            ]
        );
    }

}
