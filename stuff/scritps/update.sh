#!/bin/bash

if [ "$1" = "help" ]; then
  echo "Использование: update.sh [reset|test]"
  echo ""
  echo "  help - выводит этот текст."
  echo "  reset - сбрасывает локальные master и test к удаленным (без указания параметра - мержит)"
  exit
fi

echo -n "Забираем последние имзменения из репозитория"
git fetch -t origin || echo "... Ошибка" && echo "...Ок"

if [ "$1" = "reset" ]; then
  echo -n "Переходим в ветку master"
  git checkout master || echo "... Ошибка" && echo "...Ок"
  echo -n "Сбрасываем локальный master к удаленному"
  git reset --hard origin/master || echo "... Ошибка" && echo "...Ок"
  echo -n "Переходим в ветку test"
  git checkout test || echo "... Ошибка" && echo "...Ок"
  echo -n "Сбрасываем локальный test к удаленному"
  git reset --hard origin/test || echo "... Ошибка" && echo "...Ок"
else
  echo -n "Переходим в ветку master"
  git checkout master 1>>/dev/null 2>>/dev/null || echo "... Ошибка" && echo "...Ок"
  echo -n "Вмерживаем удаленный master в локальный"
  git merge origin/master 1>>/dev/null 2>>/dev/null || echo "... Ошибка" && echo "...Ок"
  echo -n "Переходим в ветку test"
  git checkout test 1>>/dev/null 2>>/dev/null || echo "... Ошибка" && echo "...Ок"
  echo -n "Вмерживаем удаленный test в локальный"
  git merge origin/test 1>>/dev/null 2>>/dev/null || echo "... Ошибка" && echo "...Ок"
fi