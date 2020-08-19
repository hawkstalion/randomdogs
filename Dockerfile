FROM node:12.18.3-alpine

COPY . /app

WORKDIR /app

RUN npm install && npm install -g pm2

EXPOSE 8080

CMD ["pm2-runtime", "index.js"]