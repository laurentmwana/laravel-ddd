PHP=php
COMPOSER=composer

.DEFAULT_GOAL := help

## —— Help ————————————————————————————————————————————————
help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "%-20s %s\n", $$1, $$2}'

## —— Install ———————————————————————————————————————————————
install: ## Install dependencies
	$(COMPOSER) install --prefer-dist --no-interaction --no-progress --optimize-autoloader

## —— Laravel ———————————————————————————————————————————————
serve: ## Start Laravel dev server
	$(PHP) artisan serve

migrate: ## Run migrations
	$(PHP) artisan migrate

fresh: ## Reset DB + seed
	$(PHP) artisan migrate:fresh --seed

cache: ## Clear all cache
	$(PHP) artisan optimize:clear

## —— Code quality ———————————————————————————————————————————
stan: ## PHPStan static analysis
	vendor/bin/phpstan analyse

cs: ## Laravel Pint (coding style)
	vendor/bin/pint

rector: ## Rector dry-run
	vendor/bin/rector process --dry-run

## —— Tests ————————————————————————————————————————————————
test: ## Run PHPUnit tests
	vendor/bin/phpunit

## —— CI pipeline ——————————————————————————————————————————
ci: install cache stan cs rector test ## Full CI pipeline

## —— Cleanup ————————————————————————————————————————————
clean: ## Clean Laravel cache manually
	rm -rf storage/framework/cache/*
	rm -rf storage/framework/sessions/*
	rm -rf storage/framework/views/*
