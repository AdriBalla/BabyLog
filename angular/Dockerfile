FROM node:8.6 as node

WORKDIR /app

COPY package.json /app/

RUN npm init -y

RUN npm install

COPY . /app/

ARG env=prod

RUN npm run build -- --prod --environment $env

EXPOSE 4200

CMD ["npm", "start"]