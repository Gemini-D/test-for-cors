FROM node:alpine as builder

WORKDIR /usr/src/build

COPY . /usr/src/build
RUN npm install -g cnpm --registry=https://registry.npm.taobao.org \
    && cnpm install \
    && npm run-script build

FROM nginx:alpine

COPY --from=builder /usr/src/build/dist /usr/src/app/dist
COPY --from=builder /usr/src/build/app.conf /etc/nginx/conf.d/

ENTRYPOINT ["nginx", "-g", "daemon off;"]
