@echo off


git init
git add .

set /p id="Ingresa los cambios realizados:"
echo Se ha agregado el mensaje al commit.
git commit -am "%id%"

git pull proyectoweb master
git push proyectoweb master

pause