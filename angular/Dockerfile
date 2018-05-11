FROM node:8.6 as node

WORKDIR /app

COPY . /app/

RUN npm install

ARG env=prod

RUN npm run build -- --prod --environment $env

EXPOSE 4200

CMD ["npm", "start"]