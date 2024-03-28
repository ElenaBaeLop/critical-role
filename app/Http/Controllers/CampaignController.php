<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    /**
     * Show all campaigns with filters
     *
     * @param Request $request
     * @return [type] Redirect to campaigns.index view
     */
    public function index(Request $request)
    {
        // Obtener los datos de la solicitud
        $datosSolicitud = $request->all();

        // Inicializar la consulta para las campañas
        $query = Campaign::query();

        // Filtrar por nombre
        if (isset($datosSolicitud['name'])) {
            $query->where('name', $datosSolicitud['name']);
        }
        // Filtrar por idioma
        if (isset($datosSolicitud['language'])) {
            $query->where('language', $datosSolicitud['language']);
        }

        // Filtrar por frecuencia de sesión
        if (isset($datosSolicitud['session_frequency'])) {
            $query->whereIn('session_frequency', $datosSolicitud['session_frequency']);
        }

        // Filtrar por searching_for_players
        if (isset($datosSolicitud['searching_for_players'])) {
            $query->where('searching_for_players', $datosSolicitud['searching_for_players']);
        }

        // Filtrar por categoría
        if (isset($datosSolicitud['category'])) {
            $query->whereHas('category', function($query) use ($datosSolicitud) {
                $query->whereIn('id', $datosSolicitud['category']);
            });
        }

        // Ejecutar la consulta y obtener los resultados
        $campañasFiltradas = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('campaigns.index', [
            'campaigns' => $campañasFiltradas,
            'categories' => Category::all()
        ]);
    }
    /**
     * Show the campaign and its details
     *
     * @param Campaign $campaign
     * @return [type] Redirect to campaigns.show view
     */
    public function show(Campaign $campaign)
    {
        return view('campaigns.show', [
            'campaign' => $campaign
        ]);
    }

    /**
     * Show the form to create a new campaign
     *
     * @return [type] Redirect to campaigns.create view and send the categories
     */
    public function create(){
        if (!Auth::check()){
            return redirect('/')->with('error', 'You need to be logged in to create a campaign');
        }
        return view('campaigns.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store the new campaign in the database
     *
     * @param Request $request
     * @return [type] Redirect to user.show view
     */
    public function store(Request $request){
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:50',
            'total_players' => 'required|integer|min:2',
            'session_frequency' => 'required|string',
            'language' => 'required|string',
            'searching_for_players' => 'boolean',
            'discord_server_tag' => 'required|string|regex:/^.{3,32}#[0-9]{4}$/',
            'body' => 'required|string',
            'category_id' => 'required|integer'
        ]);

        // Crear la campaña en la base de datos
        if ($request->input('searching_for_players')){
            $searching_for_players = true;
        } else {
            $searching_for_players = false;
        }

        $excerpt = substr($request->input('body'), 0, 100);
        $slug = strtolower(str_replace(' ', '-', $request->input('name'))).now()->timestamp;

        Campaign::create([
            'name' => $request->input('name'),
            'total_players' => $request->input('total_players'),
            'session_frequency' => $request->input('session_frequency'),
            'language' => $request->input('language'),
            'searching_for_players' => $searching_for_players,
            'discord_server_tag' => $request->input('discord_server_tag'),
            'excerpt' => $excerpt,
            'body' => $request->input('body'),
            'slug' => $slug,
            'category_id' => $request->input('category_id'),
            'user_id' => Auth::user()->id
        ]);

        return redirect('/profile/'.Auth::user()->username)->with('success', 'Campaign created successfully');
    }

    /**
     * Delete a campaign from the database and its related Model Applications
     *
     * @param Campaign $campaign
     * @return [type] Redirect to user.show view
     */
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect('/profile/' . Auth::user()->username)->with('success', 'Campaign deleted successfully');
    }

    /**
     * Show the form to edit a campaign
     *
     * @param Campaign $campaign
     * @return [type] Redirect to campaigns.update view
     */
    public function edit(Campaign $campaign){
        return view('campaigns.update', [
            'campaign' => $campaign,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the campaign in the database
     *
     * @param Request $request
     * @param Campaign $campaign
     * @return [type] Redirect to user.show view
     */

    public function update(Request $request, Campaign $campaign)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:50',
            'total_players' => 'required|integer|min:2',
            'session_frequency' => 'required|string',
            'language' => 'required|string',
            'searching_for_players' => 'boolean',
            'discord_server_tag' => 'required|string|regex:/^.{3,32}#[0-9]{4}$/',
            'body' => 'required|string',
            'category_id' => 'required|integer'
        ]);

        // Crear la campaña en la base de datos
        if ($request->input('searching_for_players')){
            $searching_for_players = true;
        } else {
            $searching_for_players = false;
        }

        $excerpt = substr($request->input('body'), 0, 100);
        $slug = strtolower(str_replace(' ', '-', $request->input('name'))).now();

        $campaign->update([
            'name' => $request->input('name'),
            'total_players' => $request->input('total_players'),
            'session_frequency' => $request->input('session_frequency'),
            'language' => $request->input('language'),
            'searching_for_players' => $searching_for_players,
            'discord_server_tag' => $request->input('discord_server_tag'),
            'excerpt' => $excerpt,
            'body' => $request->input('body'),
            'slug' => $slug,
            'category_id' => $request->input('category_id'),
            'user_id' => Auth::user()->id
        ]);

        return redirect('/profile/'.Auth::user()->username)->with('success', 'Campaign updated successfully');
    }
}
