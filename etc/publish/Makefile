DC := docker-compose exec
APP := $(DC) deploy

ssh:
	@$(APP) bash

start:
	@docker-compose up -d

stop:
	@docker-compose down

build-image:
	docker build . --tag ghcr.io/ddenysov/mailer:latest --build-arg CACHEBUST=$$RANDOM

push-image:
	docker push ghcr.io/ddenysov/mailer:latest

remove-untagged:
	docker rmi $$(docker images -f dangling=true -q)

build: build-image push-image remove-untagged