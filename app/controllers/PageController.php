<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
class PageController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |    Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function home(){
        return View::make('pages/home');
    }
    public function shorten(){
        //listen for ModelNotFoundException
        App::error(function(ModelNotFoundException $e){
           return Response::view("pages/404",array(),404);
        });
        $url = $_POST['url'];
        
        //bypassed js and passed an empty value
        if(!isset($url)){
            return Response::view("pages/404",array(),404);
        }
        $row = HashModel::where("url",$url)->first();
        if(!empty($row)){
            return URL::to('/r').'/'.$row->hash;//one way of getting it.            
        }
        else{
            //generate the hash
            $hash = Hash::make($url);
            $hash = substr($hash,10,5);
            $hashModel = new HashModel;
            $hashModel->url = $url;
            $hashModel->hash = $hash;
            if($hashModel->save()){
                return URL::to('/r').'/'.$hash; 
            }
            else{
                return "ERROR";
            } 

        }            
    }
    public function redirect($hash = null){
        //no hash provided?
        if(empty($hash)){
           //redirect to 404.
           return Response::view("pages/404",array(),404);
        }
        else {
            //listen for ModelNotFoundException
            App::error(function(ModelNotFoundException $e){
                return Response::view("pages/404",array(),404);                
            });

            $row = HashModel::where("hash","=",$hash)->firstOrFail();

            //found something.. lets redirect
            if(!empty($row)){
                return View::make('pages/redirect')->with('originalUrl',$row->url);            
            }
        }
    }

}
