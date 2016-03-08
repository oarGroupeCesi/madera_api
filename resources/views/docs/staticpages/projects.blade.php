@extends('_layouts.master')

@section('content')
	<h1>Projets</h1>
	<div class="row">
		<div class="col-md-12">
			<h2>Récupérer la liste des projets</h2>
			<pre>
<b>GET</b> /api/project
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


			</pre>
			<h4>Réponse</h4>
			<pre>
[
  {
    "id": 2,
    "name": "Test 2",
    "status": "pending",
    "quotation_price": null,
    "quotation_date": null,
    "customer_id": 2,
    "user_id": 1,
    "created_at": "2016-03-08 22:46:32",
    "updated_at": "2016-03-08 22:46:32"
  },
  {
    "id": 1,
    "name": "Test",
    "status": "draft",
    "quotation_price": 50000,
    "quotation_date": "2016-08-01 08:00:00",
    "customer_id": 2,
    "user_id": 1,
    "created_at": "2016-03-08 22:46:19",
    "updated_at": "2016-03-08 22:46:19"
  }
]
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Créer un projet</h2>
			<pre>
<b>POST</b> /api/project
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA

{
    "name": "Test",
    "status": "draft",
    "quotation_price": 50000,
    "customer_id": 2,
    "user_id": 1,
  }



			</pre>
			<h4>Paramètres</h4>
			<table class="table table-bordered">
				<tr>
					<th>Nom</th>
					<th>Type</th>
					<th>Description</th>
					<th>Requis</th>
				</tr>
				<tr>
					<td>name</td>
					<td>String</td>
					<td>Nom du projet</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>status</td>
					<td>Enum : draft, accepted, pending, refused, command, billing</td>
					<td>Statut du projet</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>quotation_price</td>
					<td>Entier</td>
					<td>Prix du devis</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>quotation_date</td>
					<td>Date</td>
					<td>Date du devis</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>customer_id</td>
					<td>Entier</td>
					<td>Id du client</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>user_id</td>
					<td>Entier</td>
					<td>Id de l'utilisateur</td>
					<td>Oui</td>
				</tr>
			</table>
			<h4>Réponse</h4>
			<pre>
{
  "id": 3,
  "name": "Test",
  "status": "draft",
  "quotation_price": "50000",
  "quotation_date": null,
  "customer_id": "2",
  "user_id": 1,
  "updated_at": "2016-03-08 22:52:53",
  "created_at": "2016-03-08 22:52:53"
}
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Récupérer un projet</h2>
			<pre>
<b>GET</b> /api/project/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


			</pre>
			<h4>Réponse</h4>
			<pre>
{
  "name": "Test",
  "status": "draft",
  "quotation_price": "50000",
  "quotation_date": null,
  "customer_id": "2",
  "user_id": 1,
  "updated_at": "2016-03-08 22:52:53",
  "created_at": "2016-03-08 22:52:53",
  "id": 3
}
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Modifier un projet</h2>
			<pre>
<b>PUT</b> /api/project/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA

{
  "name": "Test",
  "status": "draft",
  "quotation_price": "50000",
  "quotation_date": "2016-03-08 22:55:34",
  "customer_id": "2",
  "user_id": 1,
}


			</pre>
			<h4>Paramètres</h4>
			<table class="table table-bordered">
				<tr>
					<th>Nom</th>
					<th>Type</th>
					<th>Description</th>
					<th>Requis</th>
				</tr>
				<tr>
					<td>name</td>
					<td>String</td>
					<td>Nom du projet</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>status</td>
					<td>Enum : draft, accepted, pending, refused, command, billing</td>
					<td>Statut du projet</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>quotation_price</td>
					<td>Entier</td>
					<td>Prix du devis</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>quotation_date</td>
					<td>Date</td>
					<td>Date du devis</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>customer_id</td>
					<td>Entier</td>
					<td>Id du client</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>user_id</td>
					<td>Entier</td>
					<td>Id de l'utilisateur</td>
					<td>Non</td>
				</tr>
			</table>
			<h4>Réponse</h4>
			<pre>
{
  "name": "Test",
  "status": "draft",
  "quotation_price": "50000",
  "quotation_date": "2016-03-08 22:55:34",
  "customer_id": "2",
  "user_id": 1,
  "updated_at": "2016-03-08 22:52:53",
  "created_at": "2016-03-08 22:52:53",
  "id": 3
}
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Supprimer un projet</h2>
			<pre>
<b>DELETE</b> /api/project/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


			</pre>
			<h4>Réponse</h4>
			<pre>
Le projet a bien été supprimé.
			</pre>
		</div>
	</div>
@endsection