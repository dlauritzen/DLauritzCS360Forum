## This file just contains a few common commands like resetting the production cache or updating the database.

OSYS = $(shell uname)

ifeq ($(OSYS), 'Darwin')
	PHP = php
else
	PHP = php-5.3
endif

help:
	@echo "make resetcache -- reset the production cache to reflect changes"
	@echo "make entities   -- Update the Doctrine entities"
	@echo "make schema     -- Update the database"

edit:
	@vim Makefile

resetcache:
	$(PHP) app/console --env=prod cache:clear && \
	$(PHP) app/console --env=prod cache:warmup

entities:
	$(PHP) app/console doctrine:generate:entities DLauritz

schema:
	$(PHP) app/console doctrine:schema:update --force

