<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Data;
use App\Models\Identification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UserController extends Controller
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
        'email' => 'no@email',
    ];
    public function employee_details()
    {
        $id = session('Employee_user')['employee_id'];

        $employe_identification = Identification::query()->where('employee_id', '=', $id)->first();
        $employe_data = Data::query()->where('employee_id', '=', $id)->first();
        $employe_contacts = Contact::query()->where('employee_id', '=', $id)->first();

        $employe_identification = ($employe_identification) ? $employe_identification : $this->identification;
        $employe_data = ($employe_data) ? $employe_data : $this->data;
        $employe_contacts = ($employe_contacts) ? $employe_contacts : $this->contacts;

        // dd($id);
        // dd($employe_identification);

        return view('employee.details', compact(
            'employe_identification',
            'employe_data',
            'employe_contacts',
        ));
    }

    public function edit_user_employee()
    {
        $id = session('Employee_user')['employee_id'];

        $employe_identification = Identification::query()->where('employee_id', '=', $id)->first();
        $employe_data = Data::query()->where('employee_id', '=', $id)->first();
        $employe_contacts = Contact::query()->where('employee_id', '=', $id)->first();

        $employe_identification = ($employe_identification) ? $employe_identification : $this->identification;
        $employe_data = ($employe_data) ? $employe_data : $this->data;
        $employe_contacts = ($employe_contacts) ? $employe_contacts : $this->contacts;


        return view('employee.user_edit', compact(
            'employe_identification',
            'employe_data',
            'employe_contacts',
        ));
    }

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

        // get the employee information
        $employee = Identification::query()->where('employee_id', '=', $employee_id)->first();
        // authenticate user
        session()->put('Employee_user', $employee);

        // redirects to the results page
        return redirect()->route('details')->with('success', 'Employee (' . $employee_id . ' - ' . $request->firstname . ') is updated.');
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
}
