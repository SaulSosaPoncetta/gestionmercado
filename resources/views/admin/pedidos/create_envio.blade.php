@extends('layouts.admin')

@section('content')
    <h1>Creacion de un nuevo envio | Pedido N°: {{ $orden->id }}</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Datos del pedido</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for=""><i class="bi bi-person-fill"></i> Cliente:</label>
                            <p>{{ $orden->usuario->name }}</p>
                            <small>{{ $orden->usuario->email }}</small>
                            <br>
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label for=""><i class="bi bi-cash"></i> Total de la orden: </label>
                            <br>
                            <p>${{ number_format($orden->total, 2) }}</p>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label for=""><i class="bi bi-cash"></i>Estado del pago: </label>
                            <br>
                            <p>{{ $orden->estado_pago }}</p>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for=""><i class="bi bi-map"></i> Domicilio envio: </label>
                            <br>
                            <p>{{ $orden->direccion_envio }}</p>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label for=""><i class="bi bi-list"></i> Numero de Transaccion: </label>
                            <br>
                            <p>{{ $orden->transaccion_id }}</p>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label for=""><i class="bi bi-cash"></i> Fecha de Compra: </label>
                            <br>
                            <p>{{ $orden->created_at }}</p>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for=""><i class="bi bi-cash"></i> Estado de la Orden: </label>
                            <br>
                            <p style="color: green; font-size: 18pt; font-weight: bold;">{{ $orden->estado_orden }}</p>
                            <br>
                        </div>
                        <div class="col-md-12">
                            <h4>Detalle de la orden</h4>
                            <br>
                            <tr>
                        </div>
                        <div>
                            <td>
                                <ul>
                                    @foreach ($orden->detalles as $detalle)
                                        <li>
                                            {{ $detalle->producto->nombre }} -
                                            Cantidad: {{ $detalle->cantidad }} -
                                            Precio: {{ $orden->moneda . ' ' . $detalle->precio }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">

                            @if ($orden->estado_orden == 'Procesando')

                                <form action="{{ route('admin.pedidos.store', $orden->id) }}" method="POST">
                                    @csrf

                                    <label for="nota">Nota(*) :</label>

                                    <div class="input-group">
                                        <div style="width: 100%">
                                            <textarea name="nota" id="nota" class="form-control" rows="5" placeholder="Notas del envio..." required>{{ old('nota') }}</textarea>
                                        </div>
                                    </div>

                                    @error('nota')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                    <br>

                                    <button type="submit" class="btn btn-primary">
                                        Registrar envio
                                    </button>

                                    <a href="{{ route('admin.pedidos.index') }}" class="btn btn-secondary">
                                        Cancelar
                                    </a>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>
    </div>
    </div>


    </div>
    </div>
    </div>
@endsection
