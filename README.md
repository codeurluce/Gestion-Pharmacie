# 💊 Projet de Gestion d'une Pharmacie en Ligne

## 🎯 Objectif Général

Ce projet a été réalisé avec PHP-MySQL dans le cadre d’un projet de fin d’étude: cycle Licence. Il a pour but d’automatiser la gestion d’une pharmacie à travers une application web.

---

## ✅ Objectifs Spécifiques

* Permettre aux pharmaciens de consulter et mettre à jour les informations sur les produits disponibles.
* Faciliter l'enregistrement et la gestion des ventes.

---

## 👀 Aperçu du projet 

![Tableau de bord](Page1.png)
![Tableau de bord](Page2.png)
![Tableau de bord](Page3.png)
![Tableau de bord](Page4.png)

---

## 🧩 Fonctionnalités (Cas d'utilisation)

### 👨‍⚕️ Employé

* Authentification
* Consultation des produits
* Vente de produits
* Annulation d’une vente
* Consultation des ventes

### 👨‍💼 Administrateur

* Authentification
* Gestion des employés
* Passer des commandes (en cas de rupture de stock)
* Consultation, ajout, modification et suppression de produits
* Vente et annulation de vente
* Affichage des recettes journalières

---

## 🔄 Diagrammes de Séquence

### 🔑 Authentification

L’utilisateur doit saisir son identifiant et son mot de passe pour accéder à l’application.

### 🛒 Gestion des Ventes

L’utilisateur vérifie la disponibilité du produit avant d’enregistrer la vente.

### 📦 Gestion du Stock

L’administrateur peut ajouter, modifier ou supprimer un produit via l’interface de gestion du stock.

---

## 🛠️ Outils Utilisés

### 💻 Langages

* **CSS** : mise en forme de l’interface
* **PHP** : logique serveur, traitement des requêtes
* **SQL** : communication avec la base de données

---

## 📌 Remarques

Ce projet constitue une base simple mais fonctionnelle pour la gestion numérique d'une pharmacie. Il peut être enrichi par :

* Un tableau de bord analytique
* Une gestion des utilisateurs plus avancée
* L’intégration d’une API de messagerie ou d’alerte pour les ruptures de stock

---

Voici une section que vous pouvez ajouter à votre `README.md` pour décrire **les étapes d'installation du projet de gestion d'une pharmacie en ligne** :

---

## ⚙️ Étapes d'installation du projet

### 1. 📁 Cloner le dépôt

```bash
git clone https://github.com/codeurluce/Gestion-Pharmacie.git
cd nom-du-depot
```

### 2. 🌐 Configuration de l'environnement
* Assurez-vous d’avoir **PHP**, **MySQL** et **Apache** ou **XAMPP/Laragon** installés sur votre machine.
* Placez le dossier du projet dans le répertoire `htdocs` (XAMPP).

### 3. 🛠️ Configuration de la base de données

* Ouvrez **phpMyAdmin**.
* Créez une base de données nommée (par exemple) `db_pharmacie`.
* Importez le fichier SQL fourni (`db_pharmacie.sql`) dans cette base de données.

### 4. ⚙️ Configuration des fichiers PHP

* Les informations de connexion à la base de données si nécessaire :

```php
$host = "localhost";
$user = "root";
$password = ""; // Laissez vide si vous utilisez XAMPP sans mot de passe
$dbname = "pharmacie_db";
```

### 5. 🚀 Lancement du projet

* Lancez **XAMPP**.
* Démarrez **Apache** et **MySQL**.
* Accédez à l'application dans votre navigateur :

```
http://localhost/Gestion-Pharmacie/Projet/bienvenu.php
```
---

## 🔐 Informations de Connexion

### 👨‍💼 Administrateur

* Pour vous connecter en tant qu’administrateur, veuillez consulter la table **`pharmacien`** dans la base de données.
* Les champs typiques à vérifier sont :

  * `username`
  * `password`

### 👨‍⚕️ Employé / Pharmacien

* Pour vous connecter en tant qu’employé, consultez la table **`employe`**.
* Vérifiez les colonnes suivantes :

  * `username`
  * `password`

> ⚠️ **Remarque** : les mots de passe peuvent être cryptés. Si vous rencontrez un problème pour vous connecter, vérifiez s’il y a un hachage (ex. : MD5, SHA1, etc.) et adaptez la vérification dans le code PHP.

## 📥 Documentation

Téléchargez le document complet du projet ici :  
👉 [Télécharger la documentation (format Word)](docs/Rapport_PROJET.docx)
