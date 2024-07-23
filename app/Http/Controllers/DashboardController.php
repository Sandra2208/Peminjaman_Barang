<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $barangCount = Barang::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        return view('dashboard', ['barang_count' => $barangCount, 'category_count' => $categoryCount, 'user_count' =>$userCount]);
    }
}