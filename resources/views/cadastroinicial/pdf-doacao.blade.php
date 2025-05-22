<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Recibo de Doação</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Recibo de Doação</h2>

    <p><strong>ID Documento:</strong> {{ $documento->id }}</p>
    <p><strong>Número do Documento:</strong> {{ $documento->numero }}</p>
    <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($documento->dt_doc)->format('d/m/Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Categoria</th>
                <th>Item</th>
                <th>Tipo</th>
                <th>Embalagem</th>
                <th>Observação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materiais as $index => $mat)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mat->CategoriaMaterial->nome ?? '-' }}</td>
                    <td>{{ $mat->ItemCatalogoMaterial->nome ?? '-' }}</td>
                    <td>{{ $mat->TipoMaterial->nome ?? '-' }}</td>
                    <td>
                        @php
                            $emb = $mat->Embalagem;
                            $desc = [];

                            if ($emb && $emb->qtde_n4 && $emb->unidadeMedida4) {
                                $desc[] = "{$emb->qtde_n4} {$emb->unidadeMedida4->nome}";
                            }
                            if ($emb && $emb->qtde_n3 && $emb->unidadeMedida3) {
                                $desc[] = "{$emb->qtde_n3} {$emb->unidadeMedida3->nome}";
                            }
                            if ($emb && $emb->qtde_n2 && $emb->unidadeMedida2) {
                                $desc[] = "{$emb->qtde_n2} {$emb->unidadeMedida2->nome}";
                            }
                            if ($emb && $emb->qtde_n1 && $emb->unidadeMedida) {
                                $desc[] = "{$emb->qtde_n1} {$emb->unidadeMedida->nome}";
                            }
                        @endphp
                        {{ implode(' / ', $desc) }}
                    </td>
                    <td>{{ $mat->observacao ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <br><br>
    <p>Assinatura do Doador: _______________________________________</p>
    <p>Assinatura do Receptor: _______________________________________</p>
</body>

</html>
