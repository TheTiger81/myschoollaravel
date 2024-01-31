<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     * 
     * Questo metodo definisce la pianificazione dei comandi. Qui puoi definire tutti i compiti schedulati
     * che dovrebbero essere eseguiti.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Aggiungi qui i tuoi scheduled tasks

        // Questo task schedulato eliminerà i record nella tabella 'contact_forms' che sono più vecchi di 30 giorni.
        // Verrà eseguito una volta al giorno.
        $schedule->call(function () {
            \DB::table('contact_forms')->where('created_at', '<', now()->subDays(30))->delete();
        })->daily(); // Sostituisci 'contact_forms' con il nome effettivo della tua tabella
    }

    /**
     * Register the commands for the application.
     * 
     * Questo metodo carica tutti i comandi della console definiti nell'applicazione.
     * Puoi caricare i comandi manualmente o includerli automaticamente da una directory.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
