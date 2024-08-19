<?php

namespace App\Http\Controllers;

use App\Models\iris;
use App\Http\Requests\StoreirisRequest;
use App\Http\Requests\UpdateirisRequest;

class IrisController extends Controller{
    public function index(){
        // Pegando do banco de dados todas as iris e agrupando de acordo com a variável specie
        $data = Iris::all()->groupBy('specie');

        // Para cálcular média de tamanhos das espécies
        $barData = [
            'species' => [],
            'sepalLength' => [],
            'sepalWidth' => [],
            'petalLength' => [],
            'petalWidth' => [],
        ];
        // Dados para dispersão das sépalas
        $sepalData = [];
        $petalData = [];

        foreach ($data as $species => $items) {
            $barData['species'][] = $species;
            $barData['sepalLength'][] = $items->avg('sepal_length');
            $barData['sepalWidth'][] = $items->avg('sepal_width');
            $barData['petalLength'][] = $items->avg('petal_length');
            $barData['petalWidth'][] = $items->avg('petal_width');
        }

        foreach ($data as $species => $items) {
            // Dados para o gráfico das sépalas
            $sepalData[] = [
                'label' => $species,
                'data' => $items->map(function($item) {
                    return [
                        'x' => $item->sepal_length,
                        'y' => $item->sepal_width
                    ];
                }),
                'backgroundColor' => $this->getSpeciesColor($species)
            ];
            
            // Dados para o gráfico das pétalas
            $petalData[] = [
                'label' => $species,
                'data' => $items->map(function($item) {
                    return [
                        'x' => $item->petal_length,
                        'y' => $item->petal_width
                    ];
                }),
                'backgroundColor' => $this->getSpeciesColor($species)
            ];
        }

        return view('welcome', [
            'sepalData' => $sepalData,
            'petalData' => $petalData,
            'barData' => $barData
        ]);
    }

    // Função para setar as cores
    private function getSpeciesColor($species) {
        switch ($species) {
            case 'Iris-setosa':
                return 'rgba(255, 99, 132, 0.6)';
            case 'Iris-versicolor':
                return 'rgba(54, 162, 235, 0.6)';
            case 'Iris-virginica':
                return 'rgba(35, 142, 35, 0.6)';
            default:
                return 'rgba(0, 0, 0, 0.6)';
        }
    }
    
    public function getData(){
        //Retornando dados do banco
        return response()->json(Iris::all()->toArray());
    }

    public function getDataSet(){
        //Retornando download do arquivo
        return response()->download(base_path('Iris.csv'));
    }
}
