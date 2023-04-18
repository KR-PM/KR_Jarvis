
FROM nginx:1.23.3

COPY ./ops/local/jarvis/all/nginx/nginx.conf /etc/nginx/nginx.conf
