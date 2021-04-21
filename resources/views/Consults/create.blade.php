@extends('layouts.template')
@section('css')
<link href="{{ URL::asset('assets/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@endsection
@section('js')
<script src="{{ URL::asset('assets/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js') }}"> </script>
<script src="{{ URL::asset('assets/bootstrap-datetimepicker-master/js/locales/bootstrap-datetimepicker.pt-BR.js') }}"> </script>
@endsection
@section('title', 'Criação de Consulta')
@section('content')
<div class="container mt-5">
    <form method="POST" action="{{ route('consult.insert') }}">
    @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Médico</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="idDoctor">
                        <option value="" selected>Selecione</option>
                        @foreach($doctors as $doctor)
                            <option value="{{$doctor->id}}">{{$doctor->name}} - {{$doctor->speciality}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputDateTime">Data e Hora</label>
                    <div class="input-group date" data-date="" data-date-format="dd-mm-yyyy HH:ii">
                        <input type="text" id="datetimepicker" class="form-control datetimepicker"
                            size="16" value="" name="dateTime" placeholder="Data e Hora para a consulta" readonly
                        >
                        <span class="input-group-text" id="basic-addon2">
                            <i class="fas fa-calendar-day"></i>
                        </span>
                        <span class="input-group-text" id="basic-addon2">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                    
                    <script type="text/javascript">
                        $(".datetimepicker").datetimepicker({
                            format: "dd/mm/yyyy hh:ii",
                            weekstart: 0,
                            autoclose: 1,
                            language: "pt-BR",
                            startDate: '+0d'
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Queixa:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Marcar</button>
    </form>
</div>
@endsection