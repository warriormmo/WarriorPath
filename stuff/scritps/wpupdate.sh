#!/bin/bash

LOG_FILE=$HOME"/.git.logs"

if [ "$1" = "help" ]; then
  echo "�������������: update.sh [reset|help]"
  echo ""
  echo "  help - ������� ���� �����."
  echo "  reset - ���������� ��������� master � test � ��������� (��� �������� ��������� - ������)"
  exit
fi

echo -n "�������� ��������� ���������� �� �����������"
git fetch -t origin 1>>$LOG_FILE 2>>$LOG_FILE || echo "... ������" && echo "...��"

if [ "$1" = "reset" ]; then
  echo -n "��������� � ����� master"
  git checkout master 1>>$LOG_FILE 2>>$LOG_FILE && echo "...��" || echo "... ������"
  echo -n "���������� ��������� master � ����������"
  git reset --hard origin/master 1>>$LOG_FILE 2>>$LOG_FILE && echo "...��" || echo "... ������"
  echo -n "��������� � ����� test"
  git checkout test 1>>$LOG_FILE 2>>$LOG_FILE && echo "...��" || echo "... ������"
  echo -n "���������� ��������� test � ����������"
  git reset --hard origin/test 1>>$LOG_FILE 2>>$LOG_FILE && echo "...��" || echo "... ������"
else
  echo -n "��������� � ����� master"
  git checkout master 1>>$LOG_FILE 2>>$LOG_FILE && echo "...��" || echo "... ������"
  echo -n "���������� ��������� master � ���������"
  git merge origin/master 1>>$LOG_FILE 2>>$LOG_FILE && echo "...��" || echo "... ������"
  echo -n "��������� � ����� test"
  git checkout test 1>>$LOG_FILE 2>>$LOG_FILE && echo "...��" || echo "... ������"
  echo -n "���������� ��������� test � ���������"
  git merge origin/test 1>>$LOG_FILE 2>>$LOG_FILE && echo "...��" || echo "... ������"
fi