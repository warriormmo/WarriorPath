#!/bin/bash

LOG_FILE=$HOME"/.git.logs"

if [ "$1" = "help" ]; then
  echo "Использование: status.sh [branch|help]"
  echo ""
  echo "  help - выводит этот текст."
  echo "  branch - имя ветки, состояние которой проверяется."
  exit
fi

if [ -n "$1" ]; then
  branch="$1"
  echo -n "Ветка $branch присутствует?.."
  if [ `git branch | grep $branch | wc -c` -gt 0 ]; then
    echo "Да"
    commits=`git rev-list origin/master..$branch | wc -l`
    if [ "$commits" -gt 0 ]; then
      echo "Ветка $branch не вмежена в мастер (различается на $commits коммитов)"
    else
      echo "Ветка $branch вмежена в мастер"
    fi
  fi
fi