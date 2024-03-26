<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
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

        // Filtrar por categoría
        if (isset($datosSolicitud['category'])) {
            $query->whereHas('category', function($query) use ($datosSolicitud) {
                $query->whereIn('id', $datosSolicitud['category']);
            });
        }

        // Ejecutar la consulta y obtener los resultados
        $campañasFiltradas = $query->get();

        return view('campaigns.index', [
            'campaigns' => $campañasFiltradas,
            'categories' => Category::all()
        ]);
    }

    public function show(Campaign $campaign)
    {
        return view('campaigns.show', [
            'campaign' => $campaign
        ]);
    }

}
