@extends('_layouts.master')

@section('content')
	<h1>Authentification</h1>
	<div class="row">
		<div class="col-md-12">
			<p>
				Pour l'authentification, l'API Madera utilise le système créer par <a href="https://auth0.com/" target="_blank">Auth0</a>, j'ai nommé le <a href="https://jwt.io/" target="_blank">JSON Web Tokens</a>.
			</p>
			<p>
				Pourquoi utiliser JWT et pas l’oauth ou d’autre système d’authentification ? Le point important est qu’une API REST doit être <b>stateless</b>. Cela veut dire qu’il n’y a pas de session côté serveur comme les système d’authentification avec cookies ou encore le Basic Authentication. La plus part du temps un utilisateur possède un token qu’il doit échanger à la connexion.
			</p>
			<p>
				L’avantage de JWT c’est qu’il est constitué de trois parties : <br>

				<ul>
					<li>La première partie concerne le header qui contient un objet javascript avec l’algorithme utilisé pour hasher le contenu. Le tout encodé en base64.</li>
					<li>La seconde partie est composé du contenu. C’est un objet javascript qui contient les informations à échanger entre le client et le serveur. On peut envoyer des champs de notre choix (username, password, etc.) ainsi que des champs spécifiés par JWT (iss : origine du token, sub : sujet, exp : date d’expiration du token, iat : date de création du token). Le tout est également encodé en base64.</li>
					<li>La dernière partie s’appelle la signature. C’est la concaténation du header et du contenu encodé avec l’algorithme renseigné dans le header.</li>
				</ul>
			</p>
			<h2>Se connecter</h2>
			<pre>
<b>POST</b> /api/auth
Content-Type: application/json

{
    "email": "jean.dupond@exemple.fr",
    "password": "test"
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
					<td>email</td>
					<td>String</td>
					<td>L'email de l'utilisateur qui souhaite se connecter</td>
					<td>Oui</td>
				</tr>
				<tr>
					<td>password</td>
					<td>String</td>
					<td>Le mot de passe de l'utilisateur qui souhaite se connecter</td>
					<td>Oui</td>
				</tr>
			</table>
			<h4>Réponse</h4>
			<pre>
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA"
}
			</pre>
		</div>
	</div>
@endsection