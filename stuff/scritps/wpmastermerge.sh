#!/bin/bash

LOG_FILE=$HOME"/.git.logs"

if [ "$1" = "help" ]; then
  echo "�������������: mastermerge.sh [branch|help]"
  echo ""
  echo "  help - ������� ���� �����."
  echo "  branch - ��� �����, ������� ���� �������� � ������"
  exit
fi

if [ -n "$1" ]; then
  branch="$1"
  echo -n "����� $branch ������������?.."
  if [ `git branch | grep $branch | wc -c` -gt 0 ]; then
    echo "��"
    echo -n "��������� � ����� master..."
    git checkout master 1>>$LOG_FILE 2>>$LOG_FILE && echo "��" || echo "������"
    echo -n "���������� ����� $branch � ��������� master..."
    git merge $branch 1>>$LOG_FILE 2>>$LOG_FILE && echo "��" || echo "������"
  else
    echo "���"
    echo "��������� ���� ����� �� ����������. �������� ������������ ��������� ����� �����."
  fi
fi