<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard overview.
     */
    public function index(Request $request)
    {
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalRegularUsers = User::where('role', 'user')->count();
        $newUsersToday = User::whereDate('created_at', today())->count();

        // Query users with search and filter support for the dashboard table
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role') && in_array($request->input('role'), ['admin', 'user'])) {
            $query->where('role', $request->input('role'));
        }

        $users = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalRegularUsers',
            'newUsersToday',
            'users'
        ));
    }
}
