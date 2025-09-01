<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Company_Jobs;

class CompanyController extends Controller
{
     public function create()
    {
        return view('employer.company.add-company');
    }


     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'logo'  => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }
        
        Company::create([
            'name'       => $request->name,
    'slug'       => Str::slug($request->name),
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'city'       => $request->city,
            'state'      => $request->state,
            'country'    => $request->country,
            'pincode'    => $request->pincode,
            'logo'       => $logoPath,
            'website'    => $request->website,
            'description'=> $request->description,
            'industry'   => $request->industry,
            'team_size'  => $request->team_size,
            'employer_id'=> Auth::guard('employer')->id(),
        ]);

  return redirect()->route('employer.dashboard')->with('success', 'Company added successfully!');
    }


 public function edit($id)
    {
        $company = Company::findOrFail($id);
        if ($company->employer_id !== Auth::guard('employer')->id()) {
            abort(403);
        }
        return view('employer.company.edit', compact('company'));
    }


public function update(Request $request, $id)
{
    $company = Company::findOrFail($id);

    if ($company->employer_id !== Auth::guard('employer')->id()) {
        abort(403);
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:20',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'website' => 'nullable|string',
        'industry' => 'nullable|string',
        'team_size' => 'nullable|integer',
        'address' => 'nullable|string',
    ]);

    $data = $request->except('logo');

    if ($request->hasFile('logo')) {
        $path = $request->file('logo')->store('company_logos', 'public');
        $data['logo'] = $path;
    }

    $company->update($data);

    return redirect()->route('employer.dashboard')->with('success', 'Company updated successfully.');
}

 public function createJob()
    {
        return view('employer.job.add-job');
    }



     public function storeJobs(Request $request)
    {
        try{
        $request->validate([
            'designation' => 'required|string|max:255',
            'description' => 'nullable',
            'requirement' => 'nullable|string|max:20',
            'salary'  => 'nullable',
            'address'  => 'nullable',
            'location' => 'nullable'
        ]);
        Company_Jobs::create([
            'designation'       => $request->designation,
            'address'       => $request->address,
            'description'      => $request->description,
            'requirement'      => $request->requirement,
            'salary'    => $request->salary,
            'location'       => $request->location,
            'employer_id'=> Auth::guard('employer')->id(),
        ]);

  return redirect()->route('employer.dashboard')->with('success', 'Jobs added successfully!');
   } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to add job: ' . $e->getMessage());
    }
    }

    public function getalljob(){
        $employer_id = Auth::guard('employer')->id();
            $alljob = Company_Jobs::where('employer_id', $employer_id)->get();
            $totalJobs = $alljob->count();
            return view('employer.dashboard',compact('alljob','totalJobs'));
    }

    
 public function EditJob($id)
    {
        $jobs = Company_Jobs::findOrFail($id);
        return view('employer.job.edit-job', compact('jobs'));
    }



  public function UpdateJObs(Request $request,$id)
    {
        $jobs = Company_Jobs::findOrFail($id);
       
        $request->validate([
            'designation' => 'required|string|max:255',
            'description' => 'nullable',
            'requirement' => 'nullable|string|max:20',
            'salary'  => 'nullable',
            'address'  => 'nullable',
            'location' => 'nullable'
        ]);
        $jobs->update([
            'designation'       => $request->designation,
            'address'       => $request->address,
            'description'      => $request->description,
            'requirement'      => $request->requirement,
            'salary'    => $request->salary,
            'location'       => $request->location,
            'employer_id'=> Auth::guard('employer')->id(),
        ]);

  return redirect()->route('employer.dashboard')->with('success', 'Jobs Updated successfully!');
  
    }


    public function DeleteJob($job_id)
{
    $job = Company_Jobs::findOrFail($job_id);

    // optional: sirf apne jobs delete karne ki condition
    if ($job->employer_id !== Auth::guard('employer')->id()) {
        abort(403, 'Unauthorized action.');
    }

    $job->delete();

    return redirect()->route('employer.dashboard')
                     ->with('success', 'Job deleted successfully!');
}


}
