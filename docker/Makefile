# Variables
COMPOSE=docker-compose
PROJECT_DIR=./../news-website

# Setup the Laravel project
setup:
	composer create-project --prefer-dist laravel/laravel $(PROJECT_DIR)

# Build Docker containers
build:
	$(COMPOSE) build

# Start Docker containers
start:
	$(COMPOSE) up -d

# Stop Docker containers
stop:
	$(COMPOSE) down

# Restart Docker containers
restart: stop start

# Initialize the project (setup, build, start)
init: setup build start

.PHONY: setup build start stop restart init
