Projet E-Wallet - Partie B
Présentation

Cette seconde partie du projet consiste à améliorer l'application E-Wallet développée lors de la Partie A en appliquant des pratiques modernes de développement en PHP.

L'objectif est de refactoriser le code existant tout en conservant les mêmes fonctionnalités et en améliorant sa lisibilité, sa maintenabilité et son organisation.

Réalisé par

Nom Complet : Adja Coura Ndour.

Améliorations

La Partie B apporte les améliorations suivantes :

    Refactorisation du code
    Utilisation des fonctions natives de manipulation des tableaux
    Utilisation des namespaces
    Amélioration de l'organisation du projet
    Architecture

Le projet conserve la même structure de fichiers :

    index.php
    controller.php
    services.php
    repository.php
    validator.php

Les namespaces sont ajoutés afin de mieux organiser les différentes parties de l'application.

Fonctionnalités

Toutes les fonctionnalités développées dans la Partie A sont conservées :

    Création d'un wallet
    Dépôt d'argent
    Retrait d'argent
    Consultation des transactions
    Nouveautés
    Fonctions natives PHP

Le code est simplifié grâce à l'utilisation de fonctions natives telles que :

    array_filter
    array_map
    array_search
    in_array

lorsque leur utilisation est pertinente.

Namespaces

Les différents fichiers utilisent des namespaces afin d'améliorer l'organisation et la modularité du projet.

Bonnes pratiques

Le projet est restructuré pour offrir :

un code plus lisible ;
une meilleure réutilisabilité ;
une maintenance facilitée.
Lancement du projet

Depuis le terminal :

    php index.php
Git
Branches utilisées
    main
    develop-partB
    feature/*
Convention des commits
    feat
    fix
    refactor
    docs
Concepts étudiés

Cette partie met en œuvre les notions suivantes :

Fonctions anonymes
Closures
Fonctions natives de manipulation des tableaux
Namespaces
Composer
Packagist