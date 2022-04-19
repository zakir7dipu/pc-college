<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\DistrictList;
use App\Models\GeneralSettings;
use App\Models\SocialMediaLink;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $generalSettings = GeneralSettings::first();
        $unreadContactMessages = ContactMessage::where('status', false)->get();
        $districts = DistrictList::all();
        $socialMediaLinks = SocialMediaLink::all();
        View::share('generalSettings', $generalSettings);
        View::share('unreadContactMessages', $unreadContactMessages);
        View::share('districts', $districts);
        View::share('socialMediaLinks', $socialMediaLinks);
    }

    public function backWithError($message)
    {
        $notification = [
            'message' => $message,
            'alert-type' => 'error'
        ];
        return back()->with($notification);
    }

    public function backWithSuccess($message)
    {
        $notification = [
            'message' => $message,
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }

    public function backWithWarning($message)
    {
        $notification = [
            'message' => $message,
            'alert-type' => 'warning'
        ];
        return back()->with($notification);
    }

    public function redirectBackWithWarning($message, $route)
    {
        $notification = [
            'message' => $message,
            'alert-type' => 'warning'
        ];
        return redirect()->route($route)->with($notification);
    }

    public function redirectBackWithSuccess($message, $route, $data=null)
    {
        $notification = [
            'message' => $message,
            'alert-type' => 'success'
        ];
        return redirect()->route($route)->with($notification);
    }

    public function redirectBackWithError($message, $route)
    {
        $notification = [
            'message' => $message,
            'alert-type' => 'error'
        ];
        return redirect()->route($route)->with($notification);
    }
}
