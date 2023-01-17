#!/bin/sh
mail_admin="rlogachev@case-shop.ru"      # Электропочта Администратора сервера


git pull
git add .
git commit -m "fix"
git push
phing -f build.xml
echo "complite."