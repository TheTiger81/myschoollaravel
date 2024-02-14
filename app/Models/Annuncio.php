<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annuncio extends Model
{
    use HasFactory;

    /**
     * Gli attributi che possono essere assegnati in massa.
     *
     * @var array<string>
     */
    protected $fillable = [
        'titolo', 
        'descrizione', 
        'immagine', 
        'note', 
        'canale_pubblicazione',
    ];

    // Se hai altre tabelle collegate agli annunci, come una tabella categorie, potresti definire qui le relazioni.
    // Questo è solo un esempio e potrebbe non applicarsi al tuo caso specifico.

    /**
     * Ottiene la categoria associata all'annuncio.
     */
    // public function categoria()
    // {
    //     return $this->belongsTo(Categoria::class);
    // }

    /**
     * Accessorio per ottenere l'URL completo dell'immagine dell'annuncio.
     * Modifica il percorso secondo la tua struttura di directory.
     */
    public function getImmagineUrlAttribute()
    {
        if($this->immagine) {
            return asset('storage/' . $this->immagine);
        }
        return null; // Ritorna null o un percorso di default se non c'è un'immagine.
    }

    /**
     * Mutatore per criptare il titolo dell'annuncio prima di salvarlo nel database.
     * Nota: Questo è solo un esempio e potresti non voler criptare il titolo nell'applicazione reale.
     */
    // public function setTitoloAttribute($value)
    // {
    //     $this->attributes['titolo'] = encrypt($value);
    // }

    /**
     * Registrare un evento del modello in fase di booting.
     * Esempio: Aggiungere logica automatica prima della creazione di un annuncio.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($annuncio) {
            // Ad esempio, potresti voler impostare automaticamente un attributo qui
            // $annuncio->attributo = 'valore';
        });
    }
}
