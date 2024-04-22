<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "/css/app.css" >
    <title>Document</title>
</head>
<body>
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Cars for Sale') }}
            </h2>

    
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Color</th>
                    <th>Manufacturer</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                <tr>
                    <td><a href="{{ route('cars.show', $car) }}">{{ $car->make }}</a></td>
                    <td><a href="{{ route('cars.show', $car) }}">{{ $car->model }}</a></td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->color }}</td>
                    <td>{{ $car->manufacturer->name}}</td>
                    <td>{{ $car->emissions}}</td>
                    <td>
                        @if ($car->car_image)
                            <img src="{{ $car->car_image }}" width="100px" height="100px" alt="Car Image">
                        @else
                            Image coming soon
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        </div>
   
</body>
</html>



  
  
     