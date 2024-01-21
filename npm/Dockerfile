FROM node:20-alpine3.18
RUN mkdir /workspace
WORKDIR /workspace
COPY ./src/package.json /workspace/
RUN apk update && \
    apk add --no-cache make g++ avahi-dev && \
    npm install && \
    npm install -g npm@^9.8.0 && \
    npx npm-check-updates -u && \
    echo "Before second npm install" && \
    npm install && \
    echo "After second npm install"