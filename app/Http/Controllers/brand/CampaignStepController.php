<?php

namespace App\Http\Controllers\brand;

use App\Models\CampaignStep;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignStepController extends Controller
{
    public function index()
    {
        try {
            $step = CampaignStep::with('campaign')
                ->whereHas('campaign', function ($q) {
                    $q->where('userId', Auth::user()->id);
                })
                ->get();
                
            return view('brand.campaignStep.index', compact('step'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

   

    public function create()
    {
        try {

            // $step = CampaignStep::find($id);
            $userId = Auth::user()->id;
            $campaign = Campaign::where('userId', '=', $userId)->get();
             // return $campaign;
            // $userId = Auth::user()->id;
            // $campaign = Campaign::where('userId', '=', $userId)->get();
            return view('brand.campaignStep.create', \compact('campaign'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // public function create()
    // {
    //     try {
    //         $userId = Auth::id();

    //         // get campaigns of logged-in user
    //         $campaigns = Campaign::where('userId', $userId)->get();

    //         // get all steps to show in index page
    //         $steps = CampaignStep::where('userId', $userId)->with('campaign')->get();

    //         // return index view (because modals are inside it)
    //         return view('brand.campaignStep.create', compact('campaigns', 'steps'));
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }



    public function store(Request $request)
    {

        $this->validate($request, [
            'campaignId' => 'required',
            'title' => 'required',
            'detail' => 'required',
        ]);

        // return $request;
        try {
            $campaign = new CampaignStep();
            $campaign->campaignId = $request->campaignId;
            $campaign->title = $request->title;
            $campaign->detail = $request->detail;
            $campaign->save();

            return back()->with('success', 'Campaign step Added Successfully..');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        try {
            $step = CampaignStep::find($id);
            $userId = Auth::user()->id;
            $campaign = Campaign::where('userId', '=', $userId)->get();
            return view('brand.campaignStep.edit', compact('step', 'campaign'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'campaignId' => 'required',
            'title' => 'required',
            'detail' => 'required',
        ]);

        try {
            $id = $request->campaignStepId;
            $campaign = CampaignStep::find($id);
            $campaign->campaignId = $request->campaignId;
            $campaign->title = $request->title;
            $campaign->detail = $request->detail;
            $campaign->save();

            return redirect('brand/campaign/step/index')->with('success', 'Campaign step updated Successfully..');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            CampaignStep::find($id)->delete();
            return redirect('brand/campaign/step/index')->with('success', 'Campaign step deleted Successfully..');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
