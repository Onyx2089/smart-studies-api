# Smart Studies - API

Bienvenue dans la documentation de l'API de Smart Studies, qui alimente la logique de données derrière la plateforme éducative.

## Endpoints

### Étudiant

- `GET /etudiant/cours` : Récupère la liste des cours pour un étudiant.
- `GET /etudiant/projets` : Récupère la liste des projets assignés à un étudiant.
- `GET /etudiant/notes` : Récupère les notes d'un étudiant.

### Professeur

- `GET /professeur/cours` : Récupère la liste des cours gérés par un professeur.
- `GET /professeur/projets` : Récupère la liste des projets gérés par un professeur.
- `POST /professeur/evaluer` : Évalue un travail soumis par un étudiant.

## Authentification

L'API utilise le protocole OAuth pour l'authentification. Assurez-vous de fournir un jeton d'accès valide dans l'en-tête de chaque requête.
