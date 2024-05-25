<?php

namespace App\Providers;

use App\Models\Barang;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Barang::create(function ($barang) {
        //     $barang->update([
        //         'kode_barang' => 'Book_'.$barang->id,
        //     ]); 
        // });
    }
}
