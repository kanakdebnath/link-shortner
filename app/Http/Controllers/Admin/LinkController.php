<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Link;
use App\Support\Visit;
use App\Models\LinkVisit;
use App\Jobs\LinkMetaData;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Transformers\LinkTransformer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Foundation\Application;

class LinkController extends Controller
{
      // all link 
      public function index(){
        $links = Link::query();
        if(Auth::user()->user_type == 'user'){
            $links = $links->where('user_id',Auth::id());
        }
        $results = $links->orderBy('id','DESC')->paginate(15);
        return view('admin.link.index',compact('results'));
    }

// create link 
    public function create(){
        return view('admin.link.create');
    }


    /**
     * Save the visit and redirect to the destination
     *
     * @param  Request  $request
     * @param $code
     * @return Application|RedirectResponse|Redirector|void
     * @throws Exception
     */
    public function linkStore(Request $request)
    {
        $request->validate([
            'url' => 'required'
        ]);

        $link = new Link();
        $link->code = Str::random(5);
        $link->url = $request->get('url');
        $link->title = $request->get('title');
        if(Auth::check()){
            $link->user_id = Auth::id();
        }
        if ($link->save()) {
            $this->dispatch(new LinkMetaData($link));

            return redirect()->route('all_link')->with(['message' => __('Link shortened correctly'), 'link' => (new LinkTransformer())->transform($link)]);
        } else {
            return redirect()->back()->with('message','An error occurred while saving the data');
        }

    }
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'url' => 'required'
        ]);
            
        if($validator->fails()) {
        // return as appropriate
            return response()->json($validator->errors(), 422);
        }

        $link = new Link();
        $link->code = Str::random(5);
        $link->url = $request->get('url');
        $link->title = $request->get('title');
        $link->user_id = Auth::id();
        if ($link->save()) {
            $this->dispatch(new LinkMetaData($link));
            // return response()->success(['message' => __('Link shortened correctly'), 'link' => (new LinkTransformer())->transform($link)])->respond();
            return responder()->success(['message' => __('Link shortened correctly'), 'link' => (new LinkTransformer())->transform($link)])->respond();
        } else {
            return responder()->error(__('An error occurred while saving the data'))->respond(500);
        }

    }

    public function visit(Request $request, $code)
    {
        $link = Link::where('code', $code)->first();
        
        // Verify disabled
        if ($link->disabled) {
            return abort(404);
        }
        $agent = new Agent();
        $linkVisit = new LinkVisit();
        $linkVisit->link_id = $link->id;
        $linkVisit->platform = Str::slug(strtolower($agent->platform()), '-');
        $linkVisit->device = Visit::getDevice($agent);
        $linkVisit->browser = strtolower($agent->browser());
        $linkVisit->location = strtolower(geoip($request->ip())['iso_code']);
        $linkVisit->crawler = $agent->isRobot();
        $linkVisit->referrer = Str::contains($request->server('HTTP_REFERER'), url('/')) ? null : $request->server('HTTP_REFERER');
        $linkVisit->ip = $request->ip();
        if ($linkVisit->save()) {
            return redirect($link->url);
        } else {
            throw new Exception('Unable to save visit log');
        }
    }


    // view link 
    public function view($id){

        $link = Link::query();
        if(Auth::user()->user_type == 'user'){
            $result = $link->where('user_id',Auth::id())->where('id',$id)->first();
        }else{
            $result = Link::with('visits')->where('id',$id)->first();
        }

        if (empty($result)) {
            return abort(404);
        }
        
        return view('admin.link.view',compact('result'));
    }


    // Delete Link 
    public function delete(Request $request){

        $result = Link::find($request->id)->delete();
        if($result){
            return response()->json(['message' => 'Link Deleted Successfully.']);

        }else{
            return redirect()->back();
        }
    }


}

