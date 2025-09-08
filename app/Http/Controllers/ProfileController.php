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
use App\Models\user_detail;
use App\Models\Resume;

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

public function editContact(){
$userid = Auth::user()->id;
   $user = User::with('user_detail')->find($userid); 
    $data = $user->toArray();

    if ($user->user_detail) {
        // ensure always array
        $detail = $user->user_detail->toArray();
        $data = array_merge($data, $detail);
    }

    return view('profile.edit-contact', ['user' => $data]);
}
public function updateContact(Request $request)
{
    $userid = Auth::id();

    $data = $request->only([
        'first_name', 'last_name', 'headline', 'phone',
        'location', 'city', 'pin_code', 'show_phone_status', 'relocation'
    ]);

    $data['show_phone_status'] = $request->has('show_phone_status') ? 1 : 0;

    $userDetail = user_detail::where('user_id', $userid)->first();

    if ($userDetail) {
        $userDetail->update($data);
    } else {
        // $data['user_id'] = $userid;
        // UserDetail::create($data);
    }

    return response()->json([
        'success' => true,
        'message' => 'Contact information updated successfully!'
    ]);
}


public function editResume()
{
    $userid = Auth::user()->id;
    $user = User::with('resume')->find($userid); 

    return view('profile.edit-resume', ['user' => $user]);
}


public function updateResume(Request $request)
{
    $request->validate([
        'resume' => 'required|mimes:pdf|max:2048',
    ]);

    $userid = Auth::id();
    $fileName = time() . '.' . $request->resume->extension();
   $request->resume->storeAs('resumes', $fileName, 'public');

    Resume::updateOrCreate(
        ['user_id' => $userid],
        ['resume' => $fileName]
    );

    return response()->json([
        'success' => true,
        'message' => 'Resume uploaded successfully!',
    ]);
}



}
