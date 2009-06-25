#!/bin/bash

LOG_FILE=$HOME"/.git.logs"

if [ "$1" = "help" ]; then
  echo "�������������: status.sh [branch|help]"
  echo ""
  echo "  help - ������� ���� �����."
  echo "  branch - ��� �����, ��������� ������� �����������."
  exit
fi

if [ -n "$1" ]; then
  branch="$1"
  echo -n "����� $branch ������������?.."
  if [ `git branch | grep $branch | wc -c` -gt 0 ]; then
    echo "��"
    commits=`git rev-list origin/master..$branch | wc -l`
    if [ "$commits" -gt 0 ]; then
      echo "����� $branch �� ������� � ������ (����������� �� $commits ��������)"
    else
      echo "����� $branch ������� � ������"
    fi
  fi
fi