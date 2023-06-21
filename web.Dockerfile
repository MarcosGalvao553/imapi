FROM nginx:1.10

COPY ./ /var/www

ADD vhost.conf /etc/nginx/conf.d/default.conf
