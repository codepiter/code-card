<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonalInformationController;//LINEA INGRESADA POR RICARDO

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    //return view('welcome'); //es php info
	
	 if (Auth::check()) {
		return redirect()->route('personalInformation.index');
	
	 }else{
		//return view('auth/login');
        return view('theme.pages.auth.login');
	 }
});





Route::resource('personalInformation', 'PersonalInformationController')-> except(['show'])-> middleware ('auth');
Route::resource('worke','WorkExperienceController');
Route::resource('pagos','PagoController')->middleware('auth');
Route::resource('payments','PaymentController');
Route::resource('gifCards','GifCardController');
Route::resource('brochures','BrochureController')-> except(['pdf'])-> middleware ('auth');

/*sms config*/

Route::resource('sms', 'SmsConfigController')-> middleware('auth');


Route::resource('inviteds','InvitedController')-> middleware ('auth');



Route::get('brochures/pdf/{id}', 'BrochureController@createPDF')->name('brochures.pdf');

Route::post('personalInformation/elimina', 'PersonalInformationController@borrar')->name('personalInformation.eliminar');

Route::get('create2/{id}', 'GifCardController@create2');
//Route::get('gifCard/create{id}', 'GifCardController@create')->name('gifCard.create');

Route::resource('positions','PositionController');
Route::resource('resumes','ResumeController')-> middleware ('auth');
Route::resource('customers','CustomerController');
Route::resource('categories','CategoryController');


Route::post('customers/ajaxDocId', 'CustomerController@ajaxDocId');

Route::resource('formations','FormationController');


Route::get ('events/listado', 'EventController@listado')->name('events.listado')->middleware('auth');
Route::resource('events','EventController');

/*eventos*/
Route::post ('events/verifyHour', 'EventController@verifyHour')->name('events.verifyHour');

Route::post ('events/aprobar', 'EventController@aprobar')->name('events.aprobar');


Route::post ('events/findEvent', 'EventController@findEvent')->name('events.findEvent');

Route::post ('events/solicitudCancel', 'EventController@solicitudCancel')->name('events.solicitudCancel');



Route::get ('events', 'EventController@index')->name('events.index')-> middleware ('auth');


Route::get ('events/lista/{id}', 'EventController@lista')->name('events.lista');

Route::get ('events/showc/{id}', 'EventController@showc')->name('events.showc');



Route::get('event/view/{id}', 'EventController@showd')->name('event.view')-> middleware ('auth');






Route::resource('idioms','IdiomaController');
Route::resource('habilidades','HabilidadController');
Route::resource('referencias','ReferenceController');
Route::resource('menus','MenuController');
Route::resource('tabmenus','TabbedMenuController');



/*nuevo 04-11*/
Route::post('menus/getCategory/','MenuController@getCategory');



Route::post('inviteds/codigo', 'InvitedController@codigo');


 Route::get('todas', function(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('todas');
	
	
 Route::get('esta', function(){
        auth()->user()->unreadNotifications->markAsRead();
        //return redirect()->back();
		return redirect()->route('events.index');
    })->name('esta');

/*ingresado por Ricardo*/
Route::get ('calendar/{id}', 'EventController@indexc');
Route::get ('events', 'EventController@index')->name('events.index')-> middleware ('auth');

Route::get ('events/calendario/{id}', 'EventController@showc')->name('events.calendario');
/*hasta aqui bloque ingresado por Ricardo*/
Route::post('ajax', 'EventController@ajax')->name('ajax.post');
Route::post('ajaxdesc', 'EventController@ajaxdesc')->name('ajaxdesc.post');


Route::post('import-list-excel','CustomerController@importExcel')->name('customers.import.excel');
Route::get('export-list-excel','CustomerController@exportExcel')->name('customers.excel');

Route::get('import', function(){
    //return View::make('customers.create2');
    return View::make('customers.n-create2');
});


Route::get('card/{personalInformation:slug}', 'PersonalInformationController@show')->name('card.show');

Route::get('menus/{menu:slug}', 'MenuController@show')->name('menus.show');


Route::get('pdf/{id}','ResumeController@PDFgenerate')->name('pdf.PDFgenerate');



//Route::get('pdf/{id}', 'ResumeController@show')->name('pdf.show');
Route::get('pdf2/{id}', 'ResumeController@show')->name('pdf.show');


Route::post('resume/getHabilidad/','ResumeController@getHabilidad');
 
Route::post('resume/getIdioma/','ResumeController@getIdioma');   



Route::get('personalInformations/verificar', 'PersonalInformationController@verificar')->name('personalInformations.verificar');
Route::get('personalInformations/vcard/{id}', 'PersonalInformationController@vcard')->name('personalInformations.vcard');




Route::post('personalInformations/disappear', 'PersonalInformationController@disappear')->name('personalInformations.disappear');


Route::get('gifCards/disappear/{id}', 'GifCardController@disappear')->name('gifCards.disappear');




Auth::routes(['verify' => true]);
Auth::routes();

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/term', 'HomeController@term')->name('term')->middleware('verified');
Route::get('/polit', 'HomeController@polit')->name('polit')->middleware('verified');


Route::get('bufalo', function(){
return View::make('formPaypal.index');
});


Route::get ('/paypal/pay', 'PaymentController@payWithPaypal1'); //llamar en el formulario  href="{{url('paypal/pay')  }}"
Route::get ('/paypal/pay2', 'PaymentController@payWithPaypal2');

Route::get ('/paypal/status', 'PaymentController@payPalStatus'); //llamar en el formulario  href="{{url('paypal/pay')  }}"


/*Invitados*/
Route::post ('paypal/invOne', 'PaymentController@invOne');
Route::post ('paypal/invTwo', 'PaymentController@invTwo');



Route::get('{personalInformation:slug_calendar}', 'PersonalInformationController@calendar')->name('calendar');



Route::get('theme', function(){
    return view('theme.dashboard');
});

Route::get('theme2', function(){
    return view('theme.n-sample');
});


Route::get('cardEdit2', function(){
    return view('personalInformations.n-edit2');
});
 /*Rutas ingresadas por Ricardo*/
Route::get('cardEdit2-1/{personalInformation}/edit', [PersonalInformationController::class, 'edit2']);
Route::put('personalInformation/{personalInformation}/update2Info', [PersonalInformationController::class, 'update2PersonalInformation'])->name('update2PersonalInformation');
Route::put('personalInformation/{personalInformation}/update2Img', [PersonalInformationController::class, 'update2Image'])->name('update2PersonalInformationImg');


/* hasta aqui las Rutas ingresadas por Ricardo*/

