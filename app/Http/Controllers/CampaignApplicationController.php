<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\User;
use App\Notifications\ApplicationAccepted;
use App\Notifications\ApplicationRejected;
use App\Notifications\ApplicationSubmited;
use App\Notifications\ApplicationFYCSubmited;
use App\Notifications\SendInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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

        // Si el usuario ya ha aplicado a la campaña, no se puede aplicar de nuevo
        // Inicializar la consulta para las campañas
        $query = Campaign::query();
        $query->whereHas('applications', function($query){
            $query->where('user_id', request()->user()->id);
        });
        if($query->exists()){
            return back()->with('error', 'You have already applied to this campaign!');
        }

        // Crear la application
        $campaign->applications()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        //Notificar al creador de la campaña y al que hizo la application
        $application_user = User::find(request()->user()->id);
        $user = User::find($campaign->user_id);
        $application_user->notify(new ApplicationSubmited($campaign));
        $user->notify(new ApplicationFYCSubmited($campaign));

        return back();
    }
    /**
     * Reject the specified application.
     * Remove the specified application from storage.
     *
     * @param  Campaign  $campaign
     * @param  int  $applicationId
     * @return [type] Redirect to campaigns.show view
     */
    public function destroy(Campaign $campaign, $applicationId)
    {
        $user_id = $campaign->applications()->findOrFail($applicationId)->user_id;
        $campaign->applications()->findOrFail($applicationId)->delete();

        //Notificar del rechazo solo si el usuario que borra la aplicacion es el creador de la campana
        if($campaign->user_id == request()->user()->id){
            $user = User::find($user_id);
            $user->notify(new ApplicationRejected($campaign));
            session()->flash('success', 'Application rejected!');
        }else{
            session()->flash('success', 'Application deleted!');
        }

        return back();
    }
    /**
     * Accept the specified application and send a notification.
     *
     * @param  Campaign  $campaign
     * @param  int  $applicationId
     * @return [type] Redirect to campaigns.show view
     */
    public function accept(Campaign $campaign, $applicationId)
    {
        //Notificar de la aceptacion
        $user = $campaign->applications()->findOrFail($applicationId)->user_id;
        $user = User::find($user);
        $user->notify(new ApplicationAccepted($campaign));

        //Eliminar application
        $campaign->applications()->findOrFail($applicationId)->delete();

        return back()->with('success', 'Notification sent!');
    }

    /**
     * Send discord tag of the user that applies, to the owner of the campaign.
     *
     * @param  Campaign  $campaign
     * @param  int  $applicationId
     * @return [type] Redirect to campaigns.show view
     */
    public function sendInfo(Campaign $campaign)
    {
        $application_user = User::find(request()->user()->id);
        $user = User::find($campaign->user_id);
        $user->notify(new SendInformation($application_user, $campaign));

        return back()->with('success', 'Information sent!');
    }
}
