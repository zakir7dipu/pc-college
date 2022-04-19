<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\GeneralSettings;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function __construct()
    {
        Parent::__construct();
    }

    /*
     * dashboard
     */
    public function index()
    {
        try {
            return view('backend.pages.dashboard',[
                'title' => 'My Dashboard',
//                'allUsers' => User::where('user_type', '!=', 1)->count(),
//                'allAdmin' => User::where('user_type', 2)->count(),
//                'allCustomer' => User::where('user_type', 3)->count(),
//                'totalSales' => $this->totalSales()
            ]);
        }catch (\Throwable $th){
            return $this->backWithError($th->getMessage());
        }
    }

    /*
     * profile
     */
    public function profile()
    {
        try {
            $title = 'My profile';
            return view('backend.pages.profile.show', compact('title'));
        }catch (\Throwable $e){
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }

    public function profileUpdate(Request $request)
    {
        try {
            $input = $request->all();
            if ($request->hasFile('photo')){
                $input['photo'] = $request->photo[0];
            }
            $user = Auth::user();

            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'company_name' => ['required', 'string', 'max:255'],
                'designation' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:14', Rule::unique('profiles')->ignore($user->phone)],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            ])->validateWithBag('updateProfileInformation');

            if (isset($input['photo'])) {
                $user->updateProfilePhoto($input['photo']);
            }

            if ($input['email'] !== $user->email &&
                $user instanceof MustVerifyEmail) {
                $this->updateVerifiedUser($user, $input);
            } else {
                $user->forceFill([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                ])->save();
            }

            return $this->backWithSuccess($user->name.'\'s personal information has been updated successfully');
        }catch (\Throwable $e){
            return $this->backWithError($e->getMessage());
        }
    }

    public function profileInfoUpdate(Request $request)
    {
        try {
            $user = Auth::user();

            $this->validate($request, [
                'country' => 'required|string|max:255',
                'district' => 'required|string|max:255',
                'thana' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'post_code' => 'required|string|max:255',
            ]);

            $inputs = $request->all();
            unset($inputs['_token']);
            $user->address->update($inputs);

            return $this->backWithSuccess($user->name.'\'s personal information has been updated successfully');
        }catch (\Throwable $e){
            return $this->backWithError($e->getMessage());
        }
    }

    protected function updateVerifiedUser($user, array $input)
    {
        try {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'email_verified_at' => null,
            ])->save();

            $user->profile->update([
                'company_name' => $input['company_name'],
                'designation' => $input['designation'],
                'phone' => $input['phone'],
            ]);

            $user->sendEmailVerificationNotification();
            return $this->backWithSuccess($user->name.'\'s personal information has been updated successfully');
        }catch (\Throwable $e){
            return $this->backWithError($e->getMessage());
        }
    }
    /*
     * contact message
     */
    public function contactMessageIndex()
    {
        try {
            $generalSettings = GeneralSettings::first();
            $title = ($generalSettings?$generalSettings->site_name:'').' | '.'Contact Message';
            $this->readAllUnreadMessage();
            $contactMessages = ContactMessage::orderBy('id','DESC')->get();
            return view('backend.pages.contact-message.index', compact('title', 'generalSettings', 'contactMessages'));
        }catch (\Throwable $th){
            return $this->backWithError($th->getMessage());
        }
    }
}
