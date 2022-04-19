<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodInputController extends Controller
{
    public function __construct()
    {
        Parent::__construct();
    }

    public function getMethodForm(PaymentMethod $payment)
    {
        if ($payment->name === 'cash_on_delivery'){
            return response()->json($this->cashOnDelivery($payment));
        }
        else if ($payment->name === "money_transfer"){
            return response()->json($this->moneyTransfer($payment));
        }
        else if ($payment->name === "bKash"){
            return response()->json($this->bKashPayment($payment));
        }
        else {
            return response()->json($this->nagadAndRoketPayment($payment));
        }
    }

    public function cashOnDelivery($payment)
    {
        return $output = '<form action="'.route('admin.settings.payment.store',$payment->id).'" method="post">
        <input type="hidden" name="_token" value="'.csrf_token().'">
        <p class="mb-1 text-uppercase"><label for="methodStatus">'.__('Activation').'</label>: </p>
        <div class="input-group input-group-lg mb-3 text-center">
            <label class="switch">
                <input type="checkbox" name="status" '.($payment->status?'checked':'').' class="methodActivationBtn">
                <span class="slider round"></span>
            </label>
        </div>
    </form>';
    }

    public function moneyTransfer($payment)
    {
        return $output = '<form action="'.route('admin.settings.payment.store',$payment->id).'" method="post">
        <input type="hidden" name="_token" value="'.csrf_token().'">
        <p class="mb-1 text-uppercase"><label for="methodStatus">'.__('Activation').'</label>: </p>
        <div class="input-group input-group-lg mb-3 text-center">
            <label class="switch">
                <input type="checkbox" name="status" '.($payment->status?'checked':'').' class="methodActivationBtn">
                <span class="slider round"></span>
            </label>
        </div>

        <p class="mb-1 text-uppercase"><label for="username">'.__('Username').'</label>: </p>
        <div class="input-group input-group-lg mb-3 text-center">
            <input type="text" name="username" class="form-control" id="username" value="'.env('SHURJO_PAY_USERNAME').'">
        </div>
        <p class="mb-1 text-uppercase"><label for="password">'.__('Password').'</label>: </p>
        <div class="input-group input-group-lg mb-3 text-center">
            <input type="text" name="password" class="form-control" id="password" value="'.env('SHURJO_PAY_PASSWORD').'">
        </div>
        <p class="mb-1 text-uppercase"><label for="orderPerfix">'.__('Order Perfix').'</label>: </p>
        <div class="input-group input-group-lg mb-3 text-center">
            <input type="text" name="order_perfix" class="form-control" id="orderPerfix" value="'.env('SHURJO_PAY_ORDER_PERFIX').'">
        </div>
    </form>';
    }

    public function bKashPayment($payment)
    {
        return $output = '<form action="'.route('admin.settings.payment.store',$payment->id).'" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="'.csrf_token().'">
        <p class="mb-1 text-uppercase"><label for="methodStatus">'.__('Activation').'</label>: </p>
        <div class="input-group input-group-lg mb-3 text-center">
            <label class="switch">
                <input type="checkbox" name="status" '.($payment->status?'checked':'').' class="methodActivationBtn">
                <span class="slider round"></span>
            </label>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <p class="mb-1 text-uppercase"><label for="qrCode">'.__('Qr Code').'</label>: </p>
                <div class="input-group input-group-lg mb-3 text-center">
                    <input type="file" name="content" id="qrCode" class="form-control" onChange="img_pathUrl(this);">
                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="'.($payment->content? asset($payment->content):'').'" alt="" id="modalImageShow" class="img-fluid img-thumbnail w-50" accept="image/png, image/jpeg"/>
            </div>
        </div>
    </form>';
    }

    public function nagadAndRoketPayment($payment)
    {
        return $output = '<form action="'.route('admin.settings.payment.store',$payment->id).'" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="'.csrf_token().'">
        <p class="mb-1 text-uppercase"><label for="methodStatus">'.__('Activation').'</label>: </p>
        <div class="input-group input-group-lg mb-3 text-center">
            <label class="switch">
                <input type="checkbox" name="status" '.($payment->status?'checked':'').' class="methodActivationBtn">
                <span class="slider round"></span>
            </label>
        </div>

        <p class="mb-1 text-uppercase"><label for="methodNumber">'.__('Phone Number').'</label>: </p>
        <div class="input-group input-group-lg mb-3 text-center">
            <input type="tel" name="number" id="methodNumber" class="form-control" value="'.($payment->number?$payment->number:'').'">
        </div>
    </form>';
    }

    public function storePayment(Request $request, PaymentMethod $payment)
    {
        try {
            $input = $request->all();
            unset($input['_token']);

            if ($request->hasFile('content')){
                if ($payment->content){
                    $path = $payment->content;
                    if (file_exists(public_path($path))){
                        unlink(public_path($path));
                    }
                }
                $fileName = time().'_'.$payment->name.'.'.$request['content']->getClientOriginalExtension();

                $request['content']->move(public_path('upload/payment-qrcode'), $fileName);
                $qr = '/upload/payment-qrcode/'.$fileName;
                $input['content'] = $qr;
            }else{
                unset($input['content']);
            }

            if ($request->has('status')){
                $input['status'] = true;
            }else{
                $input['status'] = false;
            }

            if ($request->has('username') && $request->has('password')){
                $env = base_path('.env');
                if (file_exists($env)) {
                    file_put_contents($env, str_replace(
                        'SHURJO_PAY_USERNAME=' . env("SHURJO_PAY_USERNAME"), 'SHURJO_PAY_USERNAME=' . $input['username'], file_get_contents($env)
                    ));
                    file_put_contents($env, str_replace(
                        'SHURJO_PAY_PASSWORD=' . env("SHURJO_PAY_PASSWORD"), 'SHURJO_PAY_PASSWORD=' . $input['password'], file_get_contents($env)
                    ));
                    if ($request->order_perfix) {
                        file_put_contents($env, str_replace(
                            'SHURJO_PAY_ORDER_PERFIX=' . env("SHURJO_PAY_ORDER_PERFIX"), 'SHURJO_PAY_ORDER_PERFIX=' . $input['order_perfix'], file_get_contents($env)
                        ));
                    }
                }
                unset($input['username']);
                unset($input['password']);
                if ($request->has('order_perfix')){
                    unset($input['order_perfix']);
                }
            }

            $payment->update($input);
            return $this->backWithSuccess('Saved successfully.....');
        }catch (\Throwable $th){
            return response()->json($th->getMessage());
        }
    }
}
