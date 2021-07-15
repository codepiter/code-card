<?php
//[]  {}
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;


use DB;


class PaymentController extends Controller
{
	private $apiContext;
    public function __construct()
	
	{
		$payPalConfig = Config::get('paypal');
		$this->apiContext = new ApiContext(
        new OAuthTokenCredential(
            $payPalConfig['client_id'],     // ClientID
            $payPalConfig['secret']      // ClientSecret
        )
);
    }
	
	
	
	public function payWithPaypal1(){
		
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$amount = new Amount();
		$amount->setTotal('29.99'); //aca debemos obtener el precio del producto
		$amount->setCurrency('USD');

		$transaction = new Transaction();
		$transaction->setAmount($amount);

        $callbackUrl = url('/paypal/status');

		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl($callbackUrl) //cara triste o alegre
					->setCancelUrl($callbackUrl); //cara triste
       

		$payment = new Payment();
		$payment->setIntent('sale')
			->setPayer($payer)
			->setTransactions(array($transaction))
			->setRedirectUrls($redirectUrls);
			
			try {
            $payment->create($this->apiContext);
           // echo $payment;

			return redirect()->away($payment->getApprovalLink());//para url externa dado por paypal
			}catch (PayPalConnectionException $ex) {
				echo $ex->getData();
			}
			
	}
		public function payWithPaypal2(){
	   	
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$amount = new Amount();
		$amount->setTotal('69.99'); //aca debemos obtener el precio del producto
		$amount->setCurrency('USD');

		$transaction = new Transaction();
		$transaction->setAmount($amount);

        $callbackUrl = url('/paypal/status');

		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl($callbackUrl) //cara triste o alegre
					->setCancelUrl($callbackUrl); //cara triste
       

		$payment = new Payment();
		$payment->setIntent('sale')
			->setPayer($payer)
			->setTransactions(array($transaction))
			->setRedirectUrls($redirectUrls);
			
			try {
            $payment->create($this->apiContext);
           // echo $payment;

			return redirect()->away($payment->getApprovalLink());//para url externa dado por paypal
			}catch (PayPalConnectionException $ex) {
				echo $ex->getData();
			}
	}
	
	
	public function payPalStatus(Request $request){    //atender los que nos envia paypal
		//dd($request->all());
		
		/*Lo que devuelve
		  "paymentId" => "PAYID-L46DSTI64526890TK317794Y"
		  "token" => "EC-0WU7265797499541G"
		  "PayerID" => "4FAK9ZRQDA8BS"
		/*hasta aqui de lo que devuelve*/
		
		
		$paymentId = $request->input('paymentId');
		$payerId = $request->input('PayerID');
		$token = $request->input('token');
		
		
		if(!$paymentId || !$payerId || !$token){
			$status = 'No se pudo proceder con el pago a través de paypal';
			return redirect ('/paypal/failed')->with(compact('status')); //esto es a donde enviaremos al usuario si falla
		}
		
		$payment = Payment::get($paymentId, $this->apiContext);
		
		$execution = new PaymentExecution();
		$execution->setPayerId($payerId);
		
		/* Execute the payment*/
		$result = $payment->execute($execution, $this->apiContext);
	//	dd($result);

		if($result->getState() === 'approved'){
			$status = 'hemos recibido su pago puede continuar con la selección de su diseño.';

        $total = $result->transactions[0]->amount->total;
		
		
		if($total == "29.99"){
			$type="persona";
		}else{
			$type="empresa";
		}
				
			$id_user = auth()->id();

			$affected = DB::table('users')
						  ->where('id', $id_user)
						  ->update(['is_activated' => 1]);
						  
						  
			$affected2 = DB::table('payments')->insert([
			  'amount' => $total,
			  'user_id' => $id_user,
			  'payment_mode' => 'paypal',
			  'type_card' => $type
			 ]);
						  

		
        //echo $total;die;

		return redirect()->route('personalInformation.create')->with(compact ('status', 'type'));
	}
		$status = 'Lo sentimos! El pago a través de Paypal no se pudo realizar';
		//return View::make('formPaypal.index');
		//return redirect()->route('personalInformation.create')->with(compact ('status'));
		/**/
	}


}
























