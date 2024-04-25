<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "/css/app.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        
        <li class="nav-item link-offset-2 link-underline link-underline-opacity-0">

        <x-nav-link  :href="route('cars.index')" :active="request()->routeIs('cars.index') ">
                            {{ __('All cars') }}
                        </x-nav-link>
        </li>
        <li class="nav-item">
        <x-nav-link :href="route('cars.create')" :active="request()->routeIs('cars.create')">{{ __('Create Car Ad') }}</x-nav-link>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container-fluid my-5 bg-mylight mb-0">
			<div class="container-fluid">
				<div class="container text-center pt-5">
					<h3 class="fs-1 fw-bold text-myprimary fst-italic">Our Showroom</h3>
				</div>
				<div class="row my-0 py-0">
                    @foreach($cars as $car)
					<div class="col-md-4 col-sm-6 my-5">
						<div class="card bg-mylight text-myprimary border-0 text-center">
							<img src="{{ $car->car_image }}" class="card-img-top img-fluid" alt="..." style ="height:200px"/>
							<div class="card-body">
								<h5 class="card-title fw-bold fs-3"><a href="{{ route('cars.show', $car) }}" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">{{ $car->make }}</a>
                                <a href="{{ route('cars.show', $car) }}" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">{{ $car->model }}</a></h5>
								<p class="card-text small fw-lighter text-lowercase">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Year</th>
                                            <th>Color</th>
                                            <th>Manufacturer</th>
                                            <th>Emissions Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                
                                        <tr>
                                            <td>{{ $car->year }}</td>
                                            <td>{{ $car->color }}</td>
                                            <td>{{ $car->manufacturer->name}}</td>
                                            <td>{{ $car->emissions}}</td>
                                        </tr>
                                    </tbody>
                                  
                                </table>
								</p>
							</div>
						</div>
					</div>
    @endforeach
			</div>
		</div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>



  
  
     