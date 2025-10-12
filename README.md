# MyTasks-Secure
Project: Securized site in php for Beweb

## A savoir:
- Le style du site à été fait à 99% avec bootstrap 5.8.3, le fichier css n'étant là que pour gérer la hauteur des sections.
- La base de données fournie avec le projet est remplie avec un utilisateur et des tâches qui lui sont assignées:
```yml
Email: admin@root.com
Mot de passe: Root123!
```
- Chaque utilisatteur ne peut voir que les tâches qui lui sont assignées.
- Le mot de passe est hashé et stocké dans la base de données
- Le SESSION_ID est régénéré
- Le Projet à été fait avec Laragon mais il fonctionnera tout aussi bien avec Xampp ou Wampp (testé)




## Arborescence:

```
MyTasks-Secure/
│
├── index.php                         # Point d'entrée principal, routeur
├── README.md                         # Readme du Projet
│
├── BASE DE DONNEE SQL A INSTALLER    # La bdd à importer sur phpmyadmin
│   └── mytasks_secure.sql
│
├── controllers/                      # Logique des contrôleurs
│   ├── AuthController.php
│   ├── ProfileController.php
│   └── TaskController.php
│
│── DAO/                              # Requêtes SQL pour la base de données 
│   ├── UserDAO.php
│   └── TaskDAO.php
│
├── models/                           # Modèles
│   ├── User.php
│   └── Task.php
│
├── views/                            # Vues HTML avec layout
│   ├── layout.php
│   ├── auth/
│   │   ├── login.php
│   │   └── register.php
│   ├── profile/
│   │   └── profile.php
│   └── task/
│       ├── create.php
│       ├── edit.php
│       ├── delete.php
│       └── list.php
│
├── public/
│   └── style.css                     # Style
│   
└── config/
    └── database.php                  # Connexion à la base de données

```
