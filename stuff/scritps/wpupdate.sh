#!/bin/bash

LOG_FILE=$HOME"/.git.logs"

if [ "$1" = "help" ]; then
  echo "Использование: update.sh [reset|help]"
  echo ""
  echo "  help - выводит этот текст."
  echo "  reset - сбрасывает локальные master и test к удаленным (без указания параметра - мержит)"
  exit
fi

echo -n "Забираем последние имзменения из репозитория"
git fetch -t origin 1>>$LOG_FILE 2>>$LOG_FILE || echo "... Ошибка" && echo "...Ок"

if [ "$1" = "reset" ]; then
  echo -n "Переходим в ветку master"
  git checkout master 1>>$LOG_FILE 2>>$LOG_FILE && echo "...Ок" || echo "... Ошибка"
  echo -n "Сбрасываем локальный master к удаленному"
  git reset --hard origin/master 1>>$LOG_FILE 2>>$LOG_FILE && echo "...Ок" || echo "... Ошибка"
  echo -n "Переходим в ветку test"
  git checkout test 1>>$LOG_FILE 2>>$LOG_FILE && echo "...Ок" || echo "... Ошибка"
  echo -n "Сбрасываем локальный test к удаленному"
  git reset --hard origin/test 1>>$LOG_FILE 2>>$LOG_FILE && echo "...Ок" || echo "... Ошибка"
else
  echo -n "Переходим в ветку master"
  git checkout master 1>>$LOG_FILE 2>>$LOG_FILE && echo "...Ок" || echo "... Ошибка"
  echo -n "Вмерживаем удаленный master в локальный"
  git merge origin/master 1>>$LOG_FILE 2>>$LOG_FILE && echo "...Ок" || echo "... Ошибка"
  echo -n "Переходим в ветку test"
  git checkout test 1>>$LOG_FILE 2>>$LOG_FILE && echo "...Ок" || echo "... Ошибка"
  echo -n "Вмерживаем удаленный test в локальный"
  git merge origin/test 1>>$LOG_FILE 2>>$LOG_FILE && echo "...Ок" || echo "... Ошибка"
fi