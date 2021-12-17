@extends('welcome')

@section('contenido')

@yield('error')
@yield('success')

<form action="/createCustomer" method="POST">
    @csrf
    <div class="container" style="padding: 25px; width: 70%;">
        <div class="card">
            <h5 class="card-header text-center">¡¡ CONCURSO !!</h5>
            <div class="card-body">
                <h5 class="card-title">Registro de datos</h5>
                <p class="card-text">Registre sus datos personales y participe en el sorteo de un gran premio</p>
                <div class="row g-0">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Nombre*</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Apellido*</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Cédula*</label>
                        <input type="number" class="form-control" id="document" name="document" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Departamento*</label>
                        <select class="form-select" name="deparment_id" id="deparment_id" required>
                            <option selected value="">Seleccione departamento...</option>
                            @foreach($deparments as $deparment)
                            <option value="{{ $deparment->id }}">{{ $deparment->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Ciudad*</label>
                        <select class="form-select" name="city_id" id="city_id" required>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Celular*</label>
                        <input type="number" class="form-control" name="phone" id="phone" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Correo*</label>
                        <input type="email" class="form-control" aria-describedby="emailHelp" name="email" id="email" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="checkbox" class="form-check-input" id="authorize_data" name="authorize_data" required>
                        <label class="form-check-label" for="exampleCheck1">Autorizo el tratamiento de mis datos de acuerdo con la finalidad establecida en la política de protección de datos personales. <a href="https://www.defensoria.gov.co/public/Normograma%202013_html/Normas/Ley_1581_2012.pdf">Haga clic aquí</a></label>
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>

    $(document).ready(function () {

        $('#deparment_id').on('change', function(){

            var deparment = $(this).val();

            if($.trim(deparment) != ""){
                $.get('/cities', {deparment: deparment}, function (cities){
                    $('#city_id').empty();
                    $('#city_id').append("<option value=''>Seleccione ciudad..</option>");

                    $.each(cities, function (index, value){
                     $('#city_id').append("<option value='"+index+"'>"+value+"</option>");

                    });
                });
            }
        })















        // let $city = document.querySelector('#city_id');
    

    // function cities1(){
    //     var deparment = document.getElementById("deparment_id").value;
    //     // console.log(deparment);
    //     $.ajax({
    //         url: "/cities/"+deparment,
    //         method: "GET",
    //         success: function (data) {
    //             // const citiesArray = JSON.parse(JSON.stringify(data));
    //             // let select = '<option selected>Seleccione ciudad..</option>';
    //             // citiesArray.forEach(city => {
    //             //     select += `<option value="${city.id}">${city.name}</option>`;
    //             // });
    //             // $city.innerHTML = select;    

    //         }
    //     });
    // }

});
</script>

<!-- @yield('resultado') -->
@endsection