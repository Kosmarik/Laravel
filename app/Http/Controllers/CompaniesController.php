<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use App\Tasks;
use NumberToWords\NumberToWords;
use PDF;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $companies = Companies::all();
        return view('companies.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Companies();
        $company->company_name = $request->company_name;
        $company->address = $request->company_address;
        $company->company_code = $request->company_code;
        $company->vat_code = $request->vat_code;
        $company->save();
        return redirect('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data['company'] = Companies::find($id);
        $tasks = Tasks::where('client_id', $id)->get();

        foreach ($tasks as $task){
            if($task->active == 1){
                $data['tasks'][] = $task;
            }
        }


        return view('companies.single',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Companies::find($id);

        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Companies::where('id',$id)->update([
            'company_name' => $request->company_name,
            'address' => $request->company_address,
            'company_code' => $request->company_code,
            'vat_code' => $request->vat_code
        ]);
        return redirect(route('companies.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function faktura( Request $request){
        if(empty($request->checkboxArray) && empty($request->task_id)){

            return redirect("http://185.80.130.158/companies/$request->id");

        }
        if(empty($request->checkboxArray)){
            $task_id = $request->task_id;
            $data['tasks'][] = Tasks::find($task_id);
        }
        else{
            $task_id = $request->checkboxArray;
            foreach ($task_id as $task) {
                $data['tasks'][] = Tasks::find($task);
            }
        }
//        echo '<pre>';
//        print_r($data['task']);
        $company_id = $request->id;
//
        $data['company'] = Companies::find($company_id);

        //$data['tasks'] = Tasks::find($task_id);


        return view('companies.invoice', $data);
    }

    public function pdfview(Request $request)
    {
        $data['company'] = Companies::find($request->id);

        foreach ($request->task_id as $taskID){
            $data['tasks'][] = Tasks::find($taskID);
        }
//
        view()->share('companies.invoicePDF',$data);
//
        if($request->has('download')){
            // Set extra option
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
            $pdf = PDF::loadView('companies.invoicePDF', $data);
            // download pdf
            return $pdf->download('pdfview.pdf');
        }
        return view('companies.invoicePDF', $data);
    }

}
