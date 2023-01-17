#!/bin/sh
mail_admin="rlogachev@case-shop.ru"      # Электропочта Администратора сервера


git pull origin astrobot
git add .
git commit -m "fix"
git push origin astrobot
phing -f build.xml
echo "complite."
