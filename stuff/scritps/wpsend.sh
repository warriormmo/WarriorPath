#!/bin/bash

LOG_FILE=$HOME"/.git.logs"

if [ "$1" = "help" ]; then
  echo "�������������: send.sh [branch|help]"
  echo ""
  echo "  help - ������� ���� �����."
  echo "  branch - ��� �����, ������� ���� �������� � ��������� �����������. ���� �� ������� - ������������ ��� ��������� �����."
  exit
fi

if [ -z "$1" ]; then
  echo -n "���������� ��� �������� ����� � ��������� �����������..."
  git push --all origin 1>>$LOG_FILE 2>>$LOG_FILE && echo "��" || echo "������"
  echo -n "���������� ��� ���� � ��������� �����������..."
  git push --tags origin 1>>$LOG_FILE 2>>$LOG_FILE && echo "��" || echo "������"
else
  echo -n "���������� � ��������� ����������� ����� $1..."
  git push origin "$1" 1>>$LOG_FILE 2>>$LOG_FILE && echo "��" || echo "������"
fi