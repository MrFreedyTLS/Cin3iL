# NOM Prénom
LENNE Arthur
## Acte métier
Obtenir des informations sur les films à l'affiche, les tarifs, les photos, l'adresse, les contacts,... du cinéma Cin3iL.
Un client souhaite voir si le film "la guerre des boutons" est à l'affiche. Puis souhaite voir les tarifs et l'adresse du cinéma ou il pourrait le regarder.
Le client souhaite également vérifier si le cinéma propose la vente de snacks et voir la disposition des places de cinéma (page Galleries)
## Solution
Consultation du site [cin3il.alwaysdata.net/accueil.php](https://cin3il.alwaysdata.net/accueil.php)

## Remarques
- J'ai un fichier inline.js qui est détecté par GreenIT alors qu'il n'existe pas dans mon projet.
- Je n'ai pas réussi à configurer le .htaccess qui m'aurait permis de résoudres les problèmes de cache.
- J'ai des problèmes avec des cookies statiques dans mes CSS et je ne vois pas comment corriger cette page.

## Scénario

**Ouvrir le plugin, taper about:blank dans la barre d'adresse, vider le cache, activer les bonnes pratiques**
***Première page : Accueil ***
**Mesure 1**
1. Arrivée sur la page d'acceuil (https://cin3il.alwaysdata.net/accueil.php)
2. Cliquer sur la section "Films" (https://cin3il.alwaysdata.net/movies.php)

***Deuxième page : Films ***
**Mesure 2**
3. Rechercher dans la liste des films, le film "La Guerre des Boutons"
4. Obtenir les informations nécessaire concernant ce film.
5. Cliquer sur la section "Galeries" (https://cin3il.alwaysdata.net/gallery.php)*

***Troisième page : Galeries ***
**Mesure 3**
6. Obtenir des informations concernant les snacks, les salles de cinéma, ...
7. Cliquer sur la section "Info Pratiques" (https://cin3il.alwaysdata.net/infos.php)

***Quatrième page : Infos Pratiques ***
**Mesure 4**
8. Obtenir des informations concernant les tarifs et l'adresse du cinéma.

**FIN**

## Premier run ecoindex
| Mesure | Requêtes | Taille | DOM | Ecoindex | Eau | CO2 | BP Rouges | BP Jaunes | BP Vertes | Note |
|--------|----------|--------|-----|----------|-----|-----|-----------|-----------|-----------|------|
| 1      | 17       | 757    | 72  | 86.75    |1.90 |1.27 |          7|          1|         13|     A|
| 2      | 16       | 1101   | 111 | 83.75    |1.99 |1.32 |          6|          1|         14|     A|
| 3      | 19       | 118    | 109 | 88.48    |1.85 |1.23 |          6|          1|         14|     A|
| 4      | 28       | 315    | 141 | 85.00    |1.95 |1.30 |          7|          3|         11|     A|

## Deuxième run ecoindex
| Mesure | Requêtes | Taille | DOM | Ecoindex | Eau | CO2 | BP Rouges | BP Jaunes | BP Vertes | Note |
|--------|----------|--------|-----|----------|-----|-----|-----------|-----------|-----------|------|
| 1      | 10       | 118    | 66  | 91.60    |1.75 |1.17 |          2|          1|         18|     A|
| 2      | 9        | 343    | 105 | 88.92    |1.83 |1.22 |          2|          1|         18|     A|
| 3      | 13       | 33     | 103 | 90.07    |1.80 |1.20 |          2|          1|         18|     A|
| 4      | 9        | 8      | 99  | 80.85    |1.77 |1.18 |          2|          1|         18|     A|



