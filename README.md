# Silex Simple REST
[![Latest Stable Version](https://poser.pugx.org/vesparny/silex-simple-rest/v/stable.png)](https://packagist.org/packages/vesparny/silex-simple-rest) [![Total Downloads](https://poser.pugx.org/vesparny/silex-simple-rest/downloads.png)](https://packagist.org/packages/vesparny/silex-simple-rest) [![Build Status](https://secure.travis-ci.org/vesparny/silex-simple-rest.png)](http://travis-ci.org/vesparny/silex-simple-rest) [![Dependency Status](https://www.versioneye.com/user/projects/53d0e4eacca8fffeb200006d/badge.png)](https://www.versioneye.com/user/projects/53d0e4eacca8fffeb200006d)


A simple silex skeleton application for writing RESTful API. Developed and maintained by [Alessandro Arnodo](http://alessandro.arnodo.net).

**This project wants to be a starting point to writing scalable and maintainable REST api with Silex PHP micro-framework**

Continuous Integration is provided by [Travis-CI](http://travis-ci.org/).

####How do I run it?
After download the last [release](https://github.com/vesparny/silex-simple-rest/releases), from the root folder of the project, run the following commands to install the php dependencies, import some data, and run a local php server.

You need at least php **5.4.*** with **SQLite extension** enabled and **Composer**
    
    composer install 
    sqlite3 app.db < resources/sql/schema.sql
    php -S 0:9001 -t web/

You can install the project also as a composer project
		
		composer create-project vesparny/silex-simple-rest
    
Your api is now available at http://localhost:9001/api/v1.

####Run tests
Some tests were written, and all CRUD operations are fully tested :)

From the root folder run the following command to run tests.
    
    vendor/bin/phpunit 


####What you will get
The api will respond to

	GET  ->   http://localhost:9001/api/v1/notes
	POST ->   http://localhost:9001/api/v1/notes
	PUT ->   http://localhost:9001/api/v1/notes/{id}
	DELETE -> http://localhost:9001/api/v1/notes/{id}

Your request should have 'Content-Type: application/json' header.
Your api is CORS compliant out of the box, so it's capable of cross-domain communication.

Try with curl:
	
	#GET
	curl http://localhost:9001/api/v1/notes -H 'Content-Type: application/json' -w "\n"

	#POST (insert)
	curl -X POST http://localhost:9001/api/v1/notes -d '{"note":"Hello World!"}' -H 'Content-Type: application/json' -w "\n"

	#PUT (update)
	curl -X PUT http://localhost:9001/api/v1/notes/1 -d '{"note":"Uhauuuuuuu!"}' -H 'Content-Type: application/json' -w "\n"

	#DELETE
	curl -X DELETE http://localhost:9001/api/v1/notes/1 -H 'Content-Type: application/json' -w "\n"

####What's under the hood
Take a look at the source code, it's self explanatory :)
More documentation and info about the code will be available soon.

Under the resources folder you can find a .htaccess file to put the api in production.

####Contributing

Fell free to contribute, fork, pull request, hack. Thanks!

####Author


+	[@vesparny](https://twitter.com/vesparny)

+	[http://alessandro.arnodo.net](http://alessandro.arnodo.net)

+	<mailto:alessandro@arnodo.net>

## License

see LICENSE file.



Doc application Suite

MODULE NOTE --------

	GET  ->		http://test.app-and-go.fr/toto/web/api/v1/notes
	Affiche toutes les notes


	POST ->   http://test.app-and-go.fr/toto/web/api/v1/notes
	Ajout d'une note : {id_note}{id_user}{note}(int,int,int)


	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/notes/29{id_note}
	Modifie une note en function de son id_note : {note}(int)


	DELETE -> http://test.app-and-go.fr/toto/web/api/v1/notes/{id_note}
	Supprime une note 

FIN NOTE---------------

MODULE USER --------


	GET  ->		http://test.app-and-go.fr/toto/web/api/v1/user
		Affiche toutes les users

	GET  ->		http://test.app-and-go.fr/toto/web/api/v1/user/{id_user}
	Affiche toutes les users en function de son id_user :


	POST ->   http://test.app-and-go.fr/toto/web/api/v1/user
		Ajout d'un user :

		ajout au tables : user, setting,localisation,(photo)

	{"id_facebook": "bigint",
    "prenom": "varchar",
    "nom": "varchar",
    "email": "mail",
    "id_sex": "char(1)",
    "age": "int(11)",
    "description": "varchar",
    "password": "varchar",
    "date_registration": "date",
    "super_like": "int"}
	


	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/user/{id_user}
		Modifie un user en function de son id_user :
	{

	    "prenom": "varchar",
	    "nom": "varchar",
	    "email": "mail",
	    "id_sex": "char(1)",
	    "age": "int(11)",
	    "description": "varchar",
	
	}

	DELETE -> http://test.app-and-go.fr/toto/web/api/v1/user/{id_user}
		Supprime un user 

		supprime au tables : user, setting,localisation,(photo)

	
	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/user/description/{id_user}
		Modifie sa description en function de son id_user :
	{
	    "description": "varchar",	  
	}
	

	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/user/setsex/{id_user}
		Modifie son sex en function de son id_user :
	{
	    "id_sex": "char(1)",	  
	}

	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/user/super_like/{id_user}
		Modifie son sex en function de son id_user :
	{
	    "super_like": "int",	  
	}
FIN USER---------------


MODULE SETTING --------


	GET  ->		http://test.app-and-go.fr/toto/web/api/v1/setting/{id_user}
		Affiche toutes les parametre en fonction d'un user


	POST ->   http://test.app-and-go.fr/toto/web/api/v1/setting
		Ajout d'un parametre :

	{"id_user": "bigint",
	"look_sex": "char(1)",
    "hide_profil": "boolean",
    "distance_max": "int",
    "look_age_max": "int",
    "look_age_min": "int",
    }
		
	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/setting/look_sex/{id_user}
		Modifie son sexe_rechercher en function de son id_user :
	{
		"look_sex": "char(1)",	  
	}

	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/setting/distance_max/{id_user}
		Modifie son sex en function de son id_user :
	{
	    "distance_max": "int",	  
	}

	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/setting/look_age_max/{id_user}
		Modifie son age_rechercher_max en function de son id_user :
	{
	    "look_age_max": "int",	  
	}
	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/setting/look_age_min/{id_user}
		Modifie son age_rechercher_min en function de son id_user :
	{
	    "look_age_min": "int",	  
	}
	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/setting/hide_profil/{id_user}
		Modifie si l'utilisateur veut masquer_profil en function de son id_user :
	{
	    "hide_profil": "boolean",	  
	}

FIN SETTING---------------



MODULE REPORT --------


	GET  ->		http://test.app-and-go.fr/toto/web/api/v1/report
		Affiche toutes les REPORT


	POST ->   http://test.app-and-go.fr/toto/web/api/v1/report
		Ajout d'un report :

	{"id_report": "bigint",
	"id_user": "bigint",
    "date_report": "date",
    "raison": "varchar",
    "id_user_report": "bigint",
    }
		
	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/report/raison/{id_user}
		Modifie la raison en function de son id_user :
	{
		"raison": "varchar",	  
	}


FIN REPORT---------------



MODULE LOCATION --------


	GET  ->		http://test.app-and-go.fr/toto/web/api/v1/location
		Affiche toutes les location


	POST ->   http://test.app-and-go.fr/toto/web/api/v1/location
		Ajout d'un location :

	{
	"id_location": "bigint",
    "id_user": "bigint",
    "lng_lat": "varchar",
    "date_location": "date",
  	}
	

	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/location/{id_user}
		Modifie sa lng_lat en function de son id_user :
	{

	   "lng_lat": "varchar",
		"date_location": "date",
	
	}

	DELETE -> http://test.app-and-go.fr/toto/web/api/v1/location/{id_user}
		Supprime une location function de son id_user :

FIN LOCATION---------------


MODULE MATCH --------


	GET  ->		http://test.app-and-go.fr/toto/web/api/v1/match{id_user}
		Affiche toutes les MATCH d'un user


	POST ->   http://test.app-and-go.fr/toto/web/api/v1/match/like

	Renvoie : Ajout d'un MATCH  et envoie {match: match_result} :

	Verification dans la table dislike pour voir si il y a dislike de la part de id_user_target

	Verification dans la table PENDING_VALIDATION_MATCH pour voir si il y a match possible

	like	POST ->   http://test.app-and-go.fr/toto/web/api/v1/pending_validation_match/verification

	Si l'id_user est la table PENDING_VALIDATION_MATCH alors ajout dans la table MATCH :

		{
		"id_match": "bigint",
		"id_user": "bigint",
		"date_match": "date",
		"lng_lat": "varchar",
		"id_user_matched": "bigint",
		}
	
	Sinon

		Si
			table dislike:  id_user = id_user_target
			Rien faire

		Sinon	

			POST ->   http://test.app-and-go.fr/toto/web/api/v1/pending_validation_match
				Ajout d'une attente de validation du match :

				{
				"id_validation": "bigint",
				"id_user": "bigint",
				"id_user_target": "bigint",
				}

		FIN
	
	DELETE -> http://test.app-and-go.fr/toto/web/api/v1/match/{id_user}
		Supprime un match function de son id_user :
		et
		Place id_user dans Dislike 

FIN MATCH---------------


***************** MODULE PENDING_VALIDATION_MATCH --------  


	GET  ->		http://test.app-and-go.fr/toto/web/api/v1/pending_validation_match
		Affiche toutes les liste d'attente de validation de match

	GET  ->		http://test.app-and-go.fr/toto/web/api/v1/pending_validation_match{id_user}
	Affiche toutes les liste d'attente de validation de match d'un user

	POST ->   http://test.app-and-go.fr/toto/web/api/v1/pending_validation_match
		Ajout d'une attente de validation du match :

		{
		"id_validation": "bigint",
		"id_user": "bigint",
		"id_user_target": "bigint",
		}
	
	POST ->   http://test.app-and-go.fr/toto/web/api/v1/pending_validation_match/verification
		renvoie 1 son id_user est dans remplie dans la table en id_user_target avec comme id_user_target l'id_user :

		{
		"id_user": "bigint",
		"id_user_target": "bigint",
		}

	DELETE -> http://test.app-and-go.fr/toto/web/api/v1/pending_validation_match/{id_user}
		Supprime les attentes de validation du match en function de son id_user :

FIN PENDING_VALIDATION_MATCH --------


MODULE PHOTOS --------


	GET  ->		http://test.app-and-go.fr/toto/web/api/v1/photos{id_user}
		Affiche toutes les photos de l'user


	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/photos/1/{id_user}
		Modifie ou ajoute sa photo1 en function de son id_user :
	{
	    "photo_1": "varchar",	  
	}
	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/photos/2/{id_user}
		Modifie sa photo2 en function de son id_user :
	{
	    "photo_1": "varchar",	  
	}
	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/photos/3/{id_user}
		Modifie sa photo3 en function de son id_user :
	{
	    "photo_1": "varchar",	  
	}
	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/photos/4/{id_user}
		Modifie sa photo4 en function de son id_user :
	{
	    "photo_1": "varchar",	  
	}
	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/photos/5/{id_user}
		Modifie sa photo5 en function de son id_user :
	{
	    "photo_1": "varchar",	  
	}
	PUT ->   http://test.app-and-go.fr/toto/web/api/v1/photos/6/{id_user}
		Modifie sa photo6 en function de son id_user :
	{
	    "photo_1": "varchar",	  
	}

	

	DELETE -> http://test.app-and-go.fr/toto/web/api/v1/photos/1/{id_user}
		Supprime la photo1 en function de son id_user :
		
	DELETE -> http://test.app-and-go.fr/toto/web/api/v1/photos/2/{id_user}
		Supprime la photo2 en function de son id_user :
	
	DELETE -> http://test.app-and-go.fr/toto/web/api/v1/photos/3/{id_user}
		Supprime la photo3 en function de son id_user :
	
	DELETE -> http://test.app-and-go.fr/toto/web/api/v1/photos/4/{id_user}
		Supprime la photo4 en function de son id_user :
	
	DELETE -> http://test.app-and-go.fr/toto/web/api/v1/photos/5/{id_user}
		Supprime la photo5 en function de son id_user :
	
	DELETE -> http://test.app-and-go.fr/toto/web/api/v1/photos/6/{id_user}
		Supprime la photo6 en function de son id_user :
	

FIN PHOTO---------------

