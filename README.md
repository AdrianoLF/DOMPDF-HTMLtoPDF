# Antes de tudo certifique-se de que o PHP está instalado na máquina
Você pode testar abrindo um prompt de comando e testando com "php -v" (se retornar a versão é porque está certo), caso não retorne:
-https://windows.php.net/download/
- Garantir que tem o pacote dito do visual studio 2017 ou 2019 e baixcar o zip do php mais recente.
- é interessante descompactar no nome da versão em c: , exemplo: C:\php-8.1.13
- Mudar o arquivo php.ini-development para php.ini e então ir nas variáveis do sistema. (vou no search do windows e busco por envi)
- Mudar em Path para todos os users ou só o específico apontando para o diretório como no caminho acima (C:\php-8.1.13).
- Para testar basta usar o "php -v", se estiver ok ele retornará a versão.

# Instale o DOMPDF no repositório local, para isso:
- composer update
- composer install

# Ligue o servidor na máquina local, para isso abra um terminal na pasta onde esse repositório está salvo e cole o comando:
- php -S localhost:8000

# Provavelmente as extensões irão vir todas desativadas. Nessa query do Laravel é necessário ativar:
- extension=curl
- extension=mbstring
- extension=openssl
(Para ativá-las é só descomentar as linhas que estão comentadas e reiniciar o servidor)