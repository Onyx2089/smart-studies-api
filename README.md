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

## Installation

1. Clonez ce dépôt.
2. Exécutez `npm install` pour installer les dépendances.
3. Configurez les fichiers d'environnement avec les clés d'API nécessaires.

## Développement

- Utilisez `npm run dev` pour lancer le serveur de développement.
- Accédez à [http://localhost:5000](http://localhost:5000) dans votre navigateur.

## Contribution

1. Fork du projet.
2. Créez une branche pour votre fonctionnalité (`git checkout -b fonctionnalite/nouvelle-fonctionnalite`).
3. Commit et push de vos modifications (`git commit -m 'Ajout d'une nouvelle fonctionnalité'`).
4. Créez une demande d'extraction (pull request).
