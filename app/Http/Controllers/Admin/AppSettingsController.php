<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use App\Models\PaymentMethod;
use App\Models\SocialMediaLink;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AppSettingsController extends Controller
{
    public function __construct()
    {
        Parent::__construct();
    }
    /*
     * General Settings
     */
    public function index()
    {
        try {
            $generalSettings = GeneralSettings::first();
            $title = ($generalSettings?$generalSettings->site_name:'').' | '.'General Settings';
            return view('backend.pages.settings.general-settings', compact('title', 'generalSettings'));
        }catch (\Throwable $th){
            return $this->backWithError($th->getMessage());
        }
    }

    public function storeGeneralSettings(Request $request)
    {
        $this->validate($request, [
            'site_name' => 'required|string|max:50',
            'location_map' => 'required|string',
        ]);
        try {
            $inputs = $request->all();
            unset($inputs['_token']);

            $generalSettings = GeneralSettings::first()?GeneralSettings::first(): null;

            if ($request->hasFile('logo')) {
                if ($generalSettings?$generalSettings->logo:''){
                    $path = $generalSettings->logo;
                    if (file_exists(public_path($path))){
                        unlink(public_path($path));
                    }
                }

                $images = $request->logo;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 6) . 'DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                }
                Image::make($image->getRealPath())
                    ->resize(150, 50)
                    ->save(public_path('/upload/settings/' . $filename));
                $path = "/upload/settings/".$filename;
                $inputs['logo'] = $path;
            }

            if ($request->hasFile('favicon')) {
                if ($generalSettings?$generalSettings->favicon:''){
                    $path = $generalSettings->favicon;
                    if (file_exists(public_path($path))){
                        unlink(public_path($path));
                    }
                }

                $images = $request->favicon;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 6) . 'DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                }
                Image::make($image->getRealPath())
                    ->resize(64, 20)
                    ->save(public_path('/upload/settings/' . $filename));
                $path = '/upload/settings/'.$filename;
                $inputs['favicon'] = $path;
            }

            if ($request->hasFile('site_tag_image')) {
                if ($generalSettings?$generalSettings->site_tag_image:''){
                    $path = $generalSettings->site_tag_image;
                    if (file_exists(public_path($path))){
                        unlink(public_path($path));
                    }
                }

                $images = $request->site_tag_image;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 6) . 'DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                }
                Image::make($image->getRealPath())
                    ->resize(150, 50)
                    ->save(public_path('/upload/settings/' . $filename));
                $path = '/upload/settings/'.$filename;
                $inputs['site_tag_image'] = $path;
            }

            $cleanValues = [];
            foreach ($inputs as $key => $input){
                $cleanValues [$key] = clean($input);
            }

            if (!$generalSettings){
                GeneralSettings::create($cleanValues);
            }else{
                $generalSettings->update($cleanValues);
            }

            $env = base_path('.env');


            if ($request->hasFile('site_tag_image')) {
                if (file_exists($env)) {
                    file_put_contents($env, str_replace(
                        'APP_LOGO=' . env("APP_LOGO"), 'APP_LOGO=' . $cleanValues['site_tag_image'], file_get_contents($env)
                    ));
                }
            }

            return $this->backWithSuccess('General settings saved successfully');
        }catch (\Throwable $th){
            return $this->backWithError($th->getMessage());
        }
    }
    /*
     * SMTP Settings
     */
    public function smtpIndex(){
        try {
            $generalSettings = GeneralSettings::first();
            $title = ($generalSettings?$generalSettings->site_name:'').' | '.'SMTP Settings';
            return view('backend.pages.settings.smtp-settings', compact('title', 'generalSettings'));
        }catch (\Throwable $th){
            return $this->backWithError($th->getMessage());
        }
    }

    public function storeSmtpSettings(Request $request)
    {
        $this->validate($request,[
            'mail_driver' => ['required', 'string'],
            'mail_host' => ['required', 'string'],
            'mail_port' => ['required', 'string'],
            'mail_username' => ['required', 'string'],
            'mail_password' => ['required', 'string'],
            'mail_encryption' => ['required', 'string'],
        ]);
        try {
            $path = base_path('.env');

            if (file_exists($path)) {
                file_put_contents($path, str_replace(
                    'MAIL_MAILER='.env("MAIL_MAILER"), 'MAIL_MAILER='.clean($request->mail_driver), file_get_contents($path)
                ));
                file_put_contents($path, str_replace(
                    'MAIL_HOST='.env("MAIL_HOST"), 'MAIL_HOST='.clean($request->mail_host), file_get_contents($path)
                ));
                file_put_contents($path, str_replace(
                    'MAIL_PORT='.env("MAIL_PORT"), 'MAIL_PORT='.clean($request->mail_port), file_get_contents($path)
                ));
                file_put_contents($path, str_replace(
                    'MAIL_USERNAME='.env("MAIL_USERNAME"), 'MAIL_USERNAME='.clean($request->mail_username), file_get_contents($path)
                ));
                file_put_contents($path, str_replace(
                    'MAIL_PASSWORD='.env("MAIL_PASSWORD"), 'MAIL_PASSWORD='.clean($request->mail_password), file_get_contents($path)
                ));
                file_put_contents($path, str_replace(
                    'MAIL_ENCRYPTION='.env("MAIL_ENCRYPTION"), 'MAIL_ENCRYPTION='.clean($request->mail_encryption), file_get_contents($path)
                ));
                file_put_contents($path, str_replace(
                    'MAIL_FROM_ADDRESS='.env("MAIL_FROM_ADDRESS"), 'MAIL_FROM_ADDRESS='.clean($request->mail_username), file_get_contents($path)
                ));
            }
            return $this->backWithSuccess('SMTP Settings are saved successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return $this->backWithSuccess('Success');
    }
    /*
     * API Settings
     */
    public function apiIndex(){
        try {
            $generalSettings = GeneralSettings::first();
            $title = ($generalSettings?$generalSettings->site_name:'').' | '.'API Settings';
            return view('backend.pages.settings.api-settings', compact('title', 'generalSettings'));
        }catch (\Throwable $th){
            return $this->backWithError($th->getMessage());
        }
    }

    public function storeApiSettings(Request $request)
    {
        try {
            $path = base_path('.env');

            if (file_exists($path)) {
                //google
                if ($request->google_client_id && $request->google_client_secret){
                    file_put_contents($path, str_replace(
                        'GOOGLE_CLIENT_ID='.env("GOOGLE_CLIENT_ID"), 'GOOGLE_CLIENT_ID='.clean($request->google_client_id), file_get_contents($path)
                    ));
                    file_put_contents($path, str_replace(
                        'GOOGLE_CLIENT_SECRET='.env("GOOGLE_CLIENT_SECRET"), 'GOOGLE_CLIENT_SECRET='.clean($request->google_client_secret), file_get_contents($path)
                    ));
                }

                //facebook
                if ($request->facebook_client_id && $request->facebook_client_secret) {
                    file_put_contents($path, str_replace(
                        'FACEBOOK_CLIENT_ID=' . env("FACEBOOK_CLIENT_ID"), 'FACEBOOK_CLIENT_ID=' . clean($request->facebook_client_id), file_get_contents($path)
                    ));
                    file_put_contents($path, str_replace(
                        'FACEBOOK_CLIENT_SECRET=' . env("FACEBOOK_CLIENT_SECRET"), 'FACEBOOK_CLIENT_SECRET=' . clean($request->facebook_client_secret), file_get_contents($path)
                    ));
                }
            }

            return $this->backWithSuccess('API Settings are saved successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return $this->backWithSuccess('Success');
    }
    /*
     * SMS Settings
     */
    public function smsIndex(){
        try {
            $generalSettings = GeneralSettings::first();
            $title = ($generalSettings?$generalSettings->site_name:'').' | '.'SMS Settings';
            return view('backend.pages.settings.sms-settings', compact('title', 'generalSettings'));
        }catch (\Throwable $th){
            return $this->backWithError($th->getMessage());
        }
    }

    public function storeSmsSettings(Request $request)
    {
        $this->validate($request, [
            'url' => ['required', 'string'],
            'auth_key' => ['required', 'string'],
            'sender_id' => ['required', 'string'],
            'route' => ['required', 'string'],
        ]);
        try {
            $path = base_path('.env');

            if (file_exists($path)) {
                //SMS
                file_put_contents($path, str_replace(
                    'SMS_API_URL='.env("SMS_API_URL"), 'SMS_API_URL='.$request->url, file_get_contents($path)
                ));
                file_put_contents($path, str_replace(
                    'SMS_AUTH_KEY='.env("SMS_AUTH_KEY"), 'SMS_AUTH_KEY='.$request->auth_key, file_get_contents($path)
                ));
                file_put_contents($path, str_replace(
                    'SMS_SENDER_ID=' . env("SMS_SENDER_ID"), 'SMS_SENDER_ID=' . $request->sender_id, file_get_contents($path)
                ));
                file_put_contents($path, str_replace(
                    'SMS_ROUGHT=' . env("SMS_ROUGHT"), 'SMS_ROUGHT=' . $request->route, file_get_contents($path)
                ));
            }

            return $this->backWithSuccess('SMS Settings are saved successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return $this->backWithSuccess('Success');
    }
    /*
     * Social Media Link
     */
    public function socialMediaLinkIndex()
    {
        try {
            $generalSettings = GeneralSettings::first();
            $title = ($generalSettings?$generalSettings->site_name:'').' | '.'Social Media Link Settings';

            return view('backend.pages.settings.social-media', compact('title', 'generalSettings'));
        }catch (\Throwable $th){
            return $this->backWithError($th->getMessage());
        }
    }

    public function storeSocialMediaLink(Request $request)
    {
        try {
            $inputs = $request->all();
            unset($inputs['_token']);
            foreach ($inputs as $key => $value){
                if ($value != null) {
                    if (!str_contains($value, 'https://')) {
                        $value = 'https://' . $value;
                    }
                }else{
                    $value = null;
                }
                SocialMediaLink::where('name',$key)->update(['url' => $value?clean($value):$value]);
            }
            return $this->backWithSuccess('Social Media Settings created successfully.');

        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }
    /*
    * payment settings
    */
    public function paymentIndex()
    {
        try {
            $generalSettings = GeneralSettings::first();
            $title = ($generalSettings?$generalSettings->site_name:'').' | Payment Settings';
            $payments = PaymentMethod::all();
            return view('backend.pages.settings.payment-settings', compact('title', 'generalSettings', 'payments'));
        }catch (\Throwable $th){
            return $this->backWithError($th->getMessage());
        }
    }
}
