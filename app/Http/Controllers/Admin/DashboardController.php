<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transactions;
use App\Models\User;
use App\Models\TransactionDetails;
use Illuminate\Http\Request;
use PDF;

class DashboardController extends Controller
{
    public function index()
    {
        $date = now()->format('Y-m-d');

        $data = Transactions::with(['user'])
            ->whereDate('created_at', $date)
            ->where('status', 'SUCCESS')
            ->get();

        $user = User::count();
        $product = Product::count();
        $revenue = Transactions::where('status', 'SUCCESS')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->sum('total_price');



        $day = Transactions::whereDate('created_at', $date)
            ->where('status', 'SUCCESS') // If you want to consider only successful transactions
            ->sum('total_price');

        $sales = Transactions::whereDate('created_at', $date)
            ->where('status', 'SUCCESS')->count();


        return view('pages.dashboard', [
            'user' => $user,
            'product' => $product,
            'revenue' => $revenue,
            'sales' => $sales,
            'day' => $day,
            'data' => $data
        ]);
    }

    public function generatePDF($id)
    {
        $data = Transactions::findOrFail($id);
        $transactions = TransactionDetails::with(['product'])
            ->where('id_transaction', $id)
            ->get();

        $pdf = PDF::loadView('pages.admin.print.printTrx', [
            'data' => $data,
            'transactions' => $transactions,
        ]);

        // Jika ingin langsung ditampilkan di browser
        return $pdf->stream('invoice.pdf');

        // Jika ingin menyimpan ke file
        return $pdf->download('invoice.pdf');
    }

    public function reportDaily(Request $request)
    {
        $date = now()->format('Y-m-d');

        $data = Transactions::all();

        $revenue = Transactions::where('status', 'SUCCESS')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->sum('total_price');

        $day = Transactions::whereDate('created_at', $date)
            ->where('status', 'SUCCESS') // If you want to consider only successful transactions
            ->sum('total_price');

        $sales = Transactions::whereDate('created_at', $date)
            ->where('status', 'SUCCESS')->count();

        $pdf = PDF::loadView('pages.admin.print.report', [
            'date' => $date,    
            'data' => $data,
            'revenue' => $revenue,
            'day' => $day,
            'sales' => $sales,
        ]);

        // Jika ingin langsung ditampilkan di browser
        return $pdf->stream('report.pdf');

        // Jika ingin menyimpan ke file
        return $pdf->download('report.pdf');
    }
}
