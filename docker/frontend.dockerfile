FROM node:16.20.2-alpine

WORKDIR /app

#COPY ./frontend/package.json ./
COPY ../frontend ./

RUN npm install

RUN npm run build

EXPOSE 5173

CMD ["npm", "run", "dev"]
