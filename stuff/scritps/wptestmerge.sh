#!/bin/bash

LOG_FILE=$HOME"/.git.logs"

if [ "$1" = "help" ]; then
  echo "Использование: testmerge.sh [branch|help]"
  echo ""
  echo "  help - выводит этот текст."
  echo "  branch - имя ветки, которую надо вмержить в тест"
  exit
fi

if [ -n "$1" ]; then
  branch="$1"
  echo -n "Ветка $branch присутствует?.."
  if [ `git branch | grep $branch | wc -c` -gt 0 ]; then
    echo "Да"
    echo -n "Переходим в ветку test..."
    git checkout test 1>>$LOG_FILE 2>>$LOG_FILE && echo "ОК" || echo "Ошибка"
    echo -n "Вмерживаем ветку $branch в локальный test..."
    git merge $branch 1>>$LOG_FILE 2>>$LOG_FILE && echo "Ок" || echo "Ошибка"
  else
    echo "Нет"
    echo "Указанная вами ветка не существует. Проверте правильность написания имени ветки."
  fi
fi