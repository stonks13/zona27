# Zona27 project

Zona 27 is the studio of my grade final project.

## Installation 

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

## Importing database 

For import the DataBase, you have to modify the next code.

```bash
mysqldump -u username -p database_name > data-dump.sql
```

- username is the username you can log in to the database with.

- database_name is the name of the database to export.

- data-dump.sql is the file in the current directory that stores the output.
