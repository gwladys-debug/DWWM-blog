___________________________
🎯 Cas d'Utilisation (Use Cases)
___________________________

Ce projet distingue trois types d'acteurs : le **Visiteur** (non connecté), l'**Utilisateur inscrit** (connecté) et l'**Administrateur**. 

_______________________________________________________________________________________________
### 👤 1. Visiteur (Non connecté)
Le visiteur peut naviguer sur le blog de manière anonyme et consulter le contenu public.

| Identifiant | Nom du Cas d'Utilisation | Déclencheur (Action) | Résultat attendu (Système) |
| :--- | :--- | :--- | :--- |
| **UC-VIS-01** | 
	Consulter la liste des articles | 
	Arrivée sur la page d'accueil du blog. | 
	Affichage des articles ayant le statut `"publié"`, triés du plus récent au plus ancien, avec une pagination standard. |

| **UC-VIS-02** | 
	Filtrer par catégorie | 
	Clic sur le nom d'une catégorie dans l'interface. | 
	La liste est filtrée pour n'afficher que les articles publiés appartenant à cette catégorie spécifique. |

| **UC-VIS-03** | 
	Filtrer par tag (étiquette) | 
	Clic sur un tag (ex: dans un nuage de tags). | 
	La liste est filtrée pour n'afficher que les articles publiés contenant ce tag. |

| **UC-VIS-04** | 
	Combiner les filtres | 
	Sélection simultanée d'une catégorie ET d'un tag. | 
	Affichage exclusif des articles publiés qui répondent aux deux critères à la fois. |

| **UC-VIS-05** | 
	Voir le détail d'un article | 
	Clic sur le titre d'un article depuis la liste. | 
	Affichage complet de l'article (titre, contenu, catégorie, tags) et chargement de son espace commentaires. |

| **UC-VIS-06** | 
	Lire les commentaires | 
	Lecture de la section en bas d'un article. | 
	Les commentaires liés à l'article sont visibles par tous, sans obligation de connexion. |

_______________________________________________________________________________________________
### 🔐 2. Utilisateur (Inscrit & Connecté)
L'utilisateur possède un compte et peut interagir avec les articles via l'espace commentaires.

| Identifiant | Nom du Cas d'Utilisation | Déclencheur (Action) | Résultat attendu (Système) |
| :--- | :--- | :--- | :--- |
| **UC-USR-01** | 
	S'inscrire sur le blog | 
	Soumission du formulaire (Nom, Email, Mot de passe). | 
	Création du compte en base de données, ouverture automatique de la session. |
| **UC-USR-02** | 
	Se connecter / Se déconnecter | 
	Saisie des identifiants ou clic sur "Déconnexion". | 
	Authentification de l'utilisateur ou destruction de sa session en cours. |
| **UC-USR-03** | 
	Poster un commentaire | 
	Envoi d'un texte via le formulaire sous un article. | 
	Enregistrement du commentaire lié à l'article et à l'utilisateur, puis affichage immédiat. |
| **UC-USR-04** | 
	Modifier son propre commentaire | 
	Clic sur "Modifier" sur son commentaire, édition et validation. | 
	Mise à jour du texte en base de données et rafraîchissement de l'affichage. |
| **UC-USR-05** | 
	Supprimer son propre commentaire | 
	Clic sur le bouton "Supprimer" sur son commentaire. | 
	Suppression définitive du commentaire de la base de données. |

> ⚠️ **Règle métier stricte :** Un utilisateur connecté **ne peut pas** modifier ni supprimer les commentaires rédigés par d'autres utilisateurs.

_______________________________________________________________________________________________
### 🛠️ 3. Administrateur
L'administrateur possède un contrôle total sur les publications, la modération et la structure du blog.

| Identifiant | Nom du Cas d'Utilisation | Déclencheur (Action) | Résultat attendu (Système) |
| :--- | :--- | :--- | :--- |
| **UC-ADM-01** |
	Créer un article | 
	Remplissage du formulaire de création d'article. | 
	L'article est créé avec le statut choisi : `brouillon` (invisible pour les visiteurs) ou `publié`. |
| **UC-ADM-02** | 
	Modifier un article | 
	Édition des champs d'un article existant. | 
	Sauvegarde des modifications apportées au contenu ou aux métadonnées. |
| **UC-ADM-03** | 
	Publier / Dépublier un article | 
	Changement rapide du statut d'un article. | 
	Bascule instantanée de la visibilité de l'article sur la partie publique du site. |
| **UC-ADM-04** | 
	Supprimer un article | 
	Clic sur le bouton de suppression d'un article. | 
	Retrait de l'article de la base de données (et suppression en cascade de ses commentaires). |
| **UC-ADM-05** | 
	Modérer un commentaire | 
	Clic sur "Supprimer" sur n'importe quel commentaire du blog. | 
	Retrait immédiat d'un commentaire inapproprié, peu importe son auteur. |
| **UC-ADM-06** | 
	Gérer les catégories (CRUD) | 
	Création, lecture, modification ou suppression d'une catégorie. | 
	Mise à jour de la table des catégories et impact immédiat sur les filtres disponibles. |
| **UC-ADM-07** | 
	Gérer les tags (CRUD) | 
	Création, lecture, modification ou suppression d'un tag. | 
	Mise à jour de la table des tags et impact immédiat sur le nuage de tags. |
