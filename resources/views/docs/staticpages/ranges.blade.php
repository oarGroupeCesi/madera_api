@extends('_layouts.master')

@section('content')
	<h1>Gammes</h1>
	<div class="row">
		<div class="col-md-12">
			<h2>Récupérer la liste des gammes</h2>
			<pre>
<b>GET</b> /api/range
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


			</pre>
			<h4>Réponse</h4>
			<pre>
[
  {
    "id": 1,
    "name": "Gamme - bois - biologique - chaume - Sans angle",
    "exterior_finish": "wood",
    "insulating": "biological",
    "top": "thatch",
    "configuration": "Without angle",
    "template": 1,
    "created_at": "2016-03-08 22:27:34",
    "updated_at": "2016-03-08 22:27:34"
  },
  {
    "id": 2,
    "name": "Gamme - crépis - biologique - ardoise - Avec angle fermant",
    "exterior_finish": "roughcast",
    "insulating": "biological",
    "top": "slate",
    "configuration": "With closing angle",
    "template": 1,
    "created_at": "2016-03-08 22:27:34",
    "updated_at": "2016-03-08 22:27:34"
  },
  {
    "id": 3,
    "name": "Gamme - bois - naturel - chaume - Avec angle ouvrant",
    "exterior_finish": "wood",
    "insulating": "natural",
    "top": "thatch",
    "configuration": "With opening angle",
    "template": 1,
    "created_at": "2016-03-08 22:27:34",
    "updated_at": "2016-03-08 22:27:34"
  }
]
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Créer une gamme</h2>
			<pre>
<b>POST</b> /api/range
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA

{
	"name": "Ma gamme",
	"exterior_finish": "wood",
	"insulating": "biological",
	"top": "thatch",
	"configuration": "Without angle",
	"template": 0
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
					<td>Nom de la gamme</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>exterior_finish</td>
					<td>Enum : wood, roughcast</td>
					<td>Finitions extérieures de la gamme</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>insulating</td>
					<td>Enum : synthetic, natural, biological</td>
					<td>Isolant de la gamme</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>top</td>
					<td>Enum : roof tiles, slate, thatch</td>
					<td>Toiture de la gamme</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>configuration</td>
					<td>Enum : Without angle, With closing angle, With opening angle</td>
					<td>Configuration de la amme</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>template</td>
					<td>Booléen</td>
					<td>Permet de savoir si cette gamme est un modèle</td>
					<td>Oui</td>
				</tr>
			</table>
			<h4>Réponse</h4>
			<pre>
{
	"id": 1,
	"name": "Ma gamme",
	"exterior_finish": "wood",
	"insulating": "biological",
	"top": "thatch",
	"configuration": "Without angle",
	"template": 0,
	"created_at": "2016-03-08 22:27:34",
	"updated_at": "2016-03-08 22:27:34"
}
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Récupérer une gamme</h2>
			<pre>
<b>GET</b> /api/range/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


			</pre>
			<h4>Réponse</h4>
			<pre>
{
    "id": 1,
    "name": "Gamme - bois - biologique - chaume - Sans angle",
    "exterior_finish": "wood",
    "insulating": "biological",
    "top": "thatch",
    "configuration": "Without angle",
    "template": 1,
    "created_at": "2016-03-08 22:27:34",
    "updated_at": "2016-03-08 22:27:34"
}
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Modifier une gamme</h2>
			<pre>
<b>PUT</b> /api/range/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA

{
	"name": "Ma gamme",
	"exterior_finish": "wood",
	"insulating": "biological",
	"top": "thatch",
	"configuration": "Without angle",
	"template": 0
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
					<td>Nom de la gamme</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>exterior_finish</td>
					<td>Enum : wood, roughcast</td>
					<td>Finitions extérieures de la gamme</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>insulating</td>
					<td>Enum : synthetic, natural, biological</td>
					<td>Isolant de la gamme</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>top</td>
					<td>Enum : roof tiles, slate, thatch</td>
					<td>Toiture de la gamme</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>configuration</td>
					<td>Enum : Without angle, With closing angle, With opening angle</td>
					<td>Configuration de la amme</td>
					<td>Non</td>
				</tr>
				<tr>
					<td>template</td>
					<td>Booléen</td>
					<td>Permet de savoir si cette gamme est un modèle</td>
					<td>Non</td>
				</tr>
			</table>
			<h4>Réponse</h4>
			<pre>
{
	"name": "Ma gamme",
	"exterior_finish": "wood",
	"insulating": "biological",
	"top": "thatch",
	"configuration": "Without angle",
	"template": 0,
	"created_at": "2016-03-08 22:27:34",
	"updated_at": "2016-03-08 22:27:34",
	"id": 1
}
			</pre>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Supprimer une gamme</h2>
			<pre>
<b>DELETE</b> /api/range/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


			</pre>
			<h4>Réponse</h4>
			<pre>
La gamme a bien été supprimée.
			</pre>
		</div>
	</div>
@endsection