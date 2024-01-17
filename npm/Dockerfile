FROM node:20-alpine3.18
RUN mkdir /workspace
WORKDIR /workspace
COPY ./package.json /workspace/
RUN apk update && \
    apk add --no-cache make g++ avahi-dev && \
    npm install && \
    npm install -g npm@^9.8.0 npm-check-updates