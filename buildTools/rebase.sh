#!/bin/bash
git remote add upstream https://github.com/thrau/vnstat2-php-frontend.git
git fetch upstream
git rebase upstream/master
git remote set-url origin git@github.com:dangherve/vnstat2-php-frontend.git
git push --force --set-upstream origin master
