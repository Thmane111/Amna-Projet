<?php

namespace App\Imports;

use App\Models\Matiere;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Http\Request;

class MatiereImport implements ToArray, WithHeadingRow
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function array(array $rows)
    {
        if ($this->request->input('niveau_id') == 0) {
            return back()->with('error', 'Veuillez renseigner le niveau');
        } elseif ($this->request->input('serie_id') == 0) {
            return back()->with('error', 'Veuillez renseigner la serie');
        } else {
            foreach ($rows as $row) {
                $matiere = $this->sanitize($row['mat']);
                $coefficient = $this->sanitize($row['coeff']);

                $verifie_existe_eleve = Matiere::where('Nom_Matiere', $matiere)
                    ->where('serie_id', $this->request->input('serie_id'))
                    ->first();

                if ($verifie_existe_eleve) {
                    $verifie_existe_eleve->update([
                        'Nom_Matiere' => $matiere,
                        'Coefficient' => $coefficient,
                    ]);
                } else {
                    Matiere::create([
                        'Nom_Matiere' => $matiere,
                        'Coefficient' => $coefficient,
                        'serie_id' => $this->request->input('serie_id'),
                        'etat' => 0,
                    ]);
                }
            }

            return back()->with('message', 'Enregistrement réussi');
        }
    }

    private function sanitize($value)
    {
        // Nettoyer les caractères spéciaux
        $sanitizedValue = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
        return $sanitizedValue;
    }
}
