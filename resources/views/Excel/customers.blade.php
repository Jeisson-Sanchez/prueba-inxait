<table>
    <thead>
        <tr>
            <td><strong>Nombre</strong></td>
            <td><strong>Apellido</strong></td>
            <td><strong>Documento</strong></td>
            <td><strong>Departamento</strong></td>
            <td><strong>Ciudad</strong></td>
            <td><strong>Celular</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Autorización tratamiento de datos</strong></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->last_name}}</td>
                <td>{{$customer->document}}</td>
                <td>{{$customer->deparment->name}}</td>
                <td>{{$customer->city->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email}}</td>
                <td>
                    @if ($customer->authorize_data == 1)
                        Si
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
