# Links shortening app

:warning: THis is very early alpha many thinsg are under construction :construction: and not working as intended.

- Salt is generated while image building

## What is implemented
- []Landing page
- [x]Links database
- []Creating New links via API
- []Authentication and authorization
- [x]Wokring links redirect (from short ID)

### Short ID

I have already implemented shortening ID but this is object of change and therefore it can be changed in future.

## Installation

```bash
# clone this repository

# Create data folder & set permissions
mkdir ./data && chown 11235:11235 ./data

# Download docker image & run migration
docker compose pull
docker compose run --rm app php bin/cake.php migrations migrate --no-lock
docker compose up -d
```
