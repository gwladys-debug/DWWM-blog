                                _______________________________________________________
                                            🎯 Cas d'Utilisation (Use Cases)
                                _______________________________________________________

Ce projet distingue trois types d'acteurs : le **Visiteur** (non connecté), l'**Utilisateur inscrit** (connecté) et l'**Administrateur**.

---

### 👤 1. Visiteur (Non connecté)

Le visiteur peut naviguer sur le blog de manière anonyme et consulter le contenu public.

| Identifiant |  
| **UC-VIS-01** |
Nom du Cas d'Utilisation: Consulter la liste des articles |
Déclencheur (Action) : Arrivée sur la page d'accueil du blog. |
Résultat attendu (Système) : Affichage des articles ayant le statut `"publié"`, triés du plus récent au plus ancien, avec une pagination standard. |

| **UC-VIS-02** |
Nom du Cas d'Utilisation : Filtrer par catégorie |
Déclencheur (Action) : Clic sur le nom d'une catégorie dans l'interface.|
Résultat attendu (Système) : La liste est filtrée pour n'afficher que les articles publiés appartenant à cette catégorie spécifique. |

| **UC-VIS-03** |
Nom du Cas d'Utilisation : Filtrer par tag (étiquette) |
Déclencheur (Action) : Clic sur un tag (ex: dans un nuage de tags). |
Résultat attendu (Système) : La liste est filtrée pour n'afficher que les articles publiés contenant ce tag. |

| **UC-VIS-04** |
Nom du Cas d'Utilisation : Combiner les filtres |
Déclencheur (Action) : Sélection simultanée d'une catégorie ET d'un tag.|
Résultat attendu (Système) : Affichage exclusif des articles publiés qui répondent aux deux critères à la fois. |

| **UC-VIS-05** |
Nom du Cas d'Utilisation : Voir le détail d'un article |
Déclencheur (Action) : Clic sur le titre d'un article depuis la liste. |
Résultat attendu (Système) : Affichage complet de l'article (titre, contenu, catégorie, tags) et chargement de son espace commentaires. |

| **UC-VIS-06** |
Nom du Cas d'Utilisation : Lire les commentaires |
Déclencheur (Action) : Lecture de la section en bas d'un article. |
Résultat attendu (Système) : Les commentaires liés à l'article sont visibles par tous, sans obligation de connexion. |

---

### 🔐 2. Utilisateur (Inscrit & Connecté)

L'utilisateur possède un compte et peut interagir avec les articles via l'espace commentaires.

| Identifiant |
| **UC-USR-01** |
Nom du Cas d'Utilisation : S'inscrire sur le blog |
Déclencheur (Action) : Soumission du formulaire (Nom, Email, Mot de passe). |
Résultat attendu (Système) : Création du compte en base de données, ouverture automatique de la session. |

| **UC-USR-02** |
Nom du Cas d'Utilisation : Se connecter / Se déconnecter |
Déclencheur (Action) : Saisie des identifiants ou clic sur "Déconnexion". |
Résultat attendu (Système) : Authentification de l'utilisateur ou destruction de sa session en cours. |

| **UC-USR-03** |
Nom du Cas d'Utilisation : Poster un commentaire |
Déclencheur (Action) : Envoi d'un texte via le formulaire sous un article. |
Résultat attendu (Système) : Enregistrement du commentaire lié à l'article et à l'utilisateur, puis affichage immédiat. |

| **UC-USR-04** |
Nom du Cas d'Utilisation : Modifier son propre commentaire |
Déclencheur (Action) : Clic sur "Modifier" sur son commentaire, édition et validation. |
Résultat attendu (Système) : Mise à jour du texte en base de données et rafraîchissement de l'affichage. |

| **UC-USR-05** |
Nom du Cas d'Utilisation : Supprimer son propre commentaire |
Déclencheur (Action) : Clic sur le bouton "Supprimer" sur son commentaire. |
Résultat attendu (Système) : Suppression définitive du commentaire de la base de données. |

> ⚠️ **Règle métier stricte :** Un utilisateur connecté **ne peut pas** modifier ni supprimer les commentaires rédigés par d'autres utilisateurs.

---

### 🛠️ 3. Administrateur

L'administrateur possède un contrôle total sur les publications, la modération et la structure du blog.

| Identifiant |

| **UC-ADM-01** |
Nom du Cas d'Utilisation : Créer un article |
Déclencheur (Action) : Remplissage du formulaire de création d'article. |
Résultat attendu (Système) : L'article est créé avec le statut choisi : 'brouillon' (invisible pour les visiteurs) ou 'publié'. |

| **UC-ADM-02** |
Nom du Cas d'Utilisation : Modifier un article |
Déclencheur (Action) : Édition des champs d'un article existant. |
Résultat attendu (Système) : Sauvegarde des modifications apportées au contenu ou aux métadonnées. |

| **UC-ADM-03** |
Nom du Cas d'Utilisation : Publier / Dépublier un article |
Déclencheur (Action) : Changement rapide du statut d'un article. |
Résultat attendu (Système) : Bascule instantanée de la visibilité de l'article sur la partie publique du site. |

| **UC-ADM-04** |
Nom du Cas d'Utilisation : Supprimer un article |
Déclencheur (Action) : Clic sur le bouton de suppression d'un article. |
Résultat attendu (Système) : Retrait de l'article de la base de données (et suppression en cascade de ses commentaires). |

| **UC-ADM-05** |
Nom du Cas d'Utilisation : Modérer un commentaire |
Déclencheur (Action) : Clic sur "Supprimer" sur n'importe quel commentaire du blog. |
Résultat attendu (Système) : Retrait immédiat d'un commentaire inapproprié, peu importe son auteur. |

| **UC-ADM-06** |
Nom du Cas d'Utilisation : Gérer les catégories (CRUD) |
Déclencheur (Action) : Création, lecture, modification ou suppression d'une catégorie.|
Résultat attendu (Système) : Mise à jour de la table des catégories et impact immédiat sur les filtres disponibles. |

| **UC-ADM-07** |
Nom du Cas d'Utilisation : Gérer les tags (CRUD) |
Déclencheur (Action) : Création, lecture, modification ou suppression d'un tag. |
Résultat attendu (Système) : Mise à jour de la table des tags et impact immédiat sur le nuage de tags. |
