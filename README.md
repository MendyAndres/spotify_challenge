## Aivo Challenge 

Api Demo made using Slim 3 microframwork, It consults the spotify api to get an specific artist's albums.

First, After cloning the repo You should execute 

>```$ Composer Install```

to install the necessary dependencies.

Then, for defining your environment file you should to execute 

>`$ cp .env.example .env`

Finally, you could test by running the following command.

>`$ Composer Start`

The consult's endpoint is: 

>` http://localhost:8000/api/v1/albums?q=<band-name>`