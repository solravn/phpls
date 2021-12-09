#!/bin/bash -e

PROJECT_PATH="$( cd "$(dirname "$0")" ; pwd -P )"
cd "$PROJECT_PATH"

source etc/script/init.include.sh

while getopts ":ahp:cb" opt; do
  case $opt in
     a) alternative_ports ;;
     h) show_help ; exit 0 ;;
     b) SKIP_BUILD=true ;;
     c) SKIP_CRLF_CHECK=true ;;
     p) PROJECT_PATH="$OPTARG" ;;
    \?) echo "Invalid option: -$OPTARG" ; exit 1 ;;
     :) echo "Option -$OPTARG requires an argument" ; exit 1 ;;
  esac
done

if [ ! -z ${!OPTIND} ]; then
  CMD_ARG_IND=$((OPTIND+1))
  CMD_ARG=${!CMD_ARG_IND}
  CMD_ARG2_IND=$((OPTIND+2))
  CMD_ARG2=${!CMD_ARG2_IND}
fi

if [ "$machine" == "Linux" ] && [ ! -x /usr/local/bin/docker-compose ]; then
  set -x
  echo docker-compose not found. Downloading...
  install_docker-compose
  set +x
fi

case ${!OPTIND} in
          build) docker-compose build --force-rm; exit $? ;;
             up) docker_compose_up; exit $? ;;
           down) docker-compose down ; exit $? ;;
             rm) docker-compose down -v; exit $? ;;
          shell) $WINPTY docker-compose exec "${CMD_ARG:-app}" bash; exit 0 ;;
       composer) $WINPTY docker-compose exec -T app bash -c "cd /var/app ; composer ${CMD_ARG:-install}"; exit 0 ;;
       migrations) $WINPTY docker-compose exec -T app bash -c "cd /var/app ; bin/huston ${CMD_ARG:-migrate --all-or-nothing}"; exit 0 ;;
             '') ;;
              *) echo "Invalid command '${!OPTIND}'"; exit 1 ;;

esac

show_help