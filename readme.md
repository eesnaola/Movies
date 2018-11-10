# Movies

## Run

```shell
php -S localhost:8000 -t public
```

## API Documentation

```shell
GET /api/movies
```
Muestra todas las peliculas con sus actores.
```shell
GET /api/movies/{id}
```
Muestra los datos de una pelicula en particular.
```shell
POST /api/movies
```
Crea una nueva pelicula.
```shell
DELETE /api/movies/{id}
```
Elimina una pelicula.
```shell
PUT /api/movies/{id}
```
Actualiza una pelicula.
```shell
GET /api/actors
```
Muestra todos los actores y las sus peliculas.
```shell
GET /api/actors{id}
```
Muestra un actor en particular.
```shell
POST /api/actors
```
Crea un nuevo actor.
```shell
DELETE /api/actors{id}
```
Elimina un actor.
```shell
PUT /api/actors{id}
```
Edita un actor en particular.
