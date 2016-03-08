@extends('_layouts.master')

@section('content')
	<h1>Natures de module</h1>
	<div class="row">
		<div class="col-md-12">
			<h2>Récupérer la liste des natures de module</h2>
			<pre>
<b>GET</b> /api/modulenature
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


			</pre>
			<h4>Réponse</h4>
			<pre>
[
  {
    "id": 1,
    "name": "Mûr extérieur",
    "unity": "M linéaire",
    "price": 2000,
    "created_at": "2016-03-08 22:27:34",
    "updated_at": "2016-03-08 22:27:34"
  },
  {
    "id": 2,
    "name": "Cloison intérieure",
    "unity": "M linéaire",
    "price": 2300,
    "created_at": "2016-03-08 22:27:34",
    "updated_at": "2016-03-08 22:27:34"
  },
  {
    "id": 3,
    "name": "Plancher sur dalle",
    "unity": "M2",
    "price": 3000,
    "created_at": "2016-03-08 22:27:34",
    "updated_at": "2016-03-08 22:27:34"
  },
  {
    "id": 4,
    "name": "Plancher porteur",
    "unity": "M2",
    "price": 1900,
    "created_at": "2016-03-08 22:27:34",
    "updated_at": "2016-03-08 22:27:34"
  },
  {
    "id": 5,
    "name": "Ferme de charpente",
    "unity": "Unité",
    "price": 2500,
    "created_at": "2016-03-08 22:27:34",
    "updated_at": "2016-03-08 22:27:34"
  },
  {
    "id": 6,
    "name": "Couverture",
    "unity": "M2",
    "price": 5000,
    "created_at": "2016-03-08 22:27:34",
    "updated_at": "2016-03-08 22:27:34"
  }
]
			</pre>
		</div>
	</div>
@endsection