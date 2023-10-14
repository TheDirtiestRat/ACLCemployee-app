<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Data;
use App\Models\Employee;
use App\Models\EmployeeIdentification;
use App\Models\Identification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    var $identification = [
        'employee_id' => 'employee id test',
        'firstname' => 'firstname',
        'middlename' => 'middlename',
        'surname' => 'surname',

        'birth_date' => 'birth_date',
        'gender' => 'gender',

        'birth_place' => 'birth place',
        'bloodtype' => 'bloodtype',
        'created_at' => 'mm/dd/yyy time',
    ];

    var $data = [
        'employee_id' => 'employee id data',
        'maiden_name' => 'maiden_name',
        'civilstatus' => 'civilstatus',
        'citizenship' => 'citizenship',
        'religion' => 'religion',

        'address' => 'address',
        'tin_no' => '000000000',
        'sss_no' => '000000000',
        'pagibig_no' => '000000000',
    ];

    var $contacts = [
        'employee_id' => 'employee id',
        'tel_no' => '00000000000',
        'cell_no' => '00000000000',
        'email' => 'no email',
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Identification::query()->paginate(16);

        return view('employee.list', compact('employees'));
    }

    public function print_pdf_employee_list()
    {
        $employees = Identification::query()->limit(100)->get();

        // print by pdd
        $pdf = Pdf::loadView('pdf.employee_list', compact('employees'));
        // download the pdf
        $pdf->download('pdf.employee_list');
        // then stream it
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form input
        $request->validate([
            // 'photo' => 'required|mimes:png,jpg,jpeg|max:5048',
            'firstname' => 'required',
            'surname' => 'required',

            'birth_date' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'address' => 'required',
            'citizenship' => 'required',
        ]);

        // generate a random employee id
        $employee_id = fake()->unique()->numerify('0########');

        $middlename = $request->input('middlename');
        $bloodtype = $request->input('blood_type');

        // dd(empty($middlename)? '' : $middlename);

        // adding the information to the database
        Identification::create([
            'employee_id' => $employee_id,
            'firstname' => $request->input('firstname'),
            'middlename' => empty($middlename) ? '.' : $middlename,
            'surname' => $request->input('surname'),

            'birth_date' => $request->input('birth_date'),
            'gender' => $request->input('gender'),

            'birth_place' => $request->input('birth_place'),
            'bloodtype' => empty($bloodtype) ? 'O+' : $bloodtype,
        ]);

        $if_married =  $request->input('maiden_name');
        $civilstatus =  $request->input('civilstatus');
        $tin_no =  $request->input('tin_no');
        $sss_no =  $request->input('sss_no');
        $pagibig_no =  $request->input('pag-ibig_no');

        Data::create([
            'employee_id' => $employee_id,
            'maiden_name' => empty($if_married) ? 'N/A' : $if_married,
            'civilstatus' => empty($civilstatus) ? 'Single' : $civilstatus,
            'citizenship' => $request->input('citizenship'),
            'religion' => $request->input('religion'),

            'address' => $request->input('address'),
            'tin_no' => empty($tin_no) ? 000000000 : $tin_no,
            'sss_no' => empty($sss_no) ? 000000000 : $sss_no,
            'pagibig_no' => empty($pagibig_no) ? 000000000 : $pagibig_no,
        ]);

        $tel_no =  $request->input('tel_no');
        $cell_no =  $request->input('cell_no');
        $email =  $request->input('email');

        Contact::create([
            'employee_id' => $employee_id,
            'tel_no' => empty($tel_no) ? 00000000000 : $tel_no,
            'cell_no' => empty($cell_no) ? 00000000000 : $cell_no,
            'email' => empty($email) ? 'no email' : $email,
        ]);

        // DB::table('identification')->insert();

        // redirects to the results page
        return redirect()->route('employee.create')->with('success', 'Employee (' . $employee_id . ' - ' . $request->firstname . ') added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employe_identification = Identification::query()->where('employee_id', '=', $id)->get(['*']);
        $employe_data = Data::query()->where('employee_id', '=', $id)->get(['*']);
        $employe_contacts = Contact::query()->where('employee_id', '=', $id)->get(['*']);

        $employe_identification = ($employe_identification->count() > 0) ? $employe_identification[0] : $this->identification;
        $employe_data = ($employe_data->count() > 0) ? $employe_data[0] : $this->data;
        $employe_contacts = ($employe_contacts->count() > 0) ? $employe_contacts[0] : $this->contacts;

        // dd(Data::query()->where('employee_id', '=', $id)->first());

        return view('employee.show', compact(
            'employe_identification',
            'employe_data',
            'employe_contacts',
        ));
    }

    public function print_pdf_employee_data(string $id)
    {
        $employe_identification = Identification::query()->where('employee_id', '=', $id)->get(['*']);
        $employe_data = Data::query()->where('employee_id', '=', $id)->get(['*']);
        $employe_contacts = Contact::query()->where('employee_id', '=', $id)->get(['*']);

        $employe_identification = ($employe_identification->count() > 0) ? $employe_identification[0] : $this->identification;
        $employe_data = ($employe_data->count() > 0) ? $employe_data[0] : $this->data;
        $employe_contacts = ($employe_contacts->count() > 0) ? $employe_contacts[0] : $this->contacts;

        // dd(Data::query()->where('employee_id', '=', $id)->first());

        // print by pdd
        $pdf = Pdf::loadView('pdf.employee_sheet', compact(
            'employe_identification',
            'employe_data',
            'employe_contacts',
        ));
        // download the pdf
        $pdf->download('invoice.pdf');
        // then stream it
        return $pdf->stream();
    }

    // search for the employee according to the key search
    public function search(Request $request)
    {
        // if there is a request
        if ($request->ajax()) {
            $output = '';
            // search for the employee
            $employees = Identification::query()->where('firstname', 'LIKE', '%' . $request->key . '%')->orWhere('middlename', 'LIKE', '%' . $request->key . '%')->orWhere('surname', 'LIKE', '%' . $request->key . '%')->limit(10)->get();

            // if found similar
            if ($employees->count() > 0) {
                foreach ($employees as $key => $employee) {
                    $output .=
                        '<div class="col-auto p-0">
                        <div class="bg-white shadow m-2 p-3 rounded-3 text-center">
                            <img src="' . asset('storage/images/aclc.png') . '" class="img-fit rounded-4 mb-1" alt="" width="170"
                                height="170">
                            <p class="m-0">' . $employee->firstname . ' ' . $employee->surname . ' </p>
                            <a href="'. route("employee.show", $employee->employee_id). '" class="text-decoration-none">
                                <button class="btn btn-dark shadow d-block w-100 mb-2">' . $employee->employee_id . '</button>
                            </a>
                        </div>
                    </div>';
                }
            } else {
                $output .=
                    '<div class="col-auto p-0">
                        <h2 class="text-center">No Employee Found</h2>
                    </div>';
            }
            return response()->json($output);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employe_identification = Identification::query()->where('employee_id', '=', $id)->get(['*']);
        $employe_data = Data::query()->where('employee_id', '=', $id)->get(['*']);
        $employe_contacts = Contact::query()->where('employee_id', '=', $id)->get(['*']);

        $employe_identification = ($employe_identification->count() > 0) ? $employe_identification[0] : $this->identification;
        $employe_data = ($employe_data->count() > 0) ? $employe_data[0] : $this->data;
        $employe_contacts = ($employe_contacts->count() > 0) ? $employe_contacts[0] : $this->contacts;


        return view('employee.edit', compact(
            'employe_identification',
            'employe_data',
            'employe_contacts',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form input
        $request->validate([
            // 'photo' => 'required|mimes:png,jpg,jpeg|max:5048',
            'firstname' => 'required',
            'surname' => 'required',

            'birth_date' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'address' => 'required',
            'citizenship' => 'required',
        ]);

        // generate a random employee id
        $employee_id = $id;

        $middlename = $request->input('middlename');
        $bloodtype = $request->input('blood_type');

        // dd(empty($middlename)? '' : $middlename);

        // adding the information to the database
        $employe_identification = Identification::query()->where('employee_id', '=', $employee_id)->update([
            'firstname' => $request->input('firstname'),
            'middlename' => empty($middlename) ? '.' : $middlename,
            'surname' => $request->input('surname'),

            'birth_date' => $request->input('birth_date'),
            'gender' => $request->input('gender'),

            'birth_place' => $request->input('birth_place'),
            'bloodtype' => empty($bloodtype) ? 'O+' : $bloodtype,
        ]);

        $if_married =  $request->input('maiden_name');
        $civilstatus =  $request->input('civilstatus');
        $tin_no =  $request->input('tin_no');
        $sss_no =  $request->input('sss_no');
        $pagibig_no =  $request->input('pag-ibig_no');

        $employe_data = Data::query()->where('employee_id', '=', $id)->update([
            'employee_id' => $employee_id,
            'maiden_name' => empty($if_married) ? 'N/A' : $if_married,
            'civilstatus' => empty($civilstatus) ? 'Single' : $civilstatus,
            'citizenship' => $request->input('citizenship'),

            'address' => $request->input('address'),
            'tin_no' => empty($tin_no) ? 000000000 : $tin_no,
            'sss_no' => empty($sss_no) ? 000000000 : $sss_no,
            'pagibig_no' => empty($pagibig_no) ? 000000000 : $pagibig_no,
        ]);

        $tel_no =  $request->input('tel_no');
        $cell_no =  $request->input('cell_no');
        $email =  $request->input('email');

        $employe_contacts = Contact::query()->where('employee_id', '=', $id)->update([
            'employee_id' => $employee_id,
            'tel_no' => empty($tel_no) ? 00000000000 : $tel_no,
            'cell_no' => empty($cell_no) ? 00000000000 : $cell_no,
            'email' => empty($email) ? 'no email' : $email,
        ]);

        // dd($employe_identification);

        // redirects to the results page
        return redirect()->route('employee.index')->with('success', 'Employee (' . $employee_id . ' - ' . $request->firstname . ') is updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee_identification = Identification::query()->where('employee_id', '=', $id)->first();
        $employe_data = Data::query()->where('employee_id', '=', $id)->first();
        $employe_contacts = Contact::query()->where('employee_id', '=', $id)->first();

        $employee_name = $employee_identification->firstname;
        $employee_id = $employee_identification->employee_id;

        // delete the records in the database
        Identification::query()->where('employee_id', '=', $id)->delete();
        Data::query()->where('employee_id', '=', $id)->delete();
        Contact::query()->where('employee_id', '=', $id)->delete();

        // redirects to the results page
        return redirect()->route('employee.index')->with('success', 'Employee (' . $employee_id . ' - ' . $employee_name . ') is deleted.');
    }
}
