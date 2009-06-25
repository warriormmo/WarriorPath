#!/bin/bash

LOG_FILE=$HOME"/.git.logs"

if [ "$1" = "help" ]; then
  echo "Использование: send.sh [branch|help]"
  echo ""
  echo "  help - выводит этот текст."
  echo "  branch - имя ветки, которую надо отпавить в удаленный репозиторий. если не указана - отправляется все локальные ветки."
  exit
fi

if [ -z "$1" ]; then
  echo -n "Отправляем все локальые ветки в удаленный репозиторий..."
  git push --all origin 1>>$LOG_FILE 2>>$LOG_FILE && echo "ОК" || echo "Ошибка"
  echo -n "Отправляем все таги в удаленный репозиторий..."
  git push --tags origin 1>>$LOG_FILE 2>>$LOG_FILE && echo "ОК" || echo "Ошибка"
else
  echo -n "Отправляем в удаленный репозиторий ветку $1..."
  git push origin "$1" 1>>$LOG_FILE 2>>$LOG_FILE && echo "ОК" || echo "Ошибка"
fi