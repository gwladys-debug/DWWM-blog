<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories</title>
    <!-- Tu pourras lier ton CSS ou Tailwind ici plus tard -->
</head>

<body>

    <div style="max-width: 800px; margin: 40px auto; font-family: sans-serif;">

        <h2>Liste des Catégories (Projet Fil Rouge)</h2>

        <!-- Optionnel : Un bouton pour créer une nouvelle catégorie plus tard -->
        <a href="#"
            style="background: #4F46E5; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; display: inline-block; margin-bottom: 20px;">
            + Ajouter une catégorie
        </a>

        <!-- Tableau des catégories -->
        <table border="1" cellpadding="10" cellspacing="0"
            style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background-color: #f3f4f6;">
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><strong>{{ $category->name }}</strong></td>
                        <td><code>{{ $category->slug }}</code></td>
                        <td>
                            <!-- Boutons d'actions pour le CRUD (on met des '#' en attendant les routes) -->
                            <a href="#" style="color: #2563EB; margin-right: 10px;">Modifier</a>
                            <a href="#" style="color: #DC2626;">Supprimer</a>
                        </td>
                    </tr>
                @endforeach

                <!-- Si la table est vide, Blade permet d'afficher un petit message de secours -->
                @if ($categories->isEmpty())
                    <tr>
                        <td colspan="4" style="text-align: center; color: #6b7280;">
                            Aucune catégorie pour le moment.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

    </div>

</body>

</html>
