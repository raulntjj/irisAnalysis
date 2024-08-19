# Requisitos para rodar projeto

- Ter o docker instalado no computador

## Para rodar da maneira mais simples

- Instale a extensão do docker no VSCODE
- Clique com o botão direito no arquivo docker-compose.yaml
- Aperte em composer up
- Feito isso o projeto ja está funcionando no seu localhost na porta 9090
- instale as dependências no exec do app bash:
- $ docker-compose exec app bash
- $ composer update
- renomeie o .env.example para .env
- $ php artisan key:generate
- $ php artisan config:cache
- e por fim rode a migração, e a seed:
- $ php artisan migrate
- $ php aritsan db:seed
