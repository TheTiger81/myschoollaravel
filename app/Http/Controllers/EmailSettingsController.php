<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateEmailSettingsRequest;

class EmailSettingsController extends Controller
{
    public function update(UpdateEmailSettingsRequest $request)
    {
        $data = $request->validated();
    
        // Inizializza MAIL_ENCRYPTION come null
        $mailEncryption = null;
    
        // Controlla esplicitamente i valori di useTLS e useSSL
        if ($data['useTLS'] === 'true' && $data['useSSL'] === 'true') {
            // Decidi quale valore ha la priorità se entrambi sono true
            // Ad esempio, potresti decidere che SSL ha la priorità su TLS
            $mailEncryption = 'ssl';
        } elseif ($data['useTLS'] === 'true') {
            $mailEncryption = 'tls';
        } elseif ($data['useSSL'] === 'true') {
            $mailEncryption = 'ssl';
        }
        // Altrimenti, mailEncryption rimane null
    
        // Aggiornamento del file .env con i nuovi valori
        $this->updateEnv([
            'MAIL_HOST' => $data['host'],
            'MAIL_PORT' => $data['port'],
            'MAIL_USERNAME' => $data['username'],
            'MAIL_PASSWORD' => $data['password'],
            'MAIL_FROM_ADDRESS' => $data['fromEmail'],
            'MAIL_ENCRYPTION' => $mailEncryption,
        ]);
    
        return response()->json(['message' => 'Impostazioni email aggiornate con successo!']);
    }
    
    protected function updateEnv($data)
    {
        foreach ($data as $key => $value) {
            // Assicurati di gestire correttamente i valori speciali come spazi, ecc.
            $escaped = str_replace('"', '\"', $value);
            file_put_contents(app()->environmentFilePath(), preg_replace(
                '/^' . preg_quote($key) . '=.*/m',
                $key . '="' . $escaped . '"',
                file_get_contents(app()->environmentFilePath())
            ));
        }
    }
}
