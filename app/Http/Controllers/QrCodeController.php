<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataQrCode; // Certifique-se de usar o nome correto do modelo

class QrCodeController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados da requisição
        $request->validate([
            'type' => 'required|integer',
            'data' => 'required|string',
        ]);

        // Criação de um novo registro
        $qrcode = DataQrCode::create([ // Use DataQrCode aqui
            'type' => $request->type,
            'data' => $request->data,
        ]);

        // Retorna uma resposta JSON
        return response()->json($qrcode, 201);
    }
}
