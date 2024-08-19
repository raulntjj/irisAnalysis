# Requisitos para rodar projeto

- Ter o docker instalado no computador

## Para rodar da maneira mais simples

- Instale a extensão do docker no VSCODE
- Clique com o botão direito no arquivo docker-compose.yaml
- Aperte em composer up
- Feito isso o projeto ja está funcionando no seu localhost na porta 8989 (nginx que eu escolhi)
- instale as dependências:
- $ docker-compose exec app bash
- $ composer install
- e por fim rode a migração:
- $ php artisan migrate

## Para rodar da maneira mais tradicional

- Abra o diretorio do projeto no cmd e digite $ docker-compose up -d
- instale as dependências:
- $ docker-compose exec app bash
- $ composer install
- e por fim rode a migração:
- $ php artisan migrate
