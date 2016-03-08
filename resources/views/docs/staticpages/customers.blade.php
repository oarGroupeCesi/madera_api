@extends('_layouts.master')

@section('content')
	<h1>Clients</h1>
	<div class="row">
		<div class="col-md-12">
			<h2>Récupérer la liste des clients</h2>
			<pre>
<b>GET</b> /api/customer
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


			</pre>
			<h4>Réponse</h4>
			<pre>
[
  {
    "id": 1,
    "firstname": "Jean",
    "lastname": "Dupond",
    "email": "jean.dupond@exemple.fr",
    "adr_street": "16 rue Leclerc",
    "adr_zipcode": "76000",
    "adr_city": "Rouen",
    "created_at": "2016-03-08 22:30:43",
    "updated_at": "2016-03-08 22:30:43"
  },
  {
    "id": 2,
    "firstname": "Jean",
    "lastname": "Dupont",
    "email": "jean.dupont@exemple.fr",
    "adr_street": "16 rue Leclerc",
    "adr_zipcode": "76000",
    "adr_city": "Rouen",
    "created_at": "2016-03-08 22:32:56",
    "updated_at": "2016-03-08 22:32:56"
  }
]
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Créer un client</h2>
			<pre>
<b>POST</b> /api/customer
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA

{
  "lastname": "Dupond",
  "firstname": "Jean",
  "email": "jean.dupond@exemple.fr",
  "adr_street": "16 rue Leclerc",
  "adr_zipcode": "76000",
  "adr_city": "Rouen",
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
					<td>lastname</td>
					<td>String</td>
					<td>Nom du client</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>firstname</td>
					<td>String</td>
					<td>Prénom du client</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>email</td>
					<td>String</td>
					<td>Email du client</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>adr_street</td>
					<td>String</td>
					<td>Rue du client</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>adr_zipcode</td>
					<td>String</td>
					<td>Code postal du client</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>adr_city</td>
					<td>String</td>
					<td>Ville du client</td>
					<td>Oui</td>
				</tr>
			</table>
			<h4>Réponse</h4>
			<pre>
{
  "lastname": "Dupond",
  "firstname": "Jean",
  "email": "jean.dupond@exemple.fr",
  "adr_street": "16 rue Leclerc",
  "adr_zipcode": "76000",
  "adr_city": "Rouen",
  "updated_at": "2016-03-08 22:30:43",
  "created_at": "2016-03-08 22:30:43",
  "id": 1
}
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Récupérer un client</h2>
			<pre>
<b>GET</b> /api/customer/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


			</pre>
			<h4>Réponse</h4>
			<pre>
{
"id": 1,
"firstname": "Jean",
"lastname": "Dupond",
"email": "jean.dupond@exemple.fr",
"adr_street": "16 rue Leclerc",
"adr_zipcode": "76000",
"adr_city": "Rouen",
"created_at": "2016-03-08 22:30:43",
"updated_at": "2016-03-08 22:30:43"
}
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Modifier un client</h2>
			<pre>
<b>PUT</b> /api/customer/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA

{
  "lastname": "Dupond",
  "firstname": "Jean",
  "email": "jean.dupond@exemple.fr",
  "adr_street": "16 rue Leclerc",
  "adr_zipcode": "76000",
  "adr_city": "Rouen",
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
					<td>lastname</td>
					<td>String</td>
					<td>Nom du client</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>firstname</td>
					<td>String</td>
					<td>Prénom du client</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>email</td>
					<td>String</td>
					<td>Email du client</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>adr_street</td>
					<td>String</td>
					<td>Rue du client</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>adr_zipcode</td>
					<td>String</td>
					<td>Code postal du client</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>adr_city</td>
					<td>String</td>
					<td>Ville du client</td>
					<td>Non</td>
				</tr>
			</table>
			<h4>Réponse</h4>
			<pre>
{
  "lastname": "Dupond",
  "firstname": "Jean",
  "email": "jean.dupond@exemple.fr",
  "adr_street": "16 rue Leclerc",
  "adr_zipcode": "76000",
  "adr_city": "Rouen",
  "updated_at": "2016-03-08 22:30:43",
  "created_at": "2016-03-08 22:30:43",
  "id": 1
}
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Supprimer un client</h2>
			<pre>
<b>DELETE</b> /api/customer/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


			</pre>
			<h4>Réponse</h4>
			<pre>
Le client a bien été supprimé.
			</pre>
		</div>
	</div>
@endsection