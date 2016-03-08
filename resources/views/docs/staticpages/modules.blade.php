@extends('_layouts.master')

@section('content')
  <h1>Modules</h1>
  <div class="row">
    <div class="col-md-12">
      <h2>Récupérer la liste des modules</h2>
      <pre>
<b>GET</b> /api/module
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


      </pre>
      <h4>Réponse</h4>
      <pre>
[
  {
    "id": 1,
    "name": "module mur nord",
    "height": 10,
    "width": 30,
    "quantity": 4,
    "modulenature_id": 2,
    "project_id": 1,
    "created_at": "2016-03-08 23:28:55",
    "updated_at": "2016-03-08 23:28:55"
  },
  {
    "id": 3,
    "name": "module mur sud",
    "height": 10,
    "width": 30,
    "quantity": 4,
    "modulenature_id": 2,
    "project_id": 1,
    "created_at": "2016-03-08 23:30:10",
    "updated_at": "2016-03-08 23:30:10"
  }
]
      </pre>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2>Créer un module</h2>
      <pre>
<b>POST</b> /api/module
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA

{
  "name": "module mur nord",
  "height": "10",
  "width": "30",
  "quantity": "4",
  "modulenature_id": "2",
  "project_id": "1"
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
          <td>Nom du module</td>
          <td>Oui</td>
        </tr>
        <tr>
          <td>height</td>
          <td>Entier</td>
          <td>Hauteur du module</td>
          <td>Non</td>
        </tr>
        <tr>
          <td>width</td>
          <td>Entier</td>
          <td>Longueur du module</td>
          <td>Oui</td>
        </tr>
        <tr>
          <td>quantity</td>
          <td>Entier</td>
          <td>Quantité de nature de module</td>
          <td>Oui</td>
        </tr>
        <tr>
          <td>modulenature_id</td>
          <td>Entier</td>
          <td>Id de la nature de module</td>
          <td>Oui</td>
        </tr>
        <tr>
          <td>project_id</td>
          <td>Entier</td>
          <td>Id du projet</td>
          <td>Oui</td>
        </tr>
      </table>
      <h4>Réponse</h4>
      <pre>
{
  "name": "module mur nord",
  "height": "10",
  "width": "30",
  "quantity": "4",
  "modulenature_id": "2",
  "project_id": "1",
  "updated_at": "2016-03-08 23:28:55",
  "created_at": "2016-03-08 23:28:55",
  "id": 1
}
      </pre>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2>Récupérer un module</h2>
      <pre>
<b>GET</b> /api/module/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


      </pre>
      <h4>Réponse</h4>
      <pre>
{
  "id": 1,
  "name": "module mur nord",
  "height": 10,
  "width": 30,
  "quantity": 4,
  "modulenature_id": 2,
  "project_id": 1,
  "created_at": "2016-03-08 23:28:55",
  "updated_at": "2016-03-08 23:28:55"
}
      </pre>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2>Modifier un module</h2>
      <pre>
<b>PUT</b> /api/module/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA

{
  "name": "module mur ouest",
  "height": "10",
  "width": "30",
  "quantity": "4",
  "modulenature_id": "2",
  "project_id": "1"
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
          <td>Nom du module</td>
          <td>Non</td>
        </tr>
        <tr>
          <td>height</td>
          <td>Entier</td>
          <td>Hauteur du module</td>
          <td>Non</td>
        </tr>
        <tr>
          <td>width</td>
          <td>Entier</td>
          <td>Longueur du module</td>
          <td>Non</td>
        </tr>
        <tr>
          <td>quantity</td>
          <td>Entier</td>
          <td>Quantité de nature de module</td>
          <td>Non</td>
        </tr>
        <tr>
          <td>modulenature_id</td>
          <td>Entier</td>
          <td>Id de la nature de module</td>
          <td>Non</td>
        </tr>
        <tr>
          <td>project_id</td>
          <td>Entier</td>
          <td>Id du projet</td>
          <td>Non</td>
        </tr>
      </table>
      <h4>Réponse</h4>
      <pre>
{
  "name": "module mur ouest",
  "height": "10",
  "width": "30",
  "quantity": "4",
  "modulenature_id": "2",
  "project_id": "1",
  "updated_at": "2016-03-08 23:28:55",
  "created_at": "2016-03-08 23:28:55",
  "id": 1
}
      </pre>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2>Supprimer un module</h2>
      <pre>
<b>DELETE</b> /api/module/{id}
Content-Type: application/json
Authorization: Baerer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImVtYWlsIjoiYWRtaW5pc3RyYXRldXJAbWFkZXJhLmxvY2FsIiwicGFzcyI6ImFkbWluIn0.5KuUQVXx_8e6uEehMWakUU-7ydRSrh2TJRR_0D5XGkA


      </pre>
      <h4>Réponse</h4>
      <pre>
Le module a bien été supprimé.
      </pre>
    </div>
  </div>
@endsection