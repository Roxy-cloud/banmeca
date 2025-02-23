<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today_donations = Donation::whereDate('created_at', today())->sum('amount'); // Total donaciones hoy
        $total_categories = Category::count(); // Total categorías disponibles
        $total_expired_products = Product::where('expiry_date', '<', now())->count(); // Total productos expirados
        
        // Suponiendo que tienes un gráfico pie configurado
        $pieChart = $this->generatePieChart(); 

        return view('admin.dashboard', compact('today_donations', 'total_categories', 'total_expired_products', 'pieChart'));
    }
}
