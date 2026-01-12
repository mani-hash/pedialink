# PediaLink

> PediaLink is a child and maternal health care system. This is our 2nd Year Group Project.

## Team Members

- Manimehalan
- Udan Sachintha
- Keeththigan
- Chamod Haritha

## Requirements

Before setting up the project, make sure you have the following installed:

- [Composer](https://getcomposer.org/)
- [Docker](https://www.docker.com/)

Note: Do not install docker desktop. Install docker engine + compose. 

## Project Setup

### 1. Clone the Repository

```bash
git clone https://github.com/mani-hash/pedialink.git
```

```bash
cd pedialink
```

### 2. Set up .env file

```bash
cp .env.example .env
```

Update the .env file with correct entries.

**Members of cs 28**: Ask in the group for correct entries!

### 3. Start docker service

```bash
sudo systemctl start docker
```

### 4. Build the docker container

```bash
docker compose up --build
```

The above command will build and run the application

## How to run/stop the app?

### 1. Run the container

```bash
docker compose up
```

Or if you want to run the container in detached mode:

```bash
docker compose up -d
```

### 2. Stop the container

```bash
docker compose down
```

## Storage fix for docker

Type the following commands to fix storage issues:

### 1. Find the id for www-data in the docker container

Type this command inside the project root. This will give you the uid.

```bash
docker compose exec app id www-data
```

**NOTE**: The value will be typically 33

### 2. Change the storage folder owner to the above id

This will change the owner of the storage folder. In my case the id was 33.

```bash
sudo chown -R 33:33 ./storage
```

### 3. Change the permissions for storage folder

Change the permissions for all directories inside storage folder

```bash
sudo find ./storage -type d -exec chmod 775 {} \;
```
Change the permissions for all files inside storage folder

```bash
sudo find ./storage -type f -exec chmod 664 {} \;
```

### Additional info:

- By default the project runs under `localhost:8080`
- By default, you can connect to the database through external services or 3rd party front-end client under the following host: `localhost:5432`
- Note that the web app container may not be able to access the database through the above host name and port! Use docker's internal network name! This entry is `db` by default.
- Remember to copy the github hooks in `hooks/commit-msg` to `.git/hooks`. Make sure to set appropriate permissions
