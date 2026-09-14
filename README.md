# 🏛️ Gestion de Pension — Veuves & Retraités

> **Projet académique — 2025**

Application web dédiée à la **gestion des dossiers de pension des veuves et des retraités**.
Le système permet de centraliser les informations des bénéficiaires, de suivre les paiements et de gérer les différents dossiers à travers une interface web intuitive.

---

## 📌 Présentation

**Gestion de Pension — Veuves & Retraités** est une application développée dans le cadre d'un projet académique.

L'objectif est de proposer une solution simple permettant à un organisme de gestion de :

* 👤 gérer les bénéficiaires ;
* 📁 gérer leurs dossiers de pension ;
* 💰 suivre les paiements ;
* 📊 visualiser les statistiques à travers des tableaux de bord ;
* ✏️ effectuer les opérations CRUD sur les données ;
* 🔎 consulter et suivre facilement les informations enregistrées.

L'application est développée en **PHP natif selon une architecture MVC**, avec **MySQL** pour la gestion des données et **Bootstrap** pour l'interface utilisateur.

---

## ✨ Fonctionnalités

### 👥 Gestion des bénéficiaires

* Ajouter un nouveau bénéficiaire
* Consulter les informations d'un bénéficiaire
* Modifier ses informations
* Supprimer un bénéficiaire
* Rechercher et consulter les dossiers

### 📂 Gestion des dossiers

* Création et gestion des dossiers de pension
* Suivi de l'état des dossiers
* Consultation des informations liées aux bénéficiaires

### 💵 Gestion des paiements

* Enregistrement des paiements
* Suivi des paiements effectués
* Consultation de l'historique des paiements
* Suivi de la situation des pensions

### 📊 Tableaux de bord

L'application dispose de plusieurs tableaux de bord permettant notamment de suivre :

* le nombre de bénéficiaires ;
* les dossiers enregistrés ;
* les paiements ;
* les différentes statistiques de gestion.

### 🛠️ Opérations CRUD

L'application met en œuvre les principales opérations de gestion des données :

**Create → Read → Update → Delete**

---

## 🧰 Technologies utilisées

| Technologie         | Utilisation                                 |
| ------------------- | ------------------------------------------- |
| 🟨 **JavaScript**   | Interactions et fonctionnalités côté client |
| 🟦 **Bootstrap**    | Interface utilisateur et responsive design  |
| 🐘 **PHP**          | Développement backend                       |
| 🏗️ **MVC**         | Architecture de l'application               |
| 🗄️ **MySQL**       | Gestion de la base de données               |
| 🌐 **HTML5 / CSS3** | Structure et présentation des pages         |

---

## 🏗️ Architecture

Le projet utilise une architecture **MVC (Model - View - Controller)** afin de séparer les différentes responsabilités de l'application.

```text
Gestion-de-pension/
│
├── controllers/       # Gestion des requêtes et de la logique applicative
│
├── models/            # Interaction avec la base de données
│
├── views/             # Interfaces utilisateur
│
├── public/            # Ressources accessibles publiquement
│
├── assets/            # CSS, JavaScript, images...
│
├── config/             # Configuration de l'application
│
└── index.php          # Point d'entrée de l'application
```

> ℹ️ La structure exacte peut varier selon l'organisation des fichiers du projet.

---

## 🗄️ Base de données

L'application utilise **MySQL** pour stocker et gérer les informations relatives aux :

* bénéficiaires ;
* dossiers de pension ;
* paiements ;
* utilisateurs et/ou administrateurs ;
* autres données nécessaires au fonctionnement de l'application.

Le script SQL nécessaire à la création de la base de données peut être placé dans le dossier :

```text
database/
```

---

## 🚀 Installation

### 1️⃣ Cloner le projet

```bash
git clone https://github.com/Nandresyfinaritra2943/Gestion-de-pension-veuve-retraite-avec-PHP.git
```

Puis accéder au dossier :

```bash
cd Gestion-de-pension-veuve-retraite-avec-PHP
```

### 2️⃣ Installer un serveur local

L'application nécessite un environnement PHP avec MySQL.

Vous pouvez utiliser par exemple :

* **XAMPP**
* **WAMP**
* **Laragon**
* ou un environnement **Apache + PHP + MySQL** configuré manuellement.

### 3️⃣ Configurer la base de données

Créer une base de données MySQL :

```sql
CREATE DATABASE gestion_pension;
```

Importer ensuite le fichier SQL du projet dans cette base.

Exemple avec la ligne de commande :

```bash
mysql -u root -p gestion_pension < database/gestion_pension.sql
```

> Adaptez le nom du fichier SQL et de la base de données à ceux présents dans le projet.

### 4️⃣ Configurer la connexion à la base de données

Modifier les paramètres de connexion dans le fichier de configuration du projet :

```php
$host = "localhost";
$dbname = "gestion_pension";
$user = "root";
$password = "";
```

⚠️ Les paramètres exacts dépendent de votre environnement local.

### 5️⃣ Lancer l'application

Avec Apache/XAMPP/WAMP, placez le projet dans le répertoire approprié puis démarrez :

```text
Apache
MySQL
```

Ouvrez ensuite l'application dans votre navigateur :

```text
http://localhost/Gestion-de-pension-veuve-retraite-avec-PHP/
```

---

## 📸 Aperçu

Ajoutez ici quelques captures d'écran de l'application afin de présenter visuellement le projet.

### Tableau de bord

![Dashboard](screenshots/dashboard.png)

### Gestion des bénéficiaires

![Bénéficiaires](screenshots/beneficiaires.png)

### Gestion des paiements

![Paiements](screenshots/paiements.png)

> 💡 Vous pouvez créer un dossier `screenshots/` dans le projet et y placer vos captures d'écran.

---

## 🎯 Objectifs pédagogiques

Ce projet m'a permis de mettre en pratique plusieurs notions du développement web :

* conception d'une application web ;
* architecture **MVC** ;
* programmation **PHP natif** ;
* conception et manipulation d'une base de données **MySQL** ;
* développement d'interfaces avec **Bootstrap** ;
* manipulation des opérations **CRUD** ;
* gestion des relations entre différentes données ;
* utilisation de **Git et GitHub** pour la gestion du code source.

---

## 🔮 Améliorations possibles

Quelques évolutions pourraient être ajoutées dans une future version :

* 🔐 système d'authentification et gestion des rôles plus avancée ;
* 📄 génération automatique de documents et reçus ;
* 📊 statistiques plus détaillées ;
* 🔎 système de recherche et de filtrage avancé ;
* 📧 notifications concernant les paiements ;
* 📱 amélioration de l'expérience mobile ;
* 🔒 renforcement de la sécurité et de la validation des données.

---

## 👨‍💻 Auteur

**RAZAFIMAHEFA Nandresy Finaritra**

🎓 Étudiant en Informatique — ENI Fianarantsoa, Madagascar

💻 Intérêts : **Développement Web · DevOps · Administration Systèmes & Réseaux**

---

## 📄 Licence

Projet réalisé dans un **cadre académique**.

Vous pouvez consulter le code source et l'utiliser à des fins d'apprentissage et d'étude.

---

⭐ Si ce projet vous semble intéressant, n'hésitez pas à laisser une étoile au dépôt GitHub !
