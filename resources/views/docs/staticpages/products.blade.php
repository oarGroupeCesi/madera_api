@extends('_layouts.master')

@section('content')
	<h1>Produits</h1>
	<div class="row">
		<div class="col-md-12">
			<h2>Récupérer la liste des produits</h2>
			<pre>
<b>GET</b> /api/product
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


			</pre>
			<h4>Réponse</h4>
			<pre>
[
  {
    "id": 1,
    "name": "Maison en bois ouest",
    "range_id": 1,
    "project_id": 3,
    "created_at": "2016-03-08 23:13:52",
    "updated_at": "2016-03-08 23:13:52"
  },
  {
    "id": 2,
    "name": "Maison en bois est",
    "range_id": 1,
    "project_id": 2,
    "created_at": "2016-03-08 23:14:03",
    "updated_at": "2016-03-08 23:14:03"
  }
]
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Créer un produit</h2>
			<pre>
<b>POST</b> /api/product
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA

{
  "name": "Maison en bois est",
  "range_id": "1",
  "project_id": "2"
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
					<td>Nom du produit</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>range_id</td>
					<td>Entier</td>
					<td>Id de la gamme du produit</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>project_id</td>
					<td>Entier</td>
					<td>Id du projet au quel appartient le produit</td>
					<td>Oui</td>
				</tr>
			</table>
			<h4>Réponse</h4>
			<pre>
{
  "name": "Maison en bois est",
  "range_id": "1",
  "project_id": "2",
  "updated_at": "2016-03-08 23:14:03",
  "created_at": "2016-03-08 23:14:03",
  "id": 2
}
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Récupérer un produit</h2>
			<pre>
<b>GET</b> /api/product/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


			</pre>
			<h4>Réponse</h4>
			<pre>
{
	"id": 2,
	"name": "Maison en bois est",
	"range_id": 1,
	"project_id": 2,
	"created_at": "2016-03-08 23:14:03",
	"updated_at": "2016-03-08 23:14:03"
}
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Modifier un produit</h2>
			<pre>
<b>PUT</b> /api/product/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA

{
	"name": "Maison en bois nord",
	"range_id": 1,
	"project_id": 2
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
					<td>Nom du produit</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>range_id</td>
					<td>Entier</td>
					<td>Id de la gamme du produit</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>project_id</td>
					<td>Entier</td>
					<td>Id du projet au quel appartient le produit</td>
					<td>Non</td>
				</tr>
			</table>
			<h4>Réponse</h4>
			<pre>
{
  "name": "Maison en bois nord",
  "range_id": "1",
  "project_id": "2",
  "updated_at": "2016-03-08 23:14:03",
  "created_at": "2016-03-08 23:14:03",
  "id": 2
}
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Supprimer un produit</h2>
			<pre>
<b>DELETE</b> /api/product/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


			</pre>
			<h4>Réponse</h4>
			<pre>
Le produit a bien été supprimé.
			</pre>
		</div>
	</div>
@endsection