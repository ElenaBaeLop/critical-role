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
     * @return [type] Redirect to campaigns.create view
     */
    public function create(){
        return view('campaigns.create');
    }

}
