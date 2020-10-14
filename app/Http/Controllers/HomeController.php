<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eraser;
use App\Http\Requests\FormHomeRequest;
use Illuminate\Support\Facades\URL;
use App\Mail\SendMail;
use Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(FormHomeRequest $request)
    {
        if (Eraser::create($request->validated())) {
            $ruta = URL::temporarySignedRoute('Verificacion', now()->addMinutes(2280), ['mail' => $request->mail]);
            $mail = $request->mail;
            self::sendmail($ruta, $mail);
            return redirect()->route('Home')->with('info','Mensaje enviado, por favor verifique su correo electrónico');
        }else{
            return redirect()->route('Home')->with('info','A ocurrido un error enviando el correo de verificación');
        }

    }

    public function check(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(401);
        }else{
            $eraser = Eraser::where('mail', $request->mail)->update(['verified' => 1]);
            $finderaser = Eraser::select('name', 'website', 'mail', 'summary')->where('mail', $request->mail)->get();
            self::to_post($finderaser);
            $eraser = Eraser::where('mail', $request->mail)->update(['published' => 1]);
            return redirect()->route('Home')->with('info','Su correo se a verificado con éxito y se ha cargado el post');
        }
    }

    public function sendmail($ruta, $mail)
    {
        $data = ['url' => $ruta];
        Mail::to($mail)->send(new SendMail($data));
    }

    public function to_post($finderaser)
    {
        foreach ($finderaser as $data) {
            $name = $data->name;
            $website = $data->website;
            $mail = $data->mail;
            $summary = $data->summary;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://tld-wp.tonny.org/wp-json/wp/v2/customers",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array('title' => $website,'hcf_name' => $name,'hcf_website' => $website,'hcf_email' => $mail,'hcf_summary' => $summary),
        CURLOPT_HTTPHEADER => array(
            "Authorization: Basic YWRtaW46cjczdW93bDZ0UHlTeURjZEt4TDRHVDVG",
            "Cookie: __cfduid=d01c3615b0185105d2fa073fbe20022e71602602555"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);


    }

}
