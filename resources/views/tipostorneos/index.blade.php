@extends('layouts.app')

@section('content')
<div class="ui container">
    <form class="ui form" id="equipos">
        <div class="two fields">
            <div class="field">
                <label>Grupo</label>
                <div class="ui search" id="grupo">
                        <div class="ui left input">
                        <select name="grupo_id" id="grupo_id">
                            <option value="">--Escoger tipo de torneo</option>
                            @foreach($tipo as $tipo)
                                <option value="{{$tipo['id']}}">{{ $tipo['nombre'] }}</option>
                            @endforeach
                        </select>
    
                        </div>
                    </div>
            </div>
            </div>
        <button class="ui primary button">
                <i class="save icon"></i>
                Guardar
            </button>
    </form>
    </div>
</div>

@endsection