<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignApplicationController extends Controller
{
    /**
     * Store a newly created application in storage.
     *
     * @param  Campaign  $campaign
     * @return [type] Redirect to campaigns.show view
     */
    public function store(Campaign $campaign)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $campaign->applications()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
    /**
     * Remove the specified application from storage.
     *
     * @param  Campaign  $campaign
     * @param  int  $applicationId
     * @return [type] Redirect to campaigns.show view
     */
    public function destroy(Campaign $campaign, $applicationId)
    {
        $campaign->applications()->findOrFail($applicationId)->delete();
        return back();
    }
    /**
     * Accept the specified application.
     *
     * @param  Campaign  $campaign
     * @param  int  $applicationId
     * @return [type] Redirect to campaigns.show view
     */
    public function accept(Campaign $campaign, $applicationId)
    {
        //Notificar de la aceptacion
        //Eliminar comentario

        /*
        $application = $campaign->applications()->findOrFail($applicationId);
        $application->update(['status' => 'accepted']);
        return back();*/
    }
}
