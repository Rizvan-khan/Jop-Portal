<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Company_Jobs;
use App\Models\JobSave;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

  public function getalljobs(Request $request)
{
    $query = Company_Jobs::query();

    // Keyword filter (designation column me search karega)
    if ($request->filled('keyword')) {
        $query->where('designation', 'like', '%' . $request->keyword . '%');
    }

    // Location filter
    if ($request->filled('location') && $request->location !== 'Location') {
        $query->where('location', 'like', '%' . $request->location . '%');
    }

    if ($request->filled('time')) {
    $query->where('address', 'like', '%' . $request->time . '%');
}

    $alljobs = $query->get();

    return view('dashboard', compact('alljobs'));
}

public function saveJob(Request $request,$job_id){
    $userid = Auth::user()->id;

$alreadysave = JobSave::where('user_id',$userid)->where('job_id',$job_id)->exists();

if($alreadysave){
 return redirect()->route('dashboard')
                     ->with('error', 'Job already saved successfully!');
}

    JobSave::create([
        'user_id' =>$userid,
        'job_id' =>$job_id
    ]);

    return redirect()->route('dashboard')
                     ->with('success', 'Job saved successfully!');
}

public function removejobs(Request $request,$job_id){
    $userid = Auth::user()->id;
    JobSave::where('user_id',$userid)->where('id',$job_id)->delete();
    return redirect()->route('job.save-job')
                     ->with('success', 'Job removed!');
}

public function Getallsavejob(){
    $userid = Auth::user()->id;
   $alljob = Auth::user()
                  ->savedJobs()
                  ->with('job')
                  ->get();
    return view('job.save-job',compact('alljob'));
}

public function sendjobapplication(){
    return view('job.application');
}
public function userprofile(){
    return view('profile');
}


}
