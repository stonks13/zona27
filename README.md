# Zona27 project

Zona 27 is the studio of my superior grade final project.

### Description

This is a website that I did for my superior grade final project. Consists on a website that You can self-manage your content. There are code from frontend and backend, did by myself.

### Features

- You can add artists, piercings, tattoos and redes to database.
- You can modify artists, piercings, tattoos and redes to database.
- You can delete artists, piercings, tattoos and redes to database.
- You can recive mails from formulary.
- Updating content will automatica for the web.

# Installation 
### Importing repository

For the installation, clone the git repository.

```bash
git clone https://gitlab.com/srtopo1/zona27.git
```

Open the directory.

```bash
cd zona27
```

Remove the html directory on /var/www/

```bash
sudo rm -r /var/www/html
```

Create a symbolic link with the repository.

```bash
sudo ln -s $(pwd)/src /var/www/html

or

sudo ln -s [your_path]/src /var/www/html
```

### Importing database 

For import the DataBase, you have to modify the next code.

```bash
mysqldump -u username -p database_name > data-dump.sql
```

- username is the username you can log in to the database with.

- database_name is the name of the database to export.

- data-dump.sql is the file in the current directory that stores the output.
