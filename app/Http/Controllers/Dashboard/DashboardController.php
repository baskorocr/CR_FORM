<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $role = Auth::user()->role->name;

        if ($role == 'supervisor') {
            return $this->supervisor();
        } else if ($role == 'admin') {
            return $this->admin();
        } else if ($role == 'user') {
            return $this->user();
        } else if ($role == 'dh_it') {
            return $this->dh_it();
        }
    }

    private function supervisor()
    {
        $supervisor = User::with(['role'])->whereHas('role', function ($query) {
            $query->where('name', 'supervisor');
        })->count();

        $admin = User::with(['role'])->whereHas('role', function ($query) {
            $query->where('name', 'admin');
        })->count();

        $user = User::with(['role'])->whereHas('role', function ($query) {
            $query->where('name', 'user');
        })->count();

        // $pending = Proposal::where('status', 'pending')->count();
        // $approved = Proposal::where('status', 'approved')->count();
        // $rejected = Proposal::where('status', 'rejected')->count();
        $proposalCount = Proposal::count();
        $pending = Proposal::where('status_dh', 'pending')->count();
        $approved = Proposal::where('status_divh', 'approved')->count();
        $rejected = Proposal::where('status_dh', 'rejected')->count();

        $account = User::select(DB::raw('COUNT(*) as count'))->groupBy('role_id')->get();
        $proposal = Proposal::select('status_dh', DB::raw('COUNT(*) as count'))->groupBy('status_dh')->get();


        $chartProposal = [
            'labels' => $proposal->pluck('status_dh'),
            'datasets' => [
                [
                    'label' => 'Status CR',
                    'backgroundColor' => ['#343a40', '#39cccc', '#d81b60'],
                    'data' => $proposal->pluck('count')
                ],
            ],
        ];

        $chartAccount = [
            'labels' => ['Supervisor', 'Admin', 'User'],
            'datasets' => [
                [
                    'label' => 'Status CR',
                    'backgroundColor' => ['#343a40', '#39cccc', '#d81b60'],
                    'data' => $account->pluck('count')
                ],
            ],
        ];

        // Use Object Casting
        $count = (object) [
            'supervisor' => $supervisor,
            'admin' => $admin,
            'user' => $user,
            'proposal' => $proposalCount,
            'pending' => $pending,
            'approved' => $approved,
            'rejected' => $rejected
        ];

        $data = [
            'title' => 'Dashboard | DPM',
            'count' => $count,
            'chart1' => $chartAccount,
            'chart2' => $chartProposal,
        ];

        return view('dashboard.roles.supervisor', $data);
    }

    private function admin()
    {
        $proposal = Proposal::select('status_dh', DB::raw('COUNT(*) as count'))->groupBy('status_dh')->get();

        $chart = [
            'labels' => $proposal->pluck('status_dh'),
            'datasets' => [
                [
                    'label' => 'Status CR',
                    'backgroundColor' => ['#343a40', '#39cccc', '#d81b60'],
                    'data' => $proposal->pluck('count')
                ],
            ],
        ];

        $data = [
            'title' => 'Dashboard | DPM',
            'chart' => $chart,
        ];

        return view('dashboard.roles.admin', $data);
    }

    private function user()
    {
        $data = [
            'title' => 'Dashboard | DPM'
        ];

        return view('dashboard.roles.user', $data);
    }

    private function dh_it()
    {
        $supervisor = User::with(['role'])->whereHas('role', function ($query) {
            $query->where('name', 'supervisor');
        })->count();

        $admin = User::with(['role'])->whereHas('role', function ($query) {
            $query->where('name', 'admin');
        })->count();

        $user = User::with(['role'])->whereHas('role', function ($query) {
            $query->where('name', 'user');
        })->count();

        $proposalCount = Proposal::count();
        // $pending = Proposal::where('status', 'pending')->count();
        // $approved = Proposal::where('status', 'approved')->count();
        // $rejected = Proposal::where('status', 'rejected')->count();

        $pending = Proposal::where('status_dh', 'pending')->count();
        $approved = Proposal::where('status_divh', 'approved')->count();
        $rejected = Proposal::where('status_dh', 'rejected')->count();

        $account = User::select(DB::raw('COUNT(*) as count'))->groupBy('role_id')->get();
        $proposal = Proposal::select('status_dh', DB::raw('COUNT(*) as count'))->groupBy('status_dh')->get();


        $chartProposal = [
            'labels' => $proposal->pluck('status_dh'),
            'datasets' => [
                [
                    'label' => 'Status CR',
                    'backgroundColor' => ['#343a40', '#39cccc', '#d81b60'],
                    'data' => $proposal->pluck('count')
                ],
            ],
        ];

        $chartAccount = [
            'labels' => ['Supervisor', 'Admin', 'User'],
            'datasets' => [
                [
                    'label' => 'Status CR',
                    'backgroundColor' => ['#343a40', '#39cccc', '#d81b60'],
                    'data' => $account->pluck('count')
                ],
            ],
        ];

        // Use Object Casting
        $count = (object) [
            'supervisor' => $supervisor,
            'admin' => $admin,
            'user' => $user,
            'proposal' => $proposalCount,
            'pending' => $pending,
            'approved' => $approved,
            'rejected' => $rejected
        ];

        $data = [
            'title' => 'Dashboard | FAMS',
            'count' => $count,
            'chart1' => $chartAccount,
            'chart2' => $chartProposal,
        ];

        return view('dashboard.roles.dh_it', $data);
    }


}