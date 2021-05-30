Pour déployer le projet pour la première fois, on a besoin d'installer certains pré-requis.

--mariadb
--php

Pour déployer le projet pour la première fois, on a besoin d'installer certains pré-requis.

--mariadb
--php

Si vous n'avez pas ces pré-requis sur votre machine, voici les différentes étapes pour leur installation

----------INSTALLATION DES PRE-REQUIS---------------

Pour commencer, il faut passer en tant que super administrateur avec la commande 

****su -****

Ensuite, il faut taper les commandes suivantse

******apt-get update******
******apt-get upgrade****** dans un terminal

Ensuite, on installe mariadb et php7.3 avec les commandes

*****apt-get install mariadb-server*****
*****apt-get install php7.3 php-mysql php-xml*******

Une fois les installations terminées, on va creer notre base de données. Mais avant ça, on se connecte avec la commande 

*mysql -u root -p*
puis entrer le mot de passe de votre compte root (par defaut '' (vide))

Pour la création de notre base de données on fera une fois connecté, 
 
**** create database FService; ****

Une fois la base de données créée, on va créer un nouvel utilisateur et lui donner les accès à la base de données FService de notre projet avec les commandes

*CREATE USER 'admin'@'localhost'IDENTIFIED BY 'admin';*
*GRANT ALL PRIVILEGES ON FService.* TO 'admin'@'localhost' IDENTIFIED BY 'admin' WITH GRANT OPTION;*
*FLUSH PRIVILEGES;*
*quit*

A la fin on fait un ***exit*** pour quitter le mode super utilisateur

-----------------LE DEPLOIEMENT--------------

On tape dans un navigateur le lien suivant

https://github.com/fereoljob/FService.git

Une fois la page chargée, il faut cliquer sur Download ZIP dans l'onglet code

Le fichier une fois téléchargé, il faut se placer dans le dossier de telechargement dans votre terminal et dézipper le fichier avec la commande 

*unzip FService-master*

Puis on se place dans le dossier du projet avec la commande 

**cd FService-master**

Une fois dans le dossier, il faut taper la commande 

**php artisan serve** pour démarrer le serveur

Toujours dans le terminal, il faut ouvrir un nouvel onglet et taper la commande:

**php artisan migrate**

Une fois la commande totalement executée, il faut ensuite taper la commande 

**php artisan db:seed**

Une fois cette requete executée, il faut repartir sur le lien du serveur préalablement démarré

On a quatre type d'utilisateur dans la base avec les identifiants suivants

david.genest@email.com | Motdepasse (Prof & admin)
laurent.garcia@email.com | Motdepasse (Prof & supAdmin)
martin.dieguez@email.com | Motdepasse (Prof)
test.test@email.com | Motdepasse (Membre_administratif)

Vous pouvez donc faire les jeux de test ensuite en fonction de l'utilisateur connecté.









