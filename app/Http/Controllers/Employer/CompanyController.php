<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
}
