<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Ticket;

class TicketsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Using a view composer to share the tickets data with all views
        View::composer('*', function ($view) {
            // Fetch the tickets data from the database (or any other source)
            $tickets = Ticket::join('supports','support_tickets.support_id','supports.id')
            ->join('users','support_tickets.user_id','users.id')
            ->select('supports.topic','users.first_name','users.last_name','users.account_type',
            'users.email','support_tickets.description')
            ->latest('supports.created_at') // Order by the created_at column of the 'supports' table in descending order (latest first)
            ->take(5) // Limit the result to the latest 5 records
            ->get(); // Adjust the query according to your needs
            
            // Share the $tickets data with all views
            $view->with('tickets', $tickets);
        });

    }
}
